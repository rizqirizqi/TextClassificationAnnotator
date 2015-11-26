<?php
	$filename = "data.json";
	$string = file_get_contents($filename);
	$json = json_decode($string, true);
	if(count($json) == 0){
		$json = array_fill(0,3000,0);
		$file = fopen($filename, 'w') or die();
		$stringData = json_encode($json,JSON_NUMERIC_CHECK);
		fwrite($file, $stringData);
		fclose($file);
	}
	
	if($_POST["action"] == "choose"){
		$textid = $_POST["id"];
		$value = $_POST["val"];
		$json[$textid] = $value;
		$textid = $textid + 1;
		
		$file = fopen($filename, 'w') or die();
		$stringData = json_encode($json,JSON_NUMERIC_CHECK);
		fwrite($file, $stringData);
		fclose($file);
		
		echo('{"status" :"ok", "value" :' . $textid . '}');
		
	}else if($_POST["action"] == "last"){
		$arrlength = count($json);
		$now = 0;
		for($x = 0; $x < $arrlength; $x++) {
			if($json[$x] == 0){
				$now = $x;
				break;
			}
		}
		echo('{"status" :"ok", "value" :' . $now . '}');
	}
?>