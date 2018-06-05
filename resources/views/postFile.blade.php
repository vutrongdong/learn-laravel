<form action="{{route('postFile')}}" method="post" enctype="multipart/form-data">
	<input type="file" name= 'MyFile'>
	<input type="submit">
	<input type="hidden" name="_token" value="{{ csrf_token() }}">
</form>