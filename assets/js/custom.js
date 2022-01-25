

function scroll(speed) {
				  $('html, body').animate({ scrollTop: $(document).height()-window.screen.height  }, speed, );
				  $('html, body').animate({ scrollTop: 0 },  speed, );
				}
var timer;
var stoppedElement=document.getElementById("stopped");   // store element for faster access

function mouseStopped(){                                 // the actual function that is called
   //stoppedElement.innerHTML="Mouse stopped";
	
	speed2 =25000;
	scroll(speed2)
	setInterval(function(){scroll(speed2)}, speed2*3 );	  
}
window.addEventListener("mousemove",function(){
   // stoppedElement.innerHTML="Mouse moving";

	$('html, body').stop().animate();
    clearTimeout(timer);
    timer=setTimeout(mouseStopped,3000);
});


$(document).ready(function(){
$('.userinfo').click(function(){
   
   var userid = $(this).data('id');

   // AJAX request
   $.ajax({
    url: 'orderpopupdata.php',
    type: 'post',
    data: {userid: userid},
    success: function(response){ 
      // Add response in Modal body
      $('.modal-body').html(response);

      // Display Modal
      $('#empModal').modal('show'); 
    }
  });
 });
});

