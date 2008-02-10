<?php
function utf8_strlen($str) {
  $len = strlen($str);
  $olen = $len;
  $d = 0;
  for ($c = 0; $c < $olen; ++$c) {
    $ord_var_c = ord($str{$d++});
    switch (true) {
      case (($ord_var_c & 0xE0) == 0xC0):
        $len -= 1;
        break;  
      case (($ord_var_c & 0xF0) == 0xE0):
        $len -= 2;
        break;
      case (($ord_var_c & 0xF8) == 0xF0):
        $len -= 3;
        break;
      case (($ord_var_c & 0xFC) == 0xF8):
        $len -= 4;
        break;
      case (($ord_var_c & 0xFE) == 0xFC):
        $len -= 5;
        break;
    }
  }
  return $len;
}
?>