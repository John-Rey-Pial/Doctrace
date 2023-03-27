

const base_url = window.location.origin;

// $("#btnPrint").live("click", function () {
//     var divContents = $("#dvContainer").html();
//     var printWindow = window.open('', '', 'height=400,width=800');
//     printWindow.document.write('<html><head><title>DIV Contents</title>');
//     printWindow.document.write('</head><body >');
//     printWindow.document.write(divContents);
//     printWindow.document.write('</body></html>');
//     printWindow.document.close();
//     printWindow.print();
// });


$('#loadArchive').on('click',function(){
    var date_from = document.getElementById('date_from').value;
    var date_to = document.getElementById('date_to').value;
    if(!date_from || !date_to)
    {
        alert("Both Fields are required to load data");
    }
    else
    {
        $.get(base_url+'/archive/load_archive/'+$('#date_form').val()+'/'+$('#date_to').val(), function(res){
            let html = '';
    
            html+= `<center><h4>Logged Documents ${$('#date_from').val()} - ${$('#date_to').val()}</center></h4>
            <table class="table table-stripe ">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Document</th>
                        <th>Office</th>
                        <th>Document Type</th>
    
                    </tr>
                </thead>
                <tbody>
            `;
            for(var i = 0; i < res.length; i++)
            {
                html+=`
                    <tr>
                        <td>${res[i].trace_id}</td>
                        <td>${res[i].document}</td>
                        <td>${res[i].office}</td>
                        <td>${res[i].regular_procedures}</td>
                    </tr>
                `;
            }
    
            html+=`</tbody></table>`;
    
            $('#dvContainer').html(html);
    
             let printContents, popupWin;
    
            printContents = document.getElementById('dvContainer').innerHTML;
            popupWin = window.open('', '_blank', 'top=0,left=0,height=100%,width=auto');
            popupWin.document.open();
            popupWin.document.write(`
              <!DOCTYPE html>
                <html lang="en">
                <head>
                    <meta charset="UTF-8">
                    <meta http-equiv="X-UA-Compatible" content="IE=edge">
                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                    <title>Doc Tracer</title>
    
                    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
                    <link rel="icon" href="<?=base_url('support/img/logo.png')?>">
                    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-xVVam1KS4+Qt2OrFa+VdRUoXygyKIuNWUUUBZYv+n27STsJ7oDOHJgfF0bNKLMJF" crossorigin="anonymous">
    
                    <style>
                        body,html{
                            height:100%;
                        }
                    </style>
                </head>
                <body>
              
                ${printContents}
    
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
                <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    
                <script src="https://unpkg.com/pdfjs-dist/"></script>
    
                <script src="<?=base_url('support/js/archive.js')?>" type="module"></script>
    
                <script>
                    var isMobile = /iPhone|iPad|iPod|Android/i.test(navigator.userAgent);
                    if (isMobile) {
                    /* your code here */
                        console.log('using mobile!!!');
                    }
    
                    
    
    
                </script>
            </body>
            </html>
              `
            );
            popupWin.document.close();
            popupWin.print();
        },'json');
    }
    
});
