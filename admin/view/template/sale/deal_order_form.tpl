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
      <h1><img src="view/image/order.png" alt="" /> <?php echo $heading_title; ?></h1>
      <div class="buttons">
        <a onclick="$('#form').submit();" class="button">Save</a>
        <a href="<?php echo $cancel; ?>" class="button">Cancel</a>
        </div>
    </div>
    <div class="content">
      <div id="vtabs" class="vtabs">
          <a href="#tab-customer">Order Info</a>
          <a href="#tab-deal">Deal Info</a>
      </div>
      <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data" id="form">
        <div id="tab-customer" class="vtabs-content">
          <table class="form">
            <tr>
              <td class="left">Order ID:</td>
              <td class="left"> <?php echo $order_info['order_id']; ?></td>
            </tr>
             <tr>
              <td class="left">Date reveived:</td>
              <td class="left"> <?php echo $order_info['date_added']; ?></td>
            </tr>
            <tr>
              <td class="left">Status:</td>
              <td class="left"> 
                <select name="order_status">
                      <?php foreach ($order_statuses as $order_status) { ?>
                      <?php if ($order_status['status_id'] == $order_info['status']) { ?>
                      <option value="<?php echo $order_status['status_id']; ?>" selected="selected"><?php echo $order_status['statusName']; ?></option>
                      <?php } else { ?>
                      <option value="<?php echo $order_status['status_id']; ?>"><?php echo $order_status['statusName']; ?></option>
                      <?php } ?>
                      <?php } ?>
                </select>
              </td>
            </tr>
            <tr>
              <td>Customer Name:</td>
              <td><?php echo $order_info['customer']; ?> </td>
            </tr>
            <tr>
              <td>Email:</td>
              <td><?php echo $order_info['email']; ?> </td>
            </tr>
            <tr>
              <td class="left">Telephone:</td>
              <td class="left"><?php echo $order_info['telephone']; ?></td>
            </tr>
           <tr>
              <td class="left">Total:</td>
              <td class="left"><?php echo number_format($order_info['total'], '0', '', '.'); ?> VND</td>
            </tr>
            
          </table>
        </div>
        
        
       <div id="tab-deal" class="vtabs-content">
          <div class="content">
              <form action="<?php echo $delete; ?>" method="post" enctype="multipart/form-data" id="form">
                <table class="list">
                  <thead>
                    <tr>
                      <td class="center">Images</td>
                      <td class="left">Deal Name</td>
                      <td class="left">Price</td>
                      <td class="left">Date added</td>
                      <td class="left">Status</td>
                      <td class="right">Action</td>
                      <td class="right">Action</td>
                    </tr>
                  </thead>
                  <tbody>
                    
                    <?php if ($product) { ?>
                    <tr>
                      <td class="center"><img src="<?php echo $product['image']; ?>" alt="<?php echo $product['name']; ?>" style="padding: 1px; border: 1px solid #DDDDDD;" /></td>
                      <td class="left"><?php echo $product['name']; ?></td>
                      <td class="left"><?php echo number_format($product['price'], '0', '', '.'); ?></td>
                      <td class="left"><?php echo $product['date_added']; ?></td>
                      <td class="left"><?php echo $product['status']; ?></td>
                      <td class="right">
                        [ <a target="_blank" href="<?php echo $product['action_update']['href']; ?>"><?php echo $product['action_update']['text']; ?></a> ]
                      </td>
                      <td class="right">
                        [ <a target="_blank" href="<?php echo $product['action_view']['href']; ?>"><?php echo $product['action_view']['text']; ?></a> ]
                       </td> 
                    </tr>
                    <?php } else { ?>
                    <tr>
                      
                      <td class="center" colspan="8">There no any deal</td>
                      
                    </tr>
                    <?php } ?>
                  </tbody>
                </table>
              </form>
              
            </div>
        </div>
      </form>
    </div>
  </div>
</div>
 
 
 
 
<script type="text/javascript" src="view/javascript/jquery/ui/jquery-ui-timepicker-addon.js"></script> 
<script type="text/javascript"><!--
$('.date').datepicker({dateFormat: 'yy-mm-dd'});
$('.datetime').datetimepicker({
	dateFormat: 'yy-mm-dd',
	timeFormat: 'h:m'
});
$('.time').timepicker({timeFormat: 'h:m'});
//--></script> 
<script type="text/javascript"><!--
$('.vtabs a').tabs();
//--></script> 
<?php echo $footer; ?>