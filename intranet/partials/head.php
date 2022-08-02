<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?></title>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <link rel="stylesheet" href="<?php echo __ROOT__; ?>/intranet/assets/css/clientes.css">
    <link rel="stylesheet" href="<?php echo __ROOT__; ?>/intranet/assets/css/buttons.css">
    <link rel="stylesheet" href="<?php echo __ROOT__; ?>/intranet/assets/css/header.css">
    <link rel="stylesheet" href="<?php echo __ROOT__; ?>/intranet/assets/css/modals.css">
    <link rel="stylesheet" href="<?php echo __ROOT__; ?>/intranet/assets/css/nursers.css">
    <link rel="stylesheet" href="<?php echo __ROOT__; ?>/intranet/assets/css/select_tags.css">
    <link rel="stylesheet" href="<?php echo __ROOT__; ?>/intranet/assets/css/style.css">
    <link rel="stylesheet" href="<?php echo __ROOT__; ?>/intranet/assets/css/tables.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body class="<?php echo isset($isEnfermera)?"body__enfermera":""; ?>">

<script type="text/javascript">
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
</script>