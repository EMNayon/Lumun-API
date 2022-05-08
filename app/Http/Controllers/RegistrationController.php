<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RegistrationModel;
class RegistrationController extends Controller
{
    function onRegister(Request $request){
        $fname = $request->input('fname');
        $lname = $request->input('lname');
        $city = $request->input('city');
        $username = $request->input('username');
        $pass = $request->input('password');
        $gender = $request->input('gender');

        $userCount = RegistrationModel::where('username',$username)->count();

        if($userCount != 0){
            return 'User Already Exists';
        }else{
            $result = RegistrationModel::insert([
                'fname'=>$fname,
                'lname'=>$lname,
                'city' =>$city,
                'username'=>$username,
                'password' =>$pass,
                'gender' =>$gender
            ]);

            if($result == true){
                return "Registration Succesfull";
            }else{
                return "Registration Fail, Try Again!";
            }
        }
    }
}
