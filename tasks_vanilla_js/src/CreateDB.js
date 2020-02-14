var status_box = document.querySelectorAll( ".status p" );

if ( !window.indexedDB ) {
	status_box.forEach( element => {
		element.innerHTML = "Your browser doesn't support a stable version of IndexedDB."
	});
}

var request = indexedDB.open( "TasksDatabase", 4 );

request.onerror = function( event ) {
	status_box.forEach( element => {
		element.innerHTML = "An error occoured while opening an IndexedDB database."
	});
}

request.onsuccess = function( event ) {
	status_box.forEach( element => {
		element.innerHTML = "IndexedDB TasksDatabase created." ;
	});

	db = request.result;
}

request.onupgradeneeded = function( event ) {
	var db = request.result;
	var object_store = db.createObjectStore( "tasks", { keyPath: "id" } );
	var task_index = object_store.createIndex( "by_id", "id", { unique: true } );

	object_store.put( { task: "Patient 0", done: false, id: 1 } );

	db.close()

	status_box.forEach( element  => {
		element.innerHTML = element.innerHTML + " First object store created.";
	});
}