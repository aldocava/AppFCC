<nav class="navbar sticky-top navbar-expand-lg navbar-dark bg-dark navbar-brand-center">
    <a class="navbar-brand" href="<?php echo base_url(); ?>">
        <img alt="Brand" src="<?php echo base_url('public/img/AppFCC - Icono Blanco.png'); ?>">
    </a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse navbar-right" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link navbar-right" href="<?php echo base_url(); ?>">Inicio <span class="sr-only">(current)</span></a>
            </li>

        </ul>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown" id="menu">
                <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="navCuenta" aria-haspopup="true" aria-expanded="false">Cuenta</a>
                <div class="dropdown-menu dropdown-menu-right">
                    <div class="card-body">
                        <h6 class="card-title text-center">Opciones</h6>
                        <div class="text-center">
                            <a href="<?php echo base_url('ingreso/salir'); ?>" class="btn btn-primary">Salir</a>
                        </div>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</nav>
