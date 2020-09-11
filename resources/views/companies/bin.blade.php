<!DOCTYPE html>
<html>
<head>
	<title>CRUD Companies</title>
</head>
<body>
	<h1>BIN Companies</h1><br/>
<a href="/companies">Back</a><br/>
<a href="/companies/bin/">Bin</a><br/><br/>
<table border="1">
	<tr>
		<th> Code </th>
		<th> Name </th>
		<th> Deskripsi </th>
		<th> OPSI </th>
	</tr>
	<tr>
		@foreach($companies as $p)
		<td>{{$p->code}}</td>
		<td>{{$p->name}}</td>
		<td>{{$p->description}}</td>
		<td>
			<a href="/companies/rollback/{{$p->id}}">Rollback</a>
			<a href="/companies/destroy/{{$p->id}}">Delete Permanent</a>
		</td>
	</tr>
	@endforeach
</table>
</body>
</html>