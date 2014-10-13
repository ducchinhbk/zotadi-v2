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
  <?php if ($success) { ?>
  <div class="success"><?php echo $success; ?></div>
  <?php } ?>
  <div class="box">
    <div class="heading">
      <h1><img src="view/image/shipping.png" alt="" /> <?php echo $heading_title; ?></h1>
      <div class="buttons"><a href="<?php echo $insert; ?>" class="button"><?php echo $button_insert; ?></a><a onclick="$('form').submit();" class="button"><?php echo $button_delete; ?></a></div>
    </div>
    <div class="content">
      <form action="<?php echo $delete; ?>" method="post" enctype="multipart/form-data" id="form">
        <table class="list">
          <thead>
            <tr>
              <td width="1" style="text-align: center;"><input type="checkbox" onclick="$('input[name*=\'selected\']').attr('checked', this.checked);" /></td>
              <td class="center">Image</td>
              <td class="left"><?php if ($sort == 'vi_name') { ?>
                <a href="<?php echo $sort_name; ?>" class="<?php echo strtolower($order); ?>"><?php echo $column_company_name_vi; ?></a>
                <?php } else { ?>
                <a href="<?php echo $sort_name; ?>"><?php echo $column_company_name_vi; ?></a>
                <?php } ?></td>
              <td class="left"><?php if ($sort == 'phone') { ?>
                <a href="<?php echo $sort_name; ?>" class="<?php echo strtolower($order); ?>"><?php echo $column_phone; ?></a>
                <?php } else { ?>
                <a href="<?php echo $sort_name; ?>"><?php echo $column_phone; ?></a>
                <?php } ?></td>
              <td class="left"><?php if ($sort == 'email') { ?>
                <a href="<?php echo $sort_name; ?>" class="<?php echo strtolower($order); ?>"><?php echo $column_email; ?></a>
                <?php } else { ?>
                <a href="<?php echo $sort_name; ?>"><?php echo $column_email; ?></a>
                <?php } ?></td>
              <td class="right"><?php if ($sort == 'sort_order') { ?>
                <a href="<?php echo $sort_name; ?>" class="<?php echo strtolower($order); ?>"><?php echo $column_sort_order; ?></a>
                <?php } else { ?>
                <a href="<?php echo $sort_name; ?>"><?php echo $column_sort_order; ?></a>
                <?php } ?></td>
              <td class="right"><?php echo $column_action; ?></td>
            </tr>
          </thead>
          <tbody>
              <tr class="filter">
                <td></td>
                <td></td>
                <td><input type="text" name="filter_name_vi" value="<?php echo $filter_name_vi; ?>" /></td>
                <td><input type="text" name="filter_phone" value="<?php echo $filter_phone; ?>" /></td>
                <td><input type="text" name="filter_email" value="<?php echo $filter_email; ?>" /></td>
                <td class="right"><input type="text" name="sort"  size="8" /></td>
                <td align="right"><a onclick="filter();" class="button"><?php echo $button_filter; ?></a></td>
            </tr>
            <?php if ($partners) { ?>
            <?php foreach ($partners as $partner) { ?>
            <tr>
              <td style="text-align: center;"><?php if ($partner['selected']) { ?>
                <input type="checkbox" name="selected[]" value="<?php echo $partner['partner_id']; ?>" checked="checked" />
                <?php } else { ?>
                <input type="checkbox" name="selected[]" value="<?php echo $partner['partner_id']; ?>" />
                <?php } ?></td>
              <td class="center"><img src="<?php echo $partner['logoImage']; ?>" alt="<?php echo $partner['logoImage']; ?>" style="padding: 1px; border: 1px solid #DDDDDD;" /></td>
              <td class="left"><?php echo $partner['vi_name']; ?></td>
              <td class="right"><?php echo $partner['phone']; ?></td>
              <td class="right"><?php echo $partner['email']; ?></td>
              <td class="right"><?php echo $partner['sort_order']; ?></td>
              <td class="right"><?php foreach ($partner['action'] as $action) { ?>
                [ <a href="<?php echo $action['href']; ?>"><?php echo $action['text']; ?></a> ]
                <?php } ?></td>
            </tr>
            <?php } ?>
            <?php } else { ?>
            <tr>
              <td class="center" colspan="4"><?php echo $text_no_results; ?></td>
            </tr>
            <?php } ?>
          </tbody>
        </table>
      </form>
      <div class="pagination"><?php echo $pagination; ?></div>
    </div>
  </div>
</div>
<script type="text/javascript"><!--
function filter() {
	url = 'index.php?route=catalog/partner&token=<?php echo $token; ?>';
	
	var filter_name = $('input[name=\'filter_name_vi\']').attr('value');
	
	if (filter_name) {
		url += '&filter_name_vi=' + encodeURIComponent(filter_name);
	}	

	location = url;
}
//--></script> 
<?php echo $footer; ?>