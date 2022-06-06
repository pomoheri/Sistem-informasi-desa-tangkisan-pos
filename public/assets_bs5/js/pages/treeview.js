$(function () {

    $('#jstree').jstree({
        "core": {
            "themes": {
                "responsive": false
            }
        },
        "types": {
            "root": {
                "icon": "ri-archive-fill text-info"
            },
            "default": {
                "icon": "ri-folder-fill text-info"
            },
            "file": {
                "icon": "ri-file-fill"
            }
        },
        "plugins": ["types"]
    });

    $('#jstree2').jstree({
        "core": {
            "themes": {
                "responsive": false
            },
            "data": [{
                    "text": "Root",
                    "type": "root",
                    "state": { "opened": true },
                    "children": [{
                        "text": "Node 1",
                        "children": [
                            {"text": "Item 1", "type": "file"},
                            {"text": "Item 2", "type": "file"},
                            {"text": "Item 3", "type": "file"},
                            {"text": "Item 4", "type": "file"},
                            {"text": "Item 5", "type": "file"},
                        ]
                    }, {
                        "text": "Item 6",
                        "icon": "ri-focus-2-fill text-warning"
                    },{
                        "text": "Node 2",
                        "state": { "opened" : true },
                        "children": [
                            {"text": "Node 3", "state": {"disabled": true}},
                            {"text": "Item 7", "type": "file"}
                        ]
                    }, {"text": "Node 4", "icon": "ri-award-fill text-danger"}, {
                        "text": "Node 5", "state": {"opened": true, "selected": true},
                        "children": [
                            {"text": "Node 6"},
                            {"text": "Node 7"},
                            {"text": "Item 8", "type": "file", "icon": "ri-file-fill text-success"},
                            {"text": "Item 9", "type": "file", "state": {"disabled": true}},
                            {"text": "Item 10", "type": "file"}
                        ]
                    }
                ]
            }]            
        },
        "types": {
            "root": {
                "icon": "ri-archive-fill text-info"
            },
            "default": {
                "icon": "ri-folder-fill text-info"
            },
            "file": {
                "icon": "ri-file-fill"
            }
        },
        "plugins": ["checkbox", "types"]
    });

    $('#jstree3').jstree({
        "core": {
            "themes": {
                "responsive": false
            },
            "check_callback": true,
            "data": [{
                    "text": "Root",
                    "type": "root",
                    "state": { "opened": true },
                    "children": [{
                        "text": "Node 1",
                        "children": [
                            {"text": "Item 1", "type": "file"},
                            {"text": "Item 2", "type": "file"},
                            {"text": "Item 3", "type": "file"},
                            {"text": "Item 4", "type": "file"},
                            {"text": "Item 5", "type": "file"},
                        ]
                    }, {
                        "text": "Item 6",
                        "icon": "ri-focus-2-fill text-warning"
                    },{
                        "text": "Node 2",
                        "state": { "opened" : true },
                        "children": [
                            {"text": "Node 3", "state": {"disabled": true}},
                            {"text": "Item 7", "type": "file"}
                        ]
                    }, {"text": "Node 4", "icon": "ri-award-fill text-danger"}, {
                        "text": "Node 5", "state": {"opened": true, "selected": true},
                        "children": [
                            {"text": "Node 6"},
                            {"text": "Node 7"},
                            {"text": "Item 8", "type": "file", "icon": "ri-file-fill text-success"},
                            {"text": "Item 9", "type": "file", "state": {"disabled": true}},
                            {"text": "Item 10", "type": "file"}
                        ]
                    }
                ]
            }]            
        },
        "types": {
            "root": {
                "icon": "ri-archive-fill text-info"
            },
            "default": {
                "icon": "ri-folder-fill text-info"
            },
            "file": {
                "icon": "ri-file-fill"
            }
        },
        "plugins": ["contextmenu", "types"]
    });

    $('#jstree4').jstree({
        "core": {
            "themes": {
                "responsive": false
            },
            "check_callback": true,
            "data": [{
                    "text": "Root",
                    "type": "root",
                    "state": { "opened": true },
                    "children": [{
                        "text": "Node 1",
                        "children": [
                            {"text": "Item 1", "type": "file"},
                            {"text": "Item 2", "type": "file"},
                            {"text": "Item 3", "type": "file"},
                            {"text": "Item 4", "type": "file"},
                            {"text": "Item 5", "type": "file"},
                        ]
                    }, {
                        "text": "Item 6",
                        "icon": "ri-focus-2-fill text-warning"
                    },{
                        "text": "Node 2",
                        "state": { "opened" : true },
                        "children": [
                            {"text": "Node 3", "state": {"disabled": true}},
                            {"text": "Item 7", "type": "file"}
                        ]
                    }, {"text": "Node 4", "icon": "ri-award-fill text-danger"}, {
                        "text": "Node 5", "state": {"opened": true, "selected": true},
                        "children": [
                            {"text": "Node 6"},
                            {"text": "Node 7"},
                            {"text": "Item 8", "type": "file", "icon": "ri-file-fill text-success"},
                            {"text": "Item 9", "type": "file", "state": {"disabled": true}},
                            {"text": "Item 10", "type": "file"}
                        ]
                    }
                ]
            }]            
        },
        "types": {
            "root": {
                "icon": "ri-archive-fill text-info"
            },
            "default": {
                "icon": "ri-folder-fill text-info"
            },
            "file": {
                "icon": "ri-file-fill"
            }
        },
        "plugins": ["dnd", "types"]
    });
    
    $('#jstree5').jstree({
        "core": {
            "themes": {
                "responsive": false
            },
            "check_callback": true,
            "data": [{
                    "text": "Root",
                    "type": "root",
                    "state": { "opened": true },
                    "children": [{
                        "text": "Node 1",
                        "children": [
                            {"text": "Item 1", "type": "file"},
                            {"text": "Item 2", "type": "file"},
                            {"text": "Item 3", "type": "file"},
                            {"text": "Item 4", "type": "file"},
                            {"text": "Item 5", "type": "file"},
                        ]
                    }, {
                        "text": "Item 6",
                        "icon": "ri-focus-2-fill text-warning"
                    },{
                        "text": "Node 2",
                        "state": { "opened" : true },
                        "children": [
                            {"text": "Node 3", "state": {"disabled": true}},
                            {"text": "Item 7", "type": "file"}
                        ]
                    }, {"text": "Node 4", "icon": "ri-award-fill text-danger"}, {
                        "text": "Node 5", "state": {"opened": true, "selected": true},
                        "children": [
                            {"text": "Node 6"},
                            {"text": "Node 7"},
                            {"text": "Item 8", "type": "file", "icon": "ri-file-fill text-success"},
                            {"text": "Item 9", "type": "file", "state": {"disabled": true}},
                            {"text": "Item 10", "type": "file"}
                        ]
                    }
                ]
            }]            
        },
        "types": {
            "root": {
                "icon": "ri-archive-fill text-info"
            },
            "default": {
                "icon": "ri-folder-fill text-info"
            },
            "file": {
                "icon": "ri-file-fill"
            }
        },
        "plugins": ["search", "types"]
    });

    $("#s").submit(function(e) {
        e.preventDefault();
        $("#jstree5").jstree(true).search($("#q").val());
    });

    $('#jstree6').jstree({
        "core": {
            "themes": {
                "responsive": false
            },
            "check_callback": true,
            "data": [{
                    "text": "Root",
                    "type": "root",
                    "state": { "opened": true },
                    "children": [{
                        "text": "Node 1",
                        "children": [
                            {"text": "Item 1", "type": "file"},
                            {"text": "Item 2", "type": "file"},
                            {"text": "Item 3", "type": "file"},
                            {"text": "Item 4", "type": "file"},
                            {"text": "Item 5", "type": "file"},
                        ]
                    }, {
                        "text": "Item 6",
                        "icon": "ri-focus-2-fill text-warning"
                    },{
                        "text": "Node 2",
                        "state": { "opened" : true },
                        "children": [
                            {"text": "Node 3", "state": {"disabled": true}},
                            {"text": "Item 7", "type": "file"}
                        ]
                    }, {"text": "Node 4", "icon": "ri-award-fill text-danger"}, {
                        "text": "Node 5", "state": {"opened": true, "selected": true},
                        "children": [
                            {"text": "Node 6"},
                            {"text": "Node 7"},
                            {"text": "Item 8", "type": "file", "icon": "ri-file-fill text-success"},
                            {"text": "Item 9", "type": "file", "state": {"disabled": true}},
                            {"text": "Item 10", "type": "file"}
                        ]
                    }
                ]
            }]            
        },
        "types": {
            "root": {
                "icon": "ri-archive-fill text-info"
            },
            "default": {
                "icon": "ri-folder-fill text-info"
            },
            "file": {
                "icon": "ri-file-fill"
            }
        },
        "plugins": ["sort", "types"]
    });

    $('#jstree').on("changed.jstree", function (e, data) {
        console.log(data.selected);
    });
    
  });