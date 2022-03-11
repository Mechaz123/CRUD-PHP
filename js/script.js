function validar(){
	let stock = document.getElementById("stock").value;
	let valor_unidad = document.getElementById("valor_unidad").value;
	if((stock * valor_unidad) > 1000000){
		alert("!!! Advertencia, cantidad superior a 1.000.000");
	}
}