import React from 'react';

class Database extends React.Component {

	constructor( props ) {
		super( props );
		var request = indexedDB.open( "TasksDatabase" );
	}

	render() {
		return (
			<p> database </p>
		);
	}
}

// ========================================

export default Database;