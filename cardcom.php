<?php

// card com
$config['card_name'] = 'set card com user name';/* Username of cardcom */
$config['terminal_number'] = 'active set terminal number';
$wsdl_url = 'https://secure.cardcom.co.il/service.asmx?wsdl';

$client = new \SoapClient($wsdl_url, array(
    'trace' => true,
    'exceptions' => true));

$params = array(
    'TerminalNumber' => $config['terminal_number'],
    'SumToBill' => $Amount,
    'CardValidityMonth' => $expMonth,
    'CardValidityYear' => $expYear,
    'CardNumber' => $cardNumber,
    'CardOwnerId' => "",
    'ExtendedParameters' => http_build_query(
            array(
                'UserName' => $config['card_name'],
                'invCreateInvoice' => true, /* Create Invoice ?*/
                'invItemDescription' => '',/* Invoice Description*/
                'invCustName' => '',/* Invoice Name*/
                'invDestEmail' => '', /* Invoice Email*/
            )
    )
);
$return = $client->PerfromBillVerySimple($params);
if ($return->PerfromBillVerySimpleResult->ResposeCode == 0)
{
    //Payment Success Code
}