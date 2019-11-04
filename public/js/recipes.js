
 
 var arrowmove= document.getElementById('js-arrow');
        var angle= 0;
    var times=setInterval( () => { 
      if(angle < 90 ){
        angle+=15;
      }else{
        angle-=30;
      }
        arrowmove.style.transform = "rotate("+angle+"deg)";
    }, 1000 )
  ;