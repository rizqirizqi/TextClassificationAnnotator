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
		$count = 1;

		foreach ($lines as $key => $value) {
			if(count($json) <= $key) break;
			$value = str_replace("\r", "", $value);

			if($json[$key] == -1){
				fwrite($file, $count . "," . $value . ",negatif\n");
				$count++;
			}else if($json[$key] == 1){
				fwrite($file, $count . "," . $value . ",positif\n");
				$count++;
			}
		}
		fclose($file);
		echo('{"status" :"ok"}');
	}else if($_POST["action"] == "deleted"){		
		$file = fopen($filename, 'w') or die();

		foreach ($lines as $key => $value) {
			if(count($json) <= $key) break;

			if($json[$key] == -2){
				fwrite($file, $value."\n");
			}
		}
		fclose($file);
		echo('{"status" :"ok"}');
	}
?>