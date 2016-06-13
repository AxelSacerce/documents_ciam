<?php
	include('includes/Bill.php');
	include('includes/GENBill.php');

	// Instancia de clase "FACTURA" que PCID rellenará de alguna forma
	$param = new cl_bill(
							$resolutionNumber = 'RES-MD5-3EBCEDD',
							$resolutionDate = '2016-01-02',
							$resolutionRangeStart = '1',
							$resolutionRangeEnd = '100000',
							
							$billSeries = 'A',
							$billNumber = rand(1, 100000),
							$billUniqueIdentificationNumber = 'UID-'.$billNumber.'-'.substr(md5($billNumber), 0, 5),
							$billDate = 'XDATE',
							$billSubtotal = '390',
							$billDiscount = '10',
							$billTotalValueAddedTax = '45.6',
							$billTotal = '425.6',
							$billTotalInLetters = 'Cuatrocientos veinticincon con 60/100',
							
							$sellerTaxId = '8070299-6',
							$sellerBusinessName = 'Centro Integral de Atención Médica, S.A.',
							$sellerTradeName = 'Centro Integral de Atención Médica, S.A.',
							$sellerAddress = '21 avenida y 7ma calle 4-32 zona 11 Local L7-07',
							
							$buyerTaxId = '1234567-8',
							$buyerBusinnesName = 'JUAN PÉREZ',
							$buyerPatientName = 'JUANITO PÉREZ',
							$buyerAddress = '1 calle 2-30 zona 1',
							$buyerPhone = '8765-4321',
							
							$taxDataSign = 'SIGN-MD5-EFDEFD',
							$taxDataGFACE = 'EMPRESA CONSOLIDADA DE INVERSIONES, SOCIEDAD ANÓNIMA NIT: 67337-4'
						);

	$addedValueTax = 0.12;
	$quantity = 1; $amount = 250; $param->addDetailItem($quantity, '', 'Consulta médica', $amount, ($quantity * $amount), ($quantity * $amount * (1 + $addedValueTax)));
	$quantity = 1; $amount = 120; $param->addDetailItem($quantity, '', 'Insumos', $amount, ($quantity * $amount), ($quantity * $amount * (1 + $addedValueTax)));
	$quantity = 2; $amount = 10; $param->addDetailItem($quantity, '', 'Aplicación de medicamento inyectado', $amount, ($quantity * $amount), ($quantity * $amount * (1 + $addedValueTax)));
	

	// Instancia del generador de PDFs de FACTURAS
	$generator = new cl_GENBill();
	
	// Se envía como parámetro la instancia de "FACTURA" que PCID rellenó de alguna forma
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