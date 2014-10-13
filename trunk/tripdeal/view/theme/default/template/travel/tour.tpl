<?php  $this->load->helper('customize');?>
<?php echo $header; ?>
<!-- End divMenu -->
<div class="wrapSilde">
    <div id="divBannerslider" class="lof-slidecontent divBannerslider">
        <div class="preload"><div></div></div>
        <div class="main-slider-content">
            <ul class="sliders-wrap-inner">
                <li><a href="#"><img src="tripdeal/view/theme/default/image/issets/banner3.png" height="340"></a></li>
                <li><a href="#"><img src="tripdeal/view/theme/default/image/issets/banner2.png" height="340"></a></li>
                <li><a href="#"><img src="tripdeal/view/theme/default/image/issets/banner1.png" height="340"></a></li>
            </ul>
        </div>
    </div>
</div>
<!-- End SLIDE -->

<!-- seach form -->


<!-- CONTENT HOME -->
<div class="wrapContent">
    <div class="container">
        <div class="divContent">
            <p class="titleName"><?php echo $text_all_deal.' ( '.$total.' deal )'; ?></p>
            <div id="main" role="main">
                <div class="divProduct listProduct">
                    <?php $i = 0; foreach($dataModel as $row){
                        if( $i%2 == 0 ){ ?>
                            <div class="autoSizeProd">
                                <div class="itemProd">
                                    <a href="/<?php echo DIR_ROOT_NAME.'/?route=travel/detail&tour='.encrypt_product_id($row['product_id']); ?>" class="imgProd">
                                        <img src="<?php echo '/'.DIR_ROOT_NAME.'/image/'. $row['image']; ?>" style="width: 450px !important;height: 221px !important;">
                                        <div class="mask"></div>
                                    </a>
                                    <div class="desProd2">
                                        <p class="name"><a href="/<?php echo DIR_ROOT_NAME.'/?route=travel/detail&tour='.encrypt_product_id($row['product_id']); ?>"><?php echo $row['name']; ?></a></p>
                                        <div class="divPriceInfo">
                                            <div class="priceOff"><?php echo cal_percent((int)$row['price'], (int)$row['dis_price']); ?><i>%</i></div>
                                            <div class="price">
                                                <p class="priceSale"><?php echo number_format($row['price'],'0','','.'); ?>đ</p>
                                                <p class="priceNews"><?php echo number_format($row['dis_price'],'0','','.'); ?><sup>đ</sup></p>
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
                        
                        <?php } else {?>
                                <div class="autoSizeProd">
                                <div class="itemProd">
                                    <a href="/<?php echo DIR_ROOT_NAME.'/?route=travel/detail&tour='.encrypt_product_id($row['product_id']); ?>" class="imgProd">
                                        <img src="<?php echo '/'.DIR_ROOT_NAME.'/image/'. $row['image']; ?>" style="width: 450px !important;height: 294px !important;">
                                        <div class="mask"></div>
                                    </a>
                                    <div class="desProd2">
                                        <p class="name"><a href="/<?php echo DIR_ROOT_NAME.'/?route=travel/detail&tour='.encrypt_product_id($row['product_id']); ?>"> <?php echo $row['name']; ?></a></p>
                                        <div class="divPriceInfo">
                                            <div class="priceOff"><?php echo cal_percent((int)$row['price'], (int)$row['dis_price']); ?><i>%</i></div>
                                            <div class="price">
                                                <p class="priceSale"><?php echo number_format($row['price'],'0','','.'); ?>đ</p>
                                                <p class="priceNews"><?php echo number_format($row['dis_price'],'0','','.'); ?><sup>đ</sup></p>
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
                           
                        
                    <?php } $i++; } ?>
                    
                    <div class="clearfix"></div>
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