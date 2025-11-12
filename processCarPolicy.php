<?php
include("CarPolicy2.php");
$pNumber = $_POST['policyNumber'];
$yPremium = $_POST['yearlyPremium'];

$myCarpolicy = new CarPolicy($pNumber, $yPremium);

$myCarpolicy->setDateOfLastClaim("2015-10-10");

echo "has " . $myCarpolicy->getTotalYearsNoClaims();
echo "years no claims.";


?>