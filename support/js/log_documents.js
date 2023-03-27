$(document).ready(function () {
    const base_url = window.location.origin;

    const dataTable = $("#logTable").DataTable({
        processing: true,
        serverSide: true,
        order: [],
        ajax: {
            url: base_url + "/document/load_log_document",
            type: "POST",
        },
        columnDefs: [
            {
                targets: [0, 1],
                orderable: false,
            },
        ],
        responsive: true,
    });
    $("#logTable_length").append(
        '<button class="btn btn-primary btn-sm" id="receiveDocumentModal">Recieve Document</button>'
    );

    //done modal
    $(document).on("click", ".btnDoneModal", function () {
        const trace_id = $(this).attr("id");
        $("#trace_id").val(trace_id);

        $("#doneModal").modal("show");
    });
    //end of done modal
    //note Modal
    $(document).on("click", ".btnNoteModal", function () {
        const trace_id = $(this).attr("id");
        $("#trace_id").val(trace_id);
        $("#noteModal").modal("show");
    });
    //end of note modal
    //previous Modal
    $(document).on("click", ".btnPreviousModal", function () {
        const referral_code = $(this).attr("id");

        $.post(
            `${base_url}/search_referral_code`,
            { referral_code: referral_code },
            function (res) {
                let html = "";
                let doc_type = "";

                $.post(
                    base_url + "/document/get_last_id/" + res[0].document_id,
                    function (ress) {
                        $("#last_id").val(ress[0].last_id);
                        $.get(
                            `${base_url}/document/get_info_trace/` +
                                (ress[0].last_id - 1),
                            function (inf) {
                                var d1, d2, t1, t2;
                                d2 = new Date(res[0].date);
                                d1 = new Date(inf[0].date);

                                t1 = d1.getTime();
                                t2 = d2.getTime();

                                var diff = parseInt(
                                    (t1 - t2) / (24 * 3600 * 1000)
                                );
                                if (res[0].document_type == null) {
                                    doc_type = "Others";
                                } else {
                                    doc_type = res[0].document_type;
                                }
                                html += `
                        <span> From: ${inf[0].office} </span> <br>
                        <span> No. of days stuck: ${diff} day/s</span><br>
                        <span> Note: ${inf[0].note}</span>
                        `;

                                $("#showContentsss").html(html);
                            },
                            "json"
                        );
                    },
                    "json"
                );
            },
            "json"
        );

        $("#previousModal").modal("show");
    });
    //end of previous Modal
    $("#receiveDocumentModal").click(function () {
        $("#receiveModal").modal("show");
    });

    $("#searchReferral").click(function () {
        $.post(
            `${base_url}/search_referral_code`,
            { referral_code: $("#referral_code").val() },
            function (res) {
                let html = "";
                let doc_type = "";

                if (res.length == 0) {
                    html = `The Document does not exist!`;
                    $("#receiveButton").attr("disabled", true);
                } else {
                    $("#document_id").val(res[0].document_id);
                    $.post(
                        base_url +
                            "/document/get_last_id/" +
                            res[0].document_id,
                        function (ress) {
                            $("#last_id").val(ress[0].last_id);
                            $.get(
                                `${base_url}/document/get_info_trace/` +
                                    ress[0].last_id,
                                function (inf) {
                                    if (res[0].document_type == null) {
                                        doc_type = "Others";
                                    } else {
                                        doc_type = res[0].document_type;
                                    }
                                    html += `<h4>${res[0].document}</h4>
                        <span>Document Type: ${doc_type}</span><br>
                        <span>Origin: ${res[0].office}</span><br>
                        <span>Origin Date Created: ${res[0].date}</span>


                        `;
                                    if (inf.length > 0) {
                                        var d1, d2, t1, t2;
                                        d1 = new Date();
                                        d2 = new Date(inf[0].date);

                                        t1 = d1.getTime();
                                        t2 = d2.getTime();

                                        var diff = parseInt(
                                            (t1 - t2) / (24 * 3600 * 1000)
                                        );
                                        html += `<hr>
                            <span> From: ${inf[0].office} </span> <br>
                            <span> No. of days stuck: ${diff}</span><br>
                            <span> Note: ${inf[0].note}</span>`;
                                    }
                                    $("#receiveButton").attr("disabled", false);
                                    $("#showContent").html(html);
                                },
                                "json"
                            );
                        },
                        "json"
                    );
                }
            },
            "json"
        );
    });
});
