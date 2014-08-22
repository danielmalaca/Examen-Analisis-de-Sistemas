<?php 
	require 'database.php';


	if ( !empty($_POST)) {
		// keep track validation errors
		$idCatedraticoError = null;
		$idNivelEducativoError = null;
		$idGradoError = null;
		$idSexoError = null;
		$idDepartamentoError = null;
		$idTipoMatriculaError = null;
		$FechaError = null;


		// keep track post values
		$Fecha = $_POST['Fecha'];
		$idGrado = $_POST['Grado_idGrado'];
		$idCatedratico = $_POST['Grado_Catedratico_idCatedratico'];
		$idNivelEducativo = $_POST['Grado_Nivel_Educativo_idNivel_Educativo'];
		$idEstudiante = $_POST['Estudiante_idEstudiante'];
		$idDepartamento = $_POST['Estudiante_Departamento_idDepartamento'];
		$idTipoMatricula = $_POST['Estudiante_Tipo_Matricula_idTipo_Matricula'];
		$idSexo = $_POST['Estudiante_Sexo_idSexo'];
		
		// validate input
		$valid = true;
		
		if (empty($Fecha)) {
			$FechaError = 'Porfavor Ingrese la Fecha';
			$valid = false;
		} 
		

		if (empty($idGrado)) {
			$idGradoError = 'Porfavos Ingrese el Grado';
			$valid = false;
		}
		
		if (empty($idCatedratico)) {
			$idCatedraticoError = 'Porfavos Ingrese el id del Catedratico';
			$valid = false;
		}
				
		if (empty($idNivelEducativo)) {
			$idNivelEducativoError = 'Porfavor Ingrese el Nivel Educativo';
			$valid = false;
		} 
		
		if (empty($idEstudiante)) {
			$idEstudianteError = 'Porfavor Ingrese el id del Estudiante';
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

		
		

		// insert data
		if ($valid) {
			$pdo = Database::connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql = "INSERT INTO Matricula (Fecha,Grado_idGrado,Grado_Catedratico_idCatedratico,Grado_Nivel_Educativo_idNivel_Educativo,Estudiante_idEstudiante,Estudiante_Departamento_idDepartamento,Estudiante_Tipo_Matricula_idTipo_Matricula,Estudiante_Sexo_idSexo) values(?, ?, ?, ?, ?, ?, ?, ?)";
			$q = $pdo->prepare($sql);
			$q->execute(array($Fecha,$idGrado,$idCatedratico,$idNivelEducativo,$idEstudiante,$idDepartamento,$idTipoMatricula,$idSexo));
			Database::disconnect();
			header("Location: CrearMatricula.php");
		}
	}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link   href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>
	<script type="text/javascript" language="javascript" src="js/ajax.js"></script>	
	<STYLE>
	.invisible { display:none }
	</STYLE>

</head>

<body>
    <div class="container">
    
    			<div class="span10 offset1">
    				<div class="row">
		    			<h3>Crear Matricula</h3>
		    		</div>
    		
	    			<form name="form1" class="form-horizontal" action="CrearMatricula.php" method="post">
					 
					 <div class="control-group <?php echo !empty($FechaError)?'error':'';?>">
					    <label class="control-label">Fecha </label>
					    <div class="controls">
					      	<input name="Fecha" type="date"  placeholder="Fecha" value="<?php echo !empty($Fecha)?$Fecha:'';?>">
					      	<?php if (!empty($FechaError)): ?>
					      		<span class="help-inline"><?php echo $FechaError;?></span>
					      	<?php endif; ?>
					    </div>
					 </div>

					
						<div class="control-group <?php echo !empty($idCatedraticoError)?'error':'';?>">
					    	<label class="control-label">Catedratico</label>
					    	<div class="controls">
					    		<select name= "Grado_Catedratico_idCatedratico" type="text"  value="<?php echo !empty($idCatedratico)?$idCatedratico:'';?>">
					       		<option value="0">Seleccione</option>
					       		<?php 
					   				$pdo = Database::connect();
					   				$sql = 'SELECT * FROM Catedratico';
	 				   				$q = $pdo->prepare($sql);
									$q->execute(array());
									do
									{
									echo'<option value ="'.$data['idCatedratico'].'">'.$data['idCatedratico'].' '.$data['Primer_Nombre'].' '.$data['Segundo_Nombre'].' '.$data['Primer_Apellido'].'</option>';
					  				}
					  				while ($data = $q->fetch(PDO::FETCH_ASSOC));
					  				Database::disconnect();
					  			?>
					  			</select>
					  		</div>
					  	</div>


						<div class="control-group <?php echo !empty($idGradoError)?'error':'';?>">
					    	<label class="control-label">Grado</label>
					    	<div class="controls">
					    		<select name= "Grado_idGrado" type="text"  value="<?php echo !empty($idGrado)?$idGrado:'';?>">
					       		<option value="0">Seleccione</option>
					       		<?php 
					   				$pdo = Database::connect();
					   				$sql = 'SELECT * FROM Grado';
	 				   				$q = $pdo->prepare($sql);
									$q->execute(array());
									do
									{
									echo'<option value ="'.$data['idGrado'].'">'.$data['idGrado'].' '.$data['Nombre_Grado'].'</option>';
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
					    		<select name= "Grado_Nivel_Educativo_idNivel_Educativo" type="text"  value="<?php echo !empty($idNivelEducativo)?$idNivelEducativo:'';?>">
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


						<div class="control-group <?php echo !empty($idEstudianteError)?'error':'';?>">
					    <label class="control-label">Estudiante</label>
					    <div class="controls">
					    	<select name= "Estudiante_idEstudiante" type="text"  placeholder="ID Catedratico" value="<?php echo !empty($idEstudiante)?$idEstudiante:'';?>" >
					       	<option value="0">Seleccione</option>
					       	<?php 
					   			$pdo = Database::connect();
					   			$sql = 'SELECT * FROM Estudiante';
	 				   			$q = $pdo->prepare($sql);
								$q->execute(array());
								do
								{
								echo'<option value ="'.$data['idEstudiante'].'">'.$data['idEstudiante'].' '.$data['Primer_Nombre'].''.$data['Primer_Apellido'].'</option>';
					  			}
					  			while ($data = $q->fetch(PDO::FETCH_ASSOC));
					  			Database::disconnect();
					  		?>
					  	</select>
					  </div>
					  </div>



						<div class="control-group <?php echo !empty($idDepartamentoError)?'error':'';?>">
					    <label class="control-label">Departamento</label>
					    <div class="controls">
					    	<select name= "Estudiante_Departamento_idDepartamento" type="text"  placeholder="ID Catedratico" value="<?php echo !empty($idDepartamento)?$idDepartamento:'';?>" >
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
					    <label class="control-label">ID Tipo Matricula</label>
					    <div class="controls">
					    	<select name= "Estudiante_Tipo_Matricula_idTipo_Matricula" type="text"  placeholder="Seleccione" value="<?php echo !empty($idTipoMatricula)?$idTipoMatricula:'';?>" >
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
					    <label class="control-label">ID Sexo</label>
					    <div class="controls">
					    	<select name= "Estudiante_Sexo_idSexo" type="text"  placeholder="1.Masculino 2.Femenino" value="<?php echo !empty($idSexo)?$idSexo:'';?>">
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




					  <div class="form-actions">
						  <button type="submit" class="btn btn-success">Crear</button>
						  <a class="btn" href="index.php">Atras</a>
					   </div>
					</form>
				</div>
				
    </div> <!-- /container -->
  </body>
</html>