<div class="container">
    <section class="row container mx-auto" style="margin-top: 20vh;margin-bottom: 20vh;">
        <div class="col-12 col-md-6 mx-auto px-5 my-5">
            <form class="password-strength form p-4" id="pass_form">
              <h3 class="form__title text-center mb-4">Selecciona una nueva contraseña</h3>
              <div class="form-group">
                <label for="password-input">Contraseña</label>
                <div class="input-group">
                  <input class="password-strength__input form-control" type="password" id="password_input" aria-describedby="passwordHelp" placeholder="Enter password"/>
                  <div class="input-group-append">
                    <button class="password-strength__visibility btn btn-outline-secondary" type="button"><span class="password-strength__visibility-icon" data-visible="hidden"><i class="fas fa-eye-slash"></i></span><span class="password-strength__visibility-icon js-hidden" data-visible="visible"><i class="fas fa-eye"></i></span></button>
                  </div>
                </div><small class="password-strength__error text-danger js-hidden">Ese símbolo no está permitido</small><small class="form-text text-muted mt-2" id="passwordHelp">Agrega al menos 9 caracteres, minúsculas, mayúsculas, números and símbolos para hacer tu contraseña más segura</small>
              </div>
              <div class="password-strength__bar-block progress mb-4">
                <div class="password-strength__bar progress-bar bg-danger" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
              <button class="password-strength__submit btn btn-success d-flex m-auto" type="button" onclick="submit_form()" disabled="disabled">Enviar</button>
            </form>
        </div>
    </section>
</div>

<script type="text/javascript" src="<?php echo __ROOT__; ?>/assets/js/password.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo __ROOT__; ?>/assets/css/password.css">


<script>

    function submit_form() {
        let pass = $("#password_input").val();
        $.ajax({
            url: "<?php echo __ROOT__; ?>/bridge/routes.php?action=changePassword",
            data: {
                password: pass
            },
            success: (data) => {
                data = JSON.parse(data);
                console.log(data);
                location.href = "<?php echo __ROOT__; ?>/admin/login";
            }
        })
    }

</script>