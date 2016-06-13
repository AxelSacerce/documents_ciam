<?php
	require_once('cl_libraryConstants.php');
	
	class cl_GENInsuredCertification extends cl_libraryConstants
	{
		var $exception = NULL;
		var $fileGenerated = false;
		
		function generateFile($InsuredCertification)
		{
			$fileName = $this->prefixInsuredCertification.'-'.date('Ymd-His') . '.txt';
			try
			{
				$this->exception = NULL;
				if (!file_exists($this->targetFolder)) mkdir($this->targetFolder);
				
				// INICIO DE GENERACIÓN DE ARCHIVO... 
				$f = fopen($this->targetFolder . '/' . $fileName, 'w');				
					fwrite($f, $this->getTextHeaderToWrite('INSURED CERTIFICATION: '.$InsuredCertification->certNumber));
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
	}
?>