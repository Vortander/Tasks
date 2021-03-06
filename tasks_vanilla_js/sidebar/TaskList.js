function set_done( event ) {

	let element = event.target;

	if ( element.dataset.id !== "-1" ) {
		var checked = document.querySelector(`input[name="select_done"][data-id="${element.dataset.id}"]`).checked;

		var db = request.result;
		var transaction = db.transaction( "tasks", "readwrite" );
		var key = IDBKeyRange.only( parseInt( element.dataset.id ) );

		var task = transaction.objectStore( "tasks" ).openCursor( key );
		task.onsuccess = ( event ) => {
			var cursor = event.target.result;
			if ( cursor ) {
				const update_data = cursor.value;
				update_data.done = checked;
				const update_request = cursor.update( update_data );
				update_request.onsuccess = ( event ) => {
					db.close();
					location.reload();
				};
			}
		};
	}
}

function update( event ) {

	let element = event.target;

	if ( element.dataset.id !== "-1" && element.innerText.trim() ) {

		var checked = document.querySelector(`input[name="select_done"][data-id="${element.dataset.id}"]`).checked;

		var db = request.result;
		var transaction = db.transaction( "tasks", "readwrite" );
		var key = IDBKeyRange.only( parseInt( element.dataset.id ) );

		var task = transaction.objectStore( "tasks" ).openCursor( key );
		task.onsuccess = ( event ) => {
			var cursor = event.target.result;
			if ( cursor ) {

				const update_data = cursor.value;
				update_data.done = checked;
				update_data.task = element.innerText;

				const update_request = cursor.update( update_data );
				update_request.onsuccess = ( event ) => {
					db.close();
					location.reload();
				};

			}
		};
	}

};

document.querySelector( ".hide" ).addEventListener( "click", event => {
	document.querySelectorAll(`[data-done="true"]`).forEach ( element => {
		element.parentNode.classList.toggle( "disabled" );
	});
});

document.querySelectorAll( ".taskboard" ).forEach ( element => {
	element.addEventListener( "onload", event => {
		console.log("carregou a tabela...");
	});
});

document.querySelectorAll( ".editdata" ).forEach( element => {

	element.addEventListener( "click", event => {
		if ( element.dataset.id === "-1" ) {
			element.innerText = "";
		}
	});

	element.addEventListener( "blur", event => {

		var checked = document.querySelector(`input[name="select_done"][data-id="${element.dataset.id}"]`).checked;

		var db = request.result;
		var transaction = db.transaction( "tasks", "readwrite" );

		if ( element.dataset.id === "-1" && element.innerText.trim() ){
			var object_store = transaction.objectStore( "tasks" );
			var callback = object_store.put( { task: element.innerText, done: checked } );
			callback.onsuccess = ( event ) => {
				db.close();
				location.reload();
			};
		}

	});

});
