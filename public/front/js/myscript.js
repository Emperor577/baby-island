var vidmodbtn=document.getElementById('video-play');
var vidmod=document.getElementById('modal-video');
var vidmodclose=document.getElementById('close');


vidmodbtn.onclick=function mod() {
  vidmod.style.display='block';
}

vidmodclose.onclick=function() {
  stopVideo();
   vidmod.style.display='none';

}

window.onclick=function clos(event) {
  if (event.target==vidmod) {
      stopVideo();
    vidmod.style.display="none";

  }
}

function stopVideo() {
var youtube=document.getElementById('youtube');
  youtube.src = youtube.src;
}


// //Responsive price slick
//
//
//
//   if (window.innerWidth>=320 && window.innerWidth<=500) {
//     $(document).ready(function(){
// $('.my-slick-slider').slick({
//   infinite: true,
//     slidesToShow: 1,
//     slidesToScroll: 1,
//     dots:true
// });
// });
// }
//
// if (window.innerWidth>=501 && window.innerWidth<=600) {
//   $(document).ready(function(){
// $('.my-slick-slider').slick({
// infinite: true,
//   slidesToShow: 2,
//   slidesToScroll: 1,
//   dots:true
// });
// });
// }
//
// if (window.innerWidth>=900 ) {
//   $(document).ready(function(){
// $('.my-slick-slider').slick({
// infinite: true,
//   slidesToShow: 3,
//   slidesToScroll: 1,
//   dots:true
// });
// });
// }
