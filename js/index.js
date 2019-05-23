$(document).ready(function () {
    $('.container').width($(window).width())
    $('.container').height($(window).height())

    setTimeout(function () {
        $('.container').css('transform','rotateY(-90deg)')
     
    }, 5000)
})

