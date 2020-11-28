<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
<head>
    <meta charset="utf-8" />
    <title>Kalkulator - Logowanie</title>
</head>
<body>
    
    
<div style="width:14em; margin: 2em auto;">

    <form action="<?php print(_APP_ROOT); ?>/app/security/login.php" method="post">
        <legend><font size="6" color="black">Logowanie:</font></legend>
        <br>
        <fieldset>
            <label for="login">Login: </label>
            <input id="login" type="text" name="login" value="<?php out($form['login']); ?>" />
            <br>
            <label for="pass">Hasło: </label>
            <input id="pass" type="password" name="pass" />
        </fieldset>
        <input class="button1" type="submit" value="Zaloguj" />
    </form>

    <?php
    if (isset($messages)) {
        if (count ( $messages ) > 0) {
            echo '<ol style="padding: 10px 10px 10px 30px; border-radius: 5px; background-color: #f88; width:300px;">';
            foreach ( $messages as $key => $msg ) {
                echo '<li>'.$msg.'</li>';
            }
            echo '</ol>';
        }
    }
    ?>

</div>

</body>
</html>