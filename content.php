<?php
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
        $http_origin = ($_SERVER['HTTP_ORIGIN']);
	header("Access-Control-Allow-Origin: $http_origin");
	header('Access-Control-Allow-Methods: POST, GET, OPTIONS');
	header('Access-Control-Allow-Headers: content-type, Cookie');
	header('Access-Control-Allow-Credentials: true');
	exit;
}

if (isset($_SERVER['HTTP_ORIGIN'])) {
    switch($_SERVER['HTTP_ORIGIN']) {
            case 'http://127.0.0.1:5500':
            header('Access-Control-Allow-Origin: http://127.0.0.1:5500');
            header('Access-Control-Allow-Credentials: true');
            header('Access-Control-Allow-Headers: Content-Type');
            break;
            case 'http://localhost:8000':
                    header('Access-Control-Allow-Origin: http://localhost:8000');
                    header('Access-Control-Allow-Credentials: true');
                    header('Access-Control-Allow-Headers: Content-Type');
            break;
            case 'http://localhost:80':
                    header('Access-Control-Allow-Origin: http://localhost:80');
                    header('Access-Control-Allow-Credentials: true');
                    header('Access-Control-Allow-Headers: Content-Type');
            break;
            case 'http://funpage.com:80':
                header('Access-Control-Allow-Origin: http://funpage.com:80');
                header('Access-Control-Allow-Credentials: true');
                header('Access-Control-Allow-Headers: Content-Type');
            break;
            default:
            header('Access-Control-Allow-Origin: http://default.try.me');
    }
} else {
header('Access-Control-Allow-Origin: http://inside.try.me');
}    


if ($_SESSION['code'] == 'admin') {
        $json = json_encode("ViewSecret: Yes you're admin");
        echo $json;
	return $json;
}
elseif ($_SESSION['code'] == 'user') {
    $json = json_encode("ViewSecret: Yes you're user");
    echo $json;
return $json;
} else {
        $json = json_encode("ViewSecret: no not authenticated");
        echo $json;
	return $json;
}
?>
?>

