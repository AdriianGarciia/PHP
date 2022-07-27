<?php
header("Content-Type: application/json; chartset=UTF-8");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers,
Authorization, X-Requested-With");
 
$data = array(
    "data"=>[
        array("id"=>"1", "contact"=>"Veronica","Phone"=>"4491234567", "date"=>"2022/07/01", "status"=>"Activo"),
        array("id"=>"2", "contact"=>"Armando", "Phone"=>"4491234568", "date"=>"2022/07/11", "status"=>"No activo")
    ]
);

echo json_encode($data);

?>