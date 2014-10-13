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
    <div class="last_data">
        <div id="order-input" class="order-input">
          <div class="order-input-inner clearfix">
            <h2><span class="check_order_icons check_order_ico_1"></span><?php echo $text_title; ?></h2>
            <ul class="clearfix">
              <li><span class="check_order_icons check_order_ico_2"></span><?php echo $text_order_status; ?></li>
              <li><span class="check_order_icons check_order_ico_3"></span><?php echo $text_order_position; ?></li>
              <li><span class="check_order_icons check_order_ico_4"></span><?php echo $text_shipping; ?></li>
            </ul>
            <div class="formcode2">
              <div class="forminput clearfix">
                <ul class="clearfix">
                  <li>
                    <div class="verify-code-label clearfix"><span><?php echo $text_order_code; ?></span>
                      <div class="tips"><a href="#"></a>
                        <div class="tips-inner"><i></i>
                          <p><strong>B?n có th? tra c?u mã don hàng theo 3 cách:</strong></p>
                          <p>   - Ðang nh?p vào tài kho?n c?a b?n t?i Lazada.vn<br>
                                - Ki?m tra email xác nh?n don hàng mà Lazada.vn dã g?i cho b?n <br>
                                - Ki?m tra tin nh?n Lazada dã g?i cho b?n sau khi d?t hàng thành công</p>
                        </div>
                      </div>
                    </div>
                    <input type="text" autocomplete="off" placeholder="Vi du: 300397522" class="input" id="order-code" name="order_code">
                  </li>
                  <li>
                    <label class="verify-code-label" style="padding: 9px 20px;"><?php echo $text_order_email; ?></label>
                    <input type="text" id="email_verify" name="email_verify" class="input verify-field">
                  </li>
                </ul>
                <p class="mgBox"><span id="checkOrder" class="first"><strong class="hide">Nh?p s? don hàng</strong> </span><span id="checkCaptcha" class="last"><strong class="hide">Vui lòng nh?p mã b?o m?t</strong></span></p>
              </div>
              <div class="btn-type clearfix">
                <div class="test"><span>Neu quy khach co bat ky thac mac nao, xin vui long lien he tong dai ho tro (08) 3930 8290 </span></div>
                
                <input type="submit" id="order-detail-sumbit" title="Check now" value="<?php echo $text_check_now; ?>" class="button">
                
               </div>
            </div>
            
          </div>
        </div>
        
        <!-- start content-order-->
    <div class="order_content_box" id="order_content_box" style="display: block;"> 
        <div class="order_header">
            <h3>Chao ban, duoi day la thong tin don hang cua ban:</h3>
            
            <label>Thanh pho:</label>
            <span>Bangkok, Singapore, Manila</span>
            <div class="clearfix"></div>
            <label>Ngay khoi hanh:</label>
            <span>30/10/2014</span>
            <label>So ngay di:</label>
            <span>5 ngay</span>
            <label>Travel style:</label>
            <span>Luxury, family vacation</span>
            <label>Accommodation:</label>
            <span>5 star</span>
            <label>Budget/person:</label>
            <span>500 USD</span>
            <label>Your trip idea:</label>
            <span>jfhadjlfhadf lfhadlfdahlf lfhadlfhad fhladkfhadl lfhadlfhkad</span>
            <label>Want people to go with?:</label>
            <span>Yes</span>
          </div>
          <h1>Thong tin hanh trinh</h1>
         <div class="content">
            <table class="list">
              <thead>
                <tr>
                  <td class="center">Image</td>
                  <td class="left">                
                    Deal name
                  </td>
                  <td class="left">                
                    Partner
                  </td>
                  <td class="left">                
                    Price
                  </td>
                  <td class="left">                
                    Status
                  </td>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td class="center"><a href="#" ><img src="http://localhost/tripdeal/image/cache/data/square-40x40.jpg" alt="Bangkok - Singapore  itinerary" ></a></td>
                  <td class="left"><a href="#" >Bangkok - Singapore  itinerary </a></td>
                  <td class="left">Cng ty Buffalo Tour</td>
                  <td class="left">3.960.000</td>
                  <td class="left">waiting approved</td>
                  
                </tr>
                <tr>
                  <td class="center"><a href="#" ><img src="http://localhost/tripdeal/image/cache/data/dalat-40x40.jpg" alt="Lao - Campuchia - Thailan itinerary"  ></a></td>
                  <td class="left"><a href="#" >Bangkok - Singapore  itinerary </a></td>
                  <td class="left">Cong ty Buffalo Tour</td>
                  <td class="left">3.000.000</td>
                  <td class="left">waiting approved</td>
                  
                </tr>
                <tr>
                  <td class="center"><a href="#" ><img src="http://localhost/tripdeal/image/cache/data/dalat-40x40.jpg" alt="Nha Trang - Da Lat combined tour" ></a></td>
                  <td class="left"><a href="#" >Bangkok - Singapore  itinerary </a></td>
                  <td class="left">Cong ty Buffalo Tour</td>
                  <td class="left">3.000.000</td>
                  <td class="left">waiting approved</td>
                 
                </tr>
                <tr>
                  <td class="center"><a href="#" ><img src="http://localhost/tripdeal/image/cache/data/square-40x40.jpg" alt="Tour Liên Tuy?n Phú Yên - Bình Ba" ></a></td>
                  <td class="left"><a href="#" >Bangkok - Singapore  itinerary </a></td>
                  <td class="left">Cong ty Buffalo Tour</td>
                  <td class="left">3.960.000</td>
                  <td class="left">waiting approved</td>
                </tr>
                <tr>
                  <td class="center"><a href="#" ><img src="http://localhost/tripdeal/image/cache/data/square-40x40.jpg" alt="Bangkok - Singapore  itinerary" ></a></td>
                  <td class="left"><a href="#" >Bangkok - Singapore  itinerary </a></td>
                  <td class="left">Cng ty Buffalo Tour</td>
                  <td class="left">3.960.000</td>
                  <td class="left">waiting approved</td>
                  
                </tr>
                <tr>
                  <td class="center"><a href="#" ><img src="http://localhost/tripdeal/image/cache/data/dalat-40x40.jpg" alt="Lao - Campuchia - Thailan itinerary"  ></a></td>
                  <td class="left"><a href="#" >Bangkok - Singapore  itinerary </a></td>
                  <td class="left">Cong ty Buffalo Tour</td>
                  <td class="left">3.000.000</td>
                  <td class="left">waiting approved</td>
                  
                </tr>
                <tr>
                  <td class="center"><a href="#" ><img src="http://localhost/tripdeal/image/cache/data/dalat-40x40.jpg" alt="Nha Trang - Da Lat combined tour" ></a></td>
                  <td class="left"><a href="#" >Bangkok - Singapore  itinerary </a></td>
                  <td class="left">Cong ty Buffalo Tour</td>
                  <td class="left">3.000.000</td>
                  <td class="left">waiting approved</td>
                 
                </tr>
                <tr>
                  <td class="center"><a href="#" ><img src="http://localhost/tripdeal/image/cache/data/square-40x40.jpg" alt="Tour Liên Tuy?n Phú Yên - Bình Ba" ></a></td>
                  <td class="left"><a href="#" >Bangkok - Singapore  itinerary </a></td>
                  <td class="left">Cong ty Buffalo Tour</td>
                  <td class="left">3.960.000</td>
                  <td class="left">waiting approved</td>
                </tr>
              </tbody>
            </table>
      
      </div>   
    </div>
        <!-- end content-order-->
        
</div>
           	
</div>
</div>
<!-- END: content page -->
<input type="hidden" id="redirectUrl" value="<?php echo $redirectUrl; ?>"/>
<?php echo $footer; ?>