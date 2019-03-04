<?php
   /* function encrypt_($data, $key)
    {
        $l = strlen($key);
        if ($l < 16)
            $key = str_repeat($key, ceil(16/$l));

        if ($m = strlen($data)%8)
            $data .= str_repeat("\x00",  8 - $m);
        if (function_exists('mcrypt_encrypt'))
            $val = mcrypt_encrypt(MCRYPT_BLOWFISH, $key, $data, MCRYPT_MODE_ECB);
        else
            $val = openssl_encrypt($data, 'BF-ECB', $key, OPENSSL_RAW_DATA | OPENSSL_NO_PADDING);

        return $val;
    }

    function decrypt_($data, $key)
    {
        $l = strlen($key);
        if ($l < 16)
            $key = str_repeat($key, ceil(16/$l));

        if (function_exists('mcrypt_encrypt'))
            $val = mcrypt_decrypt(MCRYPT_BLOWFISH, $key, $data, MCRYPT_MODE_ECB);
        else
            $val = openssl_decrypt($data, 'BF-ECB', $key, OPENSSL_RAW_DATA | OPENSSL_NO_PADDING);
            $val = str_replace("\000","",$val);
        return $val;
        
    }
*/

   function encrypt($token)
    {
  $cipher_method = 'aes-128-ctr';
  $enc_key = openssl_digest(php_uname(), 'SHA256', TRUE);
  $enc_iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length($cipher_method));
  $crypted_token = openssl_encrypt($token, $cipher_method, $enc_key, 0, $enc_iv) . "::" . bin2hex($enc_iv);
  unset($token, $cipher_method, $enc_key, $enc_iv);

        return $crypted_token;
    }

    function decrypt($data)
    {
        list($data, $enc_iv) = explode("::", $data);;
  $cipher_method = 'aes-128-ctr';
  $enc_key = openssl_digest(php_uname(), 'SHA256', TRUE);
  $token = openssl_decrypt($data, $cipher_method, $enc_key, 0, hex2bin($enc_iv));
  unset($data, $cipher_method, $enc_key, $enc_iv);
 return $token;
        
    }

function _crypt( $string, $action = 'e' ) {
    //session_start();
    
    // you may change these values to your own
    $encrypt_method = "AES-256-CBC";
    $secret_key = '^#%^#FB$@#@&B#$@$!@';
   // $secret_iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length($encrypt_method));
     $secret_iv = "rjdfyjkufkdhfgh";
//    $_SESSION['iv'] = bin2hex($secret_iv);
    $output = false;
    
    $key = hash( 'sha256', $secret_key );
    $iv = substr( hash( 'sha256',  $secret_iv), 0, 16 );
   
 
    if( $action == 'e' ) {
        $output = base64_encode( openssl_encrypt( $string, $encrypt_method, $key, 0, $iv ) );
    }
    
    else if( $action == 'd' ){
        
        $output = openssl_decrypt( base64_decode( $string ), $encrypt_method, $key, 0, $iv );
    }
 
    return $output;
}