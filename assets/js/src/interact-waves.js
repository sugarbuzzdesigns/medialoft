/*
 * Demo of https://github.com/isuttell/sine-waves
 */

$(() => {
  /*
   * Demo of https://github.com/isuttell/sine-waves
   */
  const dreamingZebraCanvas = document.getElementById('interact-canvas')
  var waves = new SineWaves({
    el: dreamingZebraCanvas,

    speed: 4,

    width: function() {
      return $('#particle-bg-interact').width() * 1.5
    },

    height: function() {
      return $('#particle-bg-interact').height()
    },

    ease: 'SineIn',

    wavesWidth: '200%',
    // rotate: 20,

    waves: [
      {
        timeModifier: 0.25,
        lineWidth: 100,
        amplitude: 600,
        wavelength: 300,
      },
      {
        timeModifier: 0.25,
        lineWidth: 100,
        amplitude: -600,
        wavelength: 300,
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
