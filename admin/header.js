var oldOnload = window.onload;

if(typeof oldOnload == "function") {
	window.onload = function() {
		if(oldOnload) {
			oldOnload();
		}
		showMe();
		}
} else {
	window.onload = showMe;
	
}

function showMe() {
		var logo = document.forms['myForm'].loogle_logo_header;
		var logoLength = logo.length;
		
		for (i = 0; i <logoLength; i++) {
			if (logo[i].checked) {
				var logoPick = logo[i].value
			}
		}
	
		if (logoPick == "yes") {
			document.getElementById("headerLogo").style.display = "block";
			document.getElementById("headerLogodefault").style.display = "none";
		} 

		if (logoPick == "default") {
			document.getElementById("headerLogodefault").style.display = "block";
			document.getElementById("headerLogo").style.display = "none";
		} 
		
		if (logoPick == "no") {
			document.getElementById("headerLogodefault").style.display = "none";
			document.getElementById("headerLogo").style.display = "none";
		} 
}