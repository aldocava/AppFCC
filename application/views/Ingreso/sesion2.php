<div class="content">
    <div class="header">
        <h4 >Escribe tu usuario y contraseña</h4>
    </div>

    <div class="section">
        <?php if(validation_errors() != null): ?>
            <div class="alert alert-danger">
                <?php echo "hola"; ?>
                <?php echo validation_errors(); ?>
            </div>
        <?php endif; ?>
        <?php form_open(); ?>
        <div class="form-group">
            <div class="col-md-4">
                <?php echo form_label('Usuario', 'username', 'class="control-label"'); ?>
            </div>
            <div class="col-md-8">
                <?php
                $user = array(
                    'name'          => 'username',
                    'id'            => 'username',
                    'maxlength'     => '10',
                    'class'         => 'form-control',
                    'required'      => true
                );

                echo form_input($user);
                //echo form_error('username', '<div class="error">', '</div>');
                ?>
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-4">
                <span class="glyphicon glyphicon-lock"></span>
                <?php echo form_label('Contraseña', 'pswd', 'class="control-label"'); ?>
            </div>
            <div class="col-md-8">
                <?php
                $pswd = array(
                    'name'          => 'pswd',
                    'id'            => 'pswd',
                    'maxlength'     => '20',
                    'class'         => 'form-control',
                    'required'      => true
                );

                echo form_password($pswd);
                echo form_error('pswd', '<div class="error">', '</div>');
                ?>
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-4">
                <div class="g-recaptcha" data-sitekey="6Lcx7TAUAAAAAM1H0WPSPbNzYdh4hDABZA9b-dTH">
                </div>
            </div>
        </div>

        <div class="row">
          <div class="col-xs-12">
            <button type="submit" class="btn btn-primary">Ingresar</button>
          </div>
          <!-- /.col -->
        </div>
    </div>
    <?php echo form_close(); ?>
</div>
