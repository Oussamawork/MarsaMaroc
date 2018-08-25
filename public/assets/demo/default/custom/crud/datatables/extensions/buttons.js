var DatatablesExtensionButtons = {
    init: function () {
        var t;
        $("#m_table_1").DataTable({
                responsive: !0,
                dom: "<'row'<'col-sm-6 text-left'f><'col-sm-6 text-right'B>>\n\t\t\t<'row'<'col-sm-12'tr>>\n\t\t\t<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7 dataTables_pager'lp>>",
                buttons: ["print", "copyHtml5", "excelHtml5", "csvHtml5", "pdfHtml5"],
                columnDefs: [{
                    targets: 7,
                    render: function (t, e, a, n) {
                        var s = {
                            1: {
                                title: "Pending",
                                class: "m-badge--brand"
                            },
                            2: {
                                title: "Delivered",
                                class: " m-badge--metal"
                            },
                            3: {
                                title: "Canceled",
                                class: " m-badge--primary"
                            },
                            4: {
                                title: "Affecter",
                                class: " m-badge--success"
                            },
                            5: {
                                title: "Disponible",
                                class: " m-badge--info"
                            },
                            6: {
                                title: "Panne",
                                class: " m-badge--danger"
                            },
                            7: {
                                title: "Réformer",
                                class: " m-badge--warning"
                            }
                        };
                        return void 0 === s[t] ? t : '<span class="m-badge ' + s[t].class + ' m-badge--wide">' + s[t].title + "</span>"
                    }
                }]
            }),

            $("#export_print").on("click", function (e) {
                e.preventDefault(), t.button(0).trigger()
            }), $("#export_copy").on("click", function (e) {
                e.preventDefault(), t.button(1).trigger()
            }), $("#export_excel").on("click", function (e) {
                e.preventDefault(), t.button(2).trigger()
            }), $("#export_csv").on("click", function (e) {
                e.preventDefault(), t.button(3).trigger()
            }), $("#export_pdf").on("click", function (e) {
                e.preventDefault(), t.button(4).trigger()
            })
    }
};
jQuery(document).ready(function () {
    DatatablesExtensionButtons.init()
});
