<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="ÙT-8">
	<title>Laravel</title>
	{{--{ dùng hàm aset nó sẽ tự động trỏ đến thư mục public  --}}
	<link rel="stylesheet" href="{{asset('css/style.css')}}">
</head>
<body>
@include('layout.header')

	<div id="content">
		<h1>Khóa Học</h1>
		{{-- Có dòng này thì mới nhận dữ liệu từ file view phụ về  --}}
		@yield('noidung')
	</div>
@include('layout.footer')
</body>
</html>