<?php	
	include('includes/InsuredCertification.php');
	include('includes/GENInsuredCertification.php');

	echo 'EST&Aacute; EN DESARROLLO ESTO TODAV&Iacute;A...'; die();
	// Instancia de clase "CERTIFICADO DE ASEGURADO" que PCID rellenará de alguna forma
	$param = new cl_insuredCertification();

	// Instancia del generador de PDFs de CERTIFICADOS DE ASEGURADOS
	$generator = new cl_GENInsuredCertification();
	
	// Se envía como parámetro la instancia de "CERTIFICADO DE ASEGURADO" que PCID rellenó de alguna forma
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