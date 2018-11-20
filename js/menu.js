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

function showLogin(){
	if(!loginOn){
		loginMenu.style.display = "block";
		loginOn = true;
	}
	else{
		loginMenu.style.display = "none";
		loginOn = false;
	}
}