<?php
	class cl_medicalRecipeMedicine
	{		
		var $medicine = '';
		var $presentation = '';
		var $dose = '';
		var $frequency = '';
		var $duration = '';
		
		function __construct($medicine, $presentation, $dose, $frequency, $duration)
		{
			$this->medicine = $medicine;
			$this->presentation = $presentation;
			$this->dose = $dose;
			$this->frequency = $frequency;
			$this->duration = $duration;

		}
	}

	class cl_medicalRecipeValidity
	{		
		var $medicine = '';
		var $repetition1 = '';
		var $repetition2 = '';
		var $repetition3 = '';
		
		function __construct($medicine, $repetition1, $repetition2, $repetition3)
		{
			$this->medicine = $medicine;
			$this->repetition1 = $repetition1;
			$this->repetition2 = $repetition2;
			$this->repetition3  = $repetition3 ;

		}
	}
	
		
	class cl_medicalRecipe
	{
		var $recipeDate = '';
		var $patient = '';
		var $barCode = '';
		var $educationalPlan = '';
		var $doctor = '';
		var $doctorSpeciality = '';
		var $doctorMembershipNumber = '';
		var $medicines = NULL;
		var $validities = NULL;
		
		function __construct(	$recipeDate = '', $patient = '', $barCode = '', 
								$educationalPlan = '', 
								$doctor = '', $doctorSpeciality = '', $doctorMembershipNumber = ''
							)
		{
			$this->recipeDate = $recipeDate;
			$this->patient = $patient;
			$this->barCode = $barCode;
			$this->educationalPlan = $educationalPlan;
			$this->doctor = $doctor;
			$this->doctorSpeciality = $doctorSpeciality;
			$this->doctorMembershipNumber = $doctorMembershipNumber;
		}
		
		function addValidity($medicine, $repetition1, $repetition2, $repetition3)
		{
			$this->validities[] = new cl_medicalRecipeValidity($medicine, $repetition1, $repetition2, $repetition3);
		}
		
		function addMedicine($medicine, $presentation, $dose, $frequency, $duration)
		{
			$this->medicines[] = new cl_medicalRecipeMedicine($medicine, $presentation, $dose, $frequency, $duration);
		}									
	}
?>