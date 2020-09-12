<!DOCTYPE html>
<html>
<head>
	<title>Append</title>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>
</head>
<body>
<form action="{{route('append.store')}}" method="post" enctype="multipart/form-data">
@csrf
<table border="1" width="70%">
	<thead>
		<tr>
			<td>Nama</td>
			<td>Tanggal Lahir</td>
			<td>
				<a href="#" id="btnAddRow">tambah baris data</a>
			</td>
		</tr>
	</thead>
	<tbody id="component">
		
	</tbody>
	<tfoot>
		<tr>
			<td colspan="2"></td>
			<td>
				<a href="#">batal</a>
				<button type="submit">simpan</button>
			</td>
		</tr>
	</tfoot>
</table>
</form>
<script type="text/javascript">

row = 0
$('#btnAddRow').on('click',function(){

	html = ''
	html += '<tr>\
		<td><input type="text" name="detail['+row+'][name]"></td>\
		<td><input type="date" name="detail['+row+'][date_of_birth]"></td>\
		<td><a href="#" class="btn-remove">hapus</a></td>\
	</tr>'

	$('#component').append(html)
	row++
});

$('#component').on('click', '.btn-remove', function(e){
    e.preventDefault();

    $(this).parent().parent().remove();
});
</script>
</body>
</html>