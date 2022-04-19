<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?php echo $title; ?></title>
        <!--<link rel="icon" type="image/x-icon" href="<?php //echo __ROOT__;?>/assets/images/favicon.png" />-->


        <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>


        <script src="<?php echo __ROOT__; ?>/assets/js/waitingDialog.js"></script>

        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.2/css/all.css" integrity="sha384-vSIIfh2YWi9wW0r9iZe7RJPrKwp6bG+s9QZMoITbCckVJqGCCRhc+ccxNcdpHuYu" crossorigin="anonymous">
        <link rel="stylesheet" href="<?php echo __ROOT__; ?>/assets/css/style.css">

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

        <?php if (isset($css)) {
            foreach ($css as $c) { ?>
                <link rel="stylesheet" href="<?php echo __ROOT__?>/assets/css/<?php echo $c ?>.css">
        <?php   
            }
         } ?>

        <script>
            $(function() { 
                window.alert = function(params) {
                    if (!params.text){
                        let a = params;
                        params = {text:a};
                    }
                    if (params.title=="Error"){
                        params.icon = "error";  
                    }
                    Swal.fire({
                         title: params.title||"Alerta",
                         text: params.text||"Alerta",
                         confirmButtonText: params.button||"Okay", // Text on button
                         icon: params.icon||"success", //built in icons: success, warning, error, info
                         timer: params.time||3000, //timeOut for auto-close
                    });
                }

                const formatter = new Intl.NumberFormat('en-US', {
                  style: 'currency',
                  currency: 'USD',
                });

                window.toMoney = (string)=>{
                    let r = formatter.format(string);
                    return r.replace(".00","");
                }

            });
        </script>
    </head>

<body>