<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Ajax-simple</title>
	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">

</head>
<body>

<div class="navbar navbar.expand-lg navbar-info bg-info">

	<a href="#" class="navbar-brand text-white">Task app</a>

		<ul class="navbar-nav ml-auto">
			<form class="form-inline my-2 my-lg-0">
				<input type="search" id="search" class="form-control mr-sm-2" placeholder="search your task">
				<button class="btn btn-success my-2 my-sm-0" type="submit">send</button>
				
			</form>
		</ul>
	</div>

	<div class="container p-5">
		<div class="row">
			<div class="col-md-5">
				<div class="card">
					<div class="card-body">
						
						<form action="" id="task-form">
							<input type="hidden" id="taskId">
							<div class="form-group">
								<input type="text" id="name" placeholder="task-name" class="form-control">
							</div>

							<div class="form-group">
								<textarea class="form-control" name="" id="description" cols="30" rows="10" placeholder="task description"></textarea>
							</div>
							<button class=" btn btn-info form-control" type="submit">Save Task</button>
						</form>
					</div>
				</div>
			</div>

			<div class="col-md-7">
				<div class="card my-4" id="task-result">
					<div class="card-body">
						<ul id="container"></ul>
					</div>
					
				</div>


				<table class="table table-bordered table-sm">
					<thead>
						<tr>
							<td>Id</td>
							<td>Name</td>
							<td>Description</td>
							<td>Actions</td>
						</tr>
					</thead>

					<tbody id="tasks"></tbody>
					
				</table>
			</div>


		</div>
	</div>

	




<script src="./bootstrap/js/jquery-3.4.1.min.js"></script>
<script src="app.js"></script>

</body>
</html>