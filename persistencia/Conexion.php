<?php
class Conexion{
    private $mysqli;
    private $resultado;
    
    public function abrir(){
        $this -> mysqli = new mysqli("127.0.0.1", "root", "", "proyecto", 3307);
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