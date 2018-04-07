$(document).ready(function() {
  if ($('.sliderFeedb .contF').find('*').length == 0) {
    $('.commentlist').css('display', 'none');
  } else {

    var parentSlidC = $('.sliderFeedb');
    var count = $('.imgUser').length;
    var itemV = $('.imgUser').outerWidth(true);
    var fullW = count * itemV;
    var wSpace1 = parseInt($(parentSlidC).width());
    wSpace = -((count - Math.round(wSpace1 / itemV)) * parseInt(itemV));
    var basCont = $('.melSliderFeedb .contF')
    $(basCont).css("width", fullW);
    var firstImgUser = $('.sliderFeedb .imgUser:first-child');
    $(firstImgUser).addClass('active');

    var getComent = function(itemCur) {
      $('.fedbComentBlckInsd').each(function() {
        if ($(this).attr('idComent') === itemCur) {
          $('.fedbComentBlckInsd').addClass('hideCom');
          $(this).removeClass('hideCom');
        }
      })
    }

    getComent($(firstImgUser).attr('itemid'));

    var arUsIm = $('.melSliderFeedb .imgUser');
    var leftActive = 0;
    var getActivLeft = function() {
      leftActive = $('.melSliderFeedb .imgUser.active').offset();
      leftActive = leftActive.left - (parseInt($(window).width() - $('.melSliderFeedb').width())) / 2 + 95 ;
      // leftActive = leftActive.left - parseInt($(window).width() - $('.melSliderFeedb').outerWidth(true)) / 2 + 35;
      return leftActive;
    }

    var setArrw = function(durat) {
      var arrSlCom = $('.melSliderFeedb .arrSl');
      getActivLeft();

      $(arrSlCom).animate({
        left: leftActive,
      }, durat);
    }

    var disCl = function() {
      var resL = parseInt($(basCont).css('left'));
      getActivLeft();
      console.log(leftActive);
      if (leftActive < 0 || leftActive > wSpace1) {
        var indexActive = $('.melSliderFeedb .imgUser').index('.melSliderFeedb .imgUser.active');
        indexActive += 2;
        $('.melSliderFeedb .imgUser').removeClass('active');
        var nextItem = $('.melSliderFeedb .imgUser:nth-child(' + indexActive + ')');
        $(nextItem).addClass('active');
        getComent($(nextItem).attr('itemid'));
        setArrw(0);
      }

      var prev = $('.melSliderFeedb .prevSlidF');
      var next = $('.melSliderFeedb .nextSlideF');
      (resL === 0) ? $(prev).addClass('disabled'): $(prev).removeClass('disabled');
      (resL === wSpace) ? $(next).addClass('disabled'): $(next).removeClass('disabled');
    }
    disCl();

    $('.melSliderFeedb .slidenav').click(function(ev) {
      ev.preventDefault();
      if (!$(this).hasClass('disabled')) {
        var def;
        if ($(this).hasClass('nextSlideF')) {
          def = -itemV;
        } else {
          def = itemV;
        }

        $(basCont).animate({
          left: "+=" + def,
        }, 400, function() {
          setArrw(0);
          disCl();
        });
      }
    })

    setArrw(0);


    $(arUsIm).click(function(ev) {

      var remCl = ($(this).hasClass('active')) ? true : false;
      if ($(arUsIm).hasClass('active')) {
        $(arUsIm).removeClass('active');
      }
      if (!remCl) {
        $(this).addClass('active');
        setArrw(300);
        var itemId = $(this).attr('itemid');
        getComent(itemId);
      }
    });

  }

})
