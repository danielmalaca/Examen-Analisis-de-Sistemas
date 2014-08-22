<?php 
	
	require 'database.php';

	if ( !empty($_POST)) {
		// keep track validation errors
		$PrimerNombreError = null;
		$SegundoNombreError = null;
		$PrimerApellidoError = null;
		$SegundoApellidoError = null;
		
		// keep track post values
		$Primer_Nombre = $_POST['Primer_Nombre'];
		$Segundo_Nombre = $_POST['Segundo_Nombre'];
		$Primer_Apellido = $_POST['Primer_Apellido'];
		$Segundo_Apellido = $_POST['Segundo_Apellido'];
		// validate input
		$valid = true;
		if (empty($Primer_Nombre)) {
			$PrimerNombreError = 'Porfavos Ingrese el Primer Nombre';
			$valid = false;
		}
		
		if (empty($Segundo_Nombre)) {
			$SegundoNombreError = 'Porfavor Ingrese el Segundo Nombre';
			$valid = false;
		} 
		
		if (empty($Primer_Apellido)) {
			$PrimerApellidoError = 'Porfavor Ingrese el Primer Apellido';
			$valid = false;
		}
		

		if (empty($Segundo_Apellido)) {
			$SegundoApellidoError = 'Porfavor Ingrese el Segundo Apellido';
			$valid = false;
		}

		// insert data
		if ($valid) {
			$pdo = Database::connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql = "INSERT INTO catedratico(Primer_Nombre,Segundo_Nombre,Primer_Apellido,Segundo_Apellido) values(?, ?, ?, ?)";
			$q = $pdo->prepare($sql);
			$q->execute(array($Primer_Nombre,$Segundo_Nombre,$Primer_Apellido,$Segundo_Apellido));
			Database::disconnect();
			header("Location: CrearCatedratico.php");
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
		    			<h3>Crear un Catedratico</h3>
		    		</div>
    		
	    			<form class="form-horizontal" action="create.php" method="post">
					  <div class="control-group <?php echo !empty($PrimerNombreError)?'error':'';?>">
					    <label class="control-label">Primer Nombre</label>
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
					    <label class="control-label">Primer Apellido</label>
					    <div class="controls">
					      	<input name="Primer_Apellido" type="text"  placeholder="Primer Apellido" value="<?php echo !empty($Primer_Apellido)?$Primer_Apellido:'';?>">
					      	<?php if (!empty($PrimerApellidoError)): ?>
					      		<span class="help-inline"><?php echo $PrimerApellidoError;?></span>
					      	<?php endif;?>
					    </div>
					  </div>
					  <div class="control-group <?php echo !empty($SegundoApellidoError)?'error':'';?>">
					    <label class="control-label">Segundo Apellido</label>
					    <div class="controls">
					      	<input name="Segundo_Apellido" type="text"  placeholder="Segundo Apellido" value="<?php echo !empty($Segundo_Apellido)?$Segundo_Apellido:'';?>">
					      	<?php if (!empty($SegundoApellidoError)): ?>
					      		<span class="help-inline"><?php echo $SegundoApellidoError;?></span>
					      	<?php endif;?>
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