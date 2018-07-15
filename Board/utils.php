<?php

/**
 * utils short summary.
 *
 * utils description.
 *
 * @version 1.0
 * @author Віталік
 */

class Model {
    public $header;
    public $body;
    public $menu;
    public $footer;
}

function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

function getSerialNumber(){
    $keyFileName = $_SERVER["DOCUMENT_ROOT"] . "/content/key.txt";
    $keyValue = "";
    try{

        if (!file_exists($keyFileName)){
            $myfile = fopen($keyFileName, "w");
            $keyValue =generateRandomString(123);
            fwrite($myfile, $keyValue);
            fclose($myfile);
        } else {
            $myfile = fopen($keyFileName, "r");
            $keyValue = fread($myfile, filesize($keyFileName));
            fclose($myfile);
        }
    }
    catch (Exception $e) {
        echo 'Виникла помилка: ',  $e->getMessage(), "\n";
    }
    return $keyValue;
}

function includeWithVariables($filePath, $variables = array(), $print = true)
{
    $output = NULL;
    if(file_exists($filePath)){
        // Extract the variables to a local namespace
        extract($variables);
        // Start output buffering
        ob_start();
        // Include the template file
        include $filePath;
        // End buffering and return its contents
        $output = ob_get_clean();
    }
    if ($print) {
        print $output;
    }
    return $output;
}



function renderPartial($filePath, $model = null, $print = true){
    //echo 'include' .  $filePath;
    $output = NULL;
    if(file_exists($filePath)){
        // Extract the variables to a local namespace
        extract(array('model' => $model));
        // Start output buffering
        ob_start();
        // Include the template file
        include $filePath;
        // End buffering and return its contents
        $output = ob_get_clean();
    }
    if ($print) {
        print $output;
    }
    return $output;
}

function Redirect($url, $permanent = false)
{
    header('Location: ' . $url, true, $permanent ? 301 : 302);

    exit();
}

$sid = session_id();
if ($sid==""){
    session_start();
    $sid = session_id();
}


$key = getSerialNumber();
$username = $_REQUEST['user'];
$password = $_REQUEST['password'];
$error = null;

if (!is_null($username) && !is_null($password)){
    //Авторизація
    $pwdHash = upwdHash($username);
    $userHash = md5($password);
    if ($pwdHash == $userHash){
        setcookie('user_id', $username);
        setcookie('user_passport', md5($username . $key . '1998'));
        unset($password);
        Redirect('/');
    }

} else {
    $username = $_COOKIE['user_id'];
    if (!is_null($username)){
        if($_COOKIE['user_passport']!= md5($username . $key . '1998')){
            $username = "";
            setcookie('user_id', '');
            setcookie('user_passport', '');
        }
    }
}




function upwdHash($userName){
    $pwdFileName = $_SERVER["DOCUMENT_ROOT"] . "/content/" . urlencode($userName) . ".usr";
    if (!file_exists($pwdFileName)){
        $error = "хибне імя користувача";
    } else {
        try{
            $pwdfile = fopen($pwdFileName, "r");
            $pwdHash = fread($pwdfile, filesize($pwdFileName));
            fclose($pwdfile);
            return $pwdHash;
        }
        catch (Exception $e) {
            $error = 'Виникла помилка: '.  $e->getMessage(). "\n";
        }
    }

    return "123";
}


?>