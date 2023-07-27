<style>
  .main-menu .menu-interior .logo {
    height: 115px;
    width: 115px;
    position: absolute;
    top: 0;
    left: 0;
    background-color: #fff;
  }

  .main-menu .menu-interior .logo img {
    width: 64px;
    height: 32px;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
  }
</style>

<nav class="main-menu">
  <a href="#" class="menu-btn main-menu-btn" data-menu-name="main-menu">
    <?php if (is_front_page() || is_single()) { ?>
      <span class="open-menu">menu</span>
    <?php } else { ?>
      <?php if (is_home()) { ?>
        <span class="open-menu"><?php echo 'blog'; ?></span>
      <?php } else { ?>
        <span class="open-menu"><?php echo strtolower(get_the_title()); ?></span>
        <div style="display:none;"><?php echo strtolower(get_the_title()); ?></div>
      <?php } ?>
    <?php } ?>
    <span class="close-menu"><i></i></span>
  </a>
  <div class="menu-interior">
    <a class="logo" href="/">
      <img src="<?php bloginfo('template_directory'); ?>/assets/images/logos/ML_symbol_RGB_2Red.svg" alt="Media Loft" />
    </a>
    <ul>
      <?php if (!is_front_page()) : ?>
        <li class="<?php if (is_front_page()) {
                      echo 'active';
                    } ?>">
          <a href="<?php echo get_site_url(); ?>/">Home</a>
        </li>
      <?php endif; ?>
      <li class="<?php if (is_page('work')) {
                    echo 'active';
                  } ?>">
        <a href="<?php echo get_site_url(); ?>/work">Work</a>
      </li>
      <li class="<?php if (is_page('capabilities')) {
                    echo 'active';
                  } ?>">
        <a href="<?php echo get_site_url(); ?>/capabilities">Capabilities</a>
      </li>
      <!-- <li class="<?php if (is_home()) {
                        echo 'active';
                      } ?>"><a href="<?php echo get_site_url(); ?>/blog">Blog</a></li> -->
      <li class="<?php if (is_page('about')) {
                    echo 'active';
                  } ?>">
        <a href="<?php echo get_site_url(); ?>/about">About</a>
      </li>
      <li class="<?php if (is_page('contact')) {
                    echo 'active';
                  } ?>">
        <a href="<?php echo get_site_url(); ?>/contact">Contact</a>
      </li>
      <?php if (is_user_logged_in()) : ?>
        <li><a href="<?php echo get_site_url(); ?>/wp-login.php?action=logout" data-filter-cat="interactive">Log Out</a></li>
      <?php endif; ?>
    </ul>
  </div>
</nav>
<div id="menu-overlay"></div>