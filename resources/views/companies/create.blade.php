<!DOCTYPE html>
<html>
<head>
	<title>Companies</title>
</head>
<body>
	<a href="/companies">Back</a><br/>
<h1>Create Companies</h1>
@if (count($errors) > 0)
  <div class="alert alert-danger">
     <ul>
  	    @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
     </ul>
  </div>
@endif
<form action="/companies/store" method="post">
	@csrf
	Code : <br/><input type="text" name="code" value="{{old('code')}}"><br/>
	Name : <br/><input type="text" name="name" value="{{old('name')}}" ><br/>
	Description : <br/><input type="text" name="description" value="{{old('description')}}"><br/>
	<br/><button type="submit" value="submit">SUBMIT</button><br/>
</form>
</body>
</html>