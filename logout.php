<?php
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

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


if (isset($_SESSION['code'])) {
        session_unset();
        session_destroy();
        echo "You're logged out";
} else {
        echo "logout failed";
        }

echo "testing logout";
?>
