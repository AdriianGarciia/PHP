<?
    header("Content-Type: application/json; chartset=UTF-8");
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Methods: DELETE");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
    
    
        include_once '../config/database.php';
        include_once '../class/user.php';

        $database = new Database();
        $db = $database->getConnection();
        $item = new User($db);
        $data = json_decode(file_get_contents("php://input"));

        $item->userId = $data->userId;

        try{
            $item->deleteUser();
            echo json_encode("ok");
        }catch(PDOException $exception){
            echo "database error " . $exception->getMessage();
    
        }

        ?>