$(() => {
  const isMobile = !!$('html.mobile').length

  const minWidth = isMobile ? 350 : 450
  const maxWidth = isMobile ? 350 : 500

  const trigger = isMobile ? 'touchstart' : 'hover'
  const position = isMobile
    ? ['top', 'bottom', 'right', 'left']
    : ['right', 'left', 'top', 'bottom']

  $('.tooltip').tooltipster({
    trigger: 'custom',
    triggerOpen: {
      mouseenter: true,
      touchstart: true,
    },
    triggerClose: {
      click: true,
      scroll: true,
      tap: true,
      mouseleave: true,
    },
    interactive: true,
    side: position,
    minWidth: minWidth,
    maxWidth: maxWidth,
  })
})
