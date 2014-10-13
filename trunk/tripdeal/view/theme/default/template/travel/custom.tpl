<?php echo $header; ?>
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
                <li><img src="tripdeal/view/theme/default/image/issets/sl2.png"></li>
            </ul>
        </div>
    </div>

</div>
<!-- End SLIDE -->
<div class="wrapCusotmized">
<div class="container" style="max-width: 1136px !important;">
<div class="divCusotmized">
<div class="title"><?php echo $text_where_you_go;?></div>

<ul class="js_cont_list">
    <?php echo $continent; ?>
</ul>

<div class="clearfix"></div>
<div class="contentCustomized">
<div class="akordeon" id="buttons">

<div class="akordeon-item expanded" id="step1">
    <div class="akordeon-item-head">
        <div class="akordeon-item-head-container">
            <div class="akordeon-heading">
                <i>1</i>Select Location
            </div>
        </div>
    </div>
    <div class="akordeon-item-body">
        <div class="akordeon-item-content">
            <form>
                <div class="divCountry">
                    <a href="#pprev" class="pprev"></a>
                    <a href="#pnext" class="pnext"></a>
                    <ul class="thumCity" id="loadCountryDiv">
                        <?php echo $country; ?>
                    </ul>
                </div>
                <div id="loadCityDiv"><?php echo $city; ?></div>
                <div class="carousel_city">
                    <div class="divRoute">
                        <ul class="liCiyS" id="lstCityDiv"></ul>
                    </div>
                </div>
                <div class="btn_wrapper">
                    <a class="button" href="javascript:void(0);" onclick="return gotoStep(2);"><span>Proceed</span></a>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="akordeon-item" id="step2">
    <div class="akordeon-item-head">
        <div class="akordeon-item-head-container">
            <div class="akordeon-heading">
                <i>2</i>Select Date
            </div>
        </div>
    </div>
    <div class="akordeon-item-body">
        <form>
            <div class="akordeon-item-content jsiselect_date">
                <label class="lbel"><?php echo $text_city_selected;?></label>

                <div class="tabSpan" id="step2ListCityDiv"></div>
                <div class="clearfix"></div>
                <div class="period_wrapper">
                    <div class="journey_period">
                        <label class="lbel"><?php echo $text_start_date;?></label>

                        <div class="datePer">
                            <input type="text" id="step2Datepicker" class="textbox txtDatetime">
                        </div>
                    </div>
                    <div class="how_many_days">
                        <label class="lbel"><?php echo $text_num_date;?></label>

                        <div class="divControlSq">
                            <span class="divbtnDec"><a ng-click="quantityDecrease(1)" class="btnDec quantityicon">-</a></span>
                            <span class="divTextbox"><input type="text"
                                                            class="textbox txtQuantity onlyNumber txtQualityDetail"
                                                            ng-model="quantityValue" value="1"/></span>
                            <span class="divbtnDec"><a ng-click="quantityIncrease(1)" class="btnInc quantityicon">+</a></span>

                            <div class="clearfix"></div>
                        </div>
                    </div>
                    <div class="trip_title">
                        <label class="lbel"><?php echo $text_name_trip;?></label>
                        <input id="tripCustomName" type="text" class="textbox" value="" placeholder="<?php echo $text_name_trip_placeholder;?>">
                    </div>
                    <a href="javascript:void(0);" class="button" onclick="gotoStep(3)"><span>Proceed</span></a>

                    <div class="clearfix"></div>
                </div>
            </div>
        </form>
    </div>
