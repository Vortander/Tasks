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

	location.reload();
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

			let new_tr = document.createElement( "tr" );
			let new_td = document.createElement( "td" );
			let new_checkbox = document.createElement( "input" );

			new_td.className = "checkbox";
			new_checkbox.type = "checkbox";
			new_checkbox.dataset.id = item.id;
			new_checkbox.name = "select_done";
			new_checkbox.checked = item.done;

			new_td.appendChild( new_checkbox );
			new_tr.appendChild( new_td );

			new_td = document.createElement( "td" );
			new_td.className = "editdata";
			new_td.contentEditable = true;
			new_td.dataset.done = item.done;
			new_td.dataset.id = item.id;
			new_td.innerHTML = item.task;

			new_tr.appendChild( new_td );

			new_checkbox.addEventListener( "click", set_done );
			new_td.addEventListener( "blur", update );

			document.querySelector( ".taskboard" ).appendChild( new_tr );

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