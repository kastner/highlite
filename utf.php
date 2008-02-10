<?php
require 'utf8_strlen.php';
header("content-type: text/html; charset=utf-8");
$text = $_REQUEST["text"];
$text = preg_replace("/\n|\t+/", " ", $text);
$total_chars = 100;
echo "utfstrlen: " . utf8_strlen($text) . "<br/>";
for ($i=0; $i<=round(($total_chars - utf8_strlen($text)) / utf8_strlen($text)); $i++) {
  $new_text .= $text;
}
$text = $new_text;
$width = 10;
$lines = preg_split("/(.{" . $width . "})/u", $new_text, -1, PREG_SPLIT_DELIM_CAPTURE);
foreach($lines as $line) {
  if ($line != "") { $real_lines[] = $line; }
}
$lines = $real_lines;
// $lines = preg_split("/.{" . $width . "}/u", -1, PREG_SPLIT_DELIM_CAPTURE);
foreach($lines as $line) {
  
  $chars = preg_split("//u", $line, -1, PREG_SPLIT_DELIM_CAPTURE);
  $real_chars = array();
  foreach($chars as $char) { if ($char != "") { $real_chars[] = $char; } }
  $chars = $real_chars;
  foreach($chars as $char) {
    echo htmlspecialchars($char);
  }
  echo "<br/>";
}
?>
