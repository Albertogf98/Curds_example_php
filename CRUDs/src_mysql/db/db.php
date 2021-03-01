<?php
class Conectar {
    public static function conexion(){
        try{
            $conexion = new mysqli("146.59.159.215","agf","12345agf", "Personas");
            $conexion->query("SET NAMES 'utf8'");
            return $conexion;
            ;
        } catch(PDOException $e){
            die("ERROR: Could not connect. " . $e->getMessage());
        }
    }
}
?>
<div class="open_grepper_editor" title="Edit & Save To Grepper"></div>
