<!DOCTYPE html>
<html>
<head>
	<title>CRUD Employees</title>
</head>
<body>
	<h1>BIN Employees</h1><br/>
	<a href="/">MENU</a><br/><br/>
	<a href="/employees">Go back<br/>
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
		<td>{{$e->divisions->name}}</td>
		<td>
			<br/><a href="/employees/rollback/{{$e->id}}">Rollback</a><br/>
			<br/><a href="/employees/destroy/{{$e->id}}">Delete Permanent</a><br/>
		</td>
	</tr>
	@endforeach
</table>
</body>
</html>