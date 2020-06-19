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
		print $name."\n";
		if(file_exists($path."/".$name)) {
			chdir($path."/".$name);
			exec("git pull"); // NOTE: This repository have remote origin...
			continue;
		}
		chdir($path);
		exec("git clone ".$item["clone_url"]);
	}
}
