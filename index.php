<?php
//Program to find the number of occurrence of word in a file using PHP
//code by Mahendran.P (mahendran8531@gmail.com)
//Refer https://github.com/mahendranmahi

echo "<html><title>Find the number of occurrence of word in a file using PHP</title><head><style>table, table th,table td{padding:5px;border-collapse: collapse;border:1px solid #000;}</style></head><body><h2>Program to find the number of occurrence of word in a file using PHP</h2>";
echo "<table><tr><th>Word</th><th>No. of Occurrence</th></tr>";

if ($file = fopen("example.txt", "r")) {			
    while(!feof($file)) {
        $line = strtolower(fgets($file));
		$str_to_ary[]=explode(" ",$line);
    }
	$orginal_arry=array_flatten($str_to_ary);
    fclose($file);
	
	$result_array=array();
	$array_cnt=count($orginal_arry);
	if($array_cnt>0){
		for($i=0;$i<$array_cnt;$i++){
			if(!array_key_exists($orginal_arry[$i],$result_array)){$result_array[$orginal_arry[$i]]=1;}
			else{$result_array[$orginal_arry[$i]]++;}
		}
	}
	foreach($result_array as $key => $value){
		echo '<tr><td>'.$key.'</td><td>'.$value.'</td></tr>';
	}
}else{echo 'File not found..!';}
echo "</table></body></html>";

function array_flatten($array) { 
  if (!is_array($array)) { 
    return FALSE; 
  } 
  $result = array(); 
  foreach ($array as $key => $value) { 
    if (is_array($value)) { 
      $result = array_merge($result, array_flatten($value)); 
    } 
    else { 
      $result[$key] = $value; 
    } 
  } 
  return $result; 
} 

?>