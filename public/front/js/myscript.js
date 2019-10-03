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
