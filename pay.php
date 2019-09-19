<?php
		
		$key = "R4nR4DYjGjjcGmhMeL1AvMLWpkiCTTfY"; //replace ur 32 bit secure key , Get your secure key from your Reseller Control panel
		
		//This filter removes data that is potentially harmful for your application. It is used to strip tags and remove or encode unwanted characters.
		$_GET = filter_var_array($_GET, FILTER_SANITIZE_STRING);
		
		//Below are the  parameters which will be passed from foundation as http GET request
		$paymentTypeId = $_GET["paymenttypeid"];  //payment type id
function httpPost($url,$params)
{
 $postData = '';
 //create name value pairs seperated
 foreach($params as $k => $v) { $postData .= $k . '='.$v.'&'; }
 $postData = rtrim($postData, '&');
 $ch = curl_init();
 curl_setopt($ch,CURLOPT_URL,$url);
 curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
 curl_setopt($ch,CURLOPT_HEADER, false);
 curl_setopt($ch, CURLOPT_POST, count($postData));
 curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
 curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
 $output=curl_exec($ch);
 curl_close($ch);
 return $output;
}
$data = array(
   'email_loja' => "CARDOSOLIMAMS@GMAIL.COM",  
  'order_id' => $_GET["paymenttypeid"], // c贸digo interno do lojista para identificar a transacao.
  'payer_email' => $_GET["emailAddr"],
  'payer_name' => $_GET["name"], // nome completo ou razao social
  'payer_cpf_cnpj' => $_POST["cpf"], // cpf ou cnpj
  'payer_phone' => $_GET["telNo"], // fixou ou m贸vel
  'payer_street' => $_GET["address1"],
  'number_ntfiscal' => $_GET["paymenttypeid"],

  'payer_city' => $_GET["city"],
  'payer_state' => $_GET["state"], // apenas sigla do estado
  'payer_zip_code' => $_GET["zip"],
  'notification_url' => 'https://billing.byisam.com/paghiper/notification',
  'type_bank_slip' => 'boletoA4', // formato do boleto
  'days_due_date' => '5', // dias para vencimento do boleto

$params = array(
 "email_loja" => "cardosolimams@gmail.com",
 "urlRetorno" => "https://byisam.com",
 "tipoBoleto" => "boletoa4",
 "id_plataforma" => $_GET["paymenttypeid"],
 "produto_codigo_1" => $_GET["transid"],
 "produto_valor_1" => $_GET["accountingcurrencyamount"],
 "produto_descricao_1" => $_GET["description"],
 "produto_qtde_1" => "1",
 "email" => $_GET["emailAddr"],
 "nome" => $_GET["name"],
 "cpf" => "get",
 "rg" => "get",
 "data_nascimento" => "get",
 "razao_social" => "get",
 "cnpj" => "get",
 "nota_fiscal" => "get",
 "frase_fixa_boleto" => "TRUE",
 "telefone" => $_GET["telNo"],
 "celular" => $_GET["telNoCc"],
 "endereco" => $_GET["address1"],
 "bairro" => "get",
 "cidade" => $_GET["city"],
 "estado" => $_GET["state"],
 "cep" => $_GET["zip"],
 "numero_casa" => "get",
 "complemento" => "get",
 "pagamento" => "pagamento"
 )
);
echo httpPost("https://www.paghiper.com/checkout/",$params);
?>
