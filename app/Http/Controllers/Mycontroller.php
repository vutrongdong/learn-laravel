<?php
// mô hình MVC cho phép tách biệt các thành phần trong hệ thống từ đó ta sẽ xử lí công việc một cách nhanh chóng và dễ dàng hơn
// mô hình MVC gồm 3 thành phần là Controller , Model , View
//controller sẽ đảm nhiệm các công việc sắp xếp , xử lí các công việc , các yêu cầu của người dùng
//Model sẽ trao đổi dữ liệu với cơ sở dữ liệu và gửi lại cho controller 
//sau đó controller gửi dữ liệu về cho view
//view có nhiệm vụ là hiện thị dữ liệu lên cho người dùng xem
use App\Http\Requests;
namespace App\Http\Controllers;

//để chạy được request ta phải sử dụng thư viện request bằng dòng lệnh dưới
use Illuminate\Http\Request;
//để sử dụng được response ta phải sử dụng thư viện response bằng dòng lệnh dưới
use Illuminate\Http\Response;

class Mycontroller extends Controller
{
    public function Xinchao(){
        echo "test xem controller có hoạt động không";
    }
    public function Thamso($thamso){
        echo "truyền tham số đầu vào là một khóa học : ".$thamso;
        return redirect() -> route('MyRoute2');
    }
    public function GetURL(Request $request){
        //path() có tác dụng hiển thị route mà đã gọi cái hàm này lên
        //return $request->path();

        //url() sẽ trả về một url đầy đủ
        //return $request-> url();

        // if($request -> isMethod('get')){
        //  echo 'Đây là phương thức get';
        // }
        // else{
        //  echo "đây là phương thức post";
        // }
        if($request->is('My*')){
            echo "tồn tại My trên đường dẫn";
        }
        else
            echo "không tồn tại My trên đường dẫn";
    }

    //postForm
    public function postForm(Request $request){
        //tham số request trỏ tới name hoten của Form trong file postForm.blade.php
        // -> echo "tên của bạn là: ";
        // -> echo $request->HoTen;
        // hàm has() dùng để kiểm tra xem trong form có tồn tại name là tuoi hay không
        if($request->has('tuoi')){
            echo "tồn tại tham số tuổi";
        } else{
            echo "không tồn tại tham số tuổi";
        }
    }

    //set cookie
    public function setCookie(){
        //khai báo response
        $response = new Response();
        //widthCookie bao gồm ten_cookie , giatri_cookie , thoigian_cookie(được tính bằng phút)
        $response->withCookie('hoten','Laravel-Khoa Pham',0.1);
        echo "vu trong dong";
        return $response;
    }
    //get cookie
    public function getCookie(Request $request){
        return $request->cookie('hoten');
    }

    public function postFile(Request $request)
    {
        if($request->hasFile('MyFile'))
        {
            $img_save_address= '../image';
            $file = $request->file('MyFile');
            $file_name=  $file-> getClientOriginalName('MyFile');
            if($file->getClientOriginalExtension('MyFile')=='png' ||$file->getClientOriginalExtension('MyFile')=='jpg')
            {
               $file->move($img_save_address,$file_name);
           } else{
            echo "file không đúng định dạng";
        }
    }
        else
        {
            echo "chưa có file";
        }
    }
    public function Json(){
        $array = ['php','laravel','javascript'];
        return response()->json($array);
    }

    public function View(){
        return view('myview');
    }
    public function trongdong(){
        return view('view.trongdong');
    }
    public function TimeView($time){
        //t là tên gía trị mà mình muốn truyền sang file myview.php và gán gía trị là biên $time.
        return view('myview',['t'=>$time]);
    }
    public function blade($str){
        $khoahoc = 'laravel-khoa pham';
        if($str=='laravel'){
            return view('pages.laravel',['tenkhoahoc'=>$khoahoc]);
        }
        elseif($str="php")
        {
            return view('pages.php',['tenkhoahoc'=>$khoahoc]);
        }else{
            echo "không tồn tại url này!";
        }
    }
}
// -> resquest Gửi và nhận dữ liệu từ người dùng, nó sẽ lưu dữ liệu lại và truyền cho route và controller
// -> dữ liệu xuất ra sẽ được dùng với response
