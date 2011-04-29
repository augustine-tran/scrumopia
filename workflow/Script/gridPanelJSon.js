
Ext.require([
    'Ext.grid.*',
    'Ext.data.*',
    'Ext.util.*',
    'Ext.toolbar.Paging',
    'Ext.ModelManager',
    'Ext.tip.QuickTipManager'
]);

	Ext.onReady(function(){
	    Ext.define('Story',{
	        extend: 'Ext.data.Model',
	        fields: [
	            'storyCode', 'storyId', 'storyDescription', 'storyPriority', 'storyPoint', 'storyStatus'
	        ]
	    });
	    
	    /**
		 * Custom function used for column renderer
		 * 
		 * @param {Object} val
		 * 
		 */
	    function status(val) {
	    	if(val==0){
	    		return '<span style="color:yellow;">Pending</span>';
	    	}
	    	
	    	if(val==1){
	    		return '<span style="color:green;">Done</span>';
	    	}
	    	if(val==2){
	    		return '<span style="color:red;">Started</span>';
	    	}
	        return val;
	    }
	    
	    $.extend({
	    	  getUrlVars: function(){
	    	    var vars = [], hash;
	    	    var hashes = window.location.href.slice(window.location.href.indexOf('?') + 1).split('&');
	    	    for(var i = 0; i < hashes.length; i++)
	    	    {
	    	      hash = hashes[i].split('=');
	    	      vars.push(hash[0]);
	    	      vars[hash[0]] = hash[1];
	    	    }
	    	    return vars;
	    	  },
	    	  getUrlVar: function(name){
	    	    return $.getUrlVars()[name];
	    	  }
	    	});
	    // create the Data Store
	    var sprintID=$.getUrlVars('id');
	    var store = Ext.create('Ext.data.Store', {
	    	pageSize: 1,
	        model: 'Story',
	        proxy: {
	            // load using HTTP
	            type: 'ajax',
	            url : sprintID+'/GetStoriesJSon',
	            // the return will be XML, so lets set up a reader
	            reader: {
	                type: 'json',
	                // records will have an "Item" tag
	                root: 'items',
	                idProperty: 'storyId',
	                totalRecords: 'totalCount'
	            }
	        }
	    });
	
	    var pluginExpanded = true;
	    // create the grid
	    var grid = Ext.create('Ext.grid.Panel', {
	        store: store,
	        width: 540,
	        height: 200,
	        columnLines: true,
	        loadMask: true,
	        columns: [
	            {text: "Code", flex: 1, dataIndex: 'storyCode', sortable: true},
	            {text: "Description", width: 180, dataIndex: 'storyDescription', sortable: true},
	            {text: "Status", width: 115, renderer:status, dataIndex: 'storyStatus', sortable: true},
	            {text: "Point", width: 100, dataIndex: 'storyPoint', sortable: true}
	        ],
	     // paging bar on the bottom
	        bbar: Ext.create('Ext.PagingToolbar', {
	            store: store,
	            displayInfo: true,
	            displayMsg: 'Displaying stories {0} - {1} of {2}',
	            emptyMsg: "No stories to display",
	            items:[
	                '-', {
	                text: 'Show Preview',
	                pressed: pluginExpanded,
	                enableToggle: true,
	                toggleHandler: function(btn, pressed) {
	                    var preview = Ext.getCmp('gv').getPlugin('preview');
	                    preview.toggleExpanded(pressed);
	                }
	            }]
	        }),
	        renderTo:'gridPanelJSon'
	    });
	    store.loadPage(1);
	});
