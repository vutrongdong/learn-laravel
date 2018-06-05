<form action="{{route('postForm')}}" method="post">
	<input type="text" name='HoTen'>
	<input type="text" name="tuoi">
	<input type="submit">
	{{ csrf_field() }}
</form>