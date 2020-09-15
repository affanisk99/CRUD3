<!DOCTYPE html>
<html>
<head>
	<title>Companies</title>
</head>
<body>
	<a href="/companies">Back</a><br/>
<h1>Show Companies </h1>
@if (count($errors) > 0)
  <div class="alert alert-danger">
     <ul>
  	    @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
     </ul>
  </div>
@endif
<form action="/companies/update/{{$companies->id}}" method="post">
	@csrf
	Code : <br/><input type="text" name="code" value="{{$companies->code}}" readonly=""><br/>
	Name : <br/><input type="text" name="name" value="{{$companies->name}}" readonly=""><br/>
	Description : <br/><input type="text" name="description" value="{{$companies->description}}" readonly=""><br/>
	<br/><button type="submit" value="submit">SUBMIT</button><br/>
</form>
</body>
</html>
<br/>Branches
<a href="/companies/branches/{{$companies->id}}">Add Branch</a>
<table>
	@foreach($companies->branches as $bch)
	<tr>
		<td>Nama Branch :	{{$bch->name}}</td><br />
		<td>Alamat :	{{$bch->address}}</td><br/>	</tr>
	<tr>
		<td><a href="/companies/branches/delete/{{$bch->id}}">hapus</a></td>
	</tr>
	@endforeach
</table>
</form>
</body>
</html>