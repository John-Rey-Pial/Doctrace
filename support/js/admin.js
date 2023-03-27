

$(document).ready(function() 
{

    const base_url = window.location.origin;

    const dataTable = $("#usersTable").DataTable({
        processing: true,
        serverSide: true,
        order: [],
        ajax: {
            url: base_url+ "/admin/fetch_user",
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

    $('#usersTable_length').append('<button class="btn btn-primary btn-sm" id="showUserModal">Add User <i class="fa fa-user-plus"></i></button>');
    $('#showUserModal').click(function()
    {
        $.get(`${base_url}/load_offices`, function(res)
        {
        
            let html ='';

            for(let i =0; i < res.length; i++)
            {
                console.log(res[i]); 
                html+= `<option value="${res[i].office_id}">${res[i].office} - ${res[i].description}</option>`;
            }

            $('#office_id').html(html);

        },'json');
        $('#userModal').modal('show');
    });
});
