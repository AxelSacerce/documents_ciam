<?php
	
	class cl_insuredCertificationCostDetItem
	{
		var $concept = '';
		var $code = '';
		var $name = '';
		var $status = '';
		var $amount = '';
		
		function __construct($concept, $code, $name, $status, $amount)
		{
			$this->concept = $concept;
			$this->code = $code;
			$this->name = $name;
			$this->status = $status;
			$this->amount = $amount;
		}
	}
	
	class cl_insuredCertificationCost
	{
		var $doctorId = '';
		var $doctorName = '';
		var $doctorParticipation = '';
		var $detail = NULL;
				
		function __construct($doctorId, $doctorName, $doctorParticipation)
		{
			$this->doctorId = $doctorId;
			$this->doctorName = $doctorName;
			$this->doctorParticipation = $doctorParticipation;
		}
		
		function addDetail($concept, $code, $name, $status, $amount)
		{
			$this->detail[] = new cl_insuredCertificationCostDetItem($concept, $code, $name, $status, $amount);
		}
	}
	
	class cl_insuredCertification
	{
		var $certDate = '';
		var $certNumber = '';
		var $certStatus = '';
		
		var $insuredHolder = '';
		var $insuredPatientName = '';
		var $insuredKinship = '';
		var $insuredProduct = '';
		var $insuredPolicyNumber = '';
		var $insuredCertificateNumber = '';
		var $insuredContractor = '';
		var $insuredPaymentResponsible = '';
		var $insuredPolicyHolderStartDate = '';
		var $insuredPolicyPatientStartDate = '';
		
		var $providerName = '';
		var $providerDoctorName = '';
		
		var $dtEntry = '';
		var $dtExit = '';
		var $dtAuthorizedDays = '';
		
		var $coverageProcedureType = '';
		var $coverageDiagnosis = '';
		
		var $costs = NULL;
		
		function __construct(
								$certDate, $certNumber, $certStatus, 

								$insuredHolder, $insuredPatientName, $insuredKinship, $insuredProduct, 
								$insuredPolicyNumber, $insuredCertificateNumber, $insuredContractor, 
								$insuredPaymentResponsible, $insuredPolicyHolderStartDate, 
								$insuredPolicyPatientStartDate, 

								$providerName, $providerDoctorName, 
								
								$dtEntry, $dtExit, $dtAuthorizedDays, 

								$coverageProcedureType, $coverageDiagnosis
							)
		{
			$this->certDate = $certDate;
			$this->certNumber = $certNumber;
			$this->certStatus = $certStatus;
			
			$this->insuredHolder = $insuredHolder;
			$this->insuredPatientName = $insuredPatientName;
			$this->insuredKinship = $insuredKinship;
			$this->insuredProduct = $insuredProduct;
			$this->insuredPolicyNumber = $insuredPolicyNumber;
			$this->insuredCertificateNumber = $insuredCertificateNumber;
			$this->insuredContractor = $insuredContractor;
			$this->insuredPaymentResponsible = $insuredPaymentResponsible;
			$this->insuredPolicyHolderStartDate = $insuredPolicyHolderStartDate;
			$this->insuredPolicyPatientStartDate = $insuredPolicyPatientStartDate;
			
			$this->providerName = $providerName;
			$this->providerDoctorName = $providerDoctorName;
			
			$this->dtEntry = $dtEntry;
			$this->dtExit = $dtExit;
			$this->dtAuthorizedDays = $dtAuthorizedDays;
			
			$this->coverageProcedureType = $coverageProcedureType;
			$this->coverageDiagnosis = $coverageDiagnosis;
			
		}
		
		function addCost($doctorId, $doctorName, $doctorParticipation)
		{
			$this->costs[] = new cl_insuredCertificationCost($doctorId, $doctorName, $doctorParticipation);
		}

	}
?>