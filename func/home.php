<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/wantGet_Houses/api/GetHouses.class.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/wantGet_Houses/index.php');

if($_SERVER['REQUEST_METHOD'] != 'POST'){
    $house = new GetHouse();
    $result = $house->get_Houses();
    $data = [
        "result" => $result,
    ];
    $data = json($data);
    response($data,200);
}