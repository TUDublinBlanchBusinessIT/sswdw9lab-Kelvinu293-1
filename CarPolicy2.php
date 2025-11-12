<?php

class CarPolicy
{
    private $policyNumber = "";
    private $yearlyPremium = "";
    private $dateOfLastClaim ="";
    
    public function __construct($pNumber, $yPremium) 
    {
        $this->policyNumber = $pNumber;
        $this->yearlyPremium = $yPremium;

    }

    public function setDateOfLastClaim($dolc)
    {
        $this->dateOfLastClaim = $dolc;

    }

    public function getTotalYearsNoClaims()
    {
     $currentDate = new DateTime();
     $lastDate= new DateTime($this->dateOfLastClaim);
     $interval = $currentDate->diff($lastDate);
     return $interval->format("%y");
    }

    public function getDiscount()
    {
        $yearsNoClaims = $this->getTotalYearsNoClaims();

        if ($yearsNoClaims >= 3 && $yearsNoClaims <= 5) {
            return 0.10; 
        } elseif ($yearsNoClaims > 5) {
            return 0.15; 
        }

        return 0;
    }

    public function getDiscountedPremium()
    {
        $discount = $this->getDiscount();
        return $this->yearlyPremium * (1 - $discount);
    }

    public function __toString()
    {
        return "PN: " . $this->policyNumber;

    }

}

?>