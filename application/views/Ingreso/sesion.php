<!-- The Modal -->
<div class="modal fade" id="modal-sesion">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Escribe tu usuario y contraseña</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <?php form_open('ingreso/verificar'); ?>
            <div class="modal-body">
                <?php if(validation_errors() != null): ?>
                    <div class="alert alert-danger">
                        <?php echo validation_errors(); ?>
                    </div>
                <?php endif; ?>
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
                        echo form_error('username', '<div class="error">', '</div>');
                        ?>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-4">
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
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Entrar</button>
            </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>
