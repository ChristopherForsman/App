$(document).ready(function() {
	if (sessionStorage.getItem('splashScreen') !== 'true') {
	$('body').prepend('<header id="splashScreen"></header>');
	$("#splashScreen").show().delay(2500).fadeOut();
	sessionStorage.setItem('splashScreen', 'true');
	}
});