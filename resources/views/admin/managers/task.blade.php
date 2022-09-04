<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Task</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<div class="m-4">
    <div class="form-group">
		<form action="{{url('managerDashboard')}}" method="get">
			@csrf
			<div class="form-group">	
				<input type="submit" class="btn btn-primary" value="back to dashboard">
			</div>
		</form>
	</div>
    <form action="{{route('assignTask')}}" method="post">
        @csrf
        <div class="mb-3">
            <input type="hidden" class="form-control" id="inputEmail" name="phone_no" value="{{$worker->phone_no}}" >
        </div>
        <div class="mb-3">
            <input type="hidden" class="form-control" id="inputEmail" name="worker_id" value="{{$worker->id}}" >
        </div>
        <div class="mb-3">
            <label class="form-label" for="inputPassword">Task</label>
            <input type="text" class="form-control" id="inputPassword" name="task" placeholder="assign task" >
        </div>

        <button type="submit" class="btn btn-primary">Assign</button>
    </form>
</div>
</body>
</html>