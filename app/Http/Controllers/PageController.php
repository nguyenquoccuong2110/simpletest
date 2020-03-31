<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class PageController extends Controller
{
    public function getIndex(){
    	return view('page.trangchu');
    }

    public function getChebien(){
    	return view('page.chebienthucpham');
    }

     public function getChitiet(){
    	return view('page.chitietlovisong');
    }

     public function getNganhhang(){
    	return view('page.nganhhangcon');
    }

     public function getNganhhangdien(){
    	return view('page.nganhhangdiengiadung');
    }

     public function getTintuc(){
    	return view('page.tintuc');
    }

     public function getChitiettintuc(){
    	return view('page.chitiettintuc');
    }

     public function getGioithieu(){
    	return view('page.gioithieu');
    }

     public function getDangnhap(){
    	return view('page.dangnhap');
    }

    public function getDangky(){
    	return view('page.dangky');
    }

    public function postDangky(Request $req){
        $this->validate($req,
            [
                'email'=> 'required|email|unique:users,email',
                'password' => 'required|min:6|max:20',
                'fullname' => 'required',
                're_password' => 'required|same:password'
            ],[
                'email.required' => 'Vui lòng nhập email',
                'email.email' => 'Không đúng định dạng email',
                'email.unique' => 'Email đã có người sử dụng',
                'password.required' => 'Vui lòng nhập mật khẩu',
                're_password.required' => 'Mật khẩu không giống nhau',
                'password.min' => 'Mật khẩu ít nhất 6 ký tự'
            ]);
        $user = new User();
        $user-> name = $req-> name;
        $user-> username = $req-> username;
        $user-> email = $req-> email;
        $user-> password = Hash::make($req-> password);
        $user-> phone = $req-> phone;
        $user-> address = $req-> address;
        $user-> datebirth = $req-> datebirth;
        $user-> monthbirth = $req-> monthbirth;
        $user-> yearbirth = $req-> yearbirth;
        $user-> city = $req-> city;
        $user-> save();
        return redirect()->back()->with('thanhcong','Tạo tài khoản thành công');

    }

    public function getSosanh(){
    	return view('page.sosanh');
    }

     public function getThongtingiohang(){
    	return view('page.thongtingiohang');
    }

     public function getHoantatgiohangtaisieuthi(){
    	return view('page.hoantatgiohangtaisieuthi');
    }

     public function getHoantatgiohangtainha(){
    	return view('page.hoantatgiohangtainha');
    }
}
