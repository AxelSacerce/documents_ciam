<?php	
	include('includes/MedicalRecipe.php');
	include('includes/GENMedicalRecipe.php');

	// Instancia de clase "RECETA MÉDICA" que PCID rellenará de alguna forma
	$param = new cl_medicalRecipe(
						date('Y-m-d'), 
						'JUAN PÉREZ', '101010101', 
						'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio.'
							."\r\n".'Quisque volutpat mattis eros. Nullam malesuada erat ut turpis.'
							."\r\n".'Suspendisse urna nibh, viverra non, semper suscipit, posuere a, pede.',
						'Doctor X',
						'Oftalmología',
						'99993333');
							
	$param->addMedicine('Ibuprofeno 800mg', 'Pastilla', '1', 'c/8 horas', '2 días');
	$param->addMedicine('Omeprazol', 'Píldora', '1', 'c/24 horas', '14 días');
	$param->addMedicine('Killer ACME', 'Pastilla', '1', 'c/12 horas', '10 días');
	
	$param->addValidity('Ibuprofeno 800mg', 'R1', 'R2', '-');
	$param->addValidity('Kille ACME', '-', '-', '-');

	// Instancia del generador de PDFs de RECETAS MÉDICAS	
	$generator = new cl_GENMedicalRecipe();
	
	// Se envía como parámetro la instancia de "RECETA MÉDICA" que PCID rellenó de alguna forma
	$generatedFile =  $generator->generateFile($param);
	
	// PCID tomará el nombre de archivo generado y lo enviará a BAYMAX a partir de aquí.
	// De momento en este ejemplo solo se muestra el nombre del archivo que se generó.
	echo 'Location: ' . $generator->targetFolder . '/' . $generatedFile;
	echo '<hr/>';
	
	// Se muestra el contenido del archivo generado en este ejemplo
	echo '<textarea readonly="readonly" style="width:90%; height:90%; display:block; background-color:#333; color:#FFF; padding:5px 5px 5px 5px;">'
		. utf8_decode(file_get_contents ($generator->targetFolder . '/' . $generatedFile))
		. '</textarea>';
	
?>