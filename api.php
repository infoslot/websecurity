<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
header("Content-Type: application/json");

if (isset($_SERVER['HTTP_ORIGIN'])) {
        switch($_SERVER['HTTP_ORIGIN']) {
                case 'http://127.0.0.1:5500':
                header('Access-Control-Allow-Origin: http://127.0.0.1:5500');
                header('Access-Control-Allow-Credentials: true');
                header('Access-Control-Allow-Headers: http://127.0.0.1:5500');
                break;
                case 'http://localhost:8000':
                        header('Access-Control-Allow-Origin: http://localhost:8000');
                        header('Access-Control-Allow-Credentials: true');
                        header('Access-Control-Allow-Headers: http://localhost:8000');
                break;
                case 'http://localhost:80':
                        header('Access-Control-Allow-Origin: http://localhost:80');
                        header('Access-Control-Allow-Credentials: true');
                        header('Access-Control-Allow-Headers: http://localhost:80');
                break;
                default:
                header('Access-Control-Allow-Origin: http://default.try.me');
        }
} else {
	header('Access-Control-Allow-Origin: http://inside.try.me');
	}
	
# header('Access-Control-Allow-Origin: http://127.0.0.1:5500');
if (isset($_GET['order_id']) && $_GET['order_id']!="") {
    include('db.php');
    $order_id = $_GET['order_id'];
    $result = mysqli_query($con, "SELECT * FROM transactions WHERE order_id=$order_id");
    if(mysqli_num_rows($result)>0) {
        $row = mysqli_fetch_array($result);
        $amount = $row['amount'];
        $response_code = $row['response_code'];
        $response_desc = $row['response_desc'];
        response($order_id, $amount, $response_code, $response_desc);
        mysqli_close($con);
    } else{
        response(NULL, NULL, 200,"No record found");
    }

}else {
    response(NULL, NULL, 400," Invalid erquest");
}

#} else {
#	header('Access-Control-Allow-Origin: http://outside.try.me');
#}
function response($order_id, $amount, $response_code, $response_desc) {
    $response['order_id'] = $order_id;
    $response['amount'] = $amount;
    $response['response_code'] = $response_code;
    $response['$response_desc'] = $response_desc;

    $json_response = json_encode($response);
    echo $json_response;
}
?>
