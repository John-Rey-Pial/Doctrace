<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/v/dt/dt-1.10.24/r-2.2.7/datatables.min">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">
    <link rel="icon" href="<?= base_url('support/img/logo.png') ?>">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-xVVam1KS4+Qt2OrFa+VdRUoXygyKIuNWUUUBZYv+n27STsJ7oDOHJgfF0bNKLMJF" crossorigin="anonymous">

</head>

<body>

    <?php $this->load->view('admin/navbar') ?>


    <br><br><br>
    <div class="container">
        <br>
        <div class="table-responsive">
            <table class="table table-stripe" id="usersTable" width="100%">
                <div class="card mb-4 p-3 h3 text-center">Sample Program Output</div>
                <thead>
                    <tr>
                        <th>Referral Code</th>
                        <th>Type of Document</th>
                        <th>Description</th>
                        <th>Office</th>
                        <th>Date Recieved</th>
                        <th>No. of Days Stuck</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>

    <?php # $this->load->view('admin/modal/user'); 
    ?>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/v/dt/dt-1.10.24/r-2.2.7/datatables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>

    <!-- <script src="<?= base_url('support/js/admin.js') ?>"></script> -->
</body>

</html>