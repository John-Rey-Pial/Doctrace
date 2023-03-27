<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doc Tracer</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="icon" href="<?=base_url('support/img/logo.png')?>">
    <link rel="stylesheet" href="<?=base_url('support/css/document_trace.css')?>">

    <!-- Font Awesome Pro CSS -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-xVVam1KS4+Qt2OrFa+VdRUoXygyKIuNWUUUBZYv+n27STsJ7oDOHJgfF0bNKLMJF" crossorigin="anonymous">
    <style>
        body,html{
            height:100%;
        }
    </style>
</head>
<body>
    
    <br><br>
    <center>
        <img src="<?=base_url('support/images/logo.png')?>" class="img-fluid" alt="" width="150px;" width="auto">
	    <h4>Document Tracer</h4><br>
    </center>
        
    

    <div class="container">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <div class="heading_info">
                    <h6>Referral Code : <?=$doc_info[0]->referral_code?></h6>
                    <h6>Document: <?=$doc_info[0]->document?></h6>
                    <?php
                        $new_datetime = DateTime::createFromFormat ( "Y-m-d H:i:s", $doc_info[0]->date );
                    ?>
                    <h6>Date Created: <?=$new_datetime->format('m/d/y, g:i:s a')?></h6>
                    <hr>
                    <h6> Legend: </h6>
                    <h6><span class="dot dot-green">  </span>  <span class="dot-text">Done</span></h6>
                        <h6><span class="dot dot-red">  </span> <span class="dot-text">Not Yet </span> </h6>
                        <h6><span class="dot dot-yellow">  </span> <span class="dot-text"> On Process </span></h6>
                        <h6 class="text-center"><a href="<?=base_url();?>">Exit <i class="fa fa-sign-out"></i></a></h6>
                        <hr>
                </div> 

                <section id="status-timeline" class="status-container">
                </section> 

                <br>
                <br>
            </div>
            <div class="col-md-4"></div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script>
        $(document).ready(function(){
            var base_url = window.location.origin;
            var dc = new Date("<?php echo $doc_info[0]->date?>");
            $('#date_created').text("Date Created: "+dc.toLocaleString());


            function show()
            {
                $.get(base_url+'/document/load_trace/<?=$doc_info[0]->referral_code?>', function(res){
                    var html = '';
                    var last_office = 0;
                    var document_type = 0;
                    var d1,d2,t1,t2;

                    var offices = new Array();

                    for(var i =0; i < res.length; i++)
                    {
                        console.log(res[i]);
                        var ts = new Date(res[i].date);
                        var last_date;
                        if(i === 0)
                        {
                            last_date = "<?php echo $doc_info[0]->date; ?>";
                        }
                        else
                        {
                            last_date = res[i - 1].date;
                        }

                        d1 = new Date(res[i].date);
                        d2 = new Date(last_date);
                        t1 = d1.getTime();
                        t2 = d2.getTime();
                        offices.push(res[i].office_id);

                        html += `<div class="row">
                                    <!-- timeline item 1 left dot -->
                                    <div class="col-auto text-center flex-column d-sm-flex">
                                    <div class="row h-50">`;

                                    if(i ==0)
                                    {
                                        html += '<div class="col">&nbsp;</div>';
                                    }
                                    else
                                    {
                                        html += '<div class="col border-right">&nbsp;</div>';
                                    }
                        html += `
                                        <div class="col">&nbsp;</div>
                                    </div>
                                    <h5 class="m-2">`;

                                        if(i == res.length -1)
                                        {
                                            html +=  '<span class="badge badge-pill bg-warning border">&nbsp;</span>';
                                            last_office = res[i].office_id;
                                            document_type = res[i].document_type;
                                        }

                                        else
                                        {
                                            html +=  '<span class="badge badge-pill bg-success border">&nbsp;</span>';
                                        }
                         html += `</h5>
                                    <div class="row h-50">
                                        <div class="col border-right">&nbsp;</div>
                                        <div class="col">&nbsp;</div>
                                    </div>
                                    </div>
                                    <!-- timeline item 1 event content -->
                                    <div class="col py-2">
                                    <div class="card">
                                        <div class="card-body">
                                        <h4 class="card-title text-muted">${res[i].office}</h4>
                                        <div class="text-muted">Date Received: ${ts.toLocaleString()}</div>
                                        <div class="text-muted">No. of days stuck on previous office: ${ parseInt((t1 - t2)/(24*3600*1000)) } day/s</div>
                                        <div class="text-muted">Note: ${res[i].note} </div>
                                        <div class="text-muted">Recieved By: ${res[i].lastname}, ${res[i].firstname}</div>
                                        </div>
                                    </div>
                                    </div>
                                </div>`;

                    }

                    $.post(base_url+'/document/remaining_steps', {offices: offices, procedure_type: document_type }, function(steps){
                        console.log("Remaining Steps");
                        console.log(steps);

                        for(var i = 0; i < steps.length; i++)
                        {
                            html += `<div class="row">
                                    <!-- timeline item 1 left dot -->
                                    <div class="col-auto text-center flex-column d-sm-flex">
                                    <div class="row h-50">`;
                                        html += '<div class="col border-right">&nbsp;</div>';
                        html += `
                                        <div class="col">&nbsp;</div>
                                    </div>
                                    <h5 class="m-2">`;

                                            html +=  '<span class="badge badge-pill bg-danger border">&nbsp;</span>';
                         html += `</h5>
                                    <div class="row h-50">
                                        <div class="col border-right">&nbsp;</div>
                                        <div class="col">&nbsp;</div>
                                    </div>
                                    </div>
                                    <!-- timeline item 1 event content -->
                                    <div class="col py-2">
                                    <div class="card">
                                        <div class="card-body">
                                        <h4 class="card-title text-muted">${steps[i].office}</h4>
                                        <p class="text-muted">Step (${steps[i].steps})</p>
                                        </div>
                                    </div>
                                    </div>
                                </div>`;
                        }

                        $('#status-timeline').html(html);

                    },'json');
                },'json');
            }
            show();
            setInterval(function(){
                show();
            }, 30000);
        });
    </script>

    
        
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
