/* =======================================================================================
 R E G I O N   J A V A S C R I P T   U T I L
 =======================================================================================
 */

function HasMap() {
    this.keys = [],
        this.values = [],
        this.getValue = function (key) {
            var index = this.keys.indexOf(key);
            if (index >= 0) {
                return this.values[index];
            }
            return '';
        },

        this.setValue = function (key, value) {
            var index = this.keys.indexOf(key);
            if (index >= 0) {
                this.values[index] = value;
            }
        },

        this.put = function (key, value) {
            if (this.keys.indexOf(key) < 0) {
                this.keys.push(key);
                this.values.push(value);
            }
        },

        this.remove = function (key) {
            var index = this.keys.indexOf(key);
            if (index >= 0) {
                this.keys.splice(index, 1);
                this.values.splice(index, 1);
            }
        },

        this.getLstKeys = function () {
            return this.keys;
        },

        this.getLstValues = function () {
            return this.values;
        }
}

function htmlEnCode(input) {
    input.replace('<', '&lt');
    input.replace('>', '&gt');
    return input;
}

//====================================================================================
$(document).ready(function () {
    initFeedbackDOM();
    $('#popup_contact').popup();
    $('#popup_alert_footer').popup();

    $("#buttonBuy").click(function () {
        $("#popup_contact").popup({
            outline: true,
            focusdelay: 400,
            autoopen: true

        });
    });
    $('.app_icon').click(function(){
            $("#popup_alert_footer").popup({
            outline: true,
            focusdelay: 400,
            autoopen: true

        });
    });

});


function initFeedbackDOM() {
    $('body').append('<div id="feedback">Feedback</div>');
    $(window).scroll(function () {
        if ($(window).scrollTop() != 0) {
            $('#feedback').fadeIn();
        } else {
            $('#feedback').fadeOut();
        }
    });
    $('#feedbackDiv').popup();
    $('#feedback').click(function () {
        $("#feedbackDiv").popup({
            outline: true,
            focusdelay: 400,
            autoopen: true

        });
        $('#feedbackDiv textarea').html('');
        $('#feedbackDiv textarea').focus();
    });
}

function initBackToTopDOM() {
    $('body').append('<div id="top">Back to Top</div>');
    $(window).scroll(function () {
        if ($(window).scrollTop() != 0) {
            $('#top').fadeIn();
        } else {
            $('#top').fadeOut();
        }
    });
    $('#top').click(function () {
        $('html, body').animate({scrollTop: 0}, 500);
    });
}

/** ==================================================================================
 *     C U S T O M  P A G E  J S C R I P T
 *
 */
var mapUserCustomTourInfo = new HasMap();

var step1ChooseLocation = new HasMap();
var step2ChooseDate = new Array();

var step3ChooseStyleTravel = new HasMap();
var step3SuiteTravel = new Array();
var step3Accommodation = new Array();

var step4BookHotel = new Array();
var step5GoWith = new Array();

var STEP = {
    step1: 'location',
    step2: 'date',
    step3: 'style_travel',
    step4: 'book_hotel',
    getStepKey: function (stepNumber) {
        if (stepNumber == 1) {
            return this.step1;
        } else if (stepNumber == 2) {
            return this.step2;
        } else if (stepNumber == 3) {
            return this.step3;
        } else if (stepNumber == 4) {
            return this.step4;
        }
        return '';
    }
}

var cityIndex = 0;

