<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Zotadi</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0"/>
    <link href="<?php echo DIR_ROOT_NAME ?>/view/theme/default/stylesheet/style.css" rel="stylesheet" media="screen">
    <link href="<?php echo DIR_ROOT_NAME ?>/view/javascript/jquery/jquery-ui.min.css" rel="stylesheet">
    <link href="<?php echo DIR_ROOT_NAME ?>/view/theme/default/stylesheet/customTooltip.css" rel="stylesheet">
    <!-------------------->

    <script src="<?php echo DIR_ROOT_NAME ?>/view/javascript/jquery/jquery.js"></script>
    <script src="<?php echo DIR_ROOT_NAME ?>/view/javascript/jquery/jquery.easing.js"></script>
    <script src="<?php echo DIR_ROOT_NAME ?>/view/javascript/slider.js"></script>
    <script src="<?php echo DIR_ROOT_NAME ?>/view/javascript/jquery/jquery.wss.js"></script>
    <script src="<?php echo DIR_ROOT_NAME ?>/view/javascript/jquery/jquery.akordeon.js"></script>
    <script src="<?php echo DIR_ROOT_NAME ?>/view/javascript/jquery/jquery-ui.min.js"></script>
    <script src="<?php echo DIR_ROOT_NAME ?>/view/javascript/jquery/customTooltip.js"></script>
    <!-- LOGIC SCRIPT ---->
    <script src="<?php echo DIR_ROOT_NAME ?>/view/javascript/logicfunction/tripdeal_function.js"></script>
    <script src="<?php echo DIR_ROOT_NAME ?>/view/javascript/jquery/jquery.popupoverlay.js"></script>
</head>
<body>
<div id="fb-root"></div>
<script>(function (d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s);
        js.id = id;
        js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.0";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>

<!-- divTop -->
<div class="wrapTop">
    <div class="container">
        <div class="divTop">
            <div class="txtLogin"><a
                        href="/<?php echo DIR_ROOT_NAME ?>/?route=travel/checkorder"><?php echo $text_check_order; ?></a>
            </div>
            <!--div class="txtLogin"><?php echo $text_login; ?></div-->
            <div class="divLanguage">
                <form action="/<?php echo DIR_ROOT_NAME ?>/?route=common/header" method="post"
                      enctype="multipart/form-data">
                    <a href="javascript:void(0);"
                       onclick="$('input[name=\'language_code\']').attr('value', 'vi'); $(this).parent().submit();"
                       class="flag-vn"></a>
                    <a href="javascript:void(0);"
                       onclick="$('input[name=\'language_code\']').attr('value', 'en'); $(this).parent().submit();"
                       class="flag-en active"></a>
                    <input type="hidden" name="language_code" value=""/>
                    <input type="hidden" name="redirectUrl" value="<?php echo $redirectUrl; ?>"/>

                    <div class="clearfix"></div>
                </form>
            </div>
            <div class="phone">(+084) 08 3999 999</div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>
<!-- End divTop -->
<!-- divMenu -->
<div class="divMenuFillteFlag"></div>
<div class="wrapMenu divMenuFillter">
    <div class="container">
        <div class="divMenu">
            <a class="logo" href="/<?php echo DIR_ROOT_NAME ?>"><img
                        src="<?php echo DIR_ROOT_NAME ?>/view/theme/default/image/issets/logo.png" alt="logo"> </a>
            <ul class="ulMenu">
                <li><a class="active" href="/<?php echo DIR_ROOT_NAME ?>"><?php echo $text_home; ?></a></li>
                <li>
                    <a href="/<?php echo DIR_ROOT_NAME ?>/?route=travel/cate"><?php echo $text_deal_travel; ?></a>
                </li>
                <li><a href="/<?php echo DIR_ROOT_NAME ?>/?route=travel/together"><?php echo $text_together; ?></a></li>
            </ul>
            <div class="clearfix"></div>
        </div>
    </div>
</div>