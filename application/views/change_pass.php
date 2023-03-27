<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="<?=base_url()."support/"?>sweetalert/sweetalert2.min.css" rel="stylesheet" type="text/css" />
        
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/v/dt/dt-1.10.24/r-2.2.7/datatables.min">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">
        <link rel="icon" href="<?=base_url('support/img/logo.png')?>">
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-xVVam1KS4+Qt2OrFa+VdRUoXygyKIuNWUUUBZYv+n27STsJ7oDOHJgfF0bNKLMJF" crossorigin="anonymous">

    <title>BIR Doc Tracer</title>
</head>
<body>

    <div class="container">
        <div class="row">
            
            <div class="col-md-4"></div>
            <div class="col-md-4"><br><br>
                <center>
                    <img src="<?=base_url('support/img/logo.png')?>" class="img-fluid" style="width: 200px;" alt="">
                    <h4>Change Password</h4>
                </center>
                <form action="<?=base_url('admin/change_password')?>" method="POST">
                    
                    <div class="form-group">
                        <input type="hidden" name="id" id="id" value="<?=$this->session->user_id?>" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="password">New Password</label>
                        <input type="password" name="password" id="password" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="confirm_password">Confirm Password</label>
                        <input type="password" name="confirm_password" id="confirm_password" class="form-control">
                    </div>
                    <!-- <span>Please Register</span> -->
                    <button class="btn btn-primary btn-block">Change Password <i class="fa fa-key"></i></button>
                    <a href="<?=base_url('logout')?>" class="btn btn-danger btn-block">Logout <i class="fa fa-sign-out"></i> </a>
                </form>
            </div>
            <div class="col-md-4"></div>
        </div>
    </div>    


    
<script src="<?=base_url()."support/"?>jquery.min.js"></script>
<script src="<?=base_url()."support/"?>sweetalert/sweetalert2.all.min.js"></script>
<script src="<?=base_url()."support/"?>bootstrap/js/bootstrap.bundle.min.js" type="text/javascript"></script>
</body>
</html>