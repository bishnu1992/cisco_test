<?php 
echo "Please enter number? ";
$handle = fopen ("php://stdin","r");
$input = trim(fgets($handle));

$arr = [];
for ($i=0; $i < $input; $i++) { 
	$arr[] = uniqid();
}

print_r($arr);
?>