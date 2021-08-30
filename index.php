<?php

function json($data){
    if(is_array($data)){
        return json_encode($data, JSON_PRETTY_PRINT);
    } else {
        return "{}";
    }
}

function response($data,$status){
    $code = ($status)?$status:200;
    echo $data;
    exit;
}

function startsWith ($string, $startString){
    $len = strlen($startString);
    return (substr($string, 0, $len) === $startString);
}

