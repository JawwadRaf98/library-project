$('.modalbtn').click(function() {
    $('#myModal').css('display',"block")
})
$('.modal_heading .close,#myModal').click(function() {
    $('#myModal').css('display',"none")
})
$('.qualifation__bottom .left li').click(function () {
    $(".qualifation__bottom .left li").removeClass("select-cat");
    $(this).addClass("select-cat");
    var selector = $(this).attr('data-filter');
    $(".qualifation__bottom .grid").isotope({
        filter: selector,
        animationOptions: {
            duration: 750,
            easing: 'linear',
            queue: false,
        }
    });
    return false;
});
