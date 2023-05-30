<?php

$router->get('/otp/send/{phone}', 'OtpController@send');
$router->get('/otp/show/{phone}', 'OtpController@show');
$router->get('/otp/verify/{phone}/{otp}', 'OtpController@verify');
$router->get('/otp/all', 'OtpController@index');
$router->get('/otp/delete/{phone}', 'OtpController@delete');

// show help page for api view blade
$router->get('/', function () use ($router) {
    return view('api');
});

// handel if page not found
$router->get('/{any:.*}', function () use ($router) {
    // return response()->json(['message' => 'Page Not Found!'], 404);
    return view('errors.4xx', ['code' => '404', 'message' => 'Page Not Found!']);
});