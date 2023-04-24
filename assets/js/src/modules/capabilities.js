;(function ($, globals) {
  ml.capabilities = {
    init: function () {
      this.$videoOverlay = $("#capabilities-video-overlay")
      this.$overlayCloseBtn = $("#capabilities-video-overlay .close-video")
      this.$overlayVideo = null

      this.bindEvents()
    },

    bindEvents: function () {
      var _this = this

      $(".grid-item").click((e) => {
        $(e.currentTarget).siblings().removeClass("clicked")
        $(e.currentTarget).addClass("clicked")
      })

      $(".grid-item .play-reel").click((e) => {
        e.preventDefault()
        _this.openVideo($(e.currentTarget))
      })

      $(_this.$overlayCloseBtn).click((e) => {
        e.preventDefault()
        _this.closeVideo()
      })

      $(document).keydown(function bindKeyDown(e) {
        if (!!_this.overlayVideo) {
          if (e.keyCode == 27) {
            console.log("esc key pressed")

            _this.closeVideo()
            return false
          }
        }
      })
    },

    openVideo: function ($videoTrigger) {
      var _this = this,
        videoUrl = $videoTrigger.data("video-url"),
        $video = $(
          '<video id="capabilities-video-full" class="video-js vjs-default-skin" data-setup=\'{}\'></video>'
        ),
        $capabilitiesVideoSrc = $("<source></source>")

      _this.overlayVideo = $video

      $capabilitiesVideoSrc.attr("src", videoUrl)

      $capabilitiesVideoSrc.appendTo($video)

      $video.prependTo("#capabilities-video-overlay")

      $("body").addClass("play-full-video")

      videojs(
        "capabilities-video-full",
        {
          autoplay: true,
          controls: true,
        },
        function () {
          _this.capabilitiesVideo = this

          this.play()

          this.on("ended", function () {
            console.log("close the video")
          })
        }
      )
    },

    closeVideo: function () {
      console.log("close video")
      this.$videoOverlay.removeClass("show-me")
      $("body").removeClass("play-full-video")
      this.capabilitiesVideo.pause()
      this.capabilitiesVideo.dispose()
      this.overlayVideo = ""
    },
  }

  $(function () {
    ml.capabilities.init()
  })
})(jQuery, window)
