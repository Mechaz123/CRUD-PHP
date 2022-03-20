<?php
require_once 'persistencia/Conexion.php';
require_once 'persistencia/productosDAO.php';

class productos{
    private $id;
    private $codigo;
    private $producto;
    private $stock;
    private $valor_unidad;
    private $valor_total;
    private $fecha_registro;
    private $conexion;
    private $productosDAO;
    
    public function productos($idP="", $codigoP="", $productoP="", $stockP="", $valo_unidadP="", $valor_totalP="", $fecha_registroP=""){
        $this -> id = $idP;
        $this -> codigo = $codigoP;
        $this -> producto = $productoP;
        $this -> stock = $stockP;
        $this -> valor_unidad = $valo_unidadP;
        $this -> valor_total = $valor_totalP;
        $this -> fecha_registro = $fecha_registroP;
        $this -> conexion = new Conexion();
        $this -> productosDAO = new productosDAO($idP, $codigoP, $productoP, $stockP, $valo_unidadP, $valor_totalP, $fecha_registroP);
    }
    
    public function getId()
    {
        return $this->id;
    }

    public function getCodigo()
    {
        return $this->codigo;
    }

    public function getProducto()
    {
        return $this->producto;
    }

    public function getStock()
    {
        return $this->stock;
    }

    public function getValor_unidad()
    {
        return $this->valor_unidad;
    }

    public function getValor_total()
    {
        return $this->valor_total;
    }

    public function getFecha_registro()
    {
        return $this->fecha_registro;
    }

    public function getConexion()
    {
        return $this->conexion;
    }

    public function getProductosDAO()
    {
        return $this->productosDAO;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setCodigo($codigo)
    {
        $this->codigo = $codigo;
    }

    public function setProducto($producto)
    {
        $this->producto = $producto;
    }

    public function setStock($stock)
    {
        $this->stock = $stock;
    }

    public function setValor_unidad($valor_unidad)
    {
        $this->valor_unidad = $valor_unidad;
    }

    public function setValor_total($valor_total)
    {
        $this->valor_total = $valor_total;
    }

    public function setFecha_registro($fecha_registro)
    {
        $this->fecha_registro = $fecha_registro;
    }

    public function setConexion($conexion)
    {
        $this->conexion = $conexion;
    }

    public function setProductosDAO($productosDAO)
    {
        $this->productosDAO = $productosDAO;
    }
    
    public function consultarTodos(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> productosDAO -> consultarTodos());
        $filas = $this -> conexion -> numFilas();
        $registros = array();
        for($i=0;$i<$filas;$i++){
            $datos = $this -> conexion -> extraer();
            $registros[$i] = new productos($datos[0], $datos[1], $datos[2], $datos[3], $datos[4], $datos[5], $datos[6]);
        }
        $this -> conexion -> cerrar();
        return $registros;
    }
    
    public function consultarCodigo(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> productosDAO -> consultarCodigo());
        if(($this -> conexion -> numFilas()) != NULL){
            return true;
            $this -> conexion -> cerrar();
        }else{
            return false;
            $this -> conexion -> cerrar();
        }
    }
    
    public function insertarProducto(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> productosDAO -> insertarProducto());
        $this -> conexion -> cerrar();
    }
    public function eliminarProducto(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> productosDAO -> eliminarProducto());
        $this -> conexion -> cerrar();
    }
    
    public function consultarporID(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> productosDAO ->consultarporID());
        $datos = $this -> conexion ->extraer();
        $this -> conexion -> cerrar();
        $this -> id = $datos[0];
        $this -> codigo = $datos[1];
        $this -> producto = $datos[2];
        $this -> stock = $datos[3];
        $this -> valor_unidad = $datos[4];
        $this -> valor_total = $datos[5];
        $this -> fecha_registro = $datos[6];
    }
    
    public function actualizarProducto(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> productosDAO -> actualizarProducto());
        $this -> conexion -> cerrar();
    }

}