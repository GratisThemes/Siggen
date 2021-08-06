( function( window, document ) {
  
  const html        = document.querySelector( 'html' )
  const scrollToTop = html.querySelector( '#scroll-to-top' )

  // Replace no-js class with js on html element
  html.classList.remove( 'no-js' )
  html.classList.add( 'js' )

  // Scroll to top
  window.addEventListener( 'scroll', function() {
    scrollToTop.style.bottom = window.scrollY > 500 ? '1rem' : '-2000px'
  } )

  scrollToTop.addEventListener( 'click', function(event) {
    event.preventDefault()
    window.scrollTo( { top: 0, behavior: 'smooth' } )
  } )


} ) ( typeof window != 'undefined' ? window : this, document )