<?php 

rsa_key();
    function rsa_key(){
        $res=openssl_pkey_new();
        var_dump($res);
    }
?>