function addCity(cityName, image, description, DIR_ROOT_NAME) {
    var html = '';

    var lstValue = step1ChooseLocation.getLstValues();
    if (lstValue.length > 0 && lstValue[lstValue.length - 1] == cityName) {
        return;
    }

    var tooltipContent = '<table style="width: 300px; height: 180px;">' +
        '<tr>' +
        '<td style="width: 100px;"><img style="width: 150px; height: 150px;" src="' + image + '"></td>' +
        '<td style="padding-left:5px; vertical-align: top; text-align: left;">' + description + '</td>' +
        '</tr>' +
        '</table>';

    if ($('#lstCityDiv').html() != '') {
        html = '<li id="' + cityName + '_' + cityIndex + '">' +
            '<div class="city_connector">' +
            '<div class="ways_to_travel">Travel Options</div>' +
            '<div class="number_of_routes">1</div>' +
            '</div>' +
            '<div class="itemImg">' +
            '<a href="#" class="img tooltipTrigger"><img src="' + image + '"></a>' +
            '<div class="name">' + cityName + '</div>' +
            '<input type="hidden" value="1" name="city">' +
            '</div>' +
            '<span class="delete closeX" onclick="removeUserChoseCity(\'' + cityName + '\',' + cityIndex + ')">X</span>' +
            '<div class="clearfix"></div>' +
            '</li>';
    } else {
        html = '<li id="' + cityName + '_' + cityIndex + '">' +
            '<div class="itemImg">' +
            '<a href="#" class="img tooltipTrigger"><img src="' + image + '"></a>' +
            '<div class="name">' + cityName + '</div>' +
            '<input type="hidden" value="1" name="city">' +
            '</div>' +
            '<span class="delete closeX" onclick="removeUserChoseCity(\'' + cityName + '\',' + cityIndex + ')">X</span>' +
            '<div class="clearfix"></div>' +
            '</li>';
    }
    $('#lstCityDiv').append(html);

    $('#'+cityName + '_' + cityIndex).customtooltip({
        content: tooltipContent,
        objectId: cityName + '_' + cityIndex
    });

    step1ChooseLocation.put(cityName + '_' + cityIndex, cityName);
    cityIndex++;
}
function changeContinent(continentName, DIR_ROOT_NAME) {
    $.ajax({
        url: "/" + DIR_ROOT_NAME + "/?route=travel/custom/country",
        type: "post",
        data: {
            'continentName': continentName
        },
        dataType: "html",
        success: function (result) {
            $('#loadCountryDiv').html(result);
            changeCountry($($('#loadCountryDiv span')[0]).html().trim(), DIR_ROOT_NAME);
        }
    });
}
function changeCountry(countryName, DIR_ROOT_NAME) {
    $.ajax({
        url: "/" + DIR_ROOT_NAME + "/?route=travel/custom/city",
        type: "post",
        data: {
            'countryName': countryName
        },
        dataType: "html",
        success: function (result) {
            $('#loadCityDiv').html(result);
        }
    });
}
function removeUserChoseCity(cityName, cityIndex) {
    //Confirm Dialog
    $("#dialog-confirm").html('<div style="margin: 20px;"><div><p>Are you sure to remove <span style="color: #1c94c4">' + cityName + '</span> city?</div></p>');

    // Define the Dialog and its properties.
    $("#dialog-confirm").dialog({
        resizable: false,
        modal: true,
        title: "Confirm",
        height: 200,
        width: 400,
        buttons: {
            "Yes": function () {
                var curIndex = step1ChooseLocation.getLstKeys().indexOf(cityName + '_' + cityIndex);
                step1ChooseLocation.remove(cityName + '_' + cityIndex);

                $('#' + cityName + '_' + cityIndex).remove();
                //remove connector html
                if (curIndex == 0) {
                    $('#' + $($('#lstCityDiv li')[0]).attr('id') + ' .city_connector').remove();
                }

                $('#tooltipContainer' + cityName + '_' + cityIndex).remove();

                $(this).dialog('close');
            },
            "No": function () {
                $(this).dialog('close');
            }
        }
    });
}
function checkStep(stepNumber) {
    //checking step is allowed to go
    var stepValue = mapUserCustomTourInfo.getValue(STEP.getStepKey(stepNumber - 1));
    var len = (stepValue instanceof HasMap) ? stepValue.getLstValues().length : stepValue.length;

    if ((stepNumber != 1 && (stepValue == null || len == 0 || stepValue == undefined)) || (stepNumber == 3 && len < 3)) {
        alert('Please finish Step ' + (stepNumber - 1));
        return false;
    }
    return true;
}

function step3HandleCheckbox(id, value) {
    var index = id.indexOf('_');
    if ($('#' + id).prop('checked')) {
        if (id.indexOf('suite') > 0) {
            if (value == 'Others') {
                step3SuiteTravel[parseInt(id.substring(0, index), 10)] = $('#otherSuite').val().trim();
            } else {
                step3SuiteTravel[parseInt(id.substring(0, index), 10)] = value;
            }
        } else if (id.indexOf('acc')) {
            step3Accommodation[parseInt(id.substring(0, index), 10)] = value;
        }
    } else {
        if (id.indexOf('suite') > 0) {
            step3SuiteTravel[parseInt(id.substring(0, index), 10)] = '';
        } else if (id.indexOf('acc')) {
            step3Accommodation[parseInt(id.substring(0, index), 10)] = '';
        }
    }
}

