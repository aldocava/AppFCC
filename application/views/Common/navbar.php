<nav class="navbar navbar-expand-sm bg-dark navbar-dark fixed-top">
    <a class="navbar-brand" href="<?php echo base_url(); ?>">
        <img src="bird.jpg" alt="Logo" style="width:40px;">
    </a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="collapsibleNavbar">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link active" href="<?php echo base_url(); ?>">Anuncios</a>
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
                    <button class="btn btn-primary" href="<?php echo base_url('ingreso/salir'); ?>">
                        Cerrar Sesión
                    </button>
                <?php }else { ?>
                    <button class="btn btn-primary" data-toggle="modal" data-target="#modal-sesion">
                        Iniciar Sesión
                    </button>
                <?php } ?>

                <!-- <a class="nav-link" href="#">Iniciar Sesión</a> -->
            </li>
        </ul>
    </div>
</nav>
<?php $this->load->view('ingreso/sesion'); ?>
