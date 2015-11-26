<?php
	$filename = "data.json";
	$string = file_get_contents($filename);
	$json = json_decode($string, true);

	$filename = "test.txt";
	$string = file_get_contents($filename);
	$lines = explode("\n", $string);

	$filename = "print.tmp";
	if($_POST["action"] == "classified"){		
		$file = fopen($filename, 'w') or die();

		foreach ($lines as $key => $value) {
			if($json[$key] == -1){
				fwrite($file, $key . "," . $value . ",negatif\n");
			}else if($json[$key] == 1){
				fwrite($file, $key . "," . $value . ",positif\n");
			}
		}
		fclose($file);
		echo('{"status" :"ok"}');
	}else if($_POST["action"] == "deleted"){		
		$file = fopen($filename, 'w') or die();

		foreach ($lines as $key => $value) {
			if($json[$key] == -2){
				fwrite($file, $value."\n");
			}
		}
		fclose($file);
		echo('{"status" :"ok"}');
	}
?>