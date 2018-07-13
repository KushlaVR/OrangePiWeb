<?php 
    function __autoload($class_name) {
        require_once $class_name . '.php';
    }
    __autoload('Board');
    

    try {
        $values = urldecode($_GET["cmd"]);
        if ($values!=NULL){
            $board = new Board;
            if ($board->isCommand($values)){
                //var_dump($board);
                $board->gpio_exec();
            }
        }
    }
    catch (Exception $e) {
        echo 'Виникла помилка: ',  $e->getMessage(), "\n";
    }

    $ui = urldecode($_GET["ui"]);
    if ($ui=="false"){
        return;
    }
?>