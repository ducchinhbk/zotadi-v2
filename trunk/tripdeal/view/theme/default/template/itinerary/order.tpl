<?php  $this->load->helper('customize');?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Zotadi</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0"/>
    <link href="<?php echo DIR_ROOT_NAME ?>/view/theme/default/stylesheet/style.css" rel="stylesheet" media="screen">
    <link href="<?php echo DIR_ROOT_NAME ?>/view/javascript/jquery/jquery-ui.min.css" rel="stylesheet">
    
    <!-------------------->
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
<div class="wrapTop">
    <div class="container">
        <div class="divTop">
            <div class="phone">(+084) 08 3999 999</div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>
<!-- End divTop -->


<!-- CONTENT HOME -->
<div class="wrapContent">
    <div class="container">
        <div class="divContent">
            <p class="titleName"><?php echo $text_your_itinerary;?></p>
            <div id="main" role="main">
                <div class="divProduct listProduct">
                    <?php $i = 0; foreach($dataModel as $row){
                        if( $i%2 == 0 ){ ?>
                            <div class="autoSizeProd">
                                <div class="itemProd">
                                    <a href="/<?php echo DIR_ROOT_NAME.'/?route=itinerary/detail&tour='.encrypt_product_id($row['product_id']); ?>" class="imgProd">
                                        <img src="<?php echo '/'.DIR_ROOT_NAME.'/image/'. $row['image']; ?>" style="width: 450px !important;height: 221px !important;">
                                        <div class="mask"></div>
                                    </a>
                                    <div class="desProd1">
                                        <p class="name"><a href="/<?php echo DIR_ROOT_NAME.'/?route=itinerary/detail&tour='.encrypt_product_id($row['product_id']); ?>"><?php echo $row['name']; ?></a></p>
                                        <div class="divPriceInfo">
                                            <div class="priceOff"><?php echo cal_percent((int)$row['price'], (int)$row['dis_price']); ?><i>%</i></div>
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
                        
                        <?php } else {?>
                                <div class="autoSizeProd">
                                <div class="itemProd">
                                    <a href="/<?php echo DIR_ROOT_NAME.'/?route=itinerary/detail&tour='.encrypt_product_id($row['product_id']); ?>" class="imgProd">
                                        <img src="<?php echo '/'.DIR_ROOT_NAME.'/image/'. $row['image']; ?>" style="width: 450px !important;height: 294px !important;">
                                        <div class="mask"></div>
                                    </a>
                                    <div class="desProd1">
                                        <p class="name"><a href="/<?php echo DIR_ROOT_NAME.'/?route=itinerary/detail&tour='.encrypt_product_id($row['product_id']); ?>"> <?php echo $row['name']; ?></a></p>
                                        <div class="divPriceInfo">
                                            <div class="priceOff"><?php echo cal_percent((int)$row['price'], (int)$row['dis_price']); ?><i>%</i></div>
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
<script src="<?php echo DIR_ROOT_NAME ?>/view/javascript/jquery/jquery.js"></script>
    <script src="<?php echo DIR_ROOT_NAME ?>/view/javascript/jquery/jquery.easing.js"></script>
    <script src="<?php echo DIR_ROOT_NAME ?>/view/javascript/slider.js"></script>
    <script src="<?php echo DIR_ROOT_NAME ?>/view/javascript/jquery/jquery.wss.js"></script>
    <script src="<?php echo DIR_ROOT_NAME ?>/view/javascript/jquery/jquery.akordeon.js"></script>
    <script src="<?php echo DIR_ROOT_NAME ?>/view/javascript/jquery/jquery-ui.min.js"></script>
    <!-- LOGIC SCRIPT ---->
    <script src="<?php echo DIR_ROOT_NAME ?>/view/javascript/logicfunction/tripdeal_function.js"></script>


</body>
</html>