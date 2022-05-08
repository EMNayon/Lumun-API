<?php

namespace App\Http\Controllers;

use App\Models\RegistrationModel;
use Firebase\JWT\JWT;
use Illuminate\Http\Request;

// // include "../phonebook/vendor/autoload.php";
// require_once __DIR__ .'./vendor/autoload.php';
// include './vendor/autoload.php'

class LoginController extends Controller {

    function tokenTest() {
        return "Token Is Ok";
    }

    function onLogin( Request $request ) {

        $username = $request->input( 'username' );
        $pass = $request->input( 'password' );

        $userCount = RegistrationModel::where( ['username' => $username, 'password' => $pass] )->count();

        if ( $userCount == 1 ) {
            $key = env( 'TOKEN_KEY' );
            $payload = [
                'site' => 'http://demo.com',
                'user' => $username,
                'iat'  => time(),
                'exp'  => time() + 60
            ];
            $jwt = JWT::encode( $payload, $key,'HS256');
            return response()->json( ['Token' => $jwt, 'Status' => "Login Successful"] );
        } else {
            return "Wrong Username or Password";
        }
    }
}
