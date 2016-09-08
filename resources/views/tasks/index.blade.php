<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel Repository Pattern Tutorial</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  </head>
  <body>
    
    <div class="container">
    	<h2>Tasks</h2>

		{{-- List Tasks --}}

		<div class="row">
			<div class="col-md-6">
				<ul class="list-group">
					@foreach($tasks as $task)				
						<li class="list-group-item">
							{{ Form::open( 
								['route' => ['task.delete', $task->id], 
								'method' => 'delete',
								'class' => 'form-inline']) }}
								{{ csrf_field() }}
								{{ $task->description }}
								<div class="pull-right">
									<a href="{{ route('task.index', $task->id) }}">Edit</a>
									{{ Form::submit('Delete', ['class' => 'btn btn-danger btn-xs']) }}
								</div>
							{{ Form::close() }}
						</li>
					@endforeach
				</ul>
			</div>
		</div>

		{{-- Task Form --}}

		<div class="row">
			<div class="col-md-6">
				@if(isset($editTask))
					{{ Form::model($editTask, 
						['route' => ['task.update', $editTask->id],
						'method' => 'patch',
						'class' => 'form-inline']) }}
				@else
					{{ Form::open( 
						['route' => 'task.store',
						'method' => 'post',
						'class' => 'form-inline']) }}
				@endif

						<div class="form-group">
							{{ Form::text('description', null,
								['class' => 'form-control',
								'size' => '58px',
								'placeholder' => 'Task description']) }}
						</div>
						
						<div class="form-group">
							{{ Form::submit('Ok', ['class' => 'btn btn-primary form-control']) }}
						</div>
					{{ Form::close() }}
			</div>
		</div>

    </div>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    
  </body>
</html>