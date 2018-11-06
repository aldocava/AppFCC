<nav class="navbar navbar-expand-sm bg-dark navbar-dark ">
    <a class="navbar-brand" href="<?php echo base_url(); ?>">
        <img src="<?php echo base_url('public/img/Logo_AppFCC_best.png'); ?>" alt="AppFCC" style="width:80px;">
    </a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="collapsibleNavbar">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link active" href="<?php echo base_url(); ?>">Anuncios</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url(); ?>">Destacado</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url(); ?>">Reciente</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url(); ?>">Búsqueda</a>
            </li>
        </ul>

        <ul class="navbar-nav ml-auto">
            <!-- Barra de búsqueda -->
            <!-- <form class="form-inline" action="/action_page.php">
                <input class="form-control mr-sm-2" type="text" placeholder="Ingresa un tema">
                <button class="btn btn-success" type="submit">Buscar</button>
            </form> -->
            <li class="nav-item">
                <?php if ($this->session->userdata('fcc')) { ?>
                    <button class="btn btn-default" href="<?php echo base_url('ingreso/salir'); ?>">
                        Cerrar Sesión
                    </button>
                <?php }else { ?>
                    <button class="btn btn-default" data-toggle="modal" data-target="#modal-sesion">
                        Iniciar Sesión
                    </button>
                <?php } ?>

                <!-- <a class="nav-link" href="#">Iniciar Sesión</a> -->
            </li>
        </ul>
    </div>
</nav>
<?php $this->load->view('ingreso/sesion'); ?>
