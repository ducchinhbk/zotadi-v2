<?php echo $header; ?>
<div id="content">
  <div class="breadcrumb">
    <?php foreach ($breadcrumbs as $breadcrumb) { ?>
    <?php echo $breadcrumb['separator']; ?><a href="<?php echo $breadcrumb['href']; ?>"><?php echo $breadcrumb['text']; ?></a>
    <?php } ?>
  </div>
  
  <div class="box">
    <div class="heading">
      <h1><img src="view/image/setting.png" alt="" /> Setting</h1>
      <div class="buttons">
          <a onclick="$('#form').submit();" class="button">Save</a>
          <a href="<?php echo $cancel; ?>" class="button">Cancel</a>
      </div>
    </div>
    <div class="content">
      <div id="tabs" class="htabs">
        <a href="#tab-general">General</a>
      </div>
      <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data" id="form">
        <div id="tab-general">
            <table class="form">
              
              <tr>
                <td>About us (Vi):</td>
                <td><textarea name="vi_description" id="vi_description; ?>"><?php echo isset($vi_description) ? $vi_description : ''; ?></textarea></td>
              </tr>
              <tr>
                <td>About us (En):</td>
                <td><textarea name="en_description" id="en_description; ?>"><?php echo isset($en_description) ? $en_description : ''; ?></textarea></td>
              </tr>
              
              <tr>
                  <td>Keyword</td>
                  <td><input type="text" name="keyword" value="<?php echo $keyword; ?>" /></td>
              </tr>
            
              
            </table>
        </div>
       
      </form>
    </div>
  </div>
</div>

<script type="text/javascript"><!--
$('#tabs a').tabs(); 
$('#languages a').tabs();
//--></script> 
<?php echo $footer; ?>