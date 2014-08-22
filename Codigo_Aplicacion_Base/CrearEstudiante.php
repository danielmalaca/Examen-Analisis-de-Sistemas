<?php 
	
	require 'database.php';

	if ( !empty($_POST)) {
		// keep track validation errors
		$PrimerNombreError = null;
		$SegundoNombreError = null;
		$PrimerApellidoError = null;
		$SegundoApellidoError = null;
		$idDepartamentoError = null;
		$idTipoMatriculaError = null;
		$idSexoError = null;
		$FechaError = null;

		// keep track post values
		$Primer_Nombre = $_POST['Primer_Nombre'];
		$Segundo_Nombre = $_POST['Segundo_Nombre'];
		$Primer_Apellido = $_POST['Primer_Apellido'];
		$Segundo_Apellido = $_POST['Segundo_Apellido'];
		$idDepartamento = $_POST['idDepartamento'];
		$idTipoMatricula = $_POST['idTipoMatricula'];
		$idSexo = $_POST['idSexo'];
		$Fecha = $_POST['Fecha'];

		
		// validate input
		$valid = true;
		if (empty($Primer_Nombre)) {
			$PrimerNombreError = 'Porfavos Ingrese el Primer Nombre';
			$valid = false;
		}
				
		if (empty($Segundo_Nombre)) {
			$Segundo_Nombre = 'Porfavor Ingrese el Nivel Educativo';
			$valid = false;
		} 
		
		if (empty($Primer_Apellido)) {
			$PrimerApellidoError = 'Porfavos Ingrese el Primer Primer Apellido';
			$valid = false;
		}
				
		if (empty($Segundo_Apellido)) {
			$Segundo_Apellido = 'Porfavor Ingrese el Segundo Apellido';
			$valid = false;
		} 
		
		if (empty($idDepartamento)) {
			$idDepartamentoError = 'Porfavor Ingrese el id del Departamento';
			$valid = false;
		} 
		
		if (empty($idTipoMatricula)) {
			$idTipoMatriculaError = 'Porfavor Ingrese el Tipo de Matricula';
			$valid = false;
		} 
		
		if (empty($idSexo)) {
			$idSexoError = 'Porfavor Ingrese el Genero';
			$valid = false;
		} 
		
		if (empty($Fecha)) {
			$FechaError = 'Porfavor Ingrese la Fecha';
			$valid = false;
		} 
		

		// insert data
		if ($valid) {
			$pdo = Database::connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql = "INSERT INTO Estudiante (Primer_Nombre,Segundo_Nombre,Primer_Apellido,Segundo_Apellido,Departamento_idDepartamento,Tipo_Matricula_idTipo_Matricula,Sexo_idSexo,Fecha) values(?, ?, ?, ?, ?, ?, ?, ?)";
			$q = $pdo->prepare($sql);
			$q->execute(array($Primer_Nombre,$Segundo_Nombre,$Primer_Apellido,$Segundo_Apellido,$idDepartamento,$idTipoMatricula,$idSexo,$Fecha));
			Database::disconnect();
			header("Location: CrearEstudiante.php");
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
		    			<h3>Crear Estudiante</h3>
		    		</div>
    		
	    			<form class="form-horizontal" action="CrearEstudiante.php" method="post">
					  <div class="control-group <?php echo !empty($PrimerNombreError)?'error':'';?>">
					    <label class="control-label">Primer Nombre </label>
					    <div class="controls">
					      	<input name="Primer_Nombre" type="text"  placeholder="Primer Nombre" value="<?php echo !empty($Primer_Nombre)?$Primer_Nombre:'';?>">
					      	<?php if (!empty($PrimerNombreError)): ?>
					      		<span class="help-inline"><?php echo $PrimerNombreError;?></span>
					      	<?php endif; ?>
					    </div>
					  </div>
					  

					  <div class="control-group <?php echo !empty($SegundoNombreError)?'error':'';?>">
					    <label class="control-label">Segundo Nombre</label>
					    <div class="controls">
					      	<input name="Segundo_Nombre" type="text" placeholder="Segundo Nombre" value="<?php echo !empty($Segundo_Nombre)?$Segundo_Nombre:'';?>">
					      	<?php if (!empty($SegundoNombreError)): ?>
					      		<span class="help-inline"><?php echo $SegundoNombreError;?></span>
					      	<?php endif;?>
					    </div>
					  </div>

					  <div class="control-group <?php echo !empty($PrimerApellidoError)?'error':'';?>">
					    <label class="control-label">Primer Apellido </label>
					    <div class="controls">
					      	<input name="Primer_Apellido" type="text"  placeholder="Primer Apellido" value="<?php echo !empty($Primer_Apellido)?$Primer_Apellido:'';?>">
					      	<?php if (!empty($PrimerApellidoError)): ?>
					      		<span class="help-inline"><?php echo $PrimerApellidoError;?></span>
					      	<?php endif; ?>
					    </div>
					  </div>
					  

					  <div class="control-group <?php echo !empty($SegundoApellidoError)?'error':'';?>">
					    <label class="control-label">Segundo Apellido</label>
					    <div class="controls">
					      	<input name="Segundo_Apellido" type="text" placeholder="Segundo Apellido" value="<?php echo !empty($Segundo_Apellido)?$Segundo_Apellido:'';?>">
					      	<?php if (!empty($SegundoApellidoError)): ?>
					      		<span class="help-inline"><?php echo $SegundoApellidoError;?></span>
					      	<?php endif;?>
					    </div>
					  </div>

					  <div class="control-group <?php echo !empty($idDepartamentoError)?'error':'';?>">
					    <label class="control-label">Departamento</label>
					    <div class="controls">
					    	<select name= "idDepartamento" type="text"   value="<?php echo !empty($idDepartamento)?$idDepartamento:'';?>">
					       	<option value="0">Seleccione</option>
					       	<?php 
					   			$pdo = Database::connect();
					   			$sql = 'SELECT * FROM departamento';
	 				   			$q = $pdo->prepare($sql);
								$q->execute(array());
								do
								{
								echo'<option value ="'.$data['idDepartamento'].'">'.$data['idDepartamento'].' '.$data['Nombre'].'</option>';
					  			}
					  			while ($data = $q->fetch(PDO::FETCH_ASSOC));
					  			Database::disconnect();
					  		?>
					  	</select>
					  </div>
					  </div>

					  <div class="control-group <?php echo !empty($idTipoMatriculaError)?'error':'';?>">
					    <label class="control-label">Tipo Matricula</label>
					    <div class="controls">
					    	<select name= "idTipoMatricula" type="text"   value="<?php echo !empty($idTipoMatricula)?$idTipoMatricula:'';?>">
					       	<option value="0">Seleccione</option>
					       	<?php 
					   			$pdo = Database::connect();
					   			$sql = 'SELECT * FROM tipo_matricula';
	 				   			$q = $pdo->prepare($sql);
								$q->execute(array());
								do
								{
								echo'<option value ="'.$data['idTipo_Matricula'].'">'.$data['idTipo_Matricula'].' '.$data['Desripcion'].'</option>';
					  			}
					  			while ($data = $q->fetch(PDO::FETCH_ASSOC));
					  			Database::disconnect();
					  		?>
					  	</select>
					  </div>
					  </div>

					  <div class="control-group <?php echo !empty($idSexoError)?'error':'';?>">
					    <label class="control-label">Genero</label>
					    <div class="controls">
					    	<select name= "idSexo" type="text"  value="<?php echo !empty($idSexo)?$idSexo:'';?>">
					       	<option value="0">Seleccione</option>
					       	<?php 
					   			$pdo = Database::connect();
					   			$sql = 'SELECT * FROM Sexo';
	 				   			$q = $pdo->prepare($sql);
								$q->execute(array());
								do
								{
								echo'<option value ="'.$data['idSexo'].'">'.$data['idSexo'].' '.$data['Descripcion'].'</option>';
					  			}
					  			while ($data = $q->fetch(PDO::FETCH_ASSOC));
					  			Database::disconnect();
					  		?>
					  	</select>
					  </div>
					  </div>

					 <div class="control-group <?php echo !empty($FechaError)?'error':'';?>">
					    <label class="control-label">Fecha </label>
					    <div class="controls">
					      	<input name="Fecha" type="date"  placeholder="Fecha" value="<?php echo !empty($Fecha)?$Fecha:'';?>">
					      	<?php if (!empty($FechaError)): ?>
					      		<span class="help-inline"><?php echo $FechaError;?></span>
					      	<?php endif; ?>
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