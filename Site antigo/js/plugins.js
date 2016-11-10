// Avoid `console` errors in browsers that lack a console.
(function() {
    var method;
    var noop = function () {};
    var methods = [
        'assert', 'clear', 'count', 'debug', 'dir', 'dirxml', 'error',
        'exception', 'group', 'groupCollapsed', 'groupEnd', 'info', 'log',
        'markTimeline', 'profile', 'profileEnd', 'table', 'time', 'timeEnd',
        'timeStamp', 'trace', 'warn'
    ];
    var length = methods.length;
    var console = (window.console = window.console || {});

    while (length--) {
        method = methods[length];

        // Only stub undefined methods.
        if (!console[method]) {
            console[method] = noop;
        }
    }
}());

// Place any jQuery/helper plugins in here.

$(document).ready(function() {
  
    $('.dropdown').mouseenter(
        function(){
            $(this).children('ul').slideDown(300);
        }
    ).mouseleave(
      function(){
          $(this).children('ul').slideUp(300);
      }
    );

    var contentGal = "<div class='content-share-custom'>"+$(".shareGal").html()+"</div>";
    contentGal = $.parseHTML(contentGal);
    $(".fancybox").attr('rel', 'gallery').fancybox({
          width : 800,
          height: 600,
          autoSize : false,
          padding : [124, 0, 90, 0],
          nextEffect: 'none',
          prevEffect: 'none',
          afterLoad   : function() {
            this.inner.prepend("<div class='content-share-custom'>"+$(".shareGal").html()+"</div>");
            $(".description-custom").html($(this).get(0).element[0].dataset.caption);
          }
    });
    //Paginação
    $(".pnoticias .pagination > li.disabled > span:contains('«')").html("<");
    $(".pnoticias .pagination > li > a:contains('«')").html("<");
    $(".pnoticias .pagination > li.disabled > span:contains('»')").html(">");
    $(".pnoticias .pagination > li > a:contains('»')").html(">");

    $(".carousel").jCarouselLite({
        btnNext: ".next",
        btnPrev: ".prev",
        visible: 4,
        auto: 5000,
        speed: 700
    });


    $("#link-parceiro").attr('href', $(".circle-parceiros ul li").eq(0).attr("data-link"));
    $(".circle-parceiros").jCarouselLite({
      btnNext: ".next-parceiros",
      btnPrev: ".prev-parceiros",
      visible: 1,
      speed: 1000,
      auto: 5000,
      afterEnd: function(a) {
        $("#link-parceiro").attr('href', a.attr("data-link"));
      }
    });

    $(".circle-parceiros ul li img").css('margin-left','auto');

    $('.newsletter-form').submit(function(){
      event.preventDefault();
      var _this = $(this);
      $.post('newsletter', _this.serialize(), function(){
        alert('E-mail gravado com sucesso!');
        _this[0].reset();
      })
      return false;
    });

    var countNew = 0;
    $('.cn').eq(countNew).show();
    countNew = 1;
    setInterval(function(){
      $('.cn').fadeOut(200, function(){
        //$('.cn').eq(countNew).fadeIn(300);
      });
      $('.cn').eq(countNew).delay(200).fadeIn(400);
      if(countNew<2){
        countNew++;  
      }else{
        countNew=0;
      }
    }, 4000);

    // $('.selectoptacs').change(function() {
    //     var val = $(".selectoptacs option:selected").val();
    //     console.log(val);
    //     window.location.href = val;
    // });

}); // end ready


$(".selectoptacs").heapbox({
  'onChange' : function(val){
    window.location.href = val;
  }
});


jQuery(function($){
   $("#date").mask("99/99",{placeholder:"DD/MM"});
   $("#birth").mask("99/99/9999",{placeholder:"dd/mm/aaaa"});
   $("#cnpj").mask("99.999.999/999-9");
   $("#cpf").mask("999.999.999-99");
   $("#phone").mask("(99) 9999-9999");
   $("#celular").mask("(99) 99999-9999");
   $("#cep").mask("99999-999");
   $("#tempo").mask("99");

});


  $(function() {
   $("#valor").maskMoney({prefix:'R$ ', allowNegative: true, thousands:'.', decimal:',', affixesStay: false});
  })



function changeLocation(menuObj)
{
var i = menuObj.selectedIndex;

if(i > 0)
{
window.location = menuObj.options[i].value;
}
}



$('#swapdivs').click(function() {
$('#primeiro').toggle();
$('#segundo').toggle();
});





