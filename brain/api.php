<?php

include('functions.php');

if(isset($_POST['request']) && $_POST['request'] == 'login') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    if(login($username,$password)==true)
    {
        http_response_code(200);
        session_start();
        $data['username'] = $username;
        $alt_key = "@!$#@^#&";
        $data['token_key'] = md5($alt_key.$password);
    } 
    else 
    {
        http_response_code(401);
        $data= [
            'message' => 'invalid credentials',
            'error' => 401
        ];
    }
    echo json_encode($data, JSON_PRETTY_PRINT);
}

if(isset($_POST['request']) && $_POST['request'] == 'products') {

    $data = productList(true);
    http_response_code(200);
    echo json_encode($data, JSON_PRETTY_PRINT);
}