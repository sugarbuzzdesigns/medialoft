<?php 

$image_path = get_bloginfo('template_directory') . '/assets/images/world-art-day/';

if(wp_is_mobile()) {
  $image_path = get_bloginfo('template_directory') . '/assets/images/world-art-day/mobile/';
}

$charities = array(
  array(
    'name' => 'Dreaming Zebra',
    'logo' => 'dreaming-zebra-logo.png',
    'background' => 'shimmer-web.jpg',
    'foreground' => 'violin-web.png',
    'copy' => 'Providing art & music<br>supplies to children<br>internationally',
    'url' => 'http://dreamingzebra.org'
  ),
  array(
    'name' => 'All Stars Project',
    'logo' => 'all-stars-project-logo.png',
    'background' => 'stage-web.jpg',
    'foreground' => 'dancer-web.png',
    'copy' => 'Transforming underprivileged<br>youth through the power<br>of performance',
    'url' => '//allstars.org'
  ),
  array(
    'name' => 'Interact',
    'logo' => 'interact-logo.png',
    'background' => 'water-color-web.jpg',
    'foreground' => '',
    'copy' => 'Inspiring artists and audiences<br>to explore the full spectrum<br>of human potential',
    'url' => '//interactcenter.org'
  ),   
)
?>

<?php get_header('slim'); ?>
  <?php include('partials/loader.php'); ?>
  <div class="viewport">
    <a href="/" target="_blank"><img class="main-logo" src="<?php bloginfo('template_directory'); ?>/assets/images/logos/logo-red-web.png" alt="medialoft"></a>
    <div class="filmstrip">
      <div class="container landing">
        <div class="info">
          <div class="inner">
            <img class="headline-text" src="<?php bloginfo('template_directory'); ?>/assets/images/world-art-day/headline-text-web.jpg" alt="You Vote. We Donate.">
            <p class="info-copy">By selecting a charity, you’re not just helping Media Loft donate to a good cause, you’re letting the world know that you believe in the power of creative expression. With every vote, those who need it most will have a chance to discover their artistic passions.</p>
            <h3 class="mobile-only">Choose your charity below.</h3>
            <h3 class="desktop-only">Choose your charity.</h3>
            <p class="disclaimer">
              A total donation of $10,000 will be divided among these three deserving charities: The Dreaming Zebra Foundation, Interact, and All Stars Project respectfully based on the percentage of votes earned by closes of voting on April 25, 2019. Votes will be recorded and counted by Media Loft and donations made by May 10, 2019. Limit one (1) vote per person.
            </p>
          </div>
        </div>
        <div class="charities">
          <?php foreach ($charities as $charity): ?>
          <?php 
            $foregroundImage = $charity['foreground'];
            $backgroundImage = $charity['background'];
            $charityName = $charity['name'];
            $charityLogo = $charity['logo'];
            $charityCopy = $charity['copy'];
            $charityUrl = $charity['url'];
            $charitySlug = str_replace(' ', '-', strtolower($charityName)); 
          ?>

            <div class="charity <?php echo $charitySlug; ?>">
              <p class="mobile-label mobile-only">
                <?php echo $charityName; ?>
              </p>
              <div class="viewable">
                <div class="bg" style="background-image: url(<?php echo $image_path . $backgroundImage; ?>);"></div>
                <div class="particle-bg" id="particle-bg-<?php echo $charitySlug; ?>">

                  <?php if ($charitySlug == 'dreaming-zebra') : ?>
                    <!-- <div class="lightstreak"></div> -->
                    <canvas id="dreaming-zebra-canvas"></canvas>
                  <?php endif; ?>

                  <?php if ($charitySlug == 'interact') : ?>
                    <!-- <div class="lightstreak"></div> -->
                    <canvas id="interact-canvas"></canvas>
                  <?php endif; ?>                  
                </div>
                <?php if($foregroundImage): ?>
                  <img class="foreground-image" src="<?php echo $image_path . $foregroundImage; ?>" alt="<?php echo $charityName; ?>">
                <?php endif; ?>

                <div class="content">
                  <div class="logo-wrapper">
                    <a href="<?php echo $charityUrl ?>" target="_blank">
                      <img id="<?php echo $charitySlug; ?>-logo" class="charity-logo" src="<?php echo $image_path . $charityLogo; ?>" alt="<?php echo $charityName; ?>">
                    </a>
                  </div>   
                  <div class="content-copy-vote">
                    <p class="charity-copy"><?php echo $charityCopy; ?></p>
                    <button data-charity-name="<?php echo $charityName ?>" class="vote-now">Vote Now</button>
                  </div>  
                </div>  
                <div class="vote-here-text desktop-only">
                  <span>[</span>
                  <span>vote here</span>
                  <span>]</span>
                </div>
              </div>
            </div>
          
          <?php endforeach; ?>
        </div>
        <p class="disclaimer mobile-only">
          A total donation of $10,000 will be divided between these three deserving charities: The Dreaming Zebra Foundation, Interact, and All Stars Project respectfully based on the percentage of votes earned by closes of voting on April 25, 2019. Votes will be recorded and counted by Media Loft and donations made by May 10, 2019. Limit one (1) vote per person.
        </p>
      </div>
      <div class="container thankyou">
        <div class="flex-col">
          <div class="flex-col-inner thank-you-text">
            <h1>
              <img class="thank-you-graphic" src="<?php bloginfo('template_directory'); ?>/assets/images/world-art-day/thank-you.png" alt="Thank You">
            </h1>
            <div class="copy">
              <p class="mobile-only">
                Your vote means the world<br>
                to us and these charities.<br>
                Thank you for participating.
              </p>
              <p class="desktop-only">
                Your vote means the world to us and these<br>
                charities. Thank you for participating.
              </p>
              <strong>
              Sincerely, your friends at Media Loft
              </strong>
            </div>
          </div>
        </div>  
        <div class="flex-col">
          <img class="art-graphic" src="<?php bloginfo('template_directory'); ?>/assets/images/world-art-day/art-text-graphic.jpg" alt="Thank You">
        </div>   
      </div>  
    </div>  
  </div>

  <script>
    let first_name = "<?php echo $_GET['first_name']; ?>";
    let last_name = "<?php echo $_GET['last_name']; ?>";
    let mc_id = "<?php echo $_GET['uid']; ?>";
    let email = "<?php echo $_GET['email']; ?>";
  </script> 
<?php get_footer('slim'); ?>