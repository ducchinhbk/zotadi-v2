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
    <div class="part_inf">
        <img src="<?php echo $partner['image']?>" alt="<?php echo $partner['name']?>" />
        <h1>  <?php echo $partner['name']?></h1>  
    </div>
     <div class="divContent">
            <p class="titleName"><?php echo $text_feature_deal; ?></p>
            <div id="main" role="main">
                <div class="divProduct listProduct" style="height: 746px;">
                   <?php foreach($deals as $row) { ?>
                            <div class="autoSizeProd">
                                <div class="itemProd">
                                    <a href="<?php echo $row['url']; ?>" class="imgProd">
                                        <img src="<?php echo $row['image']; ?>" style="height: 207px !important;">
                                        <div class="mask"></div>
                                    </a>
                                    <div class="desProd2">
                                        <p class="name"><a href="<?php echo $row['url']; ?>"><?php echo $row['name']; ?></a></p>
                                        <div class="divPriceInfo">
                                            <div class="priceOff"><?php echo $row['percent']; ?><i>%</i></div>
                                            <div class="price">
                                                <p class="priceSale"><?php echo number_format($row['price'],'0','','.'); ?>d</p>
                                                <p class="priceNews"><?php echo number_format($row['dis_price'],'0','','.'); ?><sup>d</sup></p>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="dateNumber"><?php echo $row['duration']; ?></div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="divMeta">
                                        <div class="icTime divCountdown"></div>
                                    </div>
                                </div>
                            </div>
                    <div class="clearfix"></div>
                    <?php } ?>    
                 
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="divPage">
                </div>                
            </div>  	
</div>
</div>
<!-- END: content page -->
<input type="hidden" id="redirectUrl" value="<?php echo $redirectUrl; ?>"/>
<?php echo $footer; ?>