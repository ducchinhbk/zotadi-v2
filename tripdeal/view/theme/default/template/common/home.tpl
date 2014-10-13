<?php echo $header; ?>
<!-- End divMenu -->
<div class="wrapSilde">
    <div id="divFlexslider" class="lof-slidecontent divFlexslider">
        <div class="preload">
            <div></div>
        </div>
        <div class="main-slider-content">
            <ul class="sliders-wrap-inner">
                <li><img src="tripdeal/view/theme/default/image/issets/sl1.png"></li>
                <li><img src="tripdeal/view/theme/default/image/issets/sl2.png"></li>
                <li><img src="tripdeal/view/theme/default/image/issets/sl3.png"></li>
                <li><img src="tripdeal/view/theme/default/image/issets/sl1.png"></li>
            </ul>
        </div>
    </div>
    <div class="jogrutotrip">
        <div class="container">
            <div class="jogrutotripName"><img src="tripdeal/view/theme/default/image/issets/jogurutriphobo.png"></div>
            <div class="jogrutotrip-desp">
                A vagrant, whose impetus is travel,<br>
                the love of the journey above the actual destination.
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
<?php echo $search; ?>

<!-- CONTENT HOME -->
<div class="wrapContent">
    <div class="container">
        <div class="divContent">
            <p class="titleName">Deal mới nhận</p>

            <div class="divProduct">
                <?php echo $newdeal; ?>

                <div id="moreNewDealDiv"></div>
                <div class="clearfix"></div>
            </div>
            <div class="divCrlt">
                <a href="/<?php echo DIR_ROOT_NAME ?>/?route=travel/cate&deal-moi-nhan" class="button">Xem thêm</a>
            </div>
        </div>
    </div>
</div>
<!-- END: CONTENT HOME -->
<!---->

<!---->
<div class="wrapBgHome">
    <div class="container">
        <div class="divBgHome">
            <p class="titleN">Deal nổi bật</p>

            <div class="divProduct">

                <?php echo $hotdeal; ?>

                <div class="clearfix"></div>
            </div>
            <div class="divCrlt">
                <a href="/<?php echo DIR_ROOT_NAME ?>/?route=travel/cate&deal-hot" class="button btColor">Xem thêm</a>
            </div>
        </div>
    </div>
</div>
<div class="wrapGroupImg">
    <div class="container">
        <div class="divGroupImg">
            <div class="autoSizeImg">
                <div class="marketing-text">
                    <div class="separator"></div>
                    <p class="name">Last year, 25 million Europeans chose a holiday home over a hotel room.</p>

                    <p class="sumary">Enjoy the comforts of an affordable holiday home, with the peace of mind of
                        booking through HouseTrip.</p>

                    <div class="separator"></div>
                </div>
            </div>
            <div class="autoSizeImg1">
                <div class="autoSizeImg1">
                    <div class="divImgRemo"
                         style="background:url(tripdeal/view/theme/default/image/issets/majorca.jpg) no-repeat -20px 0px">
                        <a href="#">
                            <div class="overlay"></div>
                            <div class="property-name">Rome</div>
                            <div class="property-count">3439 properties</div>
                        </a>
                    </div>
                </div>
                <div class="autoSizeImg2">
                    <div class="divImgRemo"
                         style="background:url(tripdeal/view/theme/default/image/issets/london.jpg) no-repeat -20px -40px">
                        <a href="#">
                            <div class="overlay"></div>
                            <div class="property-name">Lodon</div>
                            <div class="property-count">3439 properties</div>
                        </a>
                    </div>
                </div>
                <div class="autoSizeImg3">
                    <div class="divImgRemo"
                         style="background:url(tripdeal/view/theme/default/image/issets/paris.jpg) no-repeat -20px -200px">
                        <a href="#">
                            <div class="overlay"></div>
                            <div class="property-name">Paris</div>
                            <div class="property-count">3439 properties</div>
                        </a>
                    </div>
                </div>
                <div class="autoSizeImg1">
                    <div class="divImgRemo"
                         style="background:url(tripdeal/view/theme/default/image/issets/majorca.jpg) no-repeat -20px 0px">
                        <a href="#">
                            <div class="overlay"></div>
                            <div class="property-name">Rome ann</div>
                            <div class="property-count">3439 properties</div>
                        </a>
                    </div>
                </div>
                <div class="autoSizeImg1">
                    <div class="divImgRemo"
                         style="background:url(tripdeal/view/theme/default/image/issets/majorca.jpg) no-repeat -20px -50px">
                        <a href="#">
                            <div class="overlay"></div>
                            <div class="property-name">Rome</div>
                            <div class="property-count">3439 properties</div>
                        </a>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>
<input type="hidden" id="redirectUrl" value="<?php echo $redirectUrl; ?>"/>

<?php echo $footer; ?>