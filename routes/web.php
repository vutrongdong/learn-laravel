<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
	return view('welcome');
});
Route::get('dong',function (){
	echo "<h1 style = 'color:red;'> vũ trọng đông</h1>";
});
Route::get('dong/{ten}', function($ten){
	echo "xin chao $ten";
})->where(['ten'=>'^[a-zA-Z]+$']);

// định danh route 2 cách
// cách 1
Route::get('Route1',['as'=>'Myroute1',function(){
	echo "xin chào các bạn";
}]);

Route::get('goiten',function(){
	return redirect()->route('Myroute1');
});

//cách2
Route::get('Route2',function(){
	echo "đây là route2";
})->name('MyRoute2');

Route::get('dinhdanh',function(){
	return redirect()->route('MyRoute2');
});

//dùng từ khóa prefix để tạo route group
Route::group(['prefix'=>'MyGroup'],function(){
	Route::get('route1',function(){
		echo "đây là route 1";
	});
	Route::get('route2',function(){
		echo "đây là route2";
	});
	Route::get('route3',function(){
		echo "đây là route3";
	});
});

//gọi tới controller
//controller có class là Mycontroller
//có hàm là Xinchao()
Route::get('Goi_Controller','Mycontroller@Xinchao');
Route::get('Goithamso/{thamso}','Mycontroller@Thamso');

//URL
Route::get('MyRequest','Mycontroller@GetURL');


//gửi nhận dữ liệu với request
Route::get('getForm',function(){
	//khi sử dụng hàm view() nó sẽ tự động trỏ đến file mà không cần phải gõ đầy đủ tên file postForm.blade.php
	return view('postForm');
});
//dùng uses để trỏ sang file controller
Route::post('postForm',['as'=>'postForm','uses'=>'Mycontroller@postForm']);

//sử dụng để trỏ sang hàm get - set cookie
Route::get('setCookie','Mycontroller@setCookie');

Route::get('getCookie','Mycontroller@getCookie');

//upload file
Route::get('uploadFile',function(){
	return view('postFile');
});

Route::post('postFile',['as'=>'postFile','uses'=>'Mycontroller@postFile']);

//Json 
Route::get('getJson','Mycontroller@Json');

//view
Route::get('fileView','Mycontroller@View');

Route::get('trongdong','Mycontroller@trongdong');
//c2: view
Route::get('viewname',function(){
	return view('view.trongdong');
});

Route::get('viewtime/{time}','Mycontroller@TimeView');
//khoahoa là tham số , laravel là gía trị truyền vào cho tham số
View::share('KhoaHoc','laravel');

//blade template
Route::get('view_master',function(){
	return view('pages.php');
});

Route::get('BladeTemplate/{str}','Mycontroller@blade');

//database
Route::get('database',function(){
	//lệnh tạo bảng
	Schema::create('tblthoigian',function($table){
		//tạo trường id tự động tăng
		$table->increments('id');
		//tạo trường kiểu varchar và cho phép null
		$table->string('ten',200)->nullable();
		//tạo trường với gía trị mặc định
		$table->string('nsx',200)->default('nha san xuat');

		//tự đọng cập nhật thời gian
		$table->dateTime('thoigian')->timestamps();

	});
	echo "đã thực hiện lệnh tạo bảng";
});

Route::get('lienketbang',function(){
	Schema::Create('tblsanpham',function($table){
		$table->increments('id');
		$table->string('tensanpham');
		$table->float('gia');
		$table->integer('soluong')->default(0);
		//unsigned có nghĩa là không được để trống
		$table->integer('id_loaisanpham')->unsigned();
		//truyền vào khóa ngoại kết nối với bảng tblloaisanpham
		$table->foreign('id_loaisanpham')->references('id')->on('tblloaisanpham');
	});
	echo "đã tạo bảng sản phẩm liên kết với bảng tblsanpham";
});

//sửa bảng
Route::get('suabang',function(){
	Schema::table('tbltheloai',function($table){
		$table->dropColumn('nsx');
	});
	echo "delete column nsx thành công";
});

//thêm cột trong một bảng
Route::get('themcot',function(){
	Schema::table('tbltheloai',function($table){
		$table->string('nsx',100);
	});
	echo "thêm mới cột thành công";
});

// đổi tên bảng
Route::get('doitenbang',function(){
	Schema::rename('tbltheloai','tbldoiten');
	echo 'đổi tên bảng thành công';
});
//xóa bảng
Route::get('xoabang',function(){
	Schema::drop('tblthoigian');
	echo "xóa bảng thành công";
});
//xóa bảng : nếu bảng tồn tại thì mới xóa còn không thì thôi
Route::get('xoabang2',function(){
	Schema::dropIfExists('tblthoigian');
	echo " xoas xoas";
});