<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

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

if (isset($_POST['username'])) {
        if ($_POST['username'] == 'user' && $_POST['password'] == 'iknow') {
	        ini_set('session.cookie_domain', 'funpage.com');
	        ini_set('session.cookie_path', '/');
                session_start();
                setcookie("Authenticated","123456", 6500, "/");
                $_SESSION['code'] = 'user';
                $json_response = json_encode("authenticated: true as user");
                echo $json_response;
        } elseif ($_POST['username'] == 'admin' && $_POST['password'] == 'iknow') {
	        ini_set('session.cookie_domain', 'funpage.com');
	        ini_set('session.cookie_path', '/');
                session_start();
                setcookie("Authenticated","123456", 6500, "/");
                $_SESSION['code'] = 'admin';
                $json_response = json_encode("authenticated: true as admin");
                echo $json_response;
        }
        else {
                $json_response = json_encode("authenticated: false");
    	        echo $json_response;
                    exit;
        }

}
else {
	$json_response = json_encode("authenticated: false");
    	echo $json_response;

}


?>
