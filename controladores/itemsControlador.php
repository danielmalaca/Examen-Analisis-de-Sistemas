<?php
function listar()
{
	//Incluye el modelo que corresponde
	require 'modelos/itemsModelo.php';

	
	//Le pide al modelo todos los items
	$items = buscarTodosLosItems($db);


	//Pasa a la vista toda la informaci�n que se desea representar
	require 'vistas/listar.php';
}

function agregar()
{
	echo 'Aqui incluiremos nuestro formulario para insertar items';

	require 'vistas/insertar.php';
}


function insertar()
{
  $item = $_POST['item'];

  echo $item;

}
?>