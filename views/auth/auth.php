hihihihihi
<?php
session_start();

if(!isset($_POST['auth'])){
    header('Location: login/error');
    exit;
}

$auth = $_POST['auth'];

// $json = file_get_contents('../auth/auth.json');
// $data = json_decode($json, true);
// if(!isset($data[$user])){
//     header('Location: login/error');
//     exit;
// }

// $pass = 'asdf';
// if($auth !== $pass){
//     header('Location: login/error');
//     exit;
// }

$_SESSION['auth'] = '1';
header('Location: /');