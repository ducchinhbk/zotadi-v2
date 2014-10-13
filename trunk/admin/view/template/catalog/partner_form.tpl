<?php echo $header; ?>
<div id="content">
  <div class="breadcrumb">
    <?php foreach ($breadcrumbs as $breadcrumb) { ?>
    <?php echo $breadcrumb['separator']; ?><a href="<?php echo $breadcrumb['href']; ?>"><?php echo $breadcrumb['text']; ?></a>
    <?php } ?>
  </div>
  <?php if ($error_warning) { ?>
  <div class="warning"><?php echo $error_warning; ?></div>
  <?php } ?>
  <div class="box">
    <div class="heading">
      <h1><img src="view/image/shipping.png" alt="" /> <?php echo $heading_title; ?></h1>
      <div class="buttons"><a onclick="$('#form').submit();" class="button"><?php echo $button_save; ?></a><a href="<?php echo $cancel; ?>" class="button"><?php echo $button_cancel; ?></a></div>
    </div>
    <div class="content">
      <div id="tabs" class="htabs"><a href="#tab-general"><?php echo $tab_general; ?></a></div>
      <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data" id="form">
        <div id="tab-general">
          <table class="form">
            <tr>
              <td><span class="required">*</span> <?php echo $company_name_vi; ?></td>
              <td><input type="text" name="vi_name" value="<?php echo $vi_name; ?>" size="100" />
                <?php if ($error_vi_name) { ?>
                <span class="error"><?php echo $error_vi_name; ?></span>
                <?php } ?></td>
            </tr>
            <tr>
              <td><?php echo $company_name_en; ?></td>
              <td><input type="text" name="en_name" value="<?php echo $en_name; ?>" size="100" /></td>
            </tr>
            <tr>
              <td><span class="required">*</span> <?php echo $intro_title_vi; ?></td>
              <td><textarea name="vi_intro" cols="40" rows="5" ><?php echo $vi_intro; ?></textarea>
                <?php if ($error_vi_intro) { ?>
                <span class="error"><?php echo $error_vi_intro; ?></span>
                <?php } ?></td>
            </tr>
            <tr>
              <td><?php echo $intro_title_en; ?></td>
              <td><textarea name="en_intro" cols="40" rows="5"><?php echo $en_intro; ?></textarea></td>
            </tr>
            <tr>
                <td><span class="required">*</span> <?php echo $username_title; ?></td>                            
                <?php if (isset($this->request->get['partner_id'])) { ?>
                <td><input type="text" name="username" value="<?php echo $username; ?>" readonly="true" size="100" /></td>
                <?php } else { ?>                
                <td>
                    <input type="text" name="username" value="<?php echo $username; ?>" size="100" />
                <?php } ?>
                <?php if ($error_username) { ?>
                    <span class="error"><?php echo $error_username; ?></span>
                <?php } ?>
                <?php if ($error_username_exists) { ?>
                    <span class="error"><?php echo $error_username_exists; ?></span>
                <?php } ?>
                </td>
            </tr>
            <?php if (!isset($this->request->get['partner_id'])) { ?>
            <tr>
                <td><span class="required">*</span> <?php echo $password_title; ?></td>              
                <td>
                  <input type="text" name="password" value="<?php echo $password; ?>" size="100" />
                  <?php if ($error_password) { ?>
                  <span class="error"><?php echo $error_password; ?></span>
                  <?php } ?>
                </td>
            </tr>
            <?php } ?>
            <tr>
              <td><?php echo $email_title; ?></td>
              <td><input type="text" name="email" value="<?php echo $email; ?>" size="100" /></td>
            </tr>            
            <tr>
              <td><?php echo $phone_title; ?></td>
              <td><input type="text" name="phone" value="<?php echo $phone; ?>" size="100" /></td>
            </tr>
            <tr>
                <td><?php echo $status_title; ?></td>
                <td><select name="status">
                    <option value="0" <?php if ($status == 0) echo "selected='selected'"; ?>>Disable</option>
                    <option value="1" <?php if ($status == 1) echo "selected='selected'"; ?>>Enable</option>
                </select></td>
              </tr>
            <tr>
              <td><?php echo $entry_keyword; ?></td>
              <td><textarea name="seo_keyword" cols="40" rows="5"><?php echo $seo_keyword; ?></textarea></td>
            </tr>
            <tr>
              <td><?php echo $entry_image; ?></td>
              <td valign="top"><div class="image"><img src="<?php echo $thumb; ?>" alt="" id="thumb" />
                <input type="hidden" name="image" value="<?php echo $image; ?>" id="image" />
                <br /><a onclick="image_upload('image', 'thumb');"><?php echo $text_browse; ?></a>&nbsp;&nbsp;|&nbsp;&nbsp;<a onclick="$('#thumb').attr('src', '<?php echo $no_image; ?>'); $('#image').attr('value', '');"><?php echo $text_clear; ?></a></div></td>
            </tr>
            <tr>
              <td><?php echo $entry_sort_order; ?></td>
              <td><input type="text" name="sort_order" value="<?php echo $sort_order; ?>" size="1" /></td>
            </tr>
          </table>
        </div>
      </form>
    </div>
  </div>
</div>
<script type="text/javascript"><!--
function image_upload(field, thumb) {
	$('#dialog').remove();
	
	$('#content').prepend('<div id="dialog" style="padding: 3px 0px 0px 0px;"><iframe src="index.php?route=common/filemanager&token=<?php echo $token; ?>&field=' + encodeURIComponent(field) + '" style="padding:0; margin: 0; display: block; width: 100%; height: 100%;" frameborder="no" scrolling="auto"></iframe></div>');
	
	$('#dialog').dialog({
		title: '<?php echo $text_image_manager; ?>',
		close: function (event, ui) {
			if ($('#' + field).attr('value')) {
				$.ajax({
					url: 'index.php?route=common/filemanager/image&token=<?php echo $token; ?>&image=' + encodeURIComponent($('#' + field).val()),
					dataType: 'text',
					success: function(data) {
						$('#' + thumb).replaceWith('<img src="' + data + '" alt="" id="' + thumb + '" />');
					}
				});
			}
		},	
		bgiframe: false,
		width: 800,
		height: 400,
		resizable: false,
		modal: false
	});
};
//--></script> 
<script type="text/javascript"><!--
$('#tabs a').tabs(); 
//--></script> 
<?php echo $footer; ?>