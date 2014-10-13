<?php echo $header; ?>

<!-- End divMenu -->
<div class="wrapSilde">
    <div id="divBannerslider" class="lof-slidecontent divBannerslider">
        <div class="preload"><div></div></div>
        <div class="main-slider-content">
            <ul class="sliders-wrap-inner">
                <li><a href="#"><img src="tripdeal/view/theme/default/image/issets/banner1.png" height="340"></a></li>
                <li><a href="#"><img src="tripdeal/view/theme/default/image/issets/banner2.png" height="340"></a></li>
                <li><a href="#"><img src="tripdeal/view/theme/default/image/issets/banner3.png" height="340"></a></li>
            </ul>
        </div>
    </div>
</div>
<!-- End SLIDE -->

<div class="wrapPage">
  <div class="container">
	<h1 style="padding: 20px;"> <?php echo $name; ?> </h1>
     <div style="padding: 20px;"> <?php echo html_entity_decode($description); ?>  </div>     	
</div>
</div>
<!-- END: content page -->
<input type="hidden" id="redirectUrl" value="<?php echo $redirectUrl; ?>"/>
<?php echo $footer; ?>