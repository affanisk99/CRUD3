<!DOCTYPE html>
<html>
<head>
	<title>CRUD Divisions</title>
</head>
<body>
	<h1>BIN Divisions</h1><br/>
<a href="/divisions">Back</a><br/>
<a href="/divisions/bin/">Bin</a><br/><br/>
<table border="1">
	<tr>
		<th> Code </th>
		<th> Name </th>
		<th> Deskripsi </th>
		<th> OPSI </th>
	</tr>
	<tr>
		@foreach($divisions as $p)
		<td>{{$p->code}}</td>
		<td>{{$p->name}}</td>
		<td>{{$p->description}}</td>
		<td>
			<a href="/divisions/rollback/{{$p->id}}">Rollback</a>
			<a href="/divisions/destroy/{{$p->id}}">Delete Permanent</a>
		</td>
	</tr>
	@endforeach
</table>
</body>
</html>