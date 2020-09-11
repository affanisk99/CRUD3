<!DOCTYPE html>
<html>
<head>
	<title>CRUD Company</title>
</head>
<body>
	<h1>Company</h1><br/>
	<a href="/">MENU</a><br/><br/>
<a href="/companies/create">Add Data</a><br/>
<a href="/companies/bin/">Bin</a><br/>	
<table border="1">
	<tr>
		<th> Code </th>
		<th> Name </th>
		<th> Deskripsi </th>
		<th> OPSI </th>
	</tr>
	<tr>
		@foreach($companies as $c)
		<td>{{$c->code}}</td>
		<td>{{$c->name}}</td>
		<td>{{$c->description}}</td>
		<td>
			<a href="/companies/edit/{{$c->id}}">Edit</a>
			<a href="/companies/delete/{{$c->id}}">Delete</a>
		</td>
	</tr>
	@endforeach
</table>
</body>
</html>