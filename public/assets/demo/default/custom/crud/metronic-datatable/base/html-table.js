	var DatatableHtmlTableDemo = {
	    init: function () {
	        var e;
	        e = $(".m-datatable").mDatatable({
	            data: {
	                saveState: {
	                    cookie: !1
	                }
	            },
	            search: {
	                input: $("#generalSearch")
	            },
	            columns: [{
	                field: "ID",
	                type: "number"
	            }, {
	                field: "Order Date",
	                type: "date",
	                format: "YYYY-MM-DD"
	            }, {
	                field: "Status",
	                title: "Status",
	                template: function (e) {
	                    var t = {
	                        4: {
	                            title: "User",
	                            class: " m-badge--success"
	                        },
	                        6: {
	                            title: "Admin",
	                            class: " m-badge--danger"
	                        }
	                    };
	                    return '<span class="m-badge ' + t[e.Status].class + ' m-badge--wide">' + t[e.Status].title + "</span>"
	                }
	            }, {
	                field: "Type",
	                title: "Type",
	                template: function (e) {
	                    var t = {
	                        1: {
	                            title: "Admin",
	                            state: "danger"
	                        },
	                        2: {
	                            title: "Retail",
	                            state: "primary"
	                        },
	                        3: {
	                            title: "Direct",
	                            state: "accent"
	                        }
	                    };
	                    return '<span class="m-badge m-badge--' + t[e.Type].state + ' m-badge--dot"></span>&nbsp;<span class="m--font-bold m--font-' + t[e.Type].state + '">' + t[e.Type].title + "</span>"
	                }
	            }]
	        }), $("#m_form_status").on("change", function () {
	            e.search($(this).val().toLowerCase(), "Status")
	        }), $("#m_form_type").on("change", function () {
	            e.search($(this).val().toLowerCase(), "Type")
	        }), $("#m_form_status, #m_form_type").selectpicker()
	    }
	};
	jQuery(document).ready(function () {
	    DatatableHtmlTableDemo.init()
	});
