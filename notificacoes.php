<?php

$notificationCode = preg_replace('/[^[:alnum:]-]/','',$_POST["notificationCode"]);

require_once('dados_pag.php');

$data = http_build_query($data);

$url = 'https://ws.pagseguro.uol.com.br/v3/transactions/notifications/'.$notificationCode.'?'.$data;

echo "$url<br>";

$curl = curl_init();
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_URL, $url);
$xml = curl_exec($curl);
curl_close($curl);

$xml = simplexml_load_string($xml);

$reference = $xml->reference;

$reference = $reference%100;

$status = $xml->status;

    require_once('db.class.php');
    
    $objDb = new db();
	$link = $objDb->conecta_mysql();
	
	$resultado_id=mysqli_query($link, "UPDATE `sisoda_pagseguro` SET `sisoda_pagseguro_status`='$status' WHERE `sisoda_pagseguro_id`='$reference'");
	
	echo  "UPDATE `sisoda_pagseguro` SET `sisoda_pagseguro_status`='$status' WHERE `sisoda_pagseguro_id`='$reference' <br>";
	
	if($resultado_id){
	    
	    $resultado_id2=mysqli_query($link, "SELECT * FROM `sisoda_pagseguro` WHERE `sisoda_pagseguro_id`='$reference'");
	    
	    echo "SELECT * FROM `sisoda_pagseguro` WHERE `sisoda_pagseguro_id`='$reference' <br>";
	    
	    echo "Status: $status <br>";
	    
	    $dados_login2 = mysqli_fetch_array($resultado_id2);
	  
	        if($status=='3'){
	            
	        echo "MAis uma <br>";
	     
	        $id_aluno=$dados_login2['sisoda_pagseguro_idAluno'];
	        $valor=$dados_login2['sisoda_pagseguro_valor'];
	        $data=date_format(date_create($dados_login2['sisoda_pagseguro_data']),'Y-m-d');
            
            echo "Id: $id_aluno <br>";
            echo "Valor: $valor <br>";
            echo "Data: $data <br>";
            
            $resultado_id3=mysqli_query($link, "INSERT INTO `sisoda_pagamentos`(`sisoda_pagamentos_idAluno`, `sisoda_pagamentos_valor`, `sisoda_pagamentos_paga`, `sisoda_pagamentos_data`) VALUES ('$id_aluno','$valor','0','$data')");
            
            echo "INSERT INTO `sisoda_pagamentos`(`sisoda_pagamentos_idAluno`, `sisoda_pagamentos_valor`, `sisoda_pagamentos_paga`, `sisoda_pagamentos_data`) VALUES ('$id_aluno','$valor','0','$data')";
	        }
	 
	    }
 
?>