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


    <div class="container h-100">
        <div class="row h-100 justify-content-center align-items-center">
            <div class="col-md-4 col-12">
                <center>
                    <img src="<?=base_url('support/img/logo.png');?>" width="200px;" alt="" class="img-responsive img-fluid ">
                </center>
                <form action="<?=base_url('trace')?>" method="post">
                    <div class="form-group">
                        <label for="code">Document Code</label>
                        <input type="text" name="code" id="code" class="form-control">
                    </div>
                   
                    <button class="btn btn-primary btn-block">Trace Document <i class="fa fa-search"></i></button>
                    <a href="<?=base_url('login/admin_login')?>" class="btn btn-danger btn-block">Login as Admin <i class="fa fa-key"></i></a>
                </form>
            </div>
        </div>
    </div>

        
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        var isMobile = /iPhone|iPad|iPod|Android/i.test(navigator.userAgent);
        if (isMobile) {
        /* your code here */
            console.log('using mobile!!!');
            
        }

    </script>
</body>
</html>
