<?php
/**
 * tests short summary.
 *
 * tests description.
 *
 * @version 1.0
 * @author Віталік
 */

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
    }

    function gpio_exec(){
		//echo "gpio_exec";
        if ($this->cmd->cmd=="set") {
            echo $this->cmd_set();
        } else if ($this->cmd->cmd=="get"){
			echo $this->cmd_get();
		} else
            echo "Команда [" . $this->cmd->cmd . "] не визначена!";
    }

    function cmd_set(){

        $buff=json_encode(get_object_vars($this->cmd), JSON_PRETTY_PRINT);
        //var_dump($buff);
		return $this->sendCommand($buff);
    }

	function cmd_get()
	{
        $_cmd->cmd = "get";
		return $this->sendCommand(json_encode($_cmd));
	}

	function sendCommand($cmd_to_send){
        try{
            $socket=socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
            if ( !$socket ) {
                $errno = socket_last_error();
                $error = sprintf('%s (%d)', socket_strerror($errno), $errno);
                trigger_error($error, E_USER_ERROR);
            }

            if ( !socket_connect($socket, '127.0.0.1', 8001) ) {
                $errno = socket_last_error($socket);
                $error = sprintf('%s (%d)', socket_strerror($errno), $errno);
                trigger_error($error, E_USER_ERROR);
            }

            $length = strlen($cmd_to_send);
            $sent = socket_write($socket, $cmd_to_send, $length);

            if ( FALSE===$sent ) {
                $errno = socket_last_error($socket);
                $error = sprintf('%s (%d)', socket_strerror($errno), $errno);
                trigger_error($error, E_USER_ERROR);
            }
            else if ( $length!==$sent ) {
                $msg = sprintf('only %d of %d bytes sent', $length, $sent);
                trigger_error($msg, E_USER_NOTICE);
            }
            $revived = "";

			while ($out = socket_read($socket, 2048)){
				$revived = $revived . $out;
			}
			return $revived;

        }
        catch (Exception $e) {
            echo 'Виникла помилка: ',  $e->getMessage(), "\n";
        }
        
        return "";
	}
}


?>