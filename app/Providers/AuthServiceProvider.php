<?php

namespace App\Providers;

use App\Models\User;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use Illuminate\Support\ServiceProvider;
// require_once __DIR__ .'./vendor/autoload.php';
// // include './vendor/autoload.php'

class AuthServiceProvider extends ServiceProvider {
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register() {
        //
    }

    /**
     * Boot the authentication services for the application.
     *
     * @return void
     */
    public function boot() {
        // Here you may define how you wish users to be authenticated for your Lumen
        // application. The callback which receives the incoming request instance
        // should return either a User instance or null. You're free to obtain
        // the User instance via an API token or any other method necessary.

        $this->app['auth']->viaRequest( 'api', function ( $request ) {

            $jwt = $request->input( 'access_token' );
            $key = env( 'TOKEN_KEY' );

            // $decoded = JWT::decode($access_token, new Key($key, 'HS256'));

            try {
                $$decoded = JWT::decode($jwt, new Key($key, 'HS256'));
                return new User();
            } catch ( \Exception $e ) {
                return null;
            }

            // if ($request->input('api_token')) {
            //     return User::where('api_token', $request->input('api_token'))->first();
            // }
        } );
    }
}
