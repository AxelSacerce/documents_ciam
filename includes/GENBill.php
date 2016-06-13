<?php

    //include autoloader
	require_once('dompdf/autoload.inc.php');

	use Dompdf\Dompdf;

	ob_start();
    
    //Se genera la factura en formato pdf
    $tfac= include 'documents/bill.php';
    
    $html = ob_get_clean();

    //exit('hello: ' . $html);
    
     if(strpos($tfac,'fact') != false){
     	
     	$typePrint ='fact';
     }else{
     	$typePrint ='bill';
     }
     
    $name = date('Ymd-His').'-'.$typePrint;

    $dompdf = new DOMPDF();
    $dompdf->set_paper('letter', 'portrait' );
    $dompdf->load_html($html);
    $dompdf->render();
    $dompdf->stream($name);

	/*
	require_once('cl_libraryConstants.php');
	
	class cl_GENBill extends cl_libraryConstants
	{
		var $exception = NULL;
		var $fileGenerated = false;
		
		function generateFile($bill)
		{
			$fileName = $this->prefixBill.'-'.date('Ymd-His') . '.txt';
			try
			{
				$this->exception = NULL;
				if (!file_exists($this->targetFolder)) mkdir($this->targetFolder);
				
				// INICIO DE GENERACIÓN DE ARCHIVO... 
				$f = fopen($this->targetFolder . '/' . $fileName, 'w');				
					fwrite($f, $this->getTextHeaderToWrite('BILL: '.$bill->billUniqueIdentificationNumber));
				fclose($f);
				// FINAL DE GENERACIÓN DE ARCHIVO... 
			}
			catch(Exception $ex)
			{
				$this->exception = $ex;
				return '';
			}
			
			return $fileName;
		}
	}*/
?>