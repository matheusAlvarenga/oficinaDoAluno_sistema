<?php

require_once('../dados_pag.php');

$pedido = $_POST["idPedido"];
$data['currency'] = 'BRL';
$data['itemId1'] = '1';
$a=$_POST['valor'];

if (strpos($a, '.') !== false) {
    $data['itemAmount1']=$a;
}
elseif (strpos($a, ',') !== false) {
    $data['itemAmount1']=str_replace(',','.',$a);
}
else{
    $data['itemAmount1']=$a.'.00';
}

$data['itemQuantity1'] = '1';
$data['itemDescription1'] = 'Pagamento para a Oficina do Aluno';
$data['reference'] = $pedido;

$url = 'https://ws.pagseguro.uol.com.br/v2/checkout';

$data = http_build_query($data);

$curl = curl_init($url);

curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
curl_setopt($curl, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
$xml= curl_exec($curl);

curl_close($curl);

$xml= simplexml_load_string($xml);

if($xml == 'Unauthorized'){
$return = 'Não Autorizado';
echo $return;
exit;
}

if(count($xml -> error) > 0){
$return = 'Dados Inválidos '.$xml ->error-> message;
echo $return;
exit;
}

echo $xml -> code;

?>