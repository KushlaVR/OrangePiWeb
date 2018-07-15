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


?>