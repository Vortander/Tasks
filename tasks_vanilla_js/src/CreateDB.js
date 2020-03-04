var request = indexedDB.open( "TasksDatabase", 4 );
var status_box = document.querySelectorAll( ".status p" );

if ( !window.indexedDB ) {
	status_box.forEach( element => {
		element.innerHTML = "Your browser doesn't support a stable version of IndexedDB."
	});
}

request.onerror = function( event ) {
	status_box.forEach( element => {
		element.innerHTML = "An error occoured while opening an IndexedDB database."
	});
}

request.onsuccess = function( event ) {
	status_box.forEach( element => {
		element.innerHTML = "IndexedDB TasksDatabase created." ;
	});

	var db = request.result;
	var tx = db.transaction( "tasks", "readonly" );
	var object_store = tx.objectStore( "tasks" );
	var query = object_store.getAll();

	query.onsuccess = event => {
		query.result.reverse().forEach( item => {
			document.querySelector( ".taskboard" ).insertAdjacentHTML(
				'afterbegin',
				`<tr>
					<td class="checkbox">
						<input type="checkbox" data-id="${item.id}" name="select_done" />
					</td>
					<td data-id="${item.id}" data-done="${item.done}" contenteditable="true" class="editdata">
						${item.task}
			        </td>
				</tr>`
			);
		});
	};
}

request.onupgradeneeded = function( event ) {
	var db = request.result;
	var object_store = db.createObjectStore( "tasks", { keyPath: "id", autoIncrement:true } );
	var task_index = object_store.createIndex( "by_id", "id", { unique: true } );

	object_store.put( { task: "Patient 0", done: false, id: 1 } );

	db.close();

	status_box.forEach( element  => {
		element.innerHTML = element.innerHTML + " First object store created.";
	});
}