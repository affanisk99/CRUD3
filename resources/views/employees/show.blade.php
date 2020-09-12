<!DOCTYPE html>
<html>
<head>
	<title>Employee</title>
</head>
<body>
	<a href="/employees">Back</a><br/>
<h1>Show Employee </h1>
@if (count($errors) > 0)
  <div class="alert alert-danger">
     <ul>
  	    @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
     </ul>
  </div>
@endif
<br/><a href="/employees/edit/{{$employees->id}}">Edit Data</a><br/>
<form action="/employees/show/{{$employees->id}}" method="post">
	@csrf
	nip : <br/><input type="text" name="nip" value="{{$employees->nip}}" readonly=""><br/>
	name : <br/><input type="text" name="name" value="{{$employees->name}}" readonly=""><br/>
	Division : <br/>
	<select name="division_id" disabled="">
		@forelse($divisions as $div)
		<option value="{{$div->id}}"  @if ($employees->division_id == $div->id) selected @endif>{{$div->name}}</option>
		@empty
		@endforelse
	</select>
	<br/>
	Position : <br/>
	<select name="position_id" disabled="">
		<option value="">..</option>
		@forelse($positions as $pos)
		<option value="{{$pos->id}}" readonly="" @if ($employees->position_id == $pos->id) selected @endif>{{$pos->name}}</option>
		@empty
		@endforelse
	</select>
	<br/>
	Company : <br/>
	<select name="company_id" disabled="">
		@forelse($companies as $com)
		<option value="{{$com->id}}" @if ($employees->company_id == $com->id) selected @endif>{{$com->name}}</option>
		@empty
		@endforelse
	</select>
	<br/>
	address : <br/><input type="text" name="address" value="{{$employees->address}}" readonly=""><br/>
	Date of Birth : <br/><input type="date" name="date_of_birth" value="{{$employees->date_of_birth}}" readonly=""><br/>
	Join Date : <br/><input type="date" name="join_date" value="{{$employees->join_date}}" readonly=""><br/>
	Status : <br/><select name="status" disabled="">
						<option value="{{$employees->id}}">{{$employees->status}}</option>
					</select><br/>
	NPWP : <br/><input type="text"name="npwp" value="{{$employees->npwp}}" readonly=""><br/>
	KTP : <br/><input type="text"name="ktp" value="{{$employees->ktp}}" readonly=""><br/>
	Marital Status : <br/><select name="marital_status" disabled="">
						<option value="{{$employees->id}}">{{$employees->marital_status}}</option>
					</select><br/>
	Phone Number : <br/><input type="text"name="phone_number" value="{{$employees->phone_number}}" readonly=""><br/>
	Profile Image : <br/><img src="{{ asset('storage/'.$employees->profile_img) }}"><br/>
</form>
</body>
</html>