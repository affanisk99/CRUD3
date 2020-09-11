<!DOCTYPE html>
<html>
<head>
	<title>Divisions</title>
</head>
<body>
	<a href="/divisions">Back</a><br/>
<h1>Edit Divisions </h1>
@if (count($errors) > 0)
  <div class="alert alert-danger">
     <ul>
  	    @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
     </ul>
  </div>
@endif
<form action="/divisions/update/{{$divisions->id}}" method="post">
	@csrf
	Code : <br/><input type="text" name="code" value="{{$divisions->code}}"><br/>
	Name : <br/><input type="text" name="name" value="{{$divisions->name}}"><br/>
	Description : <br/><input type="text" name="description" value="{{$divisions->description}}"><br/>
	<br/><button type="submit" value="submit">SUBMIT</button><br/>
</form>
</body>
</html>