<?php


/**
 * tests short summary.
 *
 * tests description.
 *
 * @version 1.0
 * @author Віталік
 */

class cmdValue implements JsonSerializable {
    public function __construct(array $array) {
        $this->array = $array;
    }

    public function jsonSerialize() {
        return $this->array;
    }
}

class Board
{

    public $cmd;

    function isCommand($cmd){
        //$this->cmd = $cmd;
        $j = json_decode($cmd);
        //var_dump($j);
        if ($j->cmd == NULL) return false;
        $this->cmd = $j;
        return true;
        /*
        $values = urldecode($_GET["update"]);

        echo $values;

        var_dump(json_decode($values));
        var_dump(json_decode($values, true));

        //return;


        //ini_set('display_errors', true); error_reporting(E_ALL); // <- for debugging purposes only

        $socket=socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
        if ( !$socket ) {
        $errno = socket_last_error();
        $error = sprintf('%s (%d)', socket_strerror($errno), $errno);
        trigger_error($error, E_USER_ERROR);
        }

        if ( !socket_connect($socket, '127.0.0.1', 9001) ) {
        $errno = socket_last_error($socket);
        $error = sprintf('%s (%d)', socket_strerror($errno), $errno);
        trigger_error($error, E_USER_ERROR);
        }

        $buff='P\00\00\00\e5G\1f\b9\c6\acB\84\15\e7\b3*\17\ab\00G2\n\9c\ba{\a9}\dab"\c31\ed\f7\94\fc\aeX\ab\13\r/\02\ce\83f\bc?\96q\10M\b0\f4\a0\b1\95X\d0\85\10\df$|\de$\b4\f6m\a9\ff%Z\b4\d8\aa\da\bb';
        $length = strlen($buff);
        $sent = socket_write($socket, $buff, $length);
        if ( FALSE===$sent ) {
        $errno = socket_last_error($socket);
        $error = sprintf('%s (%d)', socket_strerror($errno), $errno);
        trigger_error($error, E_USER_ERROR);
        }
        else if ( $length!==$sent ) {
        $msg = sprintf('only %d of %d bytes sent', $length, $sent);
        trigger_error($msg, E_USER_NOTICE);
        }*/
    }

    function gpio_exec(){
        //if ($this->{$this->cmd->cmd}!=NULL) $this->{$this->cmd->cmd}(); else echo "Команда [" . $this->cmd->cmd . "] не визначена!";
        $this->set();
    }

    function set(){
        $socket=socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
        if ( !$socket ) {
            $errno = socket_last_error();
            $error = sprintf('%s (%d)', socket_strerror($errno), $errno);
            trigger_error($error, E_USER_ERROR);
        }
        echo "123";

        if ( !socket_connect($socket, '127.0.0.1', 8001) ) {
            $errno = socket_last_error($socket);
            $error = sprintf('%s (%d)', socket_strerror($errno), $errno);
            trigger_error($error, E_USER_ERROR);
        }

        $buff=json_encode(new cmdValue($this->cmd), JSON_PRETTY_PRINT);
        $length = strlen($buff);
        $sent = socket_write($socket, $buff, $length);
        if ( FALSE===$sent ) {
            $errno = socket_last_error($socket);
            $error = sprintf('%s (%d)', socket_strerror($errno), $errno);
            trigger_error($error, E_USER_ERROR);
        }
        else if ( $length!==$sent ) {
            $msg = sprintf('only %d of %d bytes sent', $length, $sent);
            trigger_error($msg, E_USER_NOTICE);
        }
    }
}


?>