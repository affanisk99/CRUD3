<!DOCTYPE html>
<html>
<head>
	<title>POSITIONS</title>
</head>
<body>
	<a href="/positions">Back</a><br/>
<h1>Edit Position</h1>
@if (count($errors) > 0)
  <div class="alert alert-danger">
     <ul>
  	    @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
     </ul>
  </div>
@endif
<form action="/positions/update/{{$positions->id}}" method="post">
	@csrf
	Code : <br/><input type="text" name="code" value="{{$positions->code}}"><br/>
	Name : <br/><input type="text" name="name" value="{{$positions->name}}"><br/>
	Description : <br/><input type="text" name="description" value="{{$positions->description}}"><br/>
	<br/><button type="submit" value="submit">SUBMIT</button><br/>
</form>
</body>
</html>