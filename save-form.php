<?php
if (isset($_POST['lia'])) {
$current_data = file_get_contents('lixa.json');
	$array_data = json_decode($current_data, true);
	//echo $array_data['kia'];
if (isset($_POST['lia'])) {
  if ( $_POST['lia']== "Nnm"){header('/');}
	$new_data = array(
								'message' =>  $_POST['lia'],
								// 'os' =>$_POST['os'],
							    'ip' =>$_POST['ip'],
							 //   'ip4'=>$_POST['ip4'],	
							    // 'version' =>$_POST['version'],	
							   // 'layout' =>$_POST['layout'],	
							  // 'description' =>$_POST['description'],	
							   'clip' =>$_POST['clip'],	
'navi_string' =>$_POST['navi_string']
							);
}


	$array_data[] = $new_data;
	$json_data = json_encode($array_data,JSON_PRETTY_PRINT);

		if(file_put_contents('lixa.json', $json_data))
		{
			echo 1;

		}else{
			echo 0;
		}
}else{
	echo 0;
}

  ?>