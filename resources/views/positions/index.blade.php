<!DOCTYPE html>
<html>
<head>
	<title>CRUD POSITIONS</title>
</head>
<body>
	<h1>POSITIONS</h1><br/>
	<a href="/">MENU</a><br/><br/>
<a href="/positions/create">Add Data</a><br/>
<a href="/positions/bin/">Bin</a><br/>	
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
			<a href="/positions/edit/{{$p->id}}">Edit</a>
			<a href="/positions/delete/{{$p->id}}">Delete</a>
		</td>
	</tr>
	@endforeach
</table>
</body>
</html>