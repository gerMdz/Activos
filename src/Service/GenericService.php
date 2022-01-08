<?php

namespace App\Service;

class GenericService
{

    function encodeData($data, $key): string
    {
        $first_key = base64_decode($key);
        $method = "aes-256-cbc";
        $iv_length = openssl_cipher_iv_length($method);
        $iv = openssl_random_pseudo_bytes($iv_length);
        $first_encrypted = openssl_encrypt($data, $method, $first_key, OPENSSL_RAW_DATA, $iv);

        return bin2hex(base64_encode($iv . $first_encrypted));
    }

    function decodeData($input, $key)
    {
        $first_key = base64_decode($key);
        $mix = base64_decode(hex2bin($input));
        $method = "aes-256-cbc";
        $iv_length = openssl_cipher_iv_length($method);
        $iv = substr($mix, 0, $iv_length);
        $first_encrypted = substr($mix, $iv_length);

        return openssl_decrypt($first_encrypted, $method, $first_key, OPENSSL_RAW_DATA, $iv);
    }
}
