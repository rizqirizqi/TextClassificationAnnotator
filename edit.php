<?php
	$filename = "test.txt";
	$string = file_get_contents($filename);
	$lines = explode("\n", $string);
	
	if($_POST["action"] == "edit"){
		$textid = $_POST["id"];
		$editedtext = $_POST["edited"];

		$writing = fopen($filename . '.tmp', 'w');
		foreach ($lines as $key => $value) {
			if($key == $textid){
				fwrite($writing, $editedtext . "\n");
			}else{
				fwrite($writing, $value . "\n");
			}
		}
		fclose($writing);

		rename($filename . '.tmp', $filename);
		echo('{"status" :"ok"}');
	}
?>