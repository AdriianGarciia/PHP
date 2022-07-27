<?
    header("Content-Type: application/json; chartset=UTF-8");
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Methods: PUT");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
    
    
        include_once '../config/database.php';
        include_once '../class/user.php';

        $database = new Database();
        $db = $database->getConnection();
        $item = new User($db);
        $data = json_decode(file_get_contents("php://input"));

        $item->name = $data->name;
        $item->phone = $data->phone;
        $item->date = $data->date;
        $item->status = $data->status;
        $item->userId = $data->userId;

        try{
            $item->updateUser();
            echo json_encode("ok");
        }catch(PDOException $exception){
            echo "database error " . $exception->getMessage();
    
        }
        

?>