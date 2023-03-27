$(document).ready(function () {
    const base_url = window.location.origin;

    const dataTable = $("#officeDocumentTable").DataTable({
        processing: true,
        serverSide: true,
        order: [],
        ajax: {
            url: base_url + "/document/load_office_document",
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
    $("#officeDocumentTable_length").append(
        '<button class="btn btn-primary btn-sm" id="showDocumentModal">Add New Document <i class="fa fa-file-plus"></i></button>'
    );

    $("#showDocumentModal").click(function () {
        $.get(
            `${base_url}/load_document_type`,
            function (res) {
                let html = "";

                for (let i = 0; i < res.length; i++) {
                    html += `<option value="${res[i].regular_id}">${res[i].regular_procedures}</option>`;
                }
                html += '<option value="0">Other</option>';
                $("#document_type").html(html);
            },
            "json"
        );
        $("#documentModal").modal("show");
    });

    $(document).on("click", ".btnCancelModal", function () {
        const document_id = $(this).attr("id");
        $("#document_id").val(document_id);

        $("#cancelModal").modal("show");
    });
});
