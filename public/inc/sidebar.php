<div class="sidebar" data-color="purple" data-background-color="white" data-image="../assets/img/sidebar-1.jpg">
  <!--
    Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

    Tip 2: you can also add an image using data-image tag
-->
  <div class="logo">
    <a href="<?php echo base_url() ?>inicio" class="simple-text logo-normal">
      <img src="<?php echo base_url(); ?>public/img/logo_black.png" height="80px" alt="Bola de Neve Araucária">
    </a>
  </div>
  <div class="sidebar-wrapper">
    <ul class="nav">
      <li class="nav-item <?php echo $page == 'inicio' ? 'active' : ''; ?>">
        <a class="nav-link" href="<?php echo base_url() ?>inicio">
          <i class="material-icons">home</i>
          <p>Inicio</p>
        </a>
      </li>
      <li class="nav-item <?php echo $page == 'lembretes' ? 'active' : ''; ?>">
        <a class="nav-link" href="<?php echo base_url() ?>lembretes">
          <i class="material-icons">notifications</i>
          <p>Meus lembretes</p>
        </a>
      </li>
      <li class="nav-item <?php echo $page == 'cultos' ? 'active' : ''; ?>">
        <a class="nav-link" href="<?php echo base_url() ?>cultos">
          <i class="material-icons">book</i>
          <p>Meus cultos</p>
        </a>
      </li>
      <li class="nav-item ">
        <a class="nav-link" href="./typography.html">
          <i class="material-icons">calendar_today</i>
          <p>Gerenciar mural</p>
        </a>
      </li>
      <li class="nav-item ">
        <a class="nav-link" href="./icons.html">
          <i class="material-icons">build</i>
          <p>Cadastros</p>
        </a>
      </li>
    </ul>
  </div>
</div>
