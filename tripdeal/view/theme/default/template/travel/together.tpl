<?php  $this->load->helper('customize');?>
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
    <div class="jogrutotrip">
        <div class="container">
            
            <div class="jogrutotrip-desp">
                <?php echo $text_slide_text1; ?>,<br>
                <?php echo $text_slide_text2; ?>
            </div>
            <div class="divNational">
                <ul>
                    <li><a class="asia" href="#"></a></li>
                    <li><a class="africa" href="#"></a></li>
                    <li><a class="europe" href="#"></a></li>
                    <li><a class="north-america" href="#"></a></li>
                    <li><a class="oceania" href="#"></a></li>
                    <li><a class="south-america" href="#"></a></li>
                    <li class="arowOr"></li>
                    <li><a href="/<?php echo DIR_ROOT_NAME ?>/?route=travel/custom" class="plantrip_btn"></a></li>
                </ul>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
</div>
<!-- End SLIDE -->

<!-- seach form -->


<!-- CONTENT HOME -->
<div class="wrapContent">
    <div class="container">
        <div class="divContent">
            <p class="titleName"><?php echo $text_intro; ?></p>
            <div id="main" role="main">
                <div class="divProduct listProduct">
                    <?php foreach($itineraries as $row) { ?>
                            <div class="autoSizeProd">
                                <div class="itemProd">
                                    <a href="<?php echo $row['url']; ?>" class="imgProd">
                                        <img src="<?php echo $row['image'];; ?>" style="height: 207px !important;">
                                        <div class="mask"></div>
                                    </a>
                                    <div class="desProd1">
                                        <p class="name"><a href="<?php echo $row['url']; ?>"><?php echo $row['name']; ?></a></p>
                                        <div class="divPriceInfo">
                                            <div class="divInfo">
                                                <p class="priceNews"><?php echo number_format($row['dis_price'],'0','','.'); ?><sup>d</sup></p>
                                                <div class="dateNumber"><?php echo $row['duration']; ?></div>
                                            </div>
                                            
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="divRigntInfo">
                                            <div class="hostAvatar"><img src="<?php echo DIR_ROOT_NAME ?>/view/theme/default/image/issets/avatar.png" alt="George Tran"></div>
                                            <span class="hostName"><?php echo $row['customer']; ?></span>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="divMeta">
                                        <span style="text-transform: uppercase;"> <?php echo $row['partner_name']; ?></span>
                                    </div>
                                </div>
                            </div>
                    <div class="clearfix"></div>
                    <?php } ?>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="divPage">
                <?php echo $pagination;?>
                
            </div>
        </div>
    </div>
</div>
<input type="hidden" id="redirectUrl" value="<?php echo $redirectUrl; ?>"/>
<?php echo $footer; ?>