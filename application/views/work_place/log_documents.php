<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doc Tracer</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/v/dt/dt-1.10.24/r-2.2.7/datatables.min">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">
    <link rel="icon" href="<?=base_url('support/img/logo.png')?>">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-xVVam1KS4+Qt2OrFa+VdRUoXygyKIuNWUUUBZYv+n27STsJ7oDOHJgfF0bNKLMJF" crossorigin="anonymous">

    <style>
        body,html{
            height:100%;
        }
    </style>
</head>
<body>
    <?php $this->load->view('work_place/navbar'); ?>
    <br>
    <div class="container">
        <div class="table-responsive">
            <table class="table table-stipe" id="logTable">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Document</th>
                        <th>Date</th>
                        <th>Office</th>
                        <th>Document Type</th>
                        <th>Note</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>
    </div>

    <?php
        $this->load->view('work_place/modal/recieve_modal');
        $this->load->view('work_place/modal/doneModal');
        $this->load->view('work_place/modal/noteModal');
        $this->load->view('work_place/modal/previousModal');
    ?>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/v/dt/dt-1.10.24/r-2.2.7/datatables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>

    <script src="<?=base_url('support/js/log_documents.js')?>"></script>
    <script>
        var isMobile = /iPhone|iPad|iPod|Android/i.test(navigator.userAgent);
        if (isMobile) {
        /* your code here */
            console.log('using mobile!!!');
        }


    </script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        Swal.fire({
            //  showConfirmButton:false,
            //  showDenyButton:true,
            title:'YOU HAVE <?php print_r($query) ?> </a> FILES OVER 3 DAYS!',
            html:
                'Click ' +
                '<a href="<?=base_url('Notification/Load_files_over_3days') ?>">here </a>' +
                'to see it',
            icon:'warning',
            confirmButtonText:
                '<i class="fas fa-times"></i> Close',
            confirmButtonColor:'#DC143C'
        })
    </script>
</body>
</html>
