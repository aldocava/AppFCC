<nav class="navbar sticky-top navbar-expand-lg navbar-dark bg-dark navbar-brand-center">
    <a class="navbar-brand" href="<?php echo base_url(); ?>">
        <img alt="Brand" src="<?php echo base_url('public/img/AppFCC - Icono Blanco.png'); ?>">
    </a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link navbar-right" href="<?php echo base_url(); ?>">Inicio <span class="sr-only">(current)</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link navbar-right" href="Anunciar.html">Anunciar</a>
            </li>
        </ul>

        <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown" id="menuLogin">
                <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="navLogin" aria-haspopup="true"aria-expanded="false">Iniciar Sesión</a>
                <div class="dropdown-menu dropdown-menu-right">
                    <div class="card-body">
                        <?php if(validation_errors() != null): ?>
                            <div class="alert alert-danger">
                                <?php echo validation_errors(); ?>
                            </div>
                        <?php endif; ?>
                        <?php echo form_open('ingreso'); ?>
                            <div class="form-group">
                                <?php echo form_label('Usuario', 'username', 'class="control-label"'); ?>
                                <?php $user = array(
                                                'name'          => 'username',
                                                'id'            => 'username',
                                                'minlenght'     => '6',
                                                'maxlength'     => '10',
                                                'class'         => 'form-control',
                                                'required'      => true,
                                                'autofocus'     => true
                                            );
                                ?>

                                <?php echo form_input($user); ?>
                            </div>

                            <div class="form-group">
                                <?php echo form_label('Contraseña', 'pswd', 'class="control-label"'); ?>
                                <?php $pass = array(
                                                'name'          => 'pswd',
                                                'id'            => 'pswd',
                                                'minlenght'     => '6',
                                                'maxlength'     => '20',
                                                'class'         => 'form-control',
                                                'required'      => true,
                                            );
                                ?>

                                <?php echo form_password($pass); ?>
                            </div>

                            <!-- <div class="g-recaptcha" data-sitekey="6LcJ-ngUAAAAAOWc28Rx3o1sFVlNsR7LGvjFOYk7"></div> -->
                            <input type="hidden" id="g-recaptcha-response" name="g-recaptcha-response"><br>

                            <div class="custom-control custom-checkbox mb-3">
                                <?php $data = array(
                                                'name'          => 'savepswd',
                                                'id'            => 'savepswd',
                                                'class'         =>  'custom-control-input',
                                                'checked'       => TRUE,
                                                'style'         => 'margin:10px'
                                            );
                                ?>
                                <?php echo form_checkbox($data); ?>
                                <?php echo form_label('Recordar contraseña', 'savepswd', 'class="custom-control-label"'); ?>
                            </div>
                            <div class="text-center">
                                <button class="btn btn-primary" type="submit">Entrar <i class="fas fa-sign-in-alt"></i></button>
                            </div>
                        <?php form_close(); ?>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</nav>

<script type="text/javascript">
grecaptcha.ready(function() {
    grecaptcha.execute('6LcJ-ngUAAAAAOWc28Rx3o1sFVlNsR7LGvjFOYk7', {action: 'login'})
    .then(function(token) {
        document.getElementById('g-recaptcha-response').value=token;
    });
});
</script>
