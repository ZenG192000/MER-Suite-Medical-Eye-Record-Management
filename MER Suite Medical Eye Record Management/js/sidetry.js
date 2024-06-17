$(document).ready(function () {
  var trigger = $('.hamburger'),
      overlay = $('.overlay'),
     isClosed = false;

    trigger.click(function () {
      hamburger_cross();      
    });

    function hamburger_cross() {

      if (isClosed == true) {          
        overlay.hide();
        trigger.removeClass('is-open');
        trigger.addClass('is-closed');
        isClosed = false;
      } else {   
        overlay.show();
        trigger.removeClass('is-closed');
        trigger.addClass('is-open');
        isClosed = true;
      }
  }
  
  $('[data-toggle="offcanvas"]').click(function () {
        $('#wrapper').toggleClass('toggled');
  });  
});


function getRandomColor() {
  const letters = '0123456789ABCDEF';
  let color = '#';
  for (let i = 0; i < 6; i++) {
      color += letters[Math.floor(Math.random() * 16)];
  }
  return color;
}

function applyRandomColors() {
  const outerCircles = document.querySelectorAll('.outer-circle');
  const innerCircles = document.querySelectorAll('.inner-circle');

  outerCircles.forEach((outerCircle) => {
      outerCircle.style.borderColor = getRandomColor();
  });

  innerCircles.forEach((innerCircle) => {
      innerCircle.style.backgroundColor = getRandomColor();
  });
}

applyRandomColors();
