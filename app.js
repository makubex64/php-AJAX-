$(document).ready(function (){
	let edit = false ;
	// console.log('jquery lalala');

	// ocultar el elemento con este metodo
	$('#task-result').hide();
	// invoked function in the line 55
	fetchTask();
	// invoked function in the line 55

	$('#search').keyup(function(e) {
		if ($('#search').val()) {
		let search = $('#search').val();
		// console.log(search);
		$.ajax({
			url: 'task_search.php',
			type: 'POST',
			data: { search },
			success: function(response){
				let tasksParse = JSON.parse(response);
				// console.table(tasksParse);

				let template = '';

				tasksParse.forEach( tasksParse => {

					template += `<li>

						${tasksParse.name}
						</li>`;
				});

				$('#container').html(template);
				// mostrar el elemento con este metodo
				$('#task-result').show();

				}
			});
		}
	});
		/* Act on the event */
		// FUNCTION AT BUTTON- FORM WITH ID = #TASK-FORM

	$('#task-form').submit(function(event) {
		const postData = {
			name: $('#name').val(),
			description: $('#description').val(),
			id: $('#taskId').val()
		};

		//function for variable => let edit in line 2 false; and line 125 if is true.
		let url = edit === false ? 'task-add.php' : '../../db/task-edit.php';
		console.log(url);


// var url para el metodo post
		$.post(url, postData, function (response){
			console.log(response);
			// invoked function in the line 55
			fetchTask();
			// invoked function in the line 55			
			// reiniciar el formulario cuando almacenes los datos
			$('#task-form').trigger('reset');
		});

		// console.log('Submiting');
		event.preventDefault();
	});

function fetchTask(){
		$.ajax({
		url: 'task-list.php',
		type: 'get',
		success: function(response){
			// console.log(response);
			let task = JSON.parse(response);
			let template = '';
			task.forEach(task => {
				// statements
				template += `
				<tr taskId="${task.id}">

					<td>${task.id} </td>
					<td>
						<a href="#" class="task-item">${task.name}</a> 
					</td>
					<td>${task.description}</td>
					<td>
					<button class="task-delete text-danger">Delete</button>
					</td>
				</tr>
				`;
			});

			$('#tasks').html(template);
		}
	});
}

$(document).on('click', 'task-delete', function (){
	 // console.log($(this));
	if (confirm('Are you sure to Delete?!')) {
		 let element = $(this)[0].parentElement.parentElement;
		 let id = $(element).attr('taskId');
		 // console.log(id);
		 $.post('task-delete.php', {id}, function(response){
		 	// console.log(response);
		 	// invoked function in the line 55
			fetchTask();
			// invoked function in the line 55
		});
	}else {
		return false;
	}

});

$(document).on('click', 'task-item', function(event) {
	event.preventDefault();
	/* Act on the event */
	let element = $(this)[0].parentElement.parentElement;
	let id = $(element).attr('taskid');
	console.log(id);
	$.post('task-single.php', {id}, function(response){
		console.log(response);
		const task = JSON.parse(response);
		$('#name').val(task.name);
		$('#description').val(task.description);
		$('#taskId').val(task.id);
		edit = true;


	});

});

	
});

