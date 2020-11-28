<?php
require_once dirname(__FILE__).'/../config.php';
//ochrona widoku
include _ROOT_PATH.'/app/security/check.php';
?>
<!DOCTYPE HTML>
<head>
	<title>Hello world</title>
</head>
<body>
	<a style="font-size:20px" href="<?php print(_APP_ROOT); ?>/app/calc.php" class="pure-button">Powrót do kalkulatora</a>
	<p style="font-size:20px">Tutaj jeszcze nic nie ma, wroc do poprzedniej strony</p>

</body>
</html>