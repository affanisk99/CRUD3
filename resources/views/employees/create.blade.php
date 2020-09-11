<!DOCTYPE html>
<html>
<head>
	<title>Employee</title>
</head>
<body>
	<a href="/employees">Back</a><br/>
<h1>Create Employee</h1>
@if (count($errors) > 0)
  <div class="alert alert-danger">
     <ul>
  	    @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
     </ul>
  </div>
@endif
<form action="/employees/store" method="post">
	@csrf
	nip : <br/><input type="text" name="nip" value="{{old('nip')}}" ><br/>
	name : <br/><input type="text" name="name" value="{{old('name')}}" ><br/>
	division  : <br/>
					<select name="division_id">
					<option value=""> ... </option>
					@forelse($divisions as $div)
					<option value="{{$div->id}}">{{$div->name}}</option>
					@empty
					@endforelse
					</select>
					</select>
				 <br/>
	position  : <br/>
					<select name="position_id">
					<option value=""> ... </option>
					@forelse($positions as $pos)
					<option value="{{$pos->id}}">{{$pos->name}}</option>
					@empty
					@endforelse
					</select>
				  <br/> 
	company  : <br/>
					<select name="company_id">
					<option value=""> ... </option>
					@forelse($companies as $comp)
					<option value="{{$comp->id}}">{{$comp->name}}</option>
					@empty
					@endforelse
					</select>
				 <br/> 
	address : <br/><input type="text" name="address" value="{{old('address')}}"><br/>
	Date of Birth : <br/><input type="date" name="date_of_birth" value="{{old('date_of_birth')}}"><br/>
	Join Date : <br/><input type="date" name="join_date" value="{{old('join_date')}}"><br/>
	Status : <br/><select name="status">
						<option value="1">Aktif</option>
						<option value="0">Tidak Aktif</option>
					</select><br/>
	NPWP : <br/><input type="text"name="npwp" value="{{old('npwp')}}"><br/>
	KTP : <br/><input type="text"name="ktp" value="{{old('ktp')}}"><br/>
	Marital Status : <br/><select name="marital_status">
						<option value="tk">TK</option>
						<option value="k0">K0</option>
						<option value="k1">K1</option>
						<option value="k2">K2</option>
						<option value="k3">K3</option>
					</select><br/>
	Phone Number : <br/><input type="text"name="phone_number" value="{{old('phone_number')}}"><br/>
	Profile Image : <br/><input type="file" name="profile_img"><br/>
		<br/><button type="submit" value="submit">SUBMIT</button><br/>
</form>
</body>
</html>