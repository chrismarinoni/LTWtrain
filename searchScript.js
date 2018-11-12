var fixId, fixTop, navH, bodyId, fixH, topReached = 0;

function setParameters() {
  fixId = document.getElementById("search-to-fix");
  fixTop = fixId.offsetTop;
  navId = document.getElementById("nav");
  navH = navId.clientHeight + navId.getBoundingClientRect().top;
  bodyId = document.getElementById("body");
  fixH = fixId.offsetHeight;

}

function fixBox() {
  if(window.pageYOffset >= (fixTop-navH)) {
    fixId.classList.add("fixed-search");
    fixId.style.top = navH;
    bodyId.style.marginTop = fixH + "px";
    topReached=1;
  } else {
    fixId.classList.remove("fixed-search");
    if(topReached==1){
      fixId.style.top = 0;
      bodyId.style.marginTop = 0 + "px";
    }
  }
}

window.onload = function() {setParameters();} 

window.onscroll = function() {fixBox();}
