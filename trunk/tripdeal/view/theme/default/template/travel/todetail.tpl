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
        <p class="product-title"><?php echo $itinerary['name']; ?> </p>
        <div class="addthistoolbox"><?php echo $text_start_date; ?> <h3 style="margin-top: 10px; font-size: 14px;"> <?php echo date('d-m-Y', strtotime($itinerary['date_available'])) ; ?> </h3> </div>   
        <div class="addthistoolbox"><?php echo $text_num_date; ?><h3 style="margin-top: 10px; font-size: 14px;"> <?php echo $itinerary['duration']; ?></h3></div>
        <div class="add_duration">
            <div class="fb-like" data-href="/<?php echo DIR_ROOT_NAME.'/?route=travel/detail&tour='.encrypt_product_id($itinerary['itinerary_id']); ?>" data-layout="button_count" data-action="like" data-show-faces="true" data-share="true"></div>
        </div>
        
        <div class="clearfix"></div>
    </div>
    <div class="product-infoR">
        <div class="buy-wrapper">
            <div class="list-price"><?php  echo $text_price_person; ?> </div>
            <div class="sell-price"><?php echo number_format($itinerary['price'], '0', '', '.'); ?><sup>d</sup></div>
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
            <?php echo html_entity_decode($itinerary['description']); ?>
        </div>
        <div class="tab-pane" id="detailTb">
            <?php echo html_entity_decode($itinerary['itinerary']); ?>
        </div>
        <div class="tab-pane" id="noteTb">
            <?php echo html_entity_decode($itinerary['term_condition']); ?>
        </div>
    </div>
</div>
<div class="divColumnR">
    <div class="productSibar">
       <p class="sec-title"><?php echo $text_service_provider;?></p>
       <div class="address-box">	
                <div class="avar_title">
			         <div class="iti_avatar">
			             <a href="<?php echo $partner['url']?>"> <img src="<?php echo $partner['image']?>" alt="buffalo"></a>
			         </div>
			         <a href="<?php echo $partner['url']?>"> <h3 class="service_title"> <?php echo $partner['name']?></h3></a>
			     </div>
    			<div class="descript">
        			<p>
                        <?php echo $partner['introduction']?>
                    </p>
                </div>
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
                            <input name="itinerary_id" type="hidden" value="<?php echo $itinerary['itinerary_id'];?>" />
                            <input name="price" type="hidden" value="<?php echo $itinerary['price'];?>" />
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