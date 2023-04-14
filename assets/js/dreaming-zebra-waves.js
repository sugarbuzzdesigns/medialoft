/*
 * Demo of https://github.com/isuttell/sine-waves
 */

$(() => {
  /*
   * Demo of https://github.com/isuttell/sine-waves
   */
  const dreamingZebraCanvas = document.getElementById('dreaming-zebra-canvas')
  var waves = new SineWaves({
    el: dreamingZebraCanvas,

    speed: 4,

    width: function() {
      return $('#particle-bg-dreaming-zebra').width() * 1.5
    },

    height: function() {
      return $('#particle-bg-dreaming-zebra').height()
    },

    ease: 'SineIn',

    wavesWidth: '200%',
    // rotate: 20,

    waves: [
      {
        timeModifier: 0.25,
        lineWidth: 1.5,
        amplitude: 600,
        wavelength: 300,
      },
      {
        timeModifier: 0.25,
        lineWidth: 1.5,
        amplitude: -600,
        wavelength: 300,
      },
      {
        timeModifier: 0.25,
        lineWidth: 1.5,
        amplitude: 300,
        wavelength: 100,
      },
      {
        timeModifier: 0.25,
        lineWidth: 1.5,
        amplitude: -300,
        wavelength: 100,
      },
      {
        timeModifier: 0.5,
        lineWidth: 1,
        amplitude: 100,
        wavelength: 200,
      },
      {
        timeModifier: 0.5,
        lineWidth: 1,
        amplitude: -100,
        wavelength: 200,
      },
      {
        timeModifier: 1,
        lineWidth: 1,
        amplitude: 200,
        wavelength: 200,
      },
      {
        timeModifier: 1,
        lineWidth: 1,
        amplitude: -200,
        wavelength: 200,
      },
    ],

    // Called on window resize
    resizeEvent: function() {
      // var gradient = this.ctx.createLinearGradient(0, 0, this.width, 0)
      // gradient.addColorStop(0, 'rgba(23, 210, 168, 0.2)')
      // gradient.addColorStop(0.5, 'rgba(255, 255, 255, 0.5)')
      // gradient.addColorStop(1, 'rgba(23, 210, 168, 0.2)')
      // var index = -1
      // var length = this.waves.length
      // while (++index < length) {
      //   this.waves[index].strokeStyle = gradient
      // }
      // // Clean Up
      // index = void 0
      // length = void 0
      // gradient = void 0
    },
  })
})
