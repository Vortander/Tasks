document.querySelectorAll( ".editdata" ).forEach( element => {

	element.addEventListener( "click", event => {
		if ( element.dataset.id === "-1" ) {
			element.innerText = "";
		}
	});

	element.addEventListener( "blur", event => {

		var formData = new FormData();
		formData.append( 'id', element.dataset.id );
		formData.append( 'task_content', element.innerText );
		formData.append( 'done', 'false' );
		formData.append( 'tag_id', 1 );

		fetch( 'http://localhost:8080/Task/insert_or_update_task/', {
		method: 'POST',
		body: formData,
		credentials: 'same-origin'
		})
		.then( ( response ) => response.text() )
		.then( ( data ) => {
			console.log( 'Success:', data );
			location.reload();
		})
		.catch( ( error ) => {
			console.log( error );
		});

	});

});

document.querySelectorAll( 'input[name="select_done"]' ).forEach( element => {

});
