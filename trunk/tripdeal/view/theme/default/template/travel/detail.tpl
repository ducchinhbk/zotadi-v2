<?php  $this->load->helper('customize');?>
<?php echo $header; ?>
<!-- End divMenu -->
<div class="wrapProductImgOut">
    <div class="container">
        <div id="jslidernews" class="divProductImgOut lof-slidecontent">
            <div class="preload">
                <div></div>
            </div>
            <div class="main-slider-content">
                <ul class="sliders-wrap-inner">
                    <?php for($i=0; $i<count($product_images);$i++){?>
                        <li><img src="<?php echo $product_images[$i]['large_image']; ?>"></li>
                    <?php }?>
                    
                </ul>
            </div>
            <div class="navigator-content">
                <div class="button-next">Next</div>
                <div class="navigator-wrapper">
                    <ul class="navigator-wrap-inner">
                        <?php for($i =count($product_images)-1; $i>=0; $i--){?>
                            <li><img src="<?php echo $product_images[$i]['small_image']; ?>"></li>
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
        <p class="product-title"><?php echo $product['name']; ?> </p>

        <div class="remain-time hasCountdown">
            <div id="decountdown"></div>
           
            <div class="clearfix"></div>
        </div>
        <div class="addthistoolbox"><h3> <?php echo $product['duration']; ?></h3></div>
        <div class="add_duration">
            <div class="fb-like" data-href="/<?php echo DIR_ROOT_NAME.'/?route=travel/detail&tour='.encrypt_product_id($product[0]['product_id']); ?>" data-layout="button_count" data-action="like" data-show-faces="true" data-share="true"></div>
        </div>
        
        <div class="clearfix"></div>
    </div>
    <div class="product-infoR">
        <div class="buy-wrapper">
            <div class="list-price"><?php echo $text_original_price; ?>: <?php echo number_format($product['dis_price'], '0', '', '.'); ?><sup>đ</sup>  ( <?php echo cal_percent((int)$product['price'], (int)$product['dis_price']); ?>% )</div>
            <div class="sell-price"><?php echo number_format($product['price'], '0', '', '.'); ?><sup>đ</sup></div>
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
            <?php echo html_entity_decode($product['description']); ?>
        </div>
        <div class="tab-pane" id="detailTb">
            <?php echo html_entity_decode($product['itinerary']); ?>
        </div>
        <div class="tab-pane" id="noteTb">
            <?php echo html_entity_decode($product['term_condition']); ?>
        </div>
    </div>
</div>
<div class="divColumnR">
    <div class="productSibar">
        <p class="sec-title"><?php echo $text_provider; ?></p>
       <div class="address-box">	
                <div class="avar_title">
			         <div class="iti_avatar">
			             <a href="<?php echo $partner['url']?>"> <img src="<?php echo $partner['image']?> " alt="buffalo"></a>
			         </div>
			         <a href="<?php echo $partner['url']?>"> <h3 class="service_title"> <?php echo $partner['name']?></h3></a>
			     </div>
    			<div class="descript">
        			<p><?php echo $partner['introduction']?></p>
                </div>
       </div>
        
       <?php if($related_products) { ?>
        <p class="sec-title"><?php echo $text_feature_tour;?></p>

        <div class="prodSibar">
            <?php foreach($related_products as $product){?>
                <div class="itemProd">
                    <a href="<?php echo $product['url']; ?>" class="imgProd">
                        <img src="<?php echo $product['image']; ?>" alt="<?php echo $product['name']; ?>" style="height: 130px;">
                    </a>
    
                    <div class="desProd1">
                        <p class="name na_small"><a href="<?php echo $product['url']; ?>"> <?php echo $product['name']; ?></a></p>
    
                        <div class="divPriceInfo">
                            <div class="priceOff po_small"><?php echo cal_percent((int)$product['price'], (int)$product['dis_price']); ?><i>%</i></div>
                            <div class="price">
                                <p class="priceSale ps_small"><?php echo number_format($product['price'], '0', '', '.'); ?>đ</p>
    
                                <p class="priceNews pn_small"><?php echo number_format($product['dis_price'], '0', '', '.'); ?><sup>đ</sup></p>
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
         <?php }?>
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
        <div class="poup_contact_info">
            <div class="akordeon-item-content">
                <form  name="myForm" action="" method="post" onsubmit="return validateForm();">
                    <div class="styleCheck">
                        <p class="titlePV"><?php echo $text_contact; ?></p>

                        <div class="pMr"><?php echo $text_keep_secret; ?>.
                        </div>
                        <ul class="liCheckI">
                            <li class="pad">
                                <input name="txtFirstname" type="text" value="" id="txtFirstname"
                                       class="textbox" placeholder="<?php echo $text_fname; ?>"/>
                            </li>
                            <li class="pad1">
                                <input name="txtLastname" type="text" value="" id="txtLastname"
                                       class="textbox" placeholder="<?php echo $text_lname; ?>"/>
                            </li>
                            <li class="pad">
                                <input name="txtAddress" type="text" value="" id="txAddress" class="textbox"
                                       placeholder="<?php echo $text_address; ?>"/>
                            </li>
                            <li class="pad1">
                                <input name="txtPhone" type="text" value="" id="txtPhone" tabindex="5"
                                       class="textbox" placeholder="<?php echo $text_telephone; ?>"/>
                            </li>

                            <li class="pad">
                                <input name="txtEmail" type="text" value="" id="txtEmail" tabindex="5"
                                       class="textbox" placeholder="<?php echo $text_email; ?>"/>
                            </li>
                            <input name="product_id" type="hidden" value="<?php echo $product['product_id'];?>" />
                            <input name="dis_price" type="hidden" value="<?php echo $product['dis_price'];?>" />
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
<script>
function validateForm() {
    var fname = document.forms["myForm"]["txtFirstname"].value;
    var lname = document.forms["myForm"]["txtLastname"].value;
    var address = document.forms["myForm"]["txtAddress"].value;
    var phone = document.forms["myForm"]["txtPhone"].value;
    var email = document.forms["myForm"]["txtEmail"].value;
    var atpos = email.indexOf("@");
    var dotpos = email.lastIndexOf(".");
     
    if (fname.length < 2 ||lname.length > 40 ) {
        alert("<?php echo $text_error_fname;?>");
        return false;
    }
    if (lname.length < 2 ||lname.length > 40) {
        alert("<?php echo $text_error_lname;?>");
        return false;
    }
    if (address.length < 2 ||address.length > 140) {
        alert("<?php echo $text_error_address;?>");
        return false;
    }
    if (phone.length < 2 ||phone.length > 40) {
        alert("<?php echo $text_error_phone;?>");
        return false;
    }
    if (atpos<1 || dotpos<atpos+2 || dotpos+2>=email.length) {
        alert("<?php echo $text_error_email;?>");
        return false;
    }
}
</script>
<?php echo $footer; ?>