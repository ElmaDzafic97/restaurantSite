


function showphotos(){
    document.getElementById('p7').style.display='none';
    document.getElementById('p8').style.display='none';
    document.getElementById('p9').style.display='none';

 
    var pic1="../pictures/bg.jpg";  
     document.getElementById('p1').scr=pic1.replace('90x90', '225x225');
    document.getElementById('p1').style.display='block'; 
    setTimeout(function(){  
        document.getElementById("p2").scr=pic1.replace('90x90', '225x225');
       document.getElementById('p2').style.display='block';
         $('#p2').fadeIn("");    
     }, 250);
     setTimeout(function(){  
        document.getElementById("p3").scr=pic1.replace('90x90', '225x225');
       document.getElementById('p3').style.display='block';
         $('#p3').fadeIn("slow");    
     }, 500);
     setTimeout(function(){  
        document.getElementById("p4").scr=pic1.replace('90x90', '225x225');
       document.getElementById('p4').style.display='block';
         $('#p4').show();    
     }, 750);
     setTimeout(function(){  
        document.getElementById("p5").scr=pic1.replace('90x90', '225x225');
       document.getElementById('p5').style.display='block';
         $('#p5').show();    
     }, 1000);
     setTimeout(function(){  
        document.getElementById("p6").scr=pic1.replace('90x90', '225x225');
       document.getElementById('p6').style.display='block';
         $('#p6').show();    
     }, 1250);

}
function showphotos1(){
      document.getElementById('p6').style.display='none';
    document.getElementById('p5').style.display='none';
    document.getElementById('p4').style.display='none';
    document.getElementById('p3').style.display='none';
    document.getElementById('p2').style.display='none';
    document.getElementById('p1').style.display='none';

    var pic1="../pictures/members/1.jpg";  
     document.getElementById('p7').scr=pic1.replace('90x90', '225x225');
    document.getElementById('p7').style.display='block'; 
    setTimeout(function(){  
        document.getElementById("p8").scr=pic1.replace('90x90', '225x225');
       document.getElementById('p8').style.display='block';
         $('#p8').show();    
     }, 250);
     setTimeout(function(){  
        document.getElementById("p9").scr=pic1.replace('90x90', '225x225');
       document.getElementById('p9').style.display='block';
         $('#p9').show();    
     }, 500);
 
   
}
