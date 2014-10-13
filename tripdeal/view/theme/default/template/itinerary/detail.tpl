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

<div class="wrapProductImgOut">
    <div class="container">
        <div id="jslidernews" class="divProductImgOut lof-slidecontent">
            <div class="preload">
                <div></div>
            </div>
            <div class="main-slider-content">
                <ul class="sliders-wrap-inner">
                    <?php for($i=0; $i<count($product_images);$i++){?>
                        <li><img src="<?php echo '/'.DIR_ROOT_NAME.'/image/'. $product_images[$i]['image']; ?>"></li>
                    <?php }?>
                    
                </ul>
            </div>
            <div class="navigator-content">
                <div class="button-next">Next</div>
                <div class="navigator-wrapper">
                    <ul class="navigator-wrap-inner">
                        <?php for($i =count($product_images)-1; $i>=0; $i--){?>
                            <li><img src="<?php echo '/'.DIR_ROOT_NAME.'/image/'. $product_images[$i]['image']; ?>"></li>
                        <?php }?>
                    </ul>
                </div>
                <div class="button-previous">Previous</div>
            </div>
        </div>
    </div>
</div>
<!-- End SLIDE -->
<div class="wrapProductDetail">
<div class="container">
<div class="divProductDetail">
<div class="product-info">
    <div class="fillL"></div>
    <div class="fillR"></div>
    <div class="product-infoL">
        <div class="product-star"><?php echo $text_start_place; ?></div>
        <p class="product-title"><?php echo $product[0]['name']; ?> </p>

        <div class="addthistoolbox"><div class="itinerary-price"><?php echo number_format($product[0]['price'], '0', '', '.'); ?><sup>d</sup></div><div class="in_note">Price/person</div></div>
        <div class="addthistoolbox"><h3> <?php echo $product[0]['duration']; ?></h3></div>
        <div class="add_duration">
            <div class="fb-like" data-href="/<?php echo DIR_ROOT_NAME.'/?route=travel/detail&tour='.encrypt_product_id($product[0]['product_id']); ?>" data-layout="button_count" data-action="like" data-show-faces="true" data-share="true"></div>
        </div>
        <div class="clearfix"></div>
    </div>
    <div class="product-infoR">
        <div class="iti_buy_wrapper">
            <div class="divCrlt">
                <div id="buttonBuy" class="button btColor btLarge"><?php echo $text_buynow; ?></div>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
</div>
<div class="divColumn">

<div class="divColumnL">
    <div class="divTab">
        <ul class="nav nav-tabs" id="myTab">
            <li class="active"><i></i><a href="#overviewTb"><?php echo $text_over_view; ?></a></li>
            <li><i></i><a href="#detailTb"><?php echo $text_itinary; ?></a></li>
            <li><i></i><a href="#noteTb"><?php echo $text_note;?></a></li>
        </ul>
        <div class="tab-pane active" id="overviewTb">
            <?php echo html_entity_decode($product[0]['description']); ?>
        </div>
        <div class="tab-pane" id="detailTb">
            <?php echo html_entity_decode($product[0]['itinerary']); ?>
        </div>
        <div class="tab-pane" id="noteTb">
            <?php echo html_entity_decode($product[0]['term_condition']); ?>
        </div>
    </div>
</div>
<div class="divColumnR">
    <div class="productSibar">
        <p class="sec-title"><?php echo $text_service_provider; ?></p>
			<div class="address-box">	
                <div class="avar_title">
			         <div class="iti_avatar">
			             <a href="#"> <img src="<?php echo '/'.DIR_ROOT_NAME.'/image/buffalo.png'?>" alt="buffalo"/></a>
			         </div>
			         <a href="#"> <h3 class="service_title"> Cong ty du lich Buffalo Tour</h3></a>
			     </div>
    			<div class="descript">
        			<p>Established in 1994, Buffalo Tours offers the best customised and private guided tours to Vietnam, Laos, Cambodia, Thailand and Burma. We plan itineraries and can tailor our tours to feature the highlights of the countries, within the duration that you'll be visiting.
                        Our western managed sales team live and breathe Indochina, Thailand and Burma - it is our home, after all! For customised, private guided tours or small group tours to Vietnam, Laos, Cambodia, Thailand or Burma, and a one stop travel shop, look no further than Buffalo Tours!
                    </p>
                </div>
            </div>
        <p class="sec-title"><?php echo $text_feature_tour;?></p>

        <div class="prodSibar">
            <?php foreach($related_products as $product){?>
                <div class="itemProd">
                    <a href="/<?php echo DIR_ROOT_NAME.'/?route=travel/detail&tour='.encrypt_product_id($product['product_id']); ?>" class="imgProd">
                        <img src="<?php echo '/'.DIR_ROOT_NAME.'/image/'. $product['image']; ?>" alt="<?php echo $product['name']; ?>" style="height: 130px;">
                    </a>
    
                    <div class="desProd1">
                        <p class="name na_small"><a href="/<?php echo DIR_ROOT_NAME.'/?route=travel/detail&tour='.encrypt_product_id($product['product_id']); ?>"> <?php echo $product['name']; ?></a></p>
    
                        <div class="divPriceInfo">
                            <div class="priceOff po_small"><?php echo cal_percent((int)$product['price'], (int)$product['dis_price']); ?><i>%</i></div>
                            <div class="price">
                                <p class="priceSale ps_small"><?php echo number_format($product['price'], '0', '', '.'); ?>d</p>
    
                                <p class="priceNews pn_small"><?php echo number_format($product['dis_price'], '0', '', '.'); ?><sup>d</sup></p>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="divMeta">
                        <div class="icTime divCountdown"></div>
                    </div>
                    <i class="icSale"></i>
                </div>
            <?php } ?>
            
            <!---->
        </div>
    </div>
</div>
<div class="clearfix"></div>
</div>
<!--column-->
</div>
</div>
</div>

<div id="popup_contact" class="popup_contact">
    <center>
        <div class="poup_confirm_code">
            <div class="akordeon-item-content">
                <form action="#" method="post">
                    <div class="styleCheck">
                        <p class="titlePV" style="border: none !important;"><?php echo $text_contact; ?></p>

                        <div class="pMr"><?php echo $text_keep_secret; ?>.
                        </div>
                        <ul class="liCheckI">
                          
                            <li class="pad1" style="width: 80% !important;">
                                <input name="conf_code" type="text" value="<?php echo $text_confirmed_code; ?>" id="conf_code" tabindex="5"
                                       class="textbox" onfocus="if(this.value=='<?php echo $text_confirmed_code; ?>')this.value='';"
                                       onblur="if(this.value=='')this.value='<?php echo $text_confirmed_code; ?>';"/>
                            </li>

                            <div class="clearfix"></div>
                        </ul>
                    </div>
                    <div class="btn_wrapper"><input type="submit" class="button" value="Send"/></div>
                </form>
            </div>
        </div>
    </center>
    <!-- Add an optional button to close the popup -->
    <button class="popup_contact_close">X</button>

</div>
<?php echo $footer; ?>