</div>
<div class="akordeon-item" id="step3">
    <div class="akordeon-item-head">
        <div class="akordeon-item-head-container">
            <div class="akordeon-heading">
                <i>3</i>Select Attractions
            </div>
        </div>
    </div>
    <div class="akordeon-item-body">
        <div class="akordeon-item-content">
            <div>
                <div class="styleCheck">
                    <p class="titleP"><?php echo $step3_title1;?></p>
                    <ul class="liCheck">
                        <li>
                            <input id="0_suite" type="checkbox" class="checkbox"
                                   onclick="step3HandleCheckbox('0_suite', 'Adventure')"/>
                            <label id="Label2" for="0_suite" class="checkoff"><?php echo $adventure;?></label>
                        </li>
                        <li>
                            <input id="1_suite" type="checkbox" class="checkbox"
                                   onclick="step3HandleCheckbox('1_suite', 'Luxury')"/>
                            <label id="Label3" for="1_suite" class="checkoff"><?php echo $luxury;?></label>
                        </li>
                        <li>
                            <input id="2_suite" type="checkbox" class="checkbox"
                                   onclick="step3HandleCheckbox('2_suite', 'Cruises')"/>
                            <label id="Label4" for="2_suite" class="checkoff"><?php echo $cruises;?></label>
                        </li>
                        <li>
                            <input id="3_suite" type="checkbox" class="checkbox"
                                   onclick="step3HandleCheckbox('3_suite', 'Beaches')"/>
                            <label id="Label5" for="3_suite" class="checkoff"><?php echo $beaches;?></label>
                        </li>
                        <li>
                            <input id="4_suite" type="checkbox" class="checkbox"
                                   onclick="step3HandleCheckbox('4_suite', 'Responsible travel')"/>
                            <label id="Label6" for="4_suite" class="checkoff"><?php echo $responsible_travel;?></label>
                        </li>
                        <li>
                            <input id="5_suite" type="checkbox" class="checkbox"
                                   onclick="step3HandleCheckbox('5_suite', 'Honeymoon')"/>
                            <label id="Label7" for="5_suite" class="checkoff"><?php echo $honeymoon;?></label>
                        </li>
                        <li>
                            <input id="6_suite" type="checkbox" class="checkbox"
                                   onclick="step3HandleCheckbox('6_suite', 'Short Breaks')"/>
                            <label id="Label8" for="6_suite" class="checkoff"><?php echo $short_break;?></label>
                        </li>
                        <li>
                            <input id="7_suite" type="checkbox" class="checkbox"
                                   onclick="step3HandleCheckbox('7_suite', 'Multi Country')"/>
                            <label id="Label9" for="7_suite" class="checkoff"><?php echo $multi_country;?></label>
                        </li>
                        <li>
                            <input id="8_suite" type="checkbox" class="checkbox"
                                   onclick="step3HandleCheckbox('8_suite', 'Day Trips')"/>
                            <label id="Label10" for="8_suite" class="checkoff"><?php echo $day_trips;?></label>
                        </li>
                        <li>
                            <input id="9_suite" type="checkbox" class="checkbox"
                                   onclick="step3HandleCheckbox('9_suite', 'Accommodation only')"/>
                            <label id="Label11" for="9_suite" class="checkoff"><?php echo $accommodation_only;?></label>
                        </li>
                        <li>
                            <input id="10_suite" type="checkbox" class="checkbox"
                                   onclick="step3HandleCheckbox('10_suite', 'Transfer only')"/>
                            <label id="Label12" for="10_suite" class="checkoff"><?php echo $transfer_only;?></label>
                        </li>
                        <li>
                            <input id="11_suite" type="checkbox" class="checkbox"
                                   onclick="step3HandleCheckbox('11_suite', 'Others')"/>
                            <label id="Label13" for="11_suite" class="checkoff"><?php echo $others;?></label>
                        </li>
                        <li class="col2Chek">
                            <input type="text" class="textbox" style="width:80%" id="otherSuite"/>
                        </li>
                        <div class="clearfix"></div>
                    </ul>
                    <p class="titleP"><?php echo $step3_title2;?></p>
                    <ul class="liCheck">
                        <li>
                            <input id="0_acc" type="checkbox" class="checkbox"
                                   onclick="step3HandleCheckbox('0_acc', '3 stars')"/>
                            <label id="Label1" for="0_acc" class="checkoff"><?php echo $step3_3_stars;?></label>
                        </li>
                        <li>
                            <input id="1_acc" type="checkbox" class="checkbox"
                                   onclick="step3HandleCheckbox('1_acc', '4 stars')"/>
                            <label id="Label2" for="1_acc" class="checkoff"><?php echo $step3_4_stars;?></label>
                        </li>
                        <li>
                            <input id="2_acc" type="checkbox" class="checkbox"
                                   onclick="step3HandleCheckbox('2_acc', '5 stars resort')"/>
                            <label id="Label3" for="2_acc" class="checkoff"><?php echo $step3_5_stars;?></label>
                        </li>
                        <li>
                            <input id="3_acc" type="checkbox" class="checkbox"
                                   onclick="step3HandleCheckbox('3_acc', 'Boutique (3 - 4 stars)')"/>
                            <label id="Label4" for="3_acc" class="checkoff"><?php echo $boutique;?></label>
                        </li>
                        <li>
                            <input id="4_acc" type="checkbox" class="checkbox"
                                   onclick="step3HandleCheckbox('4_acc', 'Not required')"/>
                            <label id="Label5" for="4_acc" class="checkoff"><?php echo $not_required;?></label>
                        </li>
                        <div class="clearfix"></div>
                    </ul>
                    <p class="titleP"><?php echo $step3_title3;?></p>

                    <div class="price-range-wapper">
                        <div id="slider"
                             class="ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all"
                             aria-disabled="false" style="max-width: 65%; margin-left: 10px;">
                        </div>
                        <input type="text" id="maxPrice" class="textbox"
                               style="float: right; margin-top: -20px; margin-right: 10px; margin-left: 10px; width: 13%; border-radius: 4px; text-align: center">
                        <span style="float: right; margin-top: -17px;">-</span>
                        <input type="text" id="minPrice" class="textbox"
                               style="float: right; margin-top: -20px; margin-right: 10px; margin-left: 10px; width: 13%; border-radius: 4px; text-align: center">
                    </div>

                    <p style="margin-top:40px;" class="titleP"><?php echo $step3_title4;?></p>
                    <table>
                        <tbody>
                        <tr>
                            <td style="padding-left: 86px;">
                                <textarea id="yourIdea"
                                          placeholder="<?php echo $step3_des_idea;?>"
                                          style="height: 126px; width: 639px;"></textarea>

                            </td>
                            <td style="vertical-align: top; padding-left: 10px;">
                              <span>
                                <?php echo $step3_des_idea;?>
                              </span>
                            </td>
                        </tr>
                        </tbody>
                    </table>

                    <div class="btn_wrapper">
                        <a href="javascript:void(0);" class="button" onclick="gotoStep(4)"><span>Proceed</span></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="akordeon-item" id="step4">
    <div class="akordeon-item-head">
        <div class="akordeon-item-head-container">
            <div class="akordeon-heading">
                <i>4</i>Book Hotels
            </div>
        </div>
    </div>
    <div class="akordeon-item-body">
        <div class="akordeon-item-content">
            <div>
                <div class="styleCheck">
                    <p class="titlePV"><?php echo $step4_title;?></p>

                    <div class="pMr"><?php echo $step4_title_des;?>
                    </div>
                    <ul class="liCheckI">
                        <li class="pad">
                            <input name="txtFirstname" type="text" value="<?php echo $text_first_name;?>" id="txtFirstname" class="textbox"
                                   tabindex="1"
                                   onfocus="if(this.value=='<?php echo $text_first_name;?>')this.value='';"
                                   onblur="if(this.value==''){ this.value='<?php echo $text_first_name;?>';} else { step4BookHotel[0] = this.value; }"/>
                        </li>
                        <li class="pad1">
                            <input name="txtLastname" type="text" value="<?php echo $text_last_name;?>" id="txtLastname" class="textbox"
                                   tabindex="2"
                                   onfocus="if(this.value=='<?php echo $text_first_name;?>')this.value='';"
                                   onblur="if(this.value==''){this.value='<?php echo $text_first_name;?>';} else { step4BookHotel[1] = this.value;}"/>
                        </li>
                        <li class="pad">
                            <input name="txtPhone" type="text" value="<?php echo $text_telephone;?>" id="txtPhone" tabindex="3"
                                   class="textbox" onfocus="if(this.value=='<?php echo $text_telephone;?>')this.value='';"
                                   onblur="if(this.value==''){ this.value='<?php echo $text_telephone;?>'; } else { step4BookHotel[2] = this.value;}"/>
                        </li>
                        <li class="pad1">
                            <div class="datePer">
                                <input type="text" class="textbox txtDatetime" id="step4Birthday" tabindex="4"
                                       value="<?php echo $text_your_birthday;?>" onfocus="if(this.value=='<?php echo $text_your_birthday;?>')this.value='';"
                                       onchange="if(this.value==''){ this.value='<?php echo $text_your_birthday;?>'; } else { step4BookHotel[3] = this.value;}">
                            </div>
                        </li>
                        <li class="pad">
                            <input name="txtEmail" type="text" value="<?php echo $text_email_address;?>" id="txtEmail" tabindex="5"
                                   class="textbox" onfocus="if(this.value=='<?php echo $text_email_address;?>')this.value='';"
                                   onblur="if(this.value==''){this.value='<?php echo $text_email_address;?>';} else { step4BookHotel[4] = this.value;}"/>
                        </li>
                        <li class="pad1">
                            <select class="selectbox idSelectbox" onchange="step4BookHotel[5] = this.value;"
                                    tabindex="6">
                                <option selected="" value=""><?php echo $text_country_of_residence;?></option>
                                <option value="TPCHM">TPCHM</option>
                                <option value="Hà nội">Hà nội</option>
                                <option value="Cần thơ">Cần thơ</option>
                                <option value="Hải Phòng">Hải Phòng</option>
                                <option value="Đà nẵng">Đà nẵng</option>
                                <option value="Đồng nai">Đồng nai</option>
                                <option value="Nha trang">Nha trang</option>
                                <option value="Huế">Huế</option>
                            </select>
                        </li>
                        <li class="pad">
                            <input name="txtCfrEmail" type="text" value="<?php echo $text_email_address_confirm;?>" id="txtCfrEmail"
                                   tabindex="7" class="textbox"
                                   onfocus="if(this.value=='<?php echo $text_email_address_confirm;?>')this.value='';"
                                   onblur="if(this.value=='')this.value='<?php echo $text_email_address_confirm;?>';"/>
                        </li>
                        <li class="pad1">
                            <input type="text" value="<?php echo $text_address;?>" tabindex="8" class="textbox"
                                   onfocus="if(this.value=='<?php echo $text_address;?>')this.value='';"
                                   onblur="if(this.value==''){ this.value='<?php echo $text_address;?>'; } else { step4BookHotel[6] = this.value;}"/>
                        </li>
                        <li class="pad">
                            <input type="text" value="<?php echo $text_children;?>" tabindex="9" class="textbox"
                                   onfocus="if(this.value=='<?php echo $text_children;?>')this.value='';"
                                   onblur="if(this.value==''){ this.value='<?php echo $text_children;?>'; } else { if(isNaN(parseInt(this.value,10)) || parseInt(this.value,10) < 0) { alert('Please input correct number'); return;} step4BookHotel[7] = this.value;}"/>
                        </li>
                        <li class="pad1">
                            <input type="text" value="<?php echo $text_num_adults;?>" tabindex="10" class="textbox"
                                   onfocus="if(this.value=='<?php echo $text_num_adults;?>')this.value='';"
                                   onblur="if(this.value==''){ this.value='<?php echo $text_num_adults;?>'; } else { if(isNaN(parseInt(this.value,10)) || parseInt(this.value,10) < 0) { alert('Please input correct number'); return;} step4BookHotel[8] = this.value;}"/>
                        </li>
                        <li class="pad">
                            <input type="text" value="<?php echo $text_under_children;?>" tabindex="11"
                                   class="textbox"
                                   onfocus="if(this.value=='<?php echo $text_under_children;?>')this.value='';"
                                   onblur="if(this.value==''){ this.value='<?php echo $text_under_children;?>'; } else { if(isNaN(parseInt(this.value,10)) || parseInt(this.value,10) < 0) { alert('Please input correct number'); return;} step4BookHotel[9] = this.value;}"/>
                        </li>
                        <li class="pad1">
                            <select class="selectbox idSelectbox" onchange="step4BookHotel[10] = this.value;"
                                    tabindex="12">
                                <option selected="" value="">Where you here about us*</option>
                                <option value="Facebook">Facebook</option>
                                <option value="Google">Google</option>
                                <option value="Zotadi">Zotadi</option>
                                <option value="Friends">Friends</option>
                                <option value="Others">Others</option>
                            </select>
                        </li>

                        <div class="clearfix"></div>
                    </ul>
                </div>
                <div class="btn_wrapper">
                    <a href="javascript:void(0);" class="button" onclick="gotoStep(5)"><span>Proceed</span></a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="akordeon-item" id="step5">
    <div class="akordeon-item-head">
        <div class="akordeon-item-head-container">
            <div class="akordeon-heading">
                <i>5</i>Share & Print
            </div>
        </div>
    </div>
    <div class="akordeon-item-body">
        <div class="akordeon-item-content">
            <form>
                <div class="bgShare">
                    <div class="divShare">
                        <h2>Congrats... your dream itinerary is ready!</h2>

                        <div class="step-five-email">
                            <p class="mar">Do you want go with anothers?</p>
                            <table>
                                <tr>
                                    <td style="min-width:180px">
                                        <input type="radio" name="gowith" value="Yes"
                                               onclick="step5GoWith[0] = 'Yes'; ">Yes<br>
                                        <input type="radio" name="gowith" value="No" onclick="step5GoWith[0] = 'No'; ">No
                                    </td>
                                    <td>
                                        <button type="button" class="button"
                                                onclick="submitCustomInfo('<?php echo DIR_ROOT_NAME ?>');">Submit
                                        </button>
                                    </td>
                                </tr>
                            </table>
                            <div class="clearfix"></div>
                            <p class="mar">Drop your email here and we'll send one over!</p>
                        </div>
                        <div class="clearfix"></div>
                        <ul class="left-space-step-five">
                            <li class="space large">Get suggestions from your friends!</li>
                            <li>
                                <a href="#"><img alt="Share on Facebook"
                                                 src="<?php echo DIR_ROOT_NAME?>/view/theme/default/image/issets/facebook-square-icon.png"></a>
                            </li>
                            <li>
                                <a href="#" title="Share on Google +"><img alt="Share on Google+"
                                                                           src="<?php echo DIR_ROOT_NAME?>/view/theme/default/image/issets/g-plus-square-icon.png">
                                </a>
                            </li>
                            <li>
                                <a href="#" title="Share on Twitter"><img alt="Share on Twitter"
                                                                          src="<?php echo DIR_ROOT_NAME?>/view/theme/default/image/issets/twitter-sharesmall.png"></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!---->
