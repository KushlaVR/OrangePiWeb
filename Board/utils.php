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
    public $custom;
    public $footer;
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