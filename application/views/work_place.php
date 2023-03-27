<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doc Tracer</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="icon" href="<?= base_url('support/img/logo.png') ?>">

    <!-- Font Awesome Pro CSS -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-xVVam1KS4+Qt2OrFa+VdRUoXygyKIuNWUUUBZYv+n27STsJ7oDOHJgfF0bNKLMJF" crossorigin="anonymous">

    <style>
        body,
        html {
            height: 100%;
        }
    </style>
</head>

<body>
    <?php $this->load->view('work_place/navbar'); ?>
    <br><br>



    <div class="container">

        <div class="row">
            <div class="col-md-12 table-responsive">
                <h5 class="text-muted">Recent Created Documents</h5>
                <table class="table ">
                    <thead class="thead-light">
                        <tr>
                            <th>#</th>
                            <th>Document</th>
                            <th>Office</th>
                            <th>Date</th>
                            <th>Document Type</th>

                        </tr>
                    </thead>
                    <tbody id="content">

                    </tbody>
                </table>
            </div>
        </div>

    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>

    <script>
        var base_url = window.location.origin;

        function show() {
            $.get(base_url + '/work_place/get_recent', function(res) {
                var html = '';
                for (var i = 0; i < res.length; i++) {
                    var ts = new Date(res[i].date);
                    var doctype = '';
                    if (res[i].doctype == null) {
                        doctype = 'Other';
                    } else {
                        doctype = res[i].doctype;
                    }
                    html += `
                        <tr>
                            <td>${res[i].document_id}</td>
                            <td>${res[i].document}</td>
                            <td>${res[i].office}</td>
                            <td>${ts.toLocaleString()}</td>
                            <td>${doctype}</td>
                        </tr>
                    `;
                }
                $('#content').html(html);
            }, 'json');
        }
        show();
        setInterval(function() {
            show();
        }, 30000);
    </script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        Swal.fire({
            title: 'YOU HAVE FILES OVER 3 DAYS!',
            icon: 'warning'
        })
    </script>
</body>

</html>