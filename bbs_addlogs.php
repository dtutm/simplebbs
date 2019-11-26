<?php 
/*
    <div class="parts-setting">
        <p class="input-font">name.</p>
                    <input class="input-name" type="name" name="yourName">
                    <p class="input-font">message.</p>
                    <input class="input-text" type="text" name="yourText">
                    <input class="input-submit" type="submit" value="send" name="textSend">
                </div>

*/
$name = $_POST[yourName];
$text = $_POST[yourText];

echo $name.'<br>';
echo $text;


?>