<?php
require_once 'logica/productos.php';

$producto = new productos($_GET['id']);
$producto -> consultarporID();
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
			<h2 class="text-center"><a class="btn btn-danger" href="index.php">Volver</a> Editar Registro</h2>
			<form action=<?php echo "index.php?id=" . $producto -> getId()?> method="post">
				<input type="hidden" id="update" name="update" value="update">
				<div class="form-group">
					<label>Codigo: </label>
					<input class="form-control"type="number" id="codigo" name="codigo" placeholder="codigo" required value=<?php echo '"' . $producto -> getCodigo() . '"'?>>
				</div>
				<div class="form-group">
					<label>Producto: </label>
					<input class="form-control"type="text" id="producto" name="producto" placeholder="producto" value=<?php echo '"' . $producto -> getProducto() . '"'?>>
				</div>
				<div class="form-group">
					<label>Stock: </label>
					<input class="form-control"type="number" id="stock" name="stock" placeholder="stock" value=<?php echo '"' . $producto -> getStock() . '"'?>>
				</div>
				<div class="form-group">
					<label>Valor unidad: </label>
					<input class="form-control"type="number" id="valor_unidad" name="valor_unidad" placeholder="valor unidad" value=<?php echo '"' . $producto -> getValor_unidad() . '"'?>>
				</div>
				<div class="form-group">
					<label>Valor total: </label>
					<input class="form-control"type="number" id="valor_total" name="valor_total" placeholder="valor total" value=<?php echo '"' . $producto -> getValor_total() . '"'?>>
				</div>
				<div class="form-group">
					<label>Fecha ingreso:</label>
					<input class="form-control"type="datetime-local" id="fecha_ingreso" name="fecha_ingreso" placeholder="fecha ingreso" value=<?php echo '"' . $producto -> getFecha_registro() . '"'?>>
				</div>
				<input class="btn btn-success" type ="submit">
			</form>
		</div>
	</body>
</html>