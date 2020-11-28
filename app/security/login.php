<?php
require_once dirname(__FILE__).'/../../config.php';
// parametry
function getParamsLogin(&$login){
    $login['login'] = isset($_REQUEST['login']) ? $_REQUEST['login'] : null;
    $login['pass'] = isset($_REQUEST['pass']) ? $_REQUEST['pass'] : null;
}

function validateLogin(&$login, &$messages){
    //sprawdzenie czy zostaly podane parametry
    if (!(isset($login['login']) && isset($login['pass']))){
        return false;
    }
	if ( $login['login'] == "") {
		$messages [] = 'Login uzytkownika nie zostal podany';
	}
	if ( $login['pass'] == "") {
		$messages [] = 'Haslo nie zostalo podane';
	}
    if(count ($messages) > 0) return false;
//
    if ($login['login'] == "admin" && $login['pass'] == "admin") {
        session_start();
        $_SESSION['role'] = 'admin';
        return true;
    }

    $messages [] = 'Haslo lub login uzytkownika sa niepoprawne.';
    return false;
}
// zmienne
$login = array();
$messages = array();
getParamsLogin($login);

if (!validateLogin($login, $messages)){
    include _ROOT_PATH.'/app/security/login_view.php';
}else{
    header("Location: "._APP_URL.'/app/calc.php');
}
