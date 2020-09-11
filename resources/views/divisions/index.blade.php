<!DOCTYPE html>
<html>
<head>
	<title>CRUD DIVISION</title>
</head>
<body>
	<h1>Division</h1><br/>
	<a href="/">MENU</a><br/><br/>
<a href="/divisions/create">Add Data</a><br/>
<a href="divisions/bin/">Bin</a><br/>	
<table border="1">
	<tr>
		<th> Code </th>
		<th> Name </th>
		<th> Deskripsi </th>
		<th> OPSI </th>
	</tr>
	<tr>
		@foreach($divisions as $div)
		<td>{{$div->code}}</td>
		<td>{{$div->name}}</td>
		<td>{{$div->description}}</td>
		<td>
			<a href="/divisions/edit/{{$div->id}}">Edit</a>
			<a href="/divisions/delete/{{$div->id}}">Delete</a>
		</td>
	</tr>
	@endforeach
</table>
</body>
</html>