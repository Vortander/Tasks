import React from 'react';
import Database from './Database';

class Menu extends React.Component {
	render() {
		return (
			<div className="header">
        		<p>
                	Tasks
            	</p>
        	</div>
		);
	}
}

class TaskRow extends React.Component {
	render() {
		return (
			<tr>
				<td className="checkbox">
					<input type="checkbox" data-id="" name="select_done" />
				</td>
				<td data-id="" data-done="" contentEditable="true" className="editdata">
					Tasks from dataset...
				</td>
			</tr>
		);
	}
}

class NewTaskRow extends React.Component {

	constructor( props ) {
		super( props );
		this.handleClick = this.handleClick.bind( this );
	}

	handleClick( event ) {
		console.log("Um teste de clique");
		event.target.innerText = "";
	}

	handleBlur( event ) {
		console.log("Os dados foram enviados para o banco.");
	}

	componentDidMount() {
		this.handleBlur();
	}

	render() {
		return (
			<tr>
				<td className="checkbox">
					<input type="checkbox" data-id="-1" name="select_done" />
				</td>
				<td data-id="-1" contentEditable="true" className="editdata" onClick={this.handleClick} onBlur={this.handleBlur}>
					Click here to create a new task...
				</td>
			</tr>
		);
	}
}

class TaskBoard extends React.Component {
	render() {
		return(
			<div className="content">
				<table>
					<tbody>
						{/* <?php foreach($list as $n):?> */}
							<TaskRow />
						{/* <?php endforeach;?> */}
						<NewTaskRow />
					</tbody>
				</table>
        	</div>
		);
	}
}

class Square extends React.Component {
	render() {
	  return (
		<button className="square">
		  {/* TODO */}
		</button>
	  );
	}
  }

class Board extends React.Component {
	renderSquare(i) {
	  return <Square />;
	}

	render() {
	  const status = 'Next player: X';

	  return (
		<div>
		  <div className="status">{status}</div>
		  <div className="board-row">
			{this.renderSquare(0)}
			{this.renderSquare(1)}
			{this.renderSquare(2)}
		  </div>
		  <div className="board-row">
			{this.renderSquare(3)}
			{this.renderSquare(4)}
			{this.renderSquare(5)}
		  </div>
		  <div className="board-row">
			{this.renderSquare(6)}
			{this.renderSquare(7)}
			{this.renderSquare(8)}
		  </div>
		</div>
	  );
	}
}

class Tasks extends React.Component {
	render() {
	  return (
		  <div>
			  <Database />
			  <Menu />
		  	  <TaskBoard />
		  </div>
	  );
	}
}

// ========================================

export default Tasks;