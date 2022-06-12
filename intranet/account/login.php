<link rel="stylesheet" href="<?php echo __ROOT__; ?>/assets/css/admin.css">
<div class="container pt-5 mt-5">
    <center>
        <h3 style="font-size: 20px;letter-spacing: .28px;color: #101935;">ATEND</h3>
        <h5 style="color: #06c;letter-spacing: .17px;font-weight: 600;font-size: 12px;opacity: .5;">2.0</h5>
    </center>
    <div class="row justify-content-center">
        <div class="col-xl-6 col-lg-12 col-md-6">
            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <div class="row">
                        <div class="col-12">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">¡Hola!<br>Bienvenido</h1>
                                </div>
                                <form class="user">
                                    <div class="form-group">
                                        <input type="text" class="form-control form-input"
                                            id="email" aria-describedby="emailHelp"
                                            placeholder="Usuario o email">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control form-input"
                                            id="password" placeholder="Contraseña">
                                    </div>

                                    <div class="row d-none">
                                        <div class="col-4">
                                            <div class="input-label form-check">
                                                <input type="checkbox" class="form-check-input" style="margin-top:8px">
                                                <label style="font-size:10px;font-weight: 600;">Recuérdame</label>
                                            </div>
                                        </div>
                                        <div class="col-8">
                                            <a href="<?php echo __ROOT__; ?>/admin/recover" class="btn" style="font-size:10px;">¿Olvidaste tu contraseña?</a>
                                        </div>
                                    </div>

                                    <a onclick="login();" class="btn btn-primary btn-user btn-block">
                                        Entrar
                                    </a>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    function login() {
        $.ajax({
            url:"<?php echo __ROOT__; ?>/bridge/routes.php?action=login",
            data:{
                email:$("#email").val(),
                password:$("#password").val()
            },
            success:function(res) {
                res = JSON.parse(res);
                console.log(res)
                if (res.login==true){
                    if (res.status=="4"){
                        location.href="<?php echo __ROOT__; ?>/admin/restore"
                    }else{
                        if (res.type=="1"){
                            location.href = "<?php echo __ROOT__; ?>";
                        }else{
                            alert({title:"Error",text:"Acceso incorrecto"});
                        }
                    }
                }else{
                    alert({title:"Error",text:res.message});
                }
            }
        });
        return false;
    }

    $(document).keydown(function(event) {
        if (event.which == 13){
            login();
            return false;
        }
    });
</script>