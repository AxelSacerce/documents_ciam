<?php
	require_once('cl_libraryConstants.php');
	
	class cl_GENMedicalRecipe extends cl_libraryConstants
	{
		var $exception = NULL;
		var $fileGenerated = false;
		
		function generateFile($medicalRecipe)
		{
			$fileName = $this->prefixMedicalRecipe.'-'.date('Ymd-His') . '.txt';
			try
			{
				$this->exception = NULL;
				if (!file_exists($this->targetFolder)) mkdir($this->targetFolder);
				
				// INICIO DE GENERACIÓN DE ARCHIVO... 
				$f = fopen($this->targetFolder . '/' . $fileName, 'w');
				
					fwrite($f, $this->getTextHeaderToWrite('ENCABEZADO'));							
						fwrite($f, 'Fecha: '.$medicalRecipe->recipeDate."\r\n");
						fwrite($f, 'Paciente: '.$medicalRecipe->patient."\r\n");
						fwrite($f, 'Código de barras: '.$medicalRecipe->barCode."\r\n");
					fwrite($f, "\r\n");
					
					fwrite($f, $this->getTextHeaderToWrite('MEDICINAS'));
						foreach($medicalRecipe->medicines as $item) fwrite($f, $item->medicine . ' :: ' . $item->presentation . ' :: ' . $item->dose . ' :: ' . $item->frequency . ' :: ' . $item->duration ."\r\n");
					fwrite($f, "\r\n");
					
					fwrite($f, $this->getTextHeaderToWrite('VALIDECES'));
						foreach($medicalRecipe->validities as $item) fwrite ($f, $item->medicine. ' :: ' . $item->repetition1 . ' :: ' . $item->repetition2 . ' :: ' . $item->repetition3 ."\r\n");					
					fwrite($f, "\r\n");
					
					fwrite($f, $this->getTextHeaderToWrite('PLAN EDUCACIONAL'));
						fwrite($f, $medicalRecipe->educationalPlan."\r\n");					
					fwrite($f, "\r\n");

					fwrite($f, $this->getTextHeaderToWrite('PIE'));
						fwrite($f, 'Médico: '.$medicalRecipe->doctor."\r\n");
						fwrite($f, 'Especialidad: '.$medicalRecipe->doctorSpeciality."\r\n");
						fwrite($f, 'Número de colegiado: '.$medicalRecipe->doctorMembershipNumber."\r\n");							
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