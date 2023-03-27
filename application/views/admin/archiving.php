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
        body,html
        {
            height:100%;
        }
    </style>
</head>
<body>

    <?php $this->load->view('admin/navbar'); ?>
    
    <br>
    <div class="container">
        <form action="" class="form-inline">
            <div class="input-group mb-3">
                <label for="date_from">Select Date to load Logged History </label>
                <input type="date" name="date_from" id="date_from" class="form-control">
                <label for="date_to"> to </label>
                <input type="date" name="date_to" id="date_to" class="form-control">
                
                <div class="input-group-append">
                  <button type="button" class="input-group-text btn btn-primary" id="loadArchive"><i class="fa fa-print"></i></button>
                </div>
            </div>
        </form>

        <div class="row">
            <div class="col-md-12">
                <div id="dvContainer" class="table-responsive"></div>
            </div>
        </div>
    </div>

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
