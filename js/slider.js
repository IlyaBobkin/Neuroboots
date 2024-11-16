// Hero Carousel



const slider1 = document.querySelector('#glide_1');
if (slider1) {

  var button = document.querySelector('#api-update-button')

  var glide = new Glide(slider1, {
    type: 'carousel',
    startAt: 0,
    autoplay: 7000,
    gap: 0,
    hoverpause: true,
    perView: 1,
    animationDuration: 800,
    animationTimingFunc: 'linear',
    swipeThreshold: false, dragThreshold: false
  }).mount()


  button.addEventListener('click', function () {
  glide.update({
    type: 'carousel',
    startAt: 1,
    autoplay: 3000,
    gap: 0,
    hoverpause: true,
    perView: 1,
    animationDuration: 800,
    animationTimingFunc: 'linear',
  })
  })
  glide.mount()

}