</div>
</div>
</div>
</div>
</div>

<div class="wrapHowit">
    <div class="container">
        <h2 class="howitTitle"> How it works</h2>

        <div class="divHowit">
            <div class="tiprplan">
                <div class="ctitle">Select cities</div>
                <div class="cimg"><img src="<?php echo DIR_ROOT_NAME?>/view/theme/default/image/issets/step_1.png">
                </div>
                <div class="ctxt">Choose Where and When! First choose a city, found by first selecting a continent and
                    then country. Then, fix your dates and personalise your itinerary with a title!
                </div>
            </div>
            <div class="tiprplan">
                <div class="ctitle">Receive itineraries</div>
                <div class="cimg"><img src="<?php echo DIR_ROOT_NAME?>/view/theme/default/image/issets/step_2.png">
                </div>
                <div class="ctxt">Choose Where and When! First choose a city, found by first selecting a continent and
                    then country. Then, fix your dates and personalise your itinerary with a title!
                </div>
            </div>
            <div class="tiprplan">
                <div class="ctitle">Book an itinerary</div>
                <div class="cimg"><img src="<?php echo DIR_ROOT_NAME?>/view/theme/default/image/issets/step_3.png">
                </div>
                <div class="ctxt">Choose Where and When! First choose a city, found by first selecting a continent and
                    then country. Then, fix your dates and personalise your itinerary with a title!
                </div>
            </div>
            <div class="tiprplan">
                <div class="ctitle">Share and go together</div>
                <div class="cimg"><img src="<?php echo DIR_ROOT_NAME?>/view/theme/default/image/issets/step_4.png">
                </div>
                <div class="ctxt">Choose Where and When! First choose a city, found by first selecting a continent and
                    then country. Then, fix your dates and personalise your itinerary with a title!
                </div>
            </div>

            <div class="clearfix"></div>
        </div>
    </div>
