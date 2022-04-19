
<div class="container">
    <center>
        <h3 style="font-size: 20px;letter-spacing: .28px;color: #101935;">Roche</h3>
        <h5 style="color: #06c;letter-spacing: .17px;font-weight: 600;font-size: 12px;opacity: .5;">Logística</h5>
    </center>
    <div class="row justify-content-center">
        <div class="col-xl-10 col-lg-12 col-md-9">
            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <div class="row">
                        <div class="col-lg-8 d-none d-lg-block bg-login-image"></div>
                        <div class="col-lg-4">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">¿Olvidaste tu<br>contraseña?</h1>
                                </div>
                                <p style="font-size:11px;">Escribe tu mail con el que estás registrado(a) y en breve te enviaremos un correo electrónico con una liga para reestablecer tu contraseña.</p>
                                <form class="user">
                                    <div class="form-group">
                                        <input type="email" class="form-control form-input"
                                            id="email" aria-describedby="email"
                                            placeholder="email@ejemplo.com">
                                    </div>
                                    <a href="#" onclick="sendEmail();" class="btn btn-primary btn-user btn-block">
                                        Enviar correo
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
    function sendEmail() {
        $.ajax({
            url:"../bridge/routes.php?action=passwordForgotten",
            data:{
                email:$("#email").val()
            },
            success:function(res) {
                res = JSON.parse(res);
                console.log(res)
                if (res.success==true){
                    location.href="<?php echo __ROOT__; ?>/admin/login"
                }else{
                    alert({title:"Error",text:res.message});
                }
            }
        });
        return false;
    }

    $(document).keydown(function(event) {
        if (event.which == 13){
            sendEmail();
            return false;
        }
    });
</script>