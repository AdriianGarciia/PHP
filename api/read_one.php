<?php
    header("Content-Type: application/json; chartset=UTF-8");
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Methods: GET");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, 
    Authorization, X-Requested-With");

    include_once '../config/database.php';
    include_once '../class/user.php';

    $database = new Database();
    $db = $database->getConnection();
    $item = new User($db);
    $item->userId = isset($_GET['userId']) ? $_GET['userId'] : die();
    $item->getSingleUser();


    if ($item->name != null) {
        $data= array(
            "userId"=> $item->userId,
             "name" => $item->name,
             "phone" => $item->phone,
             "date" => $item->date,
             "status" => $item->status 
        );
        echo json_encode($data);
    }else{
        http_response_code(404);
        echo json_encode(
            array("Message" => "User not found")
        );
    }

    //echo json_encode($stmt);
    //echo json_encode($itemCount);

?>