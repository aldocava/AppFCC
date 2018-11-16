<nav class="navbar sticky-top navbar-expand-lg navbar-dark bg-dark navbar-brand-center">
    <a class="navbar-brand" href="<?php echo base_url(); ?>">
        <img alt="Brand" src="<?php echo base_url('public/img/AppFCC - Icono Blanco.png'); ?>">
    </a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse navbar-right" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link navbar-right" href="<?php echo base_url(); ?>">Inicio <span class="sr-only">(current)</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link navbar-right" href="Anunciar.html">Anunciar</a>
            </li>

            <li class="nav-item dropdown" id="menuLogin">
                <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="navLogin" aria-haspopup="true" aria-expanded="false">Cuenta</a>
                <div class="dropdown-menu">
                    <div class="card-body">
                        <h5 class="card-title text-center">Iniciar Sesión</h5>
                        <form class="form-signin">
                            <div class="form-label-group">
                                <input type="email" id="inputEmail" class="form-control" placeholder="Usuario" required autofocus>
                                <label for="inputEmail"> </label>
                            </div>

                            <div class="form-label-group">
                                <input type="password" id="inputPassword" class="form-control" placeholder="Contraseña" required>
                                <label for="inputPassword"> </label>
                            </div>

                            <div class="custom-control custom-checkbox mb-3">
                                <input type="checkbox" class="custom-control-input" id="customCheck1">
                                <label class="custom-control-label" for="customCheck1">Recordar contraseña</label>
                            </div>
                            <div class="text-center">
                                <button class="btn btn-circle btn-xl btn-primary" type="submit"><i class="fas fa-sign-in-alt"></i></button>
                            </div>
                        </form>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</nav>
