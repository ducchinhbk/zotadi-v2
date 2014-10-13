<div class="divLanguage">
    <form action="/<?php echo DIR_ROOT_NAME ?>/?route=common/language" method="post" enctype="multipart/form-data">
        <a href="javascript:void(0);" onclick="$('input[name=\'language_code\']').attr('value', 'vi'); $(this).parent().submit();" class="flag-vn"></a>
        <a href="javascript:void(0);" onclick="$('input[name=\'language_code\']').attr('value', 'en'); $(this).parent().submit();" class="flag-en active"></a>

        <div class="clearfix"></div>
    </form>
</div>