</div>
<!-- End wrapHowit-->


<div id="dialog-confirm"></div>
<script type="text/javascript">
    $(document).ready(function () {
        $('#buttons').akordeon({
            expandListener: function (item) {
                var id = item.attr('id');
                if (id == 'step1') {
                    return gotoStep(1);
                } else if (id == 'step2') {
                    return gotoStep(2);
                } else if (id == 'step3') {
                    return gotoStep(3);
                } else if (id == 'step4') {
                    return gotoStep(4);
                } else if (id == 'step5') {
                    return gotoStep(5);
                }
                return false;
            }
        });

        $('#step2Datepicker').datepicker({
            prevText: "", nextText: "", dateFormat: 'dd/mm/yy', showOn: 'both', buttonImage: 'tripdeal/view/theme/default/image/ui/calendar.gif', buttonImageOnly: true, changeMonth: true, changeYear: true, yearRange: '1900:2030', minDate: 0
        });

        $('#step4Birthday').datepicker({
            prevText: "", nextText: "", dateFormat: 'dd/mm/yy', showOn: 'both', buttonImage: 'tripdeal/view/theme/default/image/ui/calendar.gif', buttonImageOnly: true, changeMonth: true, changeYear: true, yearRange: '1900:2014'
        });

        $('#yourIdea').html('');

        $('#slider').slider({
            range: true,
            min: 100,
            max: 3000,
            values: [ 500, 1000 ],
            slide: function (event, ui) {

                $('.ui-slider-handle:eq(0) .price-range-min').html('$' + ui.values[ 0 ]);
                $('.ui-slider-handle:eq(1) .price-range-max').html('$' + ui.values[ 1 ]);

                $('#minPrice').val(ui.values[ 0 ] + '$');
                $('#maxPrice').val(ui.values[ 1 ] + '$');

                $('.price-range-both').html('<i>$' + ui.values[ 0 ] + ' - </i>$' + ui.values[ 1 ]);

                //

                if (ui.values[0] == ui.values[1]) {
                    $('.price-range-both i').css('display', 'none');
                } else {
                    $('.price-range-both i').css('display', 'inline');
                }

                //

                if (collision($('.price-range-min'), $('.price-range-max')) == true) {
                    $('.price-range-min, .price-range-max').css('opacity', '0');
                    $('.price-range-both').css('display', 'block');
                } else {
                    $('.price-range-min, .price-range-max').css('opacity', '1');
                    $('.price-range-both').css('display', 'none');
                }

            }
        });
        $('#minPrice').val('500$');
        $('#maxPrice').val('1000$');

        $('.ui-slider-range').append('<span class="price-range-both value"><i>$' + $('#slider').slider('values', 0) + ' - </i>' + $('#slider').slider('values', 1) + '</span>');

        $('.ui-slider-handle:eq(0)').append('<span class="price-range-min value">$' + $('#slider').slider('values', 0) + '</span>');

        $('.ui-slider-handle:eq(1)').append('<span class="price-range-max value">$' + $('#slider').slider('values', 1) + '</span>');
    });

    $('#minPrice').bind('keypress', function (e) {
        var code = e.keyCode || e.which;
        if (code == 13) { // press Enter
            var currentInput = $('#minPrice').val().trim();
            var value = getPrice(currentInput);
            if (value < 0) {
                return;
            } else {
                var maxPrice = getPrice($('#maxPrice').val().trim());
                if (value > maxPrice) {
                    return;
                }
            }
            $('#slider').slider('values', 0, value);
            $('.price-range-min').html('$' + value);
        }
    });

    $('#maxPrice').bind('keypress', function (e) {
        var code = e.keyCode || e.which;
        if (code == 13) { // press Enter
            var currentInput = $('#maxPrice').val().trim();
            var value = getPrice(currentInput);
            if (value < 0) {
                return;
            } else {
                var minPrice = getPrice($('#minPrice').val().trim());
                if (value < minPrice) {
                    return;
                }
            }
            $('#slider').slider('values', 1, value);
            $('.price-range-max').html('$' + value);
        }
    });

    function getPrice(currentInput) {
        var value;
        if (currentInput.indexOf('$') >= 0) {
            value = parseInt(currentInput.substring(0, currentInput.length - 1), 10);
        } else {
            value = parseInt(currentInput, 10)
        }
        return value;
    }

    function collision($div1, $div2) {
        var x1 = $div1.offset().left;
        var w1 = 40;
        var r1 = x1 + w1;
        var x2 = $div2.offset().left;
        var w2 = 40;
        var r2 = x2 + w2;

        if (r1 < x2 || x1 > r2) return false;
        return true;

    }
</script>
<?php echo $footer; ?>