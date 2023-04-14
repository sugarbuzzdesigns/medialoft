<?php 
	global $detect; 
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js <?php if(wp_is_mobile()){ echo 'mobile'; } ?>">

<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width">
  <link rel="profile" href="http://gmpg.org/xfn/11">
  <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
  <link rel="icon" type="image/png" href="<?php bloginfo('template_directory'); ?>/favicon.png">
  <script type="text/javascript" async src="//platform.twitter.com/widgets.js"></script>
  <meta name="google-site-verification" content="D6JSG8b6vOt3sc2um25kIZTDpkMaXlcM3E27d_r_nh0" />
  <?php wp_head(); ?>
  <!-- Global site tag (gtag.js) - Google Analytics -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-145789708-1"></script>
  <script>
  window.dataLayer = window.dataLayer || [];

  function gtag() {
    dataLayer.push(arguments);
  }
  gtag('js', new Date());

  gtag('config', 'UA-145789708-1');
  </script>
</head>

<body <?php body_class(); ?>>
  <?php include('partials/loader.php'); ?>
  <?php if(is_front_page()) { ?>
  <!-- <style>
  body.home {
    padding-top: 40px;
  }

  .banner {
    text-transform: uppercase;
    font-family: 'KlavikaWebBasicMedium';
    display: flex;
    align-items: center;
    justify-content: center;
    height: 80px;
    background: #414042;
    color: #fff;
    position: fixed;
    width: 100%;
    top: 0;
    left: 0;
    z-index: 1;
    letter-spacing: 2px;
    line-height: 1;
  }

  .banner a {
    background: #EABC48;
    border-radius: 3px;
    color: #575859;
    font-size: 10px;
    padding: 5px 7px 4px 7px;
    letter-spacing: 1px;
    font-family: 'KlavikaWebBasicMedium';
    margin-left: 10px;
  }

  .banner a:hover {
    background: #c69634;
  }

  .banner a:active {
    background: #d3ccbd;
  }

  .banner a span {
    margin-right: 5px;
    position: relative;
    top: -1px;
  }

  #main-logo {
    top: 112px;
  }

  @media screen and (min-width: 900px) {
    #main-logo {
      top: 72px;
    }
  }

  .desktop-banner {
    display: none;
  }

  .banner-text {
    padding-top: 2px;
  }

  .banner-text strong {
    font-family: 'KlavikaWebBasicMedium';
  }

  @media screen and (min-width: 900px) {
    .mobile-banner {
      display: none;
    }

    .desktop-banner {
      font-family: 'KlavikaWebBasicLight';
      display: flex;
      height: 40px;
    }
  }
  </style>

  <div class="banner mobile-banner">Go Virtual <a target="_blank" href="/go-virtual"><span>></span>Learn more</a></div>
  <div class="banner desktop-banner"><span class="banner-text"><strong>Go Virtual:</strong> we help next-level brands
      create next-gen
      events</span><a target="_blank" href="/go-virtual"><span>></span>Learn
      more</a></div> -->
  <?php } ?>
  <div class="wrap">
    <?php if(is_front_page()) { ?>
    <a id="main-logo" class="logo" href="<?php echo get_site_url(); ?>/">
      <img src="<?php bloginfo('template_directory'); ?>/assets/images/mobile/logos/ML_Logo_@2x.png" alt="Media Loft" />
    </a>
    <?php } else { ?>
    <a id="main-logo" class="logo interior" href="<?php echo get_site_url(); ?>/">
      <img src="<?php bloginfo('template_directory'); ?>/assets/images/mobile/logos/Logo_Red_@2x.png"
        alt="Media Loft" />
    </a>
    <?php } ?>