( function( window, document ) {
  
  const html         = document.querySelector( 'html' )
  const videos       = html.querySelectorAll( '.format-video iframe, .format-video object, .format-video embed' )
  const scrollToTop  = html.querySelector( '#scroll-to-top' )

  // Replace no-js class with js on html element
  html.classList.remove( 'no-js' )
  html.classList.add( 'js' )

  // Force videos 16:9 aspect ratio
  function sizeVideos() {
    videos.forEach( function(video) {
      video.style.height = Math.floor( video.offsetWidth / 16 * 9 ) + 'px'
    } )
  }

  sizeVideos()

  window.addEventListener( 'resize', function() {
    sizeVideos()
  } )

  // Scroll to top
  window.addEventListener( 'scroll', function() {
    scrollToTop.style.bottom = window.scrollY > 500 ? '20px' : '-2000px'
  } )


  scrollToTop.addEventListener( 'click', function(event) {
    event.preventDefault()
    window.scrollTo( { top: 0, behavior: 'smooth' } )
  } )


} ) ( typeof window != 'undefined' ? window : this, document )