<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en" xml:lang="en">
<head>
  <meta http-equiv="Content-type" content="text/html; charset=utf-8">
  <title>Text + Image + CSS3 = Crazy Delicious</title>
  <script src="jquery.js" type="text/javascript" charset="utf-8"></script>
  <style type="text/css" media="screen">
    body {
      font: small "Helvetica", "Trebuchet MS", Verdana, sans-serif;
    }
    #form textarea {
      width: 300px;
      height: 30px;
      margin-left: 20px;
      margin-bottom: 10px;
    }
    #form select {
      margin-left: 20px;
    }
    #form label {
      display: block;
    }
    #form input {
      width: 300px;
      margin-left: 20px;
      margin-bottom: 10px;
    }
    span::selection {
      color: white;
      background: white
    }
    span::-moz-selection {
      color: white;
      background: white
    }
    #beg {
      float: right;
      width: 15em;
      margin-right: 4em;
      padding: 0.5em;
      border: 4px double #999;
      background: #efefef;
    }
    #code {
      width: 300px;
      height: 40px;
    }
  </style>
</head>
<body id="color">
  <h1>Hide an image in html</h1>
  <script type="text/javascript"><!--
  google_ad_client = "pub-5369189596696267";
  /* highlite - 2/2/8 */
  google_ad_slot = "0346720180";
  google_ad_width = 728;
  google_ad_height = 15;
  //-->
  </script>
  <script type="text/javascript"
  src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
  </script>
  <h2>Highlight the text with your mouse.</h2>
  
  <div id="beg">
    <p>
      Like this or my other projects like <a href="http://metaatem.net/words/spell+with+flickr" alt="Spell with Flickr">Spell with Flickr</a> and <a href="http://befuddlr.com/" alt="Befuddlr!">Befuddlr</a>? Help me cover the cost of EC2:
      <form action="https://www.paypal.com/cgi-bin/webscr" method="post">
      <input type="hidden" name="cmd" value="_s-xclick">
      <input type="image" src="https://www.paypal.com/en_US/i/btn/btn_donate_SM.gif" border="0" name="submit" alt="Make payments with PayPal - it's fast, free and secure!">
      <img alt="" border="0" src="https://www.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1">
      <input type="hidden" name="encrypted" value="-----BEGIN PKCS7-----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-----END PKCS7-----
      ">
      </form>
    </p>
    <p>Created by <a href="mailto:kastner@gmail.com">Erik Kastner</a> at 2am</p>
  </div>
  
  <h3>How it works:</h3>
  <p>Safari and Firefox support <a href="http://www.w3.org/TR/css3-selectors/#UIfragments" title="Selectors">CSS3's ::selection pseudo-element</a>. Using that and PHP, this toy hides an image in plain view.</p>
  <form id="form">
    <div>    
      <label for="text">Text:</label>
      <textarea id="text" name="text"><?php echo stripslashes($_REQUEST["text"]) ?></textarea>
    </div>  
    <div>    
      <label for="image">Image URL:</label>
      <input type="text" id="image" name="image" value="<?php echo $_REQUEST["image"] ?>">
    </div>
    <div>
      <label for="colors">Number of colors:</label>
      <input type="hidden" id="h-colors" value="<?php echo $_REQUEST["colors"]; ?>"/>
      <select id="colors" name="colors">
        <option>2</option>
        <option>4</option>
        <option>16</option>
        <option>32</option>
        <option selected>128</option>
        <option>256</option>
      </select>
    </div>
    <div>
      <label for="width">Width of output:</label>
      <input type="hidden" id="h-width" value="<?php echo $_REQUEST["width"]; ?>"/>
      <select id="width" name="width">
        <option>40</option>
        <option>80</option>
        <option selected>120</option>
        <option>160</option>
        <option>220</option>
      </select>
    </div>
    <input type="submit" value="generate"/>
  </form>
  <div id="output-code" style="display:none;">
    <div>
      <a href="#" onclick="$('#code').toggle(); return false;">Get code</a>
    </div>
    <textarea id="code" style="display:none;" onfocus="this.select();"></textarea>
  </div>
  <div id="output"><?php if ($_REQUEST["image"]) echo "Loading..." ?></div>
  <script type="text/javascript" charset="utf-8">  
    function go() {
      if (!$("#image").val().match(/^http:\/\//)) {
        alert("You must supply a url for an image");
        return false;
      }
      $("#output").load("make_selection_ajax.php", {
        text: $("#text").val(),
        image: $("#image").val(),
        colors: $("#colors").val(),
        width: $("#width").val()
      }, function(responseText) {
        $("#output-code").show();
        $("#code").val(responseText);
        new_css = responseText.match(/\/\*--\*\/(\n|.)+\/\*/);
        if (new_css) {
          $("#injectedCss").html(new_css[0]);
        }
      });      
    }
    
    $(document).ready(function() {
  		$('head').append('<style id="injectedCss" type="text/css">.bob{border:0}</style>');
  		if ($("#h-colors").val() != "") { $("#colors").val($("#h-colors").val()); }
  		if ($("#h-width").val() != "") { $("#width").val($("#h-width").val()); }
  		if ($("#image").val() != "") {
  		  go();
  		}
  	});
  </script>  
  <script type="text/javascript">
  var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
  document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
  </script>
  <script type="text/javascript">
  var pageTracker = _gat._getTracker("UA-70669-14");
  pageTracker._initData();
  pageTracker._trackPageview();
  </script>
</body>
</html>
