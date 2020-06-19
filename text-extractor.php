<?php
// Max Base
// https://github.com/BaseMax/GitHubBackupArchiver
include "NetPHP.php";
$username="basemax";
$count=260; // You need to change this.
$page=ceil($count / 100);
// $path="/root/repositories";
$path=getcwd();
for($i=1;$i<=$page;$i++) {
	$data=get("https://api.github.com/users/".$username."/repos?per_page=100&page=".$i);
	$json=json_decode($data[0], true);
	foreach($json as $item) {
		$name=$item["name"];
		$desc=$item["description"];
		print $name." ".$desc."\n";
	}
}
// Using: $ php text-extractor.php > output.txt
