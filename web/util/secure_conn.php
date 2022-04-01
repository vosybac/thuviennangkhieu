<?php
    // make sure the page uses a secure connection
    // $https = filter_input(INPUT_SERVER, 'HTTPS');
    // if (!$https) {
    //     $host = filter_input(INPUT_SERVER, 'HTTP_HOST', FILTER_SANITIZE_STRING);
    //     $uri = filter_input(INPUT_SERVER, 'REQUEST_URI', FILTER_SANITIZE_STRING);
    //     $url = 'https://' . $host . $uri;
    //     header("Location: " . $url);
    //     exit();
    // }
    
    function isSecure() {
      return
        (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off')
        || $_SERVER['SERVER_PORT'] == 443;
    }    
    
    if (!isSecure()) {
        $url = 'https://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
        //header("Location: ".$url);
        echo "Secure connection:";
        echo $url;
        exit();
    }
?>