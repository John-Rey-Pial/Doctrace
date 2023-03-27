$(document).ready(function () {
    const base_url = window.location.origin;
    console.log(base_url);
    const dataTable = $("#logTable").DataTable({
        processing: true,
        serverSide: true,
        order: [],
        ajax: {
            url: base_url + "/document/load_outside_document",
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
        '<button class="btn btn-primary btn-sm" id="btnOutsideDocumentModal">Create Document</button>'
    );

    $("#btnOutsideDocumentModal").on("click", function () {
        $("#outsideDocumentModal").modal("show");
    });
});
