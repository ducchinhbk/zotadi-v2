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
      <h1><img src="view/image/category.png" alt="" /> <?php echo $heading_title; ?></h1>
      <div class="buttons">
          <a href="<?php echo $insert; ?>" class="button"><?php echo $button_insert; ?></a>
          <a onclick="$('#form').submit();" class="button"><?php echo $button_delete; ?></a>
      </div>
    </div>
    <div class="content">
      <form action="<?php echo $delete; ?>" method="post" enctype="multipart/form-data" id="form">
        <table class="list">
          <thead>
            <tr>
              <td width="1" style="text-align: center;"><input type="checkbox" onclick="$('input[name*=\'selected\']').attr('checked', this.checked);" /></td>
              <td class="left">Continent name</td>
              <td class="right">Sort order</td>
              <td class="right">Action</td>
            </tr>
          </thead>
          <tbody>
            <?php if ($continents) { ?>
            <?php foreach ($continents as $continent) { ?>
            <tr>
              <td style="text-align: center;"><?php if ($continent['selected']) { ?>
                <input type="checkbox" name="selected[]" value="<?php echo $continent['continent_id']; ?>" checked="checked" />
                <?php } else { ?>
                <input type="checkbox" name="selected[]" value="<?php echo $continent['continent_id']; ?>" />
                <?php } ?></td>
              <td class="left"><?php echo $continent['name']; ?></td>
              <td class="right"><?php echo $continent['sort_order']; ?></td>
              <td class="right"><?php foreach ($continent['action'] as $action) { ?>
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
<?php echo $footer; ?>