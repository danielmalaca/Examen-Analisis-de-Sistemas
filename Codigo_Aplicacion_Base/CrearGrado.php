<?php 
	
	require 'database.php';

	if ( !empty($_POST)) {
		// keep track validation errors
		$Nombre_GradoError= null;
		$idCatedraticoError = null;
		$idNivelEducativoError = null;

		// keep track post values
		$Nombre_Grado = $_POST['Nombre_Grado'];
		$idCatedratico = $_POST['Catedratico_idCatedratico'];
		$idNivelEducativo = $_POST['Nivel_Educativo_idNivel_Educativo'];
		
		// validate input
		$valid = true;
		if (empty($Nombre_Grado)) {
			$Nombre_GradoError = 'Porfavos Ingrese el Primer Nombre';
			$valid = false;
		}
		
		if (empty($idCatedratico)) {
			$idCatedraticoError = 'Porfavor Ingrese el Segundo Nombre';
			$valid = false;
		} 
		
		if (empty($idNivelEducativo)) {
			$idNivelEducativo = 'Porfavor Ingrese el Nivel Educativo';
			$valid = false;
		} 
		
		// insert data
		if ($valid) {
			$pdo = Database::connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql = "INSERT INTO Grado (Nombre_Grado,Catedratico_idCatedratico,Nivel_Educativo_idNivel_Educativo) values(?, ?, ?)";
			$q = $pdo->prepare($sql);
			$q->execute(array($Nombre_Grado,$idCatedratico,$idNivelEducativo));
			Database::disconnect();
			header("Location: CrearGrado.php");
		}
	}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link   href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>
</head>

<body>
    <div class="container">
    
    			<div class="span10 offset1">
    				<div class="row">
		    			<h3>Crear Catedratico</h3>
		    		</div>
    		
	    			<form class="form-horizontal" action="CrearGrado.php" method="post">
					  <div class="control-group <?php echo !empty($Nombre_GradoError)?'error':'';?>">
					    <label class="control-label">Nombre Grado</label>
					    <div class="controls">
					      	<input name="Nombre_Grado" type="text"  placeholder="Nombre Grado" value="<?php echo !empty($Nombre_Grado)?$Nombre_Grado:'';?>">
					      	<?php if (!empty($Nombre_GradoError)): ?>
					      		<span class="help-inline"><?php echo $Nombre_GradoError;?></span>
					      	<?php endif; ?>
					    </div>
					  </div>
					  

					  <div class="control-group <?php echo !empty($idCatedraticoError)?'error':'';?>">
					    <label class="control-label">Catedratico</label>
					    <div class="controls">
					    	<select name= "Catedratico_idCatedratico" type="text"  placeholder="ID Catedratico" value="<?php echo !empty($idCatedratico)?$idCatedratico:'';?>">
					       	<option value="0">Seleccione</option>
					       	<?php 
					   			$pdo = Database::connect();
					   			$sql = 'SELECT * FROM catedratico';
	 				   			$q = $pdo->prepare($sql);
								$q->execute(array());
								do
								{
								echo'<option value ="'.$data['idCatedratico'].'">'.$data['idCatedratico'].' '.$data['Primer_Nombre'].' '.$data['Primer_Apellido'].' '.$data['Segundo_Apellido'].'</option>';
					  			}
					  			while ($data = $q->fetch(PDO::FETCH_ASSOC));
					  			Database::disconnect();
					  		?>
					  	</select>
					  </div>
					  </div>

					 <div class="control-group <?php echo !empty($idNivelEducativoError)?'error':'';?>">
					    <label class="control-label">Nivel Educativo</label>
					    <div class="controls">
					    	<select name= "Nivel_Educativo_idNivel_Educativo" type="text"   value="<?php echo !empty($idNivelEducativo)?$idNivelEducativo:'';?>">
					       	<option value="0">Seleccione</option>
					       	<?php 
					   			$pdo = Database::connect();
					   			$sql = 'SELECT * FROM Nivel_Educativo';
	 				   			$q = $pdo->prepare($sql);
								$q->execute(array());
								do
								{
								echo'<option value ="'.$data['idNivel_Educativo'].'">'.$data['idNivel_Educativo'].' '.$data['Descripcion'].'</option>';
					  			}
					  			while ($data = $q->fetch(PDO::FETCH_ASSOC));
					  			Database::disconnect();
					  		?>
					  	</select>
					  </div>
					  </div>
					  




					  <div class="form-actions">
						  <button type="submit" class="btn btn-success">Crear</button>
						  <a class="btn" href="index.php">Atras</a>
						</div>
					</form>
				</div>
				
    </div> <!-- /container -->
  </body>
</html>