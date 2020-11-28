<?php
// KONTROLER strony kalkulatora kredytowego
require_once dirname(__FILE__).'/../config.php';
?>
<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
<head>
    <title>Kalkulator kredytowy</title>
    <meta charset="utf-8" />
</head>
<body>
<ul>
  <a style="font-size:20px" href="<?php print(_APP_ROOT); ?>/app/druga_strona.php" class="button2">Przejdz na druga strone</a><br>
  <a style="font-size:20px" href="<?php print(_APP_ROOT); ?>/app/security/logout.php" class="button2">Wyloguj</a>
  <br>
</ul>
<div class="row">
    <form action="<?php print(_APP_URL);?>/app/calc.php" method="post">
        <fieldset>
            <legend style="font-size:20px" >Kalkulator kredytowy</legend>
                <label style="font-size:20px" for="amount">Kwota: </label>
                <input class="_full-width" id="amount" type="number" name="amount"/>
            <br>
                <label style="font-size:20px" for="years">Lata: </label>
                <input class="_full-width" id="years" type="number" name="years"/>
            <br>
                <label style="font-size:20px" for="percent">Oprocentowanie: </label>
                <input class="_full-width" id="percent" type="number" name="percent"/></br>
            <input style="font-size:15px" class="_primary button" type="submit" value="Oblicz" />
        </fieldset>
    </form>	

    <?php
if (isset($messages)) {
	if (count ( $messages ) > 0) {
		echo '<ol style="margin: 20px; padding: 10px 10px 10px 30px; border-radius: 5px; background-color: #f88; width:300px;">';
		foreach ( $messages as $key => $msg ) {
			echo '<li>'.$msg.'</li>';
		}
		echo '</ol>';
	}
}
?>
<?php 
?>
<?php if (isset($result)){ ?>
<div style="margin: 20px; padding: 10px; border-radius: 5px; background-color:  #00cc66; width:300px;">
<?php echo 'Miesieczna rata wynosi: '.$result; ?>
</div>
<?php } ?>
</div>
</body>
</html>