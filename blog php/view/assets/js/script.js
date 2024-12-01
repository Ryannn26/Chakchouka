$(document).ready(function() {
    $('.menu-toggle').on('click',function(){
     $('.nav').toggleClass('showing');
     $('.nav ul').toggleClass('showing');
    })
    $('.post-wrapper').slick({
        slidesToShow: 3,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 2000,
        nextArrow:$('.next'),
        prevArrow:$('.prev'),
      });
      responsive: [
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 3,
        infinite: true,
        dots: true
      }
    },
    {
      breakpoint: 600,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 2
      }
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }
    // You can unslick at a given breakpoint now by adding:
    // settings: "unslick"
    // instead of a settings object
  ]
})
let myform=document.getElementById('myform');
let myEmail=document.getElementById('email');
let myMessage=document.getElementById('message');
let myRegex1=/^[a-zA-Z-\s]+$/
let myRegex2=/^[a-zA-Z-@]+$/;

myform.addEventListener('submit',function(e){
  if((myEmail.value.trim() && myMessage.value.trim())==""){
    e.preventDefault();
    letmyError=document.getElementById('error')
    myError.innerHTML="Les Deux Champs sont Requis";
    myError.style.color='red'
  }
  else if(myRegex1.test(myMessage)==false || myRegex2.test(myEmail)==false){
    e.preventDefault();
    letmyError=document.getElementById('error')
    myError.innerHTML="veuillez vérifier votre Email ou Message ";
    myError.style.color='red'
  }
})