@extends('master')
@section('content')
<br>
<br>


<form style="width: 300px;" action="test" method="POST">
   <input type="hidden" name="_token" value="{{ csrf_token() }}">
  
  <input type="text" name="ngaydi" placeholder="Ngày đi yyyy-mm-dd">
  <input type="text" name="ngayden" placeholder="Ngày đến yyyy-mm-dd">
      <button type="submit">Nhập</button>

</form>

<script>
	
	
	
	const input = 3;
	switch(input){
		case 1:
		console.log('1. Nhập dữ liệu')
		break;
		case 2:
		console.log('2. Xuất dữ liệu')
		break;
		case 3:
		console.log('3. Kết quả')
		break;
		default:

		break;
	}


</script>

@endsection