<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Zotadi</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0"/>
    <link href="<?php echo DIR_ROOT_NAME ?>/view/theme/default/stylesheet/style.css" rel="stylesheet" media="screen">
    
</head>
<body>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.0";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<!-- divTop -->

<!-- seach form -->
<!-- CONTENT HOME -->
<div class="wrapContent">
    <div class="container">
        <div class="checkout_left"><img src="image/data/thankyou.png" alt="thank you" /></div>
        <div class="checkout_right">
            <h1><?php echo $text_order_title; ?></h1>
            <p><?php echo $text_order_content; ?></p>
            <i><?php echo $text_note; ?></i></br>
            <span><?php echo $text_order_wish; ?></span>    
        </div>
        
    </div>
</div>
<input type="hidden" id="redirectUrl" value="<?php echo $redirectUrl; ?>"/>

</body>
</html>