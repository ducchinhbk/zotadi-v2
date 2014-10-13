<div class="wrapFooter">
    <div class="container">
        <div class="divFooter">
            <div class="autoSizeFooter ">
                <p class="titleFooter"> <strong><?php echo $text_zotadi; ?></strong></p>
                <ul class="navFooter">
                    <li><a href="/<?php echo DIR_ROOT_NAME ?>/?route=common/page&page=1"><?php echo $text_about_us; ?></a></li>
                    <li><a href="/<?php echo DIR_ROOT_NAME ?>/?route=common/page&page=2"><?php echo $text_reruitment; ?></a></li>
                    <li><a href="/<?php echo DIR_ROOT_NAME ?>/?route=common/page&page=3"> <?php echo $text_contact; ?></a></li>
                    <!--li><a href="#"> <?php echo $text_fback; ?></a></li-->
                </ul>
            </div>
            <div class="autoSizeFooter">
                <p class="titleFooter"><b><?php echo $text_help; ?></b></p>

                <p class="number">(08) 3930 8290</p>

                <p><?php echo $text_time; ?></p>

                <div class="facebookcommunitymore">
                    <span><?php echo $text_connect;?></span>
                    <a href="#" class="icFb"></a>
                    <a href="#" class="icGoogle"></a>
                    <a href="#" class="icTwitter"></a>
                    <a href="#" class="icYt"></a>

                    <div class="clearfix"></div>
                </div>
            </div>
            
            <div class="autoSizeFooter foo_right">
                <p class="titleFooter"><strong><?php echo $text_mobile_app; ?></strong></p>
                <ul class="navFooter">
                    <li><a class="app_icon icon-app-apple"></a></li>
                    <li><a class="app_icon icon-app-android"> </a></li>
                    <li><a  class="app_icon icon-app-window"></a></li>
                </ul>
            </div>
            
            <div class="clearfix"></div>
        </div>
    </div>
</div>

<div id="feedbackDiv" class="popup_contact">
    <center>
        <div class="poup_contact_info">
            <div class="akordeon-item-content">
                <div>
                    <div class="styleCheck">
                        <p class="titlePV"><?php echo $text_feedback; ?></p>
                    </div>
                    <div class="pMr"><?php echo $text_feed_info; ?>
                    </div>
                    <div>
                        <textarea name="message" type="text" placeholder="Your feedback"
                                  style="width: 437px; height: 136px;">
                        </textarea>
                    </div>
                    <div>
                        <input name="email" id="email" type="text" class="textbox" style="width: 220px;"
                               placeholder="Your email(will not be published)"/>
                    </div>
                    <div style="margin: 4px; display: block;">
                        <input style="width: 168px;" class="button"
                               onclick="submitFeedback('<?php echo DIR_ROOT_NAME?>');" value="<?php echo $text_send_feed; ?>">
                    </div>
                </div>
            </div>
        </div>
    </center>
    <button class="popup_contact_close" onclick="$('#feedbackDiv').popup('hide');">X</button>
</div>

<div id="popup_alert_footer" class="popup_contact">
    <center>
        <div class="poup_alert_footer">
            <div class="akordeon-item-content">
                <div style="text-align: center;line-height: 29px;font-size: 18px;margin-top: 45px;">
                    <?php echo $text_inconvenient; ?>
                </div>
            </div>
        </div>
    </center>
    <!--button class="popup_contact_close" >X</button-->
</div>

</body>
</html>