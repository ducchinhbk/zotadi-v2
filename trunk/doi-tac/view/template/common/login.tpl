<link rel="stylesheet" type="text/css" href="view/stylesheet/stylesheet.css"/>
<script type="text/javascript" src="view/javascript/jquery/jquery-1.7.1.min.js"></script>
    <script type="text/javascript" src="view/javascript/jquery/ui/jquery-ui-1.8.16.custom.min.js"></script>
    <link type="text/css" href="view/javascript/jquery/ui/themes/ui-lightness/jquery-ui-1.8.16.custom.css"
          rel="stylesheet"/>
    <script type="text/javascript" src="view/javascript/jquery/tabs.js"></script>
    <script type="text/javascript" src="view/javascript/jquery/superfish/js/superfish.js"></script>
    <script type="text/javascript" src="view/javascript/common.js"></script>

    <!--//tooltipster tooltip -->
    <link rel="stylesheet" type="text/css" href="view/javascript/tooltip/css/tooltipster.css"/>
    <script type="text/javascript" src="view/javascript/tooltip/jquery.tooltipster.min.js"></script>
   
    <script type="text/javascript">
        //-----------------------------------------
        // Confirm Actions (delete, uninstall)
        //-----------------------------------------
        $(document).ready(function () {
            // Confirm Delete
            $('#form').submit(function () {
                if ($(this).attr('action').indexOf('delete', 1) != -1) {
                    if (!confirm('Are you realy want Delete/Uninstall?')) {
                        return false;
                    }
                }
            });
            // Confirm Uninstall
            $('a').click(function () {
                if ($(this).attr('href') != null && $(this).attr('href').indexOf('uninstall', 1) != -1) {
                    if (!confirm('Are you realy want Delete/Uninstall?')) {
                        return false;
                    }
                }
            });
        });
    </script>
<div id="content">
  <div class="box" style="width: 400px; min-height: 300px; margin-top: 40px; margin-left: auto; margin-right: auto;">
    <div class="heading">
      <h1><img src="view/image/lockscreen.png" alt="" /> <?php echo $text_login; ?></h1>
    </div>
    <div class="content" style="min-height: 150px; overflow: hidden;">
      <?php if ($success) { ?>
      <div class="success"><?php echo $success; ?></div>
      <?php } ?>
      <?php if ($error_warning) { ?>
      <div class="warning"><?php echo $error_warning; ?></div>
      <?php } ?>
      <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data" id="form">
        <table style="width: 100%;">
          <tr>
            <td style="text-align: center;" rowspan="4"><img src="view/image/login.png" alt="<?php echo $text_login; ?>" /></td>
          </tr>
          <tr>
            <td><?php echo $entry_username; ?><br />
              <input type="text" name="username" value="<?php echo $username; ?>" style="margin-top: 4px;" />
              <br />
              <br />
              <?php echo $entry_password; ?><br />
              <input type="password" name="password" value="<?php echo $password; ?>" style="margin-top: 4px;" />
              <?php if ($forgotten) { ?>
              <br />
              <!--a href="<?php echo $forgotten; ?>"><?php echo $text_forgotten; ?></a-->
              <?php } ?>
              </td>
          </tr>
          <tr>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td style="text-align: right;"><a onclick="$('#form').submit();" class="button"><?php echo $button_login; ?></a></td>
          </tr>
        </table>
        <?php if ($redirect) { ?>
        <input type="hidden" name="redirect" value="<?php echo $redirect; ?>" />
        <?php } ?>
      </form>
    </div>
  </div>
</div>
<script type="text/javascript"><!--
$('#form input').keydown(function(e) {
	if (e.keyCode == 13) {
		$('#form').submit();
	}
});
//--></script> 
