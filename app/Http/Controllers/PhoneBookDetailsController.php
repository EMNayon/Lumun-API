<?php

namespace App\Http\Controllers;

use App\Models\PhoneBookDetailsModel;
use Illuminate\Http\Request;

class PhoneBookDetailsController extends Controller
{
    function onInsert(Request $request){
        $user = $request->input('username');
        $phn_one = $request->input('phone_number_one');
        $phn_two = $request->input('phone_number_two');
        $name  = $request->input('name ');
        $email  = $request->input('email ');

        $result = PhoneBookDetailsModel::insert([
            'username'=>$user,
            'phone_number_one' => $phn_one,
            'phone_number_two' => $phn_two,
            'name' => $name,
            'email' => $email
        ]);

        if($result == true){
            return "Save Success";
        }else{
            return "Fail ! Try Again";
        }

    }
    function onSelect(){

    }
    function onDelete(){

    }
    function onUpdate(){

    }
}
