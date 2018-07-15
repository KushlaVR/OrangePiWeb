<?php
function __autoload($class_name) {
    require_once $class_name . '.php';
}

$values = urldecode($_POST["cmd"]);
if ($values!=NULL)
{
    if (!file_exists($_SERVER["DOCUMENT_ROOT"] . '/content/socked-disabled.json')){
        __autoload('Board');
        try {
            $board = new Board;
            if ($board->isCommand($values)){
                $board->gpio_exec();
            }

        }
        catch (Exception $e) {
            echo 'Виникла помилка: ',  $e->getMessage(), "\n";
        }
    } else {
        echo $values;
    }
}

?>
