<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta http-equiv='cache-control' content='no-cache'>
    <meta http-equiv='expires' content='0'>
    <meta http-equiv='pragma' content='no-cache'>

    <title><?php echo $title; ?></title>
    
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>


    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.5.6/css/buttons.dataTables.min.css">

    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>


    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

    <?php if (isset($css)) {
        foreach ($css as $c) { ?>
            <link rel="stylesheet" href="<?php echo __ROOT__?>/intranet/assets/css/<?php echo $c ?>.css">
    <?php   
        }
     } ?>

     <?php if (isset($js)) {
         foreach ($js as $j) { ?>
            <script type="text/javascript" src="<?php echo __ROOT__?>/intranet/assets/js/<?php echo $j ?>.js"></script>
     <?php   
         }
      } ?>
    

    <link href="<?php echo __ROOT__;?>/intranet/assets/css/admin.css" rel="stylesheet">
    <link href="<?php echo __ROOT__;?>/intranet/assets/css/progress.css" rel="stylesheet">
    <link href="<?php echo __ROOT__;?>/intranet/assets/css/circle-loading.css" rel="stylesheet">
    <link href="<?php echo __ROOT__;?>/intranet/assets/css/scroll.css" rel="stylesheet">
    <link href="<?php echo __ROOT__;?>/intranet/assets/css/style.css" rel="stylesheet">

    <script type="text/javascript">
        window.alert = function(params) {
            if (!params.text){
                let a = params;
                params = {text:a};
            }
            if (params.title){
                if (params.title.toLowerCase()=="error"){
                    params.icon = "error";  
                }
            }
            Swal.fire({
                 title: params.title||"Alerta",
                 text: params.text||"Alerta",
                 confirmButtonText: params.button||"Okay", // Text on button
                 icon: params.icon||"success", //built in icons: success, warning, error, info
                 timer: params.time||3000, //timeOut for auto-close
            });
        }
    </script>

</head>