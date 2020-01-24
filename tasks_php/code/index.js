document.querySelectorAll( ".editdata" ).forEach( element => {
	element.addEventListener( "blur", event => {
		console.log( element.innerText, element.id, element.dataset.id );
	});
});
