(function ($) {
    $.fn.extend({
        customtooltip: function (options) {
            var settingParam = $.extend({ hideDelay: 300, currentID: null, hideTimer: null, content: '', objectId: ''}, options);

            var container = $('<div class="customTooltipContainer" id="tooltipContainer' + settingParam.objectId + '">'
                + '<table width="" border="0" cellspacing="0" cellpadding="0" align="center" class="tooltipPopup">'
                + '<tr>'
                + '   <td class="corner topLeft"></td>'
                + '   <td class="top"></td>'
                + '   <td class="corner topRight"></td>'
                + '</tr>'
                + '<tr>'
                + '   <td class="left">&nbsp;</td>'
                + '   <td><div class="customTooltipContent" id="tooltipContent' + settingParam.objectId + '">'
                + settingParam.content + '</div></td>'
                + '   <td class="right">&nbsp;</td>'
                + '</tr>'
                + '<tr>'
                + '   <td class="corner bottomLeft">&nbsp;</td>'
                + '   <td class="bottom">&nbsp;</td>'
                + '   <td class="corner bottomRight"></td>'
                + '</tr>'
                + '</table>'
                + '</div>');

            $('body').append(container);

            $(this).on('mouseover', '.tooltipTrigger', function () {
                if (settingParam.hideTimer)
                    clearTimeout(settingParam.hideTimer);

                var pos = $(this).offset();
                var width = $(this).width();
                container.css({
                    left: (pos.left + width) + 'px',
                    top: pos.top - 5 + 'px'
                });
                $('#tooltipContainer' + settingParam.objectId).fadeIn();
            });

            $(this).on('mouseout', '.tooltipTrigger', function () {
                if (settingParam.hideTimer)
                    clearTimeout(settingParam.hideTimer);
                settingParam.hideTimer = setTimeout(function () {
                    container.fadeOut();
                }, settingParam.hideDelay);
            });

            // Allow mouse over of details without hiding details
            $('#tooltipContainer' + settingParam.objectId).mouseover(function () {
                if (settingParam.hideTimer)
                    clearTimeout(settingParam.hideTimer);
            });

            // Hide after mouseout
            $('#tooltipContainer' + settingParam.objectId).mouseout(function () {
                if (settingParam.hideTimer)
                    clearTimeout(settingParam.hideTimer);
                settingParam.hideTimer = setTimeout(function () {
                    container.fadeOut();
                }, settingParam.hideDelay);
            });
        }
    });
})(jQuery);