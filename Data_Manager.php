<?php
    class Data_Manager{

        public static function savePlayer($id, $obj){
            $objData = serialize(($obj)); //Convert Object to String
            $fp = fopen('db/player_'.$id.'.txt', "w");
            fwrite($fp, $objData);
            fclose($fp);
        }

        public static function loadPlayer($id){
            $objData = file_get_contents('db/player_'.$id.'.txt');
            $obj = unserialize($objData);
            return $obj;
        }
    }
?>