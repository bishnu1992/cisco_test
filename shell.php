<?php

// Q1: ANS

// $telnet = shell_exec('telnet google.com');
// echo "<pre>$telnet</pre>";

// $ssh = shell_exec('ssh user@127.0.0.1');
// echo "<pre>$ssh</pre>";

// $disk_usage = shell_exec('df');
// echo "<pre>$disk_usage</pre>";

// $files = shell_exec('ls'); // file path
// echo "<pre>$files</pre>";

// $copy = shell_exec('scp file.txt user@127.0.0.1:/'); // dir path
// echo "<pre>$copy</pre>";

// Q2: ANS

echo "Please enter number? ";
$handle = fopen ("php://stdin","r");
$input = trim(fgets($handle));

$arr = [];
for ($i=0; $i < $input; $i++) { 
	$fn = uniqid();
	$fn .= '.txt';

	shell_exec('touch '.$fn);
	$arr[] = $fn;
}

print_r($arr);


$fp = 'file.tar.gz';
shell_exec('tar -czvf '.$fp.' ./ ');


shell_exec('wget '.$fp);


shell_exec('tar -zxvf '.$fp);

// linux code

for I in 0 1 2 3 4 5; do
    check=$(uptime | tr -d ',.' | awk '{print $10}')
    if [ "$check" -gt 5 ]; then
        /usr/bin/systemctl restart httpd.service
    fi
    sleep 10
done
// linux code END



?>