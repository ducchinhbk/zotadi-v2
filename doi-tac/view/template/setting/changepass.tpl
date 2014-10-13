<?php echo $header; ?>
<div id="content">
  <div class="box" style="width: 400px; min-height: 300px; margin-top: 40px; margin-left: auto; margin-right: auto;">
    <div class="heading">
      <h1><img src="view/image/lockscreen.png" alt="" /> Enter your new password</h1>
    </div>
    <div class="content" style="min-height: 150px; overflow: hidden;">
        <?php if($error) {?>
      <div class="warning"><?php echo $error; ?></div>
      <?php }?>
      <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data" id="form">
        <table style="width: 100%;">
          <tr>
            <td style="text-align: center;" rowspan="4"><img src="view/image/login.png" alt="change pass" /></td>
          </tr>
          <tr>
            <td>Password<br />
              <input type="password" name="password" value="" style="margin-top: 4px;" />
              <br />
              <br />
              Confirm password<br />
              <input type="password" name="confirm" value="" style="margin-top: 4px;" />
              
              </td>
          </tr>
          <tr>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td style="text-align: right;"><a onclick="$('#form').submit();" class="button">Change</a></td>
          </tr>
        </table>
        
      </form>
    </div>
  </div>
</div>
<?php echo $footer; ?>