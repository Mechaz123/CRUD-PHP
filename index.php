<?php
    require_once 'logica/productos.php';
    
    $productos = new productos();
    $error=0;
    if(!empty($_POST['update'])){
        $update = new productos($_GET['id'], $_POST['codigo'], $_POST['producto'], $_POST['stock'], $_POST['valor_unidad'], $_POST['valor_total'], $_POST['fecha_ingreso']);
        $update -> actualizarProducto();
    }else if(!empty($_GET['id'])){
        $eliminar = new productos($_GET['id']);
        $eliminar -> eliminarProducto();
    }
    if(!empty($_POST['form'])){
        $validacion = new productos("", $_POST['codigo']);
        if((($_POST['stock']) * ($_POST['valor_unidad'])) > 1000000){
            
        }else if($validacion -> consultarCodigo()){
            $error = 2;
        }else{
            $registro = new productos("",  $_POST['codigo'], $_POST['producto'],  $_POST['stock'],  $_POST['valor_unidad'],  $_POST['valor_total'],  $_POST['fecha_ingreso']);
            $registro -> insertarProducto();
        }
    }
    
    $resultados = $productos -> consultarTodos();
?>
<html lang="es">
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
		<link rel ="stylesheet" type="text/CSS" href="css/style.css">
		<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
		<script type="text/javascript" src="js/script.js"></script>
	</head>
	<body>
		<div class="container">
			<h2 class="text-center">Nuevo Registro</h2>
			<?php 
			if($error == 2){
			    echo'<div class="alert alert-danger" role="alert">
                    !!!Ya existe este codigo, esta asignado !!!
                </div>';
			}
			?>
			<form action="index.php" method="post">
				<input type="hidden" id="form" name="form" value="form">
				<div class="form-group">
					<label>Codigo: </label>
					<input class="form-control"type="number" id="codigo" name="codigo" placeholder="codigo" required>
				</div>
				<div class="form-group">
					<label>Producto: </label>
					<input class="form-control"type="text" id="producto" name="producto" placeholder="producto">
				</div>
				<div class="form-group">
					<label>Stock: </label>
					<input class="form-control"type="number" id="stock" name="stock" placeholder="stock">
				</div>
				<div class="form-group">
					<label>Valor unidad: </label>
					<input class="form-control"type="number" id="valor_unidad" name="valor_unidad" placeholder="valor unidad">
				</div>
				<div class="form-group">
					<label>Valor total: </label>
					<input class="form-control"type="number" id="valor_total" name="valor_total" placeholder="valor total">
				</div>
				<div class="form-group">
					<label>Fecha ingreso: </label>
					<input class="form-control"type="datetime-local" id="fecha_ingreso" name="fecha_ingreso" placeholder="fecha ingreso">
				</div>
				<input class="btn btn-success" type ="submit" onclick="">
			</form>
		</div>
		<div id="tabla" class="container">
			<h2 class="text-center">Datos Registrados</h2>
			<table class="table">
				<thead class="thead-dark">
					<tr>
						<th>ID</th>
						<th>CODIGO</th>
						<th>PRODUCTO</th>
						<th>STOCK</th>
						<th>VALOR UNIDAD</th>
						<th>VALOR TOTAL</th>
						<th>FECHA INGRESO</th>
						<th colspan="2">Acciones</th>
					</tr>
				</thead>
				<tbody>
					<?php
					   for($i=0;$i<count($resultados);$i++){
					       echo "<tr>";
					       echo "<td>" . $resultados[$i] -> getId() . " </td>";
					       echo "<td>" . $resultados[$i] -> getCodigo() . " </td>";
					       echo "<td>" . $resultados[$i] -> getProducto() . "</td>";
					       echo "<td>" . $resultados[$i] -> getStock() . "</td>";
					       echo "<td>" . $resultados[$i] -> getValor_unidad() . "</td>";
					       echo "<td>" . $resultados[$i] -> getValor_total() . "</td>";
					       echo "<td>" . $resultados[$i] -> getFecha_registro() . "</td>";
					       echo '<td><a class ="btn btn-warning" href="Editar.php?id=' . $resultados[$i] -> getId() . '"> Editar</a></td>';
					       echo '<td><a class ="btn btn-danger" href="index.php?id=' . $resultados[$i] -> getId() . '"> Eliminar</a></td>';
					       echo "</tr>";
					   }
					?>
				</tbody>
			</table>
			<hr>
		</div>
	</body>
</html>