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

<!-- seach form -->
<?php echo $search; ?>

<!-- CONTENT HOME -->
<div class="wrapContent">
    <div class="container">
        <div class="divContent">
            <p class="titleName">Có <?php echo $total; ?> deal mới nhận</p>
            <div id="main" role="main">
                <div class="divProduct listProduct">
                    <?php $i = 0; foreach( $dataModel as $row){
                        if( $i%2 == 0 ){ ?>
                            <div class="autoSizeProd">
                                <div class="itemProd">
                                    <a href="#" class="imgProd">
                                        <img src="<?php echo $row['image']; ?>" style="width: 450px !important;height: 221px !important;">
                                        <div class="mask"></div>
                                    </a>
                                    <div class="desProd1">
                                        <p class="name"><a href="#"><?php echo $row['name']; ?></a></p>
                                        <div class="divPriceInfo">
                                            <div class="priceOff">10<i>%</i></div>
                                            <div class="price">
                                                <p class="priceSale"><?php echo $row['price']; ?>đ</p>
                                                <p class="priceNews"><?php echo $row['disprice']; ?><sup>đ</sup></p>
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
                                    <a href="#" class="imgProd">
                                        <img src="<?php echo $row['image']; ?>" style="width: 450px !important;height: 294px !important;">
                                        <div class="mask"></div>
                                    </a>
                                    <div class="desProd1">
                                        <p class="name"><a href="#"> <?php echo $row['name']; ?></a></p>
                                        <div class="divPriceInfo">
                                            <div class="priceOff">10<i>%</i></div>
                                            <div class="price">
                                                <p class="priceSale"><?php echo $row['price']; ?>đ</p>
                                                <p class="priceNews"><?php echo $row['disprice']; ?><sup>đ</sup></p>
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
<?php echo $footer; ?>