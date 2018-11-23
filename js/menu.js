var subMenu, loginMenu;
var menuOn;
var loginOn;

window.onload = function(){
	subMenu = document.getElementById("submenu");
	loginMenu = document.getElementById("login");
	menuOn = false;
	loginOn = false;
}

function showMenu(){
	if(!menuOn){
		subMenu.style.display = "block";
		menuOn = true;
	}
	else{
		subMenu.style.display = "none";
		menuOn = false;
	}
}
$(document).ready(function(){



 function load_data(query)
 {
  $.ajax({
   url:"search.php",
   method:"POST",
   data:{query:query},
   success:function(data)
   {
    $('#login').html(data);
   }
  });
 }
 $('#search').keyup(function(){
  var search = $(this).val();
  if(search != '')
  {
   load_data(search);
  	loginMenu.style.display = "block";
  }
  else
  {
   loginMenu.style.display = "none";
  }
 });
});

// function showLogin(){
// 	if(!loginOn){
// 		loginMenu.style.display = "block";
// 		loginOn = true;
// 	}
// 	else{
// 		loginMenu.style.display = "none";
// 		loginOn = false;
// 	}
// }