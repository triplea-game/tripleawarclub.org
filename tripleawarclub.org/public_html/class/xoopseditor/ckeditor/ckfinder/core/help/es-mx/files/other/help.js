window.onload = function()
{
	var copyP = document.createElement( 'p' ) ;
	copyP.className = 'copyright' ;
	copyP.innerHTML = '&copy; 2007-2009 Frederico Caldeira Knabben (<a href="http://www.fredck.com" target="_blank">FredCK.com</a>). Todos los derechos reservados.<br /><br />' ;
	document.body.appendChild( document.createElement( 'hr' ) ) ;
	document.body.appendChild( copyP ) ;

	window.top.SetActiveTopic( window.location.pathname ) ;
}