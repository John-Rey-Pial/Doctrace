$(document).ready(function() 
{ 
    const base_url = window.location.origin;

    const dataTable = $("#lllogTable").DataTable({
        processing: true,
        serverSide: true,
        order: [],
        ajax: {
            url: base_url+ "/admin/load_outside_document",
            type: "POST",
        },
        columnDefs: [
            {
                targets: [0, 1],
                orderable: false,
            },
        ],
        responsive: true   
    });

    $('#btnOutsideDocumentModal').on('click', function()
    {
        $('#outsideDocumentModal').modal('show');
    });
});
