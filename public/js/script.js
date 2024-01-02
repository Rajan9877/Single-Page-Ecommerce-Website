document.querySelector('.fa-cart-shopping').addEventListener('click', () => {
    if($('.cart-box').hasClass('open-cart')){
        $(".cart-box").removeClass("open-cart");
        $(".cart-box").addClass("close-cart");
    }else{
        $(".cart-box").removeClass("close-cart");
        $('.cart-box').addClass('open-cart');
    }
});
document.querySelector('.fa-heart').addEventListener('click', () => {
    if($('.wish-box').hasClass('open-wish')){
        $(".wish-box").removeClass("open-wish");
        $(".wish-box").addClass("close-wish");
    }else{
        $(".wish-box").removeClass("close-wish");
        $('.wish-box').addClass('open-wish');
    }
});

var container = document.querySelector('.product-card-container');
    var cards = document.querySelector('.product-cards');
    var cardWidth = document.querySelector('.product-card').offsetWidth;
    var totalCards = document.querySelectorAll('.product-card').length;
    var currentIndex = 0;
    function navigate(direction) {
      currentIndex += direction;
      currentIndex = Math.min(Math.max(currentIndex, 0), totalCards - 1);
      updateCards();
      console.log(currentIndex);
    }

    function updateCards() {
      var translateValue = -currentIndex * cardWidth + 'px';
      cards.style.transform = 'translateX(' + translateValue + ')';
      if (currentIndex == totalCards - 1) {
        document.getElementById("endBtn").disabled = true;
        document.getElementById("next").disabled = true;
      } else {
        document.getElementById("endBtn").disabled = false;
        document.getElementById("next").disabled = false;
      }
      if (currentIndex > 0) {
        document.getElementById("startBtn").disabled = false;
        document.getElementById("prev").disabled = false;
      } else {
        document.getElementById("startBtn").disabled = true;
        document.getElementById("prev").disabled = true;
      }
    }
    function start() {
      if (currentIndex > 0) {
        currentIndex = 0;
      }
      updateCards();
    }
    function end() {
      if (currentIndex != totalCards - 1) {
        currentIndex = totalCards - 1;
      }
      updateCards();
    }
    if (currentIndex != totalCards - 1) {
      document.getElementById("startBtn").disabled = true;
      document.getElementById("prev").disabled = true;
    }
    var i = 1;
    function increamentvalue() {
      if (i == 1) {
        second();
        i++;
      } else if (i == 2) {
        third();
        i++;
      } else if (i == 3) {
        first();
        i = 1;
      }
    }
    function decreamentvalue() {
      if (i == 1) {
        third();
        i = 3;
      } else if (i == 2) {
        first();
        i--;
      } else if (i == 3) {
        second();
        i--;
      }
    }
    function first() {
      $('#img2').hide();
      $('#img3').hide();
      $('#img1').fadeIn();
      $("#two").removeClass("active");
      $("#three").removeClass("active");
      $("#one").addClass("active");
    }
    function firstone() {
      $('#img2').hide();
      $('#img3').hide();
      $('#img1').fadeIn();
      $("#two").removeClass("active");
      $("#three").removeClass("active");
      $("#one").addClass("active");
      i = 1;
    }
    function second() {
      $('#img1').hide();
      $('#img3').hide();
      $('#img2').fadeIn();
      $("#one").removeClass("active");
      $("#three").removeClass("active");
      $("#two").addClass("active");
    }
    function secondtwo() {
      $('#img1').hide();
      $('#img3').hide();
      $('#img2').fadeIn();
      $("#one").removeClass("active");
      $("#three").removeClass("active");
      $("#two").addClass("active");
      i = 2;
    }
    function third() {
      $('#img2').hide();
      $('#img1').hide();
      $('#img3').fadeIn();
      $("#two").removeClass("active");
      $("#one").removeClass("active");
      $("#three").addClass("active");
    }
    function thirdthree() {
      $('#img2').hide();
      $('#img1').hide();
      $('#img3').fadeIn();
      $("#two").removeClass("active");
      $("#one").removeClass("active");
      $("#three").addClass("active");
      i = 3;
    }

