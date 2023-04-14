<?php get_header(); ?>


<?php 
  if ( have_posts() ) : while ( have_posts() ) : the_post(); 

  $postId = get_the_ID();
  $cats = get_the_category();
  $cat = $cats[0];
  $catName = $cat->name;
  $catId = get_cat_ID($catName);
  $thumbnail_src = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' );
  $format = get_post_format();
  $videoUrl = get_post_meta( get_the_ID(), 'medialoft_post-video', true );
  $article_headline_class = $format == 'video' && $videoUrl ? 'video-article-headline' : 'text-article-headline';
?>
<section id="blog">
  <div class="articles group">
    <article id="<?php echo seoUrl(get_the_title()); ?>" class="blog-article show-article">
      <a class="header" href="#" class="header">
        <div class="inner">
          <div class="header-copy">
            <div class="<?php echo $article_headline_class; ?>">
              <h2 class="title"><?php echo get_the_title(); ?></h2>
              <?php if($format == 'video' && $videoUrl){ ?>
                <div class="video-start play-full-screen" data-video="<?php echo seoUrl(get_the_title()); ?>-video" data-video-src="<?php echo $videoUrl; ?>">
                  <div></div>
                  <div></div>
                </div>
              <?php } ?>
            </div>
            <div class="info">
              <span class="category"><?php echo $catName; ?></span>
            </div>
          </div>
        </div>
        <div class="full-bleed blog-header-bg" style="background-image:url(<?php echo $thumbnail_src[0]; ?>);"></div>
      </a>
      <div class="article-content">
        <?php the_content(); ?>     
        <div class="social">
          <!-- http://www.facebook.com/sharer/sharer.php?u=[URL]&title=[TITLE] -->
          <a class="facebook" data-url="<?php echo str_replace(home_url(), '', get_permalink()); ?>"
            data-title="<?php echo get_the_title(); ?>" href=""><i class="fa fa-facebook-official"></i></a>
          <!-- http://twitter.com/intent/tweet?status=[TITLE]+[URL] -->
          <a class="twitter" data-url="/blog/#!/<?php echo seoUrl(get_the_title()); ?>"
            data-title="<?php echo get_the_title(); ?>" href=""><i class="fa fa-twitter"></i></a>
        </div>
      </div>   
      <?php wp_reset_postdata(); ?>
      <div class="related-articles">
        <?php
							$args = array (
							    'post_type'          => 'post',
							    'posts_per_page'     => '2',
							    'order'              => 'DESC',
							    'cat'                => $catId,
							    'post__not_in' => array( $postId ),
							);

							$relatedCount = 0;
						?>

        <?php $the_query = new WP_Query($args); ?>

        <?php if ( $the_query->have_posts() ) : ?>
        <h4>similar reads</h4>

        <!-- the loop -->
        <?php while ( $the_query->have_posts() ) : $the_query->the_post(); $relatedCount++; ?>
            
        <?php $thumbnail_src = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' ); ?>

        <a href="<?php the_permalink(); ?>" class="related-article blog-article"
          data-count="<?php echo $relatedCount; ?>">
          <h2 class="title"><?php the_title(); ?></h2>
          <div class="info">
            <span class="category"><?php echo get_the_category_by_ID($catId); ?></span> / <span
              class="date"><?php echo get_formatted_date(get_the_date('m-d-y')); ?></span>
          </div>
          <div class="full-bleed blog-header-bg" style="background-image:url(<?php echo $thumbnail_src[0]; ?>);"></div>
        </a>
        <?php endwhile; ?>
        <!-- end of the loop -->

        <?php wp_reset_postdata(); ?>

        <?php endif; ?>
        <?php if($relatedCount < 2 && $relatedCount != 0) : ?>
        <a href="#" data-related-article="" class="related-article blank"></a>
        <?php endif; ?>
      </div>         
    </article>
    <?php endwhile; endif; ?>
    <?php wp_reset_query(); ?>
    <?php wp_reset_postdata(); ?>
  </div>
  <div id="blog-video-overlay" class="video-overlay">
    <?php
				$vid_post_args = array(
			        'post_type' => 'post',
			        'tax_query' => array(
			        	array(
				            'taxonomy' => 'post_format',
				            'field' => 'slug',
				            'terms' => array('post-format-video'),
			        	)
			    	)
			    );
			?>

    <?php $vid_post_query = new WP_Query($vid_post_args); ?>

    <?php if ( $vid_post_query->have_posts() ) : while ( $vid_post_query->have_posts() ) : $vid_post_query->the_post(); ?>
    <?php $overlayVideoUrl = get_post_meta( get_the_ID(), 'medialoft_post-video', true ); ?>
    <video id="<?php echo seoUrl(get_the_title()); ?>-video"
      class="video-js vjs-default-skin" controls data-setup='{}'>
      <source src="<?php echo $overlayVideoUrl; ?>">
    </video>
    <?php endwhile; ?>
    <?php wp_reset_postdata(); ?>
    <?php endif; ?>
    <a href="#" class="close-video"><i></i></a>
  </div>
  <a href="#" class="back">
    <img src="<?php echo MOBILE_IMG ?>/icons/nav-arrow-down-dark.png" alt="Media Loft" />
  </a>
</section>
<?php get_footer(); ?>