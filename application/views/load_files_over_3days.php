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

<nav class="navbar navbar-expand-md bg-dark navbar-dark">
    <!-- Brand -->
    <a class="navbar-brand" href="<?=base_url('work_place')?>">DOC TRACER - <?=$this->session->office?></a>

    <!-- Toggler/collapsibe Button -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Navbar links -->
    <div class="collapse navbar-collapse" id="collapsibleNavbar">
        <ul class="navbar-nav mr-auto">

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                    Documents That is Pass 3 Days
                </a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="<?=base_url('d_create')?>"> <i class="fa fa-file-plus"></i> My Document/s </a>
                    <a class="dropdown-item" href="<?=base_url('log_documents')?>"> <i class="fa fa-list"></i> Log Document/s </a>
                    <a class="dropdown-item" href="<?=base_url('archive')?>"> <i class="fa fa-book"></i> Archive </a>
                    <a class="dropdown-item" href="<?=base_url('outside_document')?>"> <i class="fa fa-file"></i> Outside Document </a>
                </div>

            </li>

        </ul>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Settings <i class="fa fa-cog"></i>
              </a>

              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="<?=base_url('admin/change_pass')?>"> Change Password <i class="fa fa-key"></i></a>
                    <a class="dropdown-item" href="<?=base_url('logout')?>"> Logout <i class="fa fa-sign-out"></i></a>
              </div>
            </li>
        </ul>
    </div>
</nav>


<br>
<div class="container">
    <div class="table-responsive">
        <table class="table table-stipe" id="load_files_over_3daysTable">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Document</th>
                    <th>Date</th>
                    <th>Office</th>
                    <th>Document Type</th>
                    <th>Days Stucked</th>
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


    <script src="<?=base_url('support/js/load_files_over_3days.js')?>"></script>
    <script>
        var isMobile = /iPhone|iPad|iPod|Android/i.test(navigator.userAgent);
        if (isMobile) {
        /* your code here */
            console.log('using mobile!!!');
        }
    </script>
</body>
</html>
