<!DOCTYPE html>
<html>
<head>
	<title>CRUD POSITIONS</title>
</head>
<body>
	<h1>BIN POSITIONS</h1><br/>
<a href="/positions">Back</a><br/>
<a href="/positions/bin/">Bin</a><br/><br/>
<table border="1">
	<tr>
		<th> Code </th>
		<th> Name </th>
		<th> Deskripsi </th>
		<th> OPSI </th>
	</tr>
	<tr>
		@foreach($positions as $p)
		<td>{{$p->code}}</td>
		<td>{{$p->name}}</td>
		<td>{{$p->description}}</td>
		<td>
			<a href="/positions/rollback/{{$p->id}}">Rollback</a>
			<a href="/positions/destroy/{{$p->id}}">Delete Permanent</a>
		</td>
	</tr>
	@endforeach
</table>
</body>
</html>