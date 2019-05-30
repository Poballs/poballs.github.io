$(document).ready(function () {
    $('.container').width($(window).width())
    $('.container').height($(window).height())
    console.log($(window).height())
    $('.resume-name-wrap').click(function(){
        $('.container').css('transform','rotateX(90deg)')
        $('.user-heard-wrap').hide(2000)
        $('.resume-name-wrap').hide(2000)
        
    })
    $('.back').click(function(){
        $('.container').css('transform','rotateX(0deg)')
        $('.user-heard-wrap').show(2000)
        $('.resume-name-wrap').show(2000)
    })
   
})

