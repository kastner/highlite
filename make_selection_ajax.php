<?php
require 'utf8_strlen.php';

// grab text from the user
$text = stripslashes($_REQUEST["text"]);

// default text if non supplied
if (!$text) { $text = "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."; }

// grab the suggested # of colors
$num_colors = $_REQUEST["colors"];
$num_colors = intval($num_colors);
if ($num_colors > 1024 or $num_colors < 2) { $num_colors = 32; }

// output width
$width = $_REQUEST["width"];
$width = intval($width);
if ($width > 2000 or $width < 40) { $width = 120; }

// reverse output
echo "rev: $_REQUEST[reverse]<br/>";
$reverse = $_REQUEST["reverse"];
if ($reverse != "true") { $reverse = "false"; }
echo "rev: $reverse<br/>";

// grab image from user
$image = $_REQUEST["image"];

// check for valid url
if (!preg_match("/http:\/\//", $image)) { die("You must have a valid url for the image"); }

// fetch the image size
$image_size = getimagesize($image);
$image_height = $image_size[1];
$image_width = $image_size[0];

// get the image into memory, based on the mime-type
if (!preg_match("/\/(jpe?g|png|gif)$/", $image_size["mime"], $type)) { die("You must submit a jpeg, gif or png"); }

switch($type[1]) {
  case "jpeg":
  case "jpg":
    $image = imagecreatefromjpeg($image);
    break;
  case "gif":
    $image = imagecreatefromgif($image);
    break;
  case "png":
    $image = imagecreatefrompng($image);
}

// dither the image down to suggested # of colors
imagetruecolortopalette($image, true, $num_colors);

// calculate the width (1:2 the original)
$new_width = $width;
$new_height = ceil(($new_width / $image_width) * $image_height / 2);

// make a new memory image
$image2 = imagecreate($new_width, $new_height);

// squish (or stretch) the image into the new image object
imagecopyresized($image2, $image, 0, 0, 0, 0, $new_width, $new_height, $image_width, $image_height);

// pad the text if needed
$text = preg_replace("/\n|\t+/", " ", $text);
$new_text = $text;
$total_chars = $new_width * $new_height;

if ($total_chars > utf8_strlen($text)) {
  for ($i=0; $i<=round(($total_chars - utf8_strlen($text)) / utf8_strlen($text)); $i++) {
    $new_text .= $text;
  }  
}

// get the text into an array
$lines = preg_split("/(.{" . $width . "})/u", $new_text, -1, PREG_SPLIT_DELIM_CAPTURE);
foreach($lines as $line) {
  if ($line != "") { $real_lines[] = $line; }
}
$lines = $real_lines;
// var_dump($lines);
$colors = array();
$output = "";

// iterate through the lines in the image
for ($y = 0; $y < $new_height; $y++) {

  $line = rtrim($lines[$y]);
  
  // get the characters in the line into an array
  $chars = preg_split("//u", $line, -1, PREG_SPLIT_DELIM_CAPTURE);
  $real_chars = array();
  foreach($chars as $char) { if ($char != "") { $real_chars[] = $char; } }
  $chars = $real_chars;

  // (re)set the last color to group colors together
  $last_color = -1;
  $output .= "<div id='line-$y'>";

  // iterate through the columns in the image
  for ($x = 0; $x < $new_width; $x++) {
    
    // look at current pixel
    $pixel_color = imagecolorat($image2, $x, $y);
    if (!$colors[$pixel_color]) {
      $colors[$pixel_color] = imagecolorsforindex($image2, $pixel_color);
    }
    
    // new color? close the last span, start a new one and set the last color
    if ($last_color != $pixel_color) {
      if ($last_color != -1) { $output .= "</span>"; }
      $last_color = $pixel_color;
      $output .= "<span class='color-$pixel_color'>";
    }
    
    // add the current character
    $output .= htmlspecialchars($chars[$x]);
  }
  
  if ($last_color != -1) { $output .= "</span>"; }
  $output .= "</div>";
}

// get the colors into css
foreach($colors as $color => $rgb) {
  if ($rgb["alpha"] == 0) {
    // $style .= ".color-$color { color: rgb($rgb[red], $rgb[green], $rgb[blue])}\n";
    if ($reverse) {
      $style .= <<<CSS
      
      .color-$color {
        color: rgb($rgb[red], $rgb[green], $rgb[blue]);
        background: rgb($rgb[red], $rgb[green], $rgb[blue])        
      }
      .color-$color::selection {
        color: black;
        background: inherit;
      }
      .color-$color::-moz-selection {
        color: black;
        background: inherit;
      }
CSS;

    }
    else {
      $style .= <<<CSS

      .color-$color::selection {
        color: rgb($rgb[red], $rgb[green], $rgb[blue]);
        background: rgb($rgb[red], $rgb[green], $rgb[blue])
      }
      .color-$color::-moz-selection {
        color: rgb($rgb[red], $rgb[green], $rgb[blue]);
        background: rgb($rgb[red], $rgb[green], $rgb[blue])
      }
CSS;
      
    }
  }
}
header("Content-Type: text/html; charset=utf-8");
?>
<pre id="sel">
<?php echo $output ?>
</pre>
<style type="text/css" media="screen">
/*--*/
  <?php echo $style ?>
/*!!*/
</style>