const particleConfig = {
  particles: {
    number: {
      value: 100,
      density: {
        enable: true,
        value_area: 800,
      },
    },
    color: {
      value: ['#a08611', '#ffffff'],
    },
    shape: {
      type: 'circle',
      stroke: {
        width: 0,
        color: '#000000',
      },
      polygon: {
        nb_sides: 5,
      },
    },
    opacity: {
      value: 0.5,
      random: true,
      anim: {
        enable: true,
        speed: 1,
        opacity_min: 0.1,
        sync: false,
      },
    },
    size: {
      value: 10,
      random: true,
      anim: {
        enable: false,
        speed: 40,
        size_min: 0.1,
        sync: false,
      },
    },
    line_linked: {
      enable: false,
    },
    move: {
      enable: true,
      speed: 6,
      direction: 'bottom',
      random: false,
      straight: false,
      out_mode: 'out',
      bounce: false,
      attract: {
        enable: false,
        rotateX: 600,
        rotateY: 1200,
      },
    },
  },
  interactivity: {
    detect_on: 'canvas',
    events: {
      onhover: {
        enable: false,
        mode: 'bubble',
      },
      onclick: {
        enable: false,
        mode: 'repulse',
      },
      resize: true,
    },
    modes: {
      grab: {
        distance: 400,
        line_linked: {
          opacity: 0.5,
        },
      },
      bubble: {
        distance: 400,
        size: 4,
        duration: 0.3,
        opacity: 1,
        speed: 3,
      },
      repulse: {
        distance: 200,
        duration: 0.4,
      },
      push: {
        particles_nb: 4,
      },
      remove: {
        particles_nb: 2,
      },
    },
  },
  retina_detect: true,
}

const particleConfigInteract = {
  particles: {
    number: {
      value: 100,
    },
    shape: {
      type: 'circle',
    },
    size: {
      value: 10,
      random: true,
    },
    color: {
      value: ['#ef0808', '#00a2d8', '#2c0149', '#0b6972'],
    },
    line_linked: {
      enable: false,
    },
    move: {
      enable: true,
      speed: 0.5,
      direction: 'right',
      straight: false,
      attract: {
        enable: true,
        rotateX: 600,
        rotateY: 1200,
      },
    },
  },
  interactivity: {
    detect_on: 'canvas',
    events: {
      onhover: {
        enable: false,
      },
    },
    modes: {
      push: {
        particles_nb: 12,
      },
      repulse: {
        distance: 400,
        duration: 0.4,
      },
    },
  },
}

const particleConfigZebra = {
  particles: {
    number: {
      value: 10,
    },
    shape: {
      type: 'circle',
    },
    size: {
      value: 10,
      random: true,
    },
    color: {
      value: { r: 182, g: 25, b: 36 },
    },
    opacity: {
      value: 0.5,
    },
    line_linked: {
      enable: false,
    },
    move: {
      enable: true,
      speed: 50,
      straight: true,
      direction: 'bottom-right',
      straight: true,
      attract: {
        enable: true,
        rotateX: 600,
        rotateY: 1200,
      },
    },
  },
  interactivity: {
    detect_on: 'canvas',
    events: {
      onhover: {
        enable: false,
      },
    },
    modes: {
      push: {
        particles_nb: 12,
      },
      repulse: {
        distance: 400,
        duration: 0.4,
      },
    },
  },
}

$(() => {
  particlesJS('particle-bg-interact', particleConfigInteract, function() {
    console.log('callback - particles.js config loaded')
  })

  particlesJS('particle-bg-all-stars-project', particleConfig, function() {
    console.log('callback - particles.js config loaded')
  })

  // particlesJS('particle-bg-dreaming-zebra', particleConfigZebra, function() {
  //   console.log('callback - particles.js config loaded')
  // })

  let WorldArtDay = {
    init: function() {
      this.bindEvents()
      this.initializeCharities()
      this.currentlyOpenCharity = null
      window.WorldArtDay = this
      // WorldArtDay.openCharity($('.charity.dreaming-zebra'))
    },

    bindEvents: function() {
      const _this = this
      let resizeTimer = null

      ml.elms.$win.on('resize', function(e) {
        clearTimeout(resizeTimer)

        resizeTimer = setTimeout(function() {
          _this.initializeCharities()
        }, 250)
      })

      $('.vote-now').on('click', function(e) {
        e.stopPropagation()

        const $this = $(this)
        const $viewport = $('.viewport')
        const charityName = $this.data('charity-name')

        _this.makeAjaxCall(charityName)

        $viewport.addClass('voted')
      })

      $('.charity').on('hover', function() {
        let $this = $(this)
        let isOpen = $this.hasClass('open') ? true : false

        if (isOpen) {
          _this.resetCharities()

          return
        } else {
          _this.openCharity($(this))
        }
      })
    },

    makeAjaxCall: function(charity) {
      $.ajax({
        url: charity_survey_ajax.ajax_url,
        type: 'post',
        data: {
          action: 'add_charity_row_to_db',
          first_name: first_name,
          last_name: last_name,
          email: email,
          charity: charity,
          mc_id: mc_id,
        },
        success: function(response) {
          console.log(response)
        },
      })
    },

    initializeCharities: function() {
      const $charities = $('.charity')

      $charities.each((index, charity) => {
        this.initializeCharityLogoPosition($(charity))
      })
    },

    initializeCharityLogoPosition: function($charity) {
      const $context = $charity
      const $logo = $('.charity-logo', $context)
      const logoWidth = $logo.width()
      const logoOffsetX = logoWidth / 2
      const viewableWidth = $('.viewable', $context).width()
      const viewableAreaHorizontalCenter = viewableWidth / 2
      const pixelOffset = viewableWidth * 0.1
      const logoOffset =
        viewableAreaHorizontalCenter - logoOffsetX - pixelOffset

      $logo.css({
        transform: `translate3d(${logoOffset}px, 0, 0)`,
      })
    },

    openCharity: function($charity) {
      const others = $charity.siblings()
      const $logo = $('.charity-logo', $charity)

      if (this.currentlyOpenCharity) {
        this.initializeCharityLogoPosition(this.currentlyOpenCharity)
      }

      $charity.removeClass('collapsed').addClass('open')
      others.addClass('collapsed').removeClass('open')

      this.currentlyOpenCharity = $charity

      $logo.css({
        transform: `translate3d(0, 0, 0)`,
      })
    },

    resetCharities: function() {
      this.initializeCharityLogoPosition(this.currentlyOpenCharity)
      $('.charity').removeClass('open collapsed')
    },
  }

  $('.viewport').imagesLoaded(function() {
    WorldArtDay.init()
  })
})
