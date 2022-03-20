<?php
class Conexion{
    private $mysqli;
    private $resultado;
    
    public function abrir(){
        $this -> mysqli = new mysqli("mysql-mechaz123.alwaysdata.net", "mechaz123", "N.YMFFv_.8MQG9n", "mechaz123_proyecto");
        $this -> mysqli -> set_charset("utf8");
    }
    
    public function ejecutar($sentencia){
        $this -> resultado = $this -> mysqli -> query($sentencia);
    }
    
    public function extraer(){
        return $this -> resultado ->fetch_row();
    }
    
    public function numFilas(){
        if($this -> resultado!=null){
            return $this -> resultado -> num_rows;
        }else{
            return 0;
        }
    }
    
    public function cerrar(){
        $this -> mysqli -> close();
    }
}
?>