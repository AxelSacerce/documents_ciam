<?php
	class cl_billDetailItem
	{
		var $quantity = '';
		var $itemType = '';
		var $description = '';
		var $unitPrice = '';
		var $total = '';
		var $valueAddedTax = '';
		
		function _construct($quantity, $itemType, $description, $unitPrice, $total, $valueAddedTax)
		{
			$this->quantity = $quantity;
			$this->itemType = $itemType;
			$this->description = $description;
			$this->unitPrice = $unitPrice;
			$this->total = $total;
			$this->valueAddedTax = $valueAddedTax;
		}
	}
	
	class cl_bill
	{
		var $resolutionNumber = '';
		var $resolutionDate = '';
		var $resolutionRangeStart = '';
		var $resolutionRangeEnd = '';
		
		var $billSeries = '';
		var $billNumber = '';
		var $billUniqueIdentificationNumber = '';
		var $billDate = '';
		var $billSubtotal = '';
		var $billDiscount = '';
		var $billTotalValueAddedTax = '';
		var $billTotal = '';
		var $billTotalInLetters = '';
		
		var $sellerTaxId = '';
		var $sellerBusinessName = '';
		var $sellerTradeName = '';
		var $sellerAddress = '';
		
		var $buyerTaxId = '';
		var $buyerBusinnesName = '';
		var $buyerPatientName = '';
		var $buyerAddress = '';
		var $buyerPhone = '';		
		
		var $taxDataSign = '';
		var $taxDataGFACE = '';
		
		var $detail = NULL;
		
		function __construct(	$resolutionNumber, $resolutionDate, $resolutionRangeStart, $resolutionRangeEnd, 
								
								$billSeries, $billNumber, $billUniqueIdentificationNumber, $billDate, 
								$billSubtotal, $billDiscount, $billTotalValueAddedTax, $billTotal, $billTotalInLetters, 

								$sellerTaxId, $sellerBusinessName, $sellerTradeName, $sellerAddress, 

								$buyerTaxId, $buyerBusinnesName, $buyerPatientName, $buyerAddress, $buyerPhone, 

								$taxDataSign, $taxDataGFACE
							)
		{
			$this->resolutionNumber = $resolutionNumber;
			$this->resolutionDate = $resolutionDate;
			$this->resolutionRangeStart = $resolutionRangeStart;
			$this->resolutionRangeEnd = $resolutionRangeEnd;
			
			$this->billSeries = $billSeries;
			$this->billNumber = $billNumber;
			$this->billUniqueIdentificationNumber = $billUniqueIdentificationNumber;
			$this->billDate = $billDate;
			$this->billSubtotal = $billSubtotal;
			$this->billDiscount = $billDiscount;
			$this->billTotalValueAddedTax = $billTotalValueAddedTax;
			$this->billTotal = $billTotal;
			$this->billTotalInLetters = $billTotalInLetters;
			
			$this->sellerTaxId = $sellerTaxId;
			$this->sellerBusinessName = $sellerBusinessName;
			$this->sellerTradeName = $sellerTradeName;
			$this->sellerAddress = $sellerAddress;
			
			$this->buyerTaxId = $buyerTaxId;
			$this->buyerBusinnesName = $buyerBusinnesName;
			$this->buyerPatientName = $buyerPatientName;
			$this->buyerAddress = $buyerAddress;
			$this->buyerPhone = $buyerPhone;
			
			$this->taxDataSign = $taxDataSign;
			$this->taxDataGFACE = $taxDataGFACE;

		}

		function addDetailItem($quantity, $itemType, $description, $unitPrice, $total, $valueAddedTax)
		{
			$this->detail[] = new cl_billDetailItem($quantity, $itemType, $description, $unitPrice, $total, $valueAddedTax);
		}
	}
?>