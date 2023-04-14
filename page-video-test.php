<?php get_header('slim'); ?>
<link href="//vjs.zencdn.net/7.3.0/video-js.min.css" rel="stylesheet">
<script src="//vjs.zencdn.net/7.3.0/video.min.js"></script>
  <style>
    body {
      background: rgb(220,64,53);
      background: linear-gradient(31deg, rgba(220,64,53,1) 0%, rgba(220,64,53,1) 35%, rgba(165,50,44,1) 100%);
    }

    .flex {
      display: flex;
      align-items: center;
      justify-content: center;
      height: 100vh;
    }
  </style>
  <div class="flex">
    <video
        id="my-player"
        class="video-js"
        controls
        preload="auto"
        poster="//vjs.zencdn.net/v/oceans.png"
        data-setup='{}'>
      <source src="//vjs.zencdn.net/v/oceans.mp4" type="video/mp4"></source>
      <source src="//vjs.zencdn.net/v/oceans.webm" type="video/webm"></source>
      <source src="//vjs.zencdn.net/v/oceans.ogv" type="video/ogg"></source>
      <p class="vjs-no-js">
        To view this video please enable JavaScript, and consider upgrading to a
        web browser that
        <a href="https://videojs.com/html5-video-support/" target="_blank">
          supports HTML5 video
        </a>
      </p>
    </video>   
  </div>
<?php get_footer('slim'); ?>