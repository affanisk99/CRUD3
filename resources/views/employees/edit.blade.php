<!DOCTYPE html>
<html>
<head>
	<title>Employee</title>
</head>
<body>
	<a href="/employees">Back</a><br/>
<h1>Edit Employee </h1>
@if (count($errors) > 0)
  <div class="alert alert-danger">
     <ul>
  	    @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
     </ul>
  </div>
@endif
<form action="/employees/update/{{$employees->id}}" method="post">
	@csrf
	nip : <br/><input type="text" name="nip" value="{{$employees->nip}}"><br/>
	name : <br/><input type="text" name="name" value="{{$employees->name}}" ><br/>
	Division : <br/>
	<select name="division_id">
		<option value="">..</option>
		@forelse($divisions as $div)
		<option value="{{$div->id}}" @if ($employees->division_id == $div->id) selected @endif>{{$div->name}}</option>
		@empty
		@endforelse
	</select>
	<br/>
	Position : <br/>
	<select name="position_id">
		<option value="">..</option>
		@forelse($positions as $pos)
		<option value="{{$pos->id}}" @if ($employees->position_id == $pos->id) selected @endif>{{$pos->name}}</option>
		@empty
		@endforelse
	</select>
	<br/>
	Company : <br/>
	<select name="company_id">
		<option value="">..</option>
		@forelse($companies as $com)
		<option value="{{$com->id}}" @if ($employees->company_id == $com->id) selected @endif>{{$com->name}}</option>
		@empty
		@endforelse
	</select>
	<br/>
	address : <br/><input type="text" name="address" value="{{$employees->address}}"><br/>
	Date of Birth : <br/><input type="date" name="date_of_birth" value="{{$employees->date_of_birth}}"><br/>
	Join Date : <br/><input type="date" name="join_date" value="{{$employees->join_date}}"><br/>
	Status : <br/><select name="status">
						<option value="1">Aktif</option>
						<option value="0">Tidak Aktif</option>
					</select><br/>
	NPWP : <br/><input type="text"name="npwp" value="{{$employees->npwp}}"><br/>
	KTP : <br/><input type="text"name="ktp" value="{{$employees->ktp}}"><br/>
	Marital Status : <br/><select name="marital_status">
						<option value="{{$employees->marital_status}}">TK</option>
						<option value="{{$employees->marital_status}}">K0</option>
						<option value="{{$employees->marital_status}}">K1</option>
						<option value="{{$employees->marital_status}}">K2</option>
						<option value="{{$employees->marital_status}}">K3</option>
					</select><br/>
	Phone Number : <br/><input type="text"name="phone_number" value="{{$employees->phone_number}}"><br/>
	Profile Image : <br/><input type="file" name="profile_img" value="{{$employees->profile_img}}"><br/>
	<img src="{{ asset('storage/'.$employees->profile_img) }}">
	<br/><button type="submit" value="submit">SUBMIT</button><br/>
</form>
</body>
</html>