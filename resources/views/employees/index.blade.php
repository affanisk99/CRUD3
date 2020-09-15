<!DOCTYPE html>
<html>
<head>
	<title>CRUD Employees</title>
</head>
<body>
	<h1>Employee</h1><br/>
	<a href="/">MENU</a><br/><br/>
<a href="/employees/create">Add Data</a><br/>
<a href="/employees/bin/">Bin</a><br/>	
<table border="1">
	<tr>
		<th> NIP </th>
		<th> Name </th>
		<th> Division </th>
		<th> OPSI </th>
	</tr>
	<tr>
		@foreach($employees as $e)
		<td>{{$e->nip}}</td>
		<td>{{$e->name}}</td>
		<td>{{$e->divisions->name ?? ''}}</td>
		<td>
			<a href="/employees/families/{{$e->id}}">Add Family</a>
			<a href="/employees/certificates/{{$e->id}}">Add Certificate</a>
			<a href="/employees/schools/{{$e->id}}">Add School</a>
			<a href="/employees/show/{{$e->id}}">Profile</a>
			<a href="/employees/edit/{{$e->id}}">Edit</a>
			<a href="/employees/delete/{{$e->id}}">Delete</a>
		</td>
	</tr>
	@endforeach
</table>
</body>
</html>