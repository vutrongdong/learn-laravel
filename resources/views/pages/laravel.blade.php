{{-- @extends dùng để trỏ tới file mà mình muốn đưa nội dung tới đó --}}
@extends('layout.master')

{{-- dùng @section để để đưa dữ liệu tới file khác có yield('noidung') --}}
@section('noidung')
<h2>Laravel</h2>
{{-- ngoài cách sử dụng echo trong php để xuất ra gía trị của một biến ta cũng có thể sử dụng cách như sau --}}
{{-- c2: cách này sử dụng được các cặp thẻ html --}}
{{--{!!$tenkhoahoc!!}--}}
{{-- c1: cách này không sử dụng được thể html --}}
{{--
@if($tenkhoahoc !='')
	{!!$tenkhoahoc!!}
@else
	{!!'không có khóa học'!!}

@endif
--}}

{{-- câu lệnh dùng để kiểm tra xem biến có tồn tại hay không --}}
{{$tenkhoahoc or 'không tồn tại biến khóa học '}}
<br>
{{-- @for($i=1;$i<=10;$i++)
	{{$i}}
@endfor --}}
<?php
$mang = array('php','laravel','javascript');
 ?>
 {{-- cách 1 --}}
 @if(!empty($mang))
	 @foreach($mang as $value)
		{{$value}}
	 @endforeach
 @else
	{{'mảng rỗng '}}
 @endif
<br>
{{-- cách 2 : cắt giảm code --}}
@forelse($mang as $value)
{{-- continue sẽ bỏ qua laravel và in ra các gía trị còn lại --}}
	{{-- @continue($value=='laravel') --}}
	{{-- break sẽ bỏ qua toàn bộ những gía trị từ laravel trở về sau --}}
	@break($value == 'laravel')
	{{$value}}
@empty
	{{'mảng rỗng '}
@endforelse
@endsection