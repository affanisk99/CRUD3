<!DOCTYPE html>
<html>
<head>
	<title>Companies</title>
</head>
<body>
	<a href="/companies">Back</a><br/>
<h1>Edit Companies </h1>
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
	Code : <br/><input type="text" name="code" value="{{$companies->code}}"><br/>
	Name : <br/><input type="text" name="name" value="{{$companies->name}}"><br/>
	Description : <br/><input type="text" name="description" value="{{$companies->description}}"><br/>
	<br/><button type="submit" value="submit">SUBMIT</button><br/>
</form>
</body>
</html>