function gotoStep(gotoStepNumber) {
    if (gotoStepNumber == 2) {
        //finish step 1
        mapUserCustomTourInfo.put(STEP.step1, step1ChooseLocation);
        //check step 1
        if (!checkStep(gotoStepNumber)) return false;

        var html = '';
        $('#step2ListCityDiv').html('');
        var lstCities = step1ChooseLocation.getLstValues();
        for (var i = 0; i < lstCities.length; i++) {
            html += '<a href="#">' + lstCities[i] + '</a>'
        }
        $('#step2ListCityDiv').append(html);
    } else if (gotoStepNumber == 3) {
        //get value ---------------------
        var isCutStep1 = false;
        var isCutStep2 = false;
        if ($('.txtDatetime').val().length > 0) {
            step2ChooseDate[0] = $('.txtDatetime').val();
        } else {
            step2ChooseDate.splice(0, 1);
            isCutStep1 = true;
            alert('Please choose your start date');
            return false;
        }
        if ($('.txtQuantity').val().length > 0) {
            if (isNaN(parseInt($('.txtQuantity').val(), 10))) {
                alert('Please fill correct number date');
                return false;
            }
            step2ChooseDate[1] = $('.txtQuantity').val();
        } else {
            if (isCutStep1) {
                step2ChooseDate.splice(0, 1);
            } else {
                step2ChooseDate.splice(1, 1);
                isCutStep2 = true;
            }
        }
        if ($('#tripCustomName').val().length > 0) {
            step2ChooseDate[2] = $('#tripCustomName').val();
        } else {
            if (isCutStep2) {
                step2ChooseDate.splice(0, 1);
            } else {
                step2ChooseDate.splice(2, 1);
            }
            alert('Please fill your trip name');
            return false;
        }

        $('#otherSuite').bind('keypress', function (e) {
            var code = e.keyCode || e.which;
            if (code == 13) { // press Enter
                $('#11_suite').attr('checked', true);
                step3SuiteTravel[11] = $('#otherSuite').val().trim();
            }
        });

        mapUserCustomTourInfo.put(STEP.step2, step2ChooseDate);
        if (!checkStep(gotoStepNumber)) return false;

    } else if (gotoStepNumber == 4) {
        if (step3SuiteTravel.length == 0) {
            alert('Please choose travel style suits for you');
            return false;
        }
        if (step3Accommodation.length == 0) {
            alert('Please choose accommodation you like');
            return false;
        }

        step3SuiteTravel[5] = $('#slider .price-range-min').html().trim().substring(1);
        step3SuiteTravel[6] = $('#slider .price-range-max').html().trim().substring(1);
        step3SuiteTravel[7] = $('#yourIdea').val().trim();

        step3ChooseStyleTravel.put('suite', step3SuiteTravel);
        step3ChooseStyleTravel.put('acc', step3Accommodation);
        mapUserCustomTourInfo.put(STEP.step3, step3ChooseStyleTravel);

        if (!checkStep(gotoStepNumber)) return false;

    } else if (gotoStepNumber == 5) {
        if (isNullOrBlank(step4BookHotel[0])) {
            alert('Please input first name');
            return false;
        }
        if (isNullOrBlank(step4BookHotel[1])) {
            alert('Please input last name');
            return false;
        }
        if (isNullOrBlank(step4BookHotel[2])) {
            alert('Please input your phone');
            return false;
        }
        if (isNullOrBlank(step4BookHotel[4])) {
            alert('Please fill your email');
            return false;
        }
        if ($('#txtCfrEmail').val().trim() == '') {
            alert('Please repeat your email');
            return false;
        }
        if (step4BookHotel[4] != $('#txtCfrEmail').val().trim()) {
            alert('Retype password not match');
            return false;
        }

        mapUserCustomTourInfo.put(STEP.step4, step4BookHotel);

        if (!checkStep(gotoStepNumber)) return false;
    }

    //TODO : add animation -----------
    $('#step' + (gotoStepNumber - 1)).removeClass('expanded');
    $('#step' + gotoStepNumber).addClass('expanded');
    return true;
}

function isNullOrBlank(input) {
    if (input == null || input.length == 0 || input == undefined) {
        return true;
    }
    return false;
}

function submitCustomInfo(DIR_ROOT_NAME) {
    $.ajax({
        url: "/" + DIR_ROOT_NAME + "/?route=travel/custom/submit",
        type: "post",
        data: {
            'userEmail': step4BookHotel[4],
            'step1': step1ChooseLocation.getLstValues(),
            'step2': step2ChooseDate,
            'step3': step3ChooseStyleTravel.getLstValues(),
            'step3_minprice': step3SuiteTravel[5],
            'step3_maxprice': step3SuiteTravel[6],
            'step3_ideal': step3SuiteTravel[7],
            'step4': step4BookHotel,
            'step5': step5GoWith[0]
        },
        dataType: "html",
        success: function (result) {
            alert(result);
        }
    });
}

function changeLanguage(DIR_ROOT_NAME, code) {
    var redirectUrl = $('#redirectUrl').val().trim();
    $.get("/" + DIR_ROOT_NAME + "/?route=common/header/language&language_code=" + code + "&redirect=" + redirectUrl, function (data) {
        document.body.innerHTML = data;
        $('.popup_contact').popup();
        initBackToTopDOM();
        initFeedbackDOM();
    });
}

function submitFeedback(DIR_ROOT_NAME) {
    $.ajax({
        url: "/" + DIR_ROOT_NAME + "/?route=common/feedback",
        type: "post",
        data: {
            'email': $('#feedbackDiv #email').val(),
            'message': $('#feedbackDiv textarea').val()
        },
        dataType: "json",
        success: function (result) {
            alert(result);
            $('#feedbackDiv').popup('hide');
        }
    });
}