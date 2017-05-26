$(document).ready(function () {
    $("body").bgStretcher({
        images: ['./images/1.jpg', './images/2.jpg', './images/3.jpg', './images/4.jpg', './images/5.jpg','./images/6.jpg'],
        imageWidth: 1024,
        imageHeight: 768,
        slideDirection: 'N',
        slideShowSpeed: 3500,
        transitionEffect: 'fade',
        sequenceMode: 'normal',
        buttonPrev: '#prev',
        buttonNext: '#next',
        pagination: '#nav',
        anchoring: 'left center',
        anchoringImg: 'left center'
    });
});

