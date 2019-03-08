<?php
function _crypt( $string, $action = 'e' ) {
   // session_start();
    
    // you may change these values to your own
    $encrypt_method = "AES-256-CBC";
    $secret_key = '^#%^#FB$@#@&B#$@$!@';
    $secret_iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length($encrypt_method));
     
    $_SESSION['iv'] = bin2hex($secret_iv);
    $output = false;
    
    $key = hash( 'sha256', $secret_key );
    $iv = substr( hash( 'sha256',  $_SESSION['iv']), 0, 16 );
   
 
    if( $action == 'e' ) {
        $output = base64_encode( openssl_encrypt( $string, $encrypt_method, $key, 0, $iv) );
    }
    
    else if( $action == 'd' ){       
       
    }
return $output;
}

function _decrypt($string)
{
        $encrypt_method = "AES-256-CBC";
    $secret_key = '^#%^#FB$@#@&B#$@$!@';
      $output = false;
    $iv = substr( hash( 'sha256',  $_SESSION['iv']), 0, 16 );
    $key = hash( 'sha256', $secret_key );
     $output = openssl_decrypt( base64_decode( $string ), $encrypt_method, $key, 0, $iv );
        
return $output;
}

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

$test = "Lorem ipsum is placeholder text commonly used in the graphic, print, and publishing industries for previewing layouts and visual mockups";

$c = encrypt($test);
$e = decrypt($c);

echo $c.'<br>';

echo $e.'<br>';
