import React from 'react';
import ReactDOM from 'react-dom';
import './index.css';

class Menu extends React.Component {
	render() {
		return (
			<div class="header">
        		<p>
                	Tasks
            	</p>
        	</div>
		);
	}
}

class TaskBoard extends React.Component {
	render() {
		return(
			<div class="content">
				<table>
					<tbody>
						{/* <?php foreach($list as $n):?> */}
							<tr>
								<td class="checkbox">
									<input type="checkbox" data-id="" name="select_done" />
								</td>
								<td data-id="" data-done="" contenteditable="true" class="editdata">
									Tarefas que vem do banco...
								</td>
							</tr>
						{/* <?php endforeach;?> */}
						<tr>
							<td class="checkbox">
								<input type="checkbox" data-id="-1" name="select_done" />
							</td>
							<td data-id="-1" contenteditable="true" class="editdata">
								Click here to create a new task...
							</td>
						</tr>
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
			  <Menu />
		  	  <TaskBoard />
		  </div>


		// <div className="tasks">
		//   <div className="tasks-board">
		// 	<Board />
		//   </div>
		//   <div className="tasks-info">
		// 	<div>{/* status */}</div>
		// 	<ol>{/* TODO */}</ol>
		//   </div>
		// </div>
	  );
	}
}

// ========================================

ReactDOM.render(
	<Tasks />,
	document.getElementById('root')
);