import React from 'react';

class Database extends React.Component {

	constructor( props ) {
		super( props );
		var DBOpenRequest = indexedDB.open( "TasksDatabase", 4 );
	}

	render() {

		return (
			<p> database {this.props.DBOpenRequest} </p>
		);
	}
}

// ========================================

export default Database;