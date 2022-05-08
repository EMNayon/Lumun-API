<?php

/** @var \Laravel\Lumen\Routing\Router $router */


$router->post('/registration','RegistrationController@onRegister');

$router->post('/login','LoginController@onLogin');

$router->post('/token',['middleware'=>'auth','uses'=>'LoginController@tokenTest']);



// $router->post('/insert',['middleware'=>'auth','uses'=>'PhoneBookDetailsController@onInsert']);
// $router->get('/select',['middleware'=>'auth','uses'=>'PhoneBookDetailsController@onSelect']);
// $router->post('/delete',['middleware'=>'auth','uses'=>'PhoneBookDetailsController@onDelete']);
// $router->post('/update',['middleware'=>'auth','uses'=>'PhoneBookDetailsController@onUpdate']);


