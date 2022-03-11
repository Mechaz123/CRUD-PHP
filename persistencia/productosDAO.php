<?php
class productosDAO{
    private $id;
    private $codigo;
    private $producto;
    private $stock;
    private $valor_unidad;
    private $valor_total;
    private $fecha_registro;
    
    public function productosDAO($idP="", $codigoP="", $productoP="", $stockP="", $valo_unidadP="", $valor_totalP="", $fecha_registroP=""){
        $this -> id = $idP;
        $this -> codigo = $codigoP;
        $this -> producto = $productoP;
        $this -> stock = $stockP;
        $this -> valor_unidad = $valo_unidadP;
        $this -> valor_total = $valor_totalP;
        $this -> fecha_registro = $fecha_registroP;
    }
    
    public function consultarTodos(){
        return "SELECT * FROM productos";
    }
    
    public function consultarCodigo(){
        return "SELECT * FROM productos WHERE codigo='" . $this -> codigo ."'";
    }
    
    public function insertarProducto(){
        return "INSERT INTO productos(codigo, producto, stock, valor_unidad, valor_total, fecha_registro)
        VALUES('". $this -> codigo . "' , '". $this -> producto . "' , '". $this -> stock . "' , '". $this -> valor_unidad . "' , '". $this -> valor_total . "' , '". $this -> fecha_registro . "');";
    }
    
    public function eliminarProducto(){
        return "DELETE FROM productos WHERE  id ='" . $this -> id ."';";
    }
    
    public function consultarporID(){
        return "SELECT * FROM productos WHERE id='" . $this -> id ."'";
    }
}
?>