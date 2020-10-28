<?php

namespace App\Http\Controllers\Student;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


class StudentPagesController extends Controller{

    public function home(){
        return view('student.index');
    }


    public function profile($role, $username){

        if(Auth::user()->username == strtolower($username)){
            return view('student.profile');
        }else{
            return view('visitor.profile');
        }
    }
}