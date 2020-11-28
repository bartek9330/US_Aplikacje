<?php
require_once dirname(__FILE__).'/../config.php';

include _ROOT_PATH.'/app/security/check.php';

//Pobranie parametrów
function getParams(&$amount, &$years, &$percent){
    $amount = isset($_REQUEST['amount']) ? $_REQUEST['amount'] : null;
    $years = isset($_REQUEST['years']) ? $_REQUEST['years'] : null;
    $percent = isset($_REQUEST['percent']) ? $_REQUEST['percent'] : null;
}

function validate(&$amount, &$years, &$percent, &$messages){
    if(!(isset($amount) && isset($years) && isset($messages))){
        return false;
    }

    if ($amount == "") $messages[] = "Kwota kredytu nie zostala podana";
    if ($years == "") $messages[] = "Liczba rat nie zostala podana";
    if ($percent == "") $messages[] = "Oprocentowanie nie zostalo podane";
 
    if (count ( $messages ) != 0) return false;

    if (! is_numeric( $amount )) {
        $messages [] = 'Kwota nie jest liczba calkowita.';
    }
    if (! is_numeric( $years )) {
        $messages [] = 'Liczba lat nie jest liczba calkowita.';
    }
    if (! (is_double( $percent ) | is_numeric($percent))) {
        $messages [] = 'Procent kredytu nie jest liczba calkowita';
    }
    if (count ( $messages ) != 0) return false;
    else return true;
}

function process(&$amount, &$years, &$percent, &$result){
    $amount = intval($amount);
    $years = intval($years);
    $percent = floatval($percent);
//obliczenia ->
    $result = (($amount+($amount *($percent * 0.01))) / ($years * 12));
    $result = round($result,2);
}

$amount = null;
$years = null;
$percent = null;
$result = null;
$messages = array();
getParams($amount,$years,$percent);
//gdy jest prawidlowo podane
if ( validate($amount,$years, $percent,$messages) ) { //wykonaj obliczenia
    process($amount, $years,$percent,$result);
}

include 'calc_view.php';