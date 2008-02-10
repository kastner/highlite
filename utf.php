<?php
header("content-type: text/html; charset=utf-8");
$text = $_REQUEST["text"];
$total_chars = 100;
for ($i=0; $i<=round($total_chars / strlen($text)); $i++) {
  $new_text .= $text;
}
echo $new_text;
?>
