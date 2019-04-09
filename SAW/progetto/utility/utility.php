<?php
//session_start();
    function getimg(){
        if(isset($_SESSION['path'])){
            return $_SESSION['path'];
        }else{
            return 'img/man5.jpg';
        }
    }
    function print_array($array){
        if(is_array($array)) {
            $res = "";
            foreach ($array as $value)
                $res .= $value;
            return $res;
        }
        return $array;
    }
?>
