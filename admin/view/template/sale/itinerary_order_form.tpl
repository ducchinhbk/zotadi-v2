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
        <a href="<?php echo $cancel; ?>" class="button">Back</a>
        </div>
    </div>
    <div class="content">
      <div id="vtabs" class="vtabs">
          <a href="#tab-customer">Customer Detail</a>
          <a href="#tab-shipping">Trip Information</a>
          <a href="#tab-product">All person name</a>
          <a href="#tab-partner">Assigned Partner </a>
          <a href="#tab-itinerary">Itinerary</a>
      </div>
      <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data" id="form">
        <div id="tab-customer" class="vtabs-content">
          <table class="form">
            <tr>
              <td class="left">Order ID:</td>
              <td class="left"> <?php echo $order_id; ?></td>
            </tr>
            <tr>
              <td class="left">Status:</td>
              <td class="left"> <?php echo $order_info[0]['order_status']; ?></td>
            </tr>
            <tr>
              <td>Customer Name:</td>
              <td><?php echo $order_info[0]['customer']; ?> </td>
            </tr>
            <tr>
              <td>Nationality:</td>
              <td><?php echo $order_info[0]['residence']; ?> </td>
            </tr>
            <tr>
              <td class="left">Trip name:</td>
              <td class="left"><?php echo $order_info[0]['tripname']; ?></td>
            </tr>
           <tr>
              <td class="left">Start date:</td>
              <td class="left"><?php echo date('d-m-Y', strtotime($order_info[0]['startdate'])); ?></td>
            </tr>
            <tr>
              <td class="left">Number of days:</td>
              <td class="left"><?php echo $order_info[0]['numdate']; ?> days</td>
            </tr>
            
          </table>
        </div>
        
        <div id="tab-shipping" class="vtabs-content">
          <table class="form">
          <tr>
              <td>Choose Continent:</td>
              <td><?php echo $order_info[0]['continent']; ?></td>
            </tr>
            <tr>
              <td>Choose Countries:</td>
              <td><?php echo $order_info[0]['countries']; ?></td>
            </tr>
            <tr>
              <td>Choose Cities:</td>
              <td><?php echo $order_info[0]['cities']; ?></td>
            </tr>
            
            <tr>
              <td>Travel styles:</td>
              <td><?php echo $order_info[0]['travelStyle']; ?></td>
            </tr>
            <tr>
              <td>Accommodations:</td>
              <td><?php echo $order_info[0]['accommodation']; ?></td>
            </tr>
            <tr>
              <td>Include trip Idea: </td>
              <td><div  class="scrollbox">
                  <?php $class = 'odd'; ?>
                  <?php $class = ($class == 'even' ? 'odd' : 'even'); ?>
                  <?php echo $order_info[0]['includeLike']; ?>
                </div></td>
            </tr>
            <tr>
              <td>Budgets:</td>
              <td><?php echo $order_info[0]['minBudget'].' - '.$order_info[0]['maxBudget']; ?> USD</td>
            </tr>
            <tr>
              <td>Number of Adults:</td>
              <td><?php echo $order_info[0]['numAdults']; ?> persons</td>
            </tr>
            <tr>
              <td>Number of Childrens(5 -13 old):</td>
              <td><?php echo $order_info[0]['numChild']; ?> persons</td>
            </tr>
            <tr>
              <td>Number of Childrens(Under 5 old):</td>
              <td><?php echo $order_info[0]['numUnderChild']; ?> persons</td>
            </tr>
            
          </table>
        </div>
        <div id="tab-product" class="vtabs-content">
          <table class="form">
            <tr>
              <td>Number of adults: </td>
              <td><div  class="scrollbox">
                  <?php $class = 'odd'; ?>
                  <?php $class = ($class == 'even' ? 'odd' : 'even'); ?>
                  <?php foreach($all_persons as $person) {
                            if($person['personType']==1){
                    ?>
                        <div  class="<?php echo $class; ?>"><?php echo $person['fullname']; ?>
                        </div>
                  <?php } } ?>
                  
                </div></td>
            </tr>
            <tr>
              <td>Number of childrens(5-13 old): </td>
              <td>
                <div  class="scrollbox">
                  <?php $class = 'odd'; ?>
                  <?php $class = ($class == 'even' ? 'odd' : 'even'); ?>
                  <?php foreach($all_persons as $person) {
                            if($person['personType']==2){
                    ?>
                        <div  class="<?php echo $class; ?>"><?php echo $person['fullname']; ?>
                        </div>
                  <?php } } ?>
                  
                </div>
              </td>
            </tr>
            <tr>
              <td>Number of childrens(under 5 old): </td>
                  <td><div  class="scrollbox">
                          <?php $class = 'odd'; ?>
                          <?php $class = ($class == 'even' ? 'odd' : 'even'); ?>
                          <?php foreach($all_persons as $person) {
                                    if($person['personType']==3){
                            ?>
                                <div  class="<?php echo $class; ?>"><?php echo $person['fullname']; ?>
                                </div>
                          <?php } } ?>
                      
                    </div>
                </td>
            </tr>
            
          </table>
        </div>
        <div id="tab-partner" class="vtabs-content">
            <table>
                <tr>
                  <td>Partner</td>
                  <td><input type="text" name="partner" value="" /></td>
                </tr>
                <tr>
                  <td>&nbsp;</td>
                  <td><div id="product-category" class="scrollbox">
                      <?php $class = 'odd'; ?>
                      <?php foreach ($order_partners as $order_partner) { ?>
                      <?php $class = ($class == 'even' ? 'odd' : 'even'); ?>
                      <div id="product-category<?php echo $order_partner['partner_id']; ?>" class="<?php echo $class; ?>"><?php echo $order_partner['name']; ?><img src="view/image/delete.png" alt="" />
                        <input type="hidden" name="order_parter[]" value="<?php echo $order_partner['partner_id']; ?>" />
                      </div>
                      <?php } ?>
                    </div></td>
                </tr>  
            </table>
            
        </div>
       <div id="tab-itinerary" class="vtabs-content">
          <div class="content">
              <form action="<?php echo $delete; ?>" method="post" enctype="multipart/form-data" id="form">
                <table class="list">
                  <thead>
                    <tr>
                      
                      <td class="center">Images</td>
                      <td class="left">Itinerary Name</td>
                      <td class="left">Price</td>
                      <td class="left">Partner</td>
                      <td class="left">Status</td>
                      <td class="right">Action</td>
                      <td class="right">Action</td>
                    </tr>
                  </thead>
                  <tbody>
                    
                    <?php if ($products) { ?>
                    <?php foreach ($products as $product) { ?>
                    <tr>
                      
                      <td class="center"><img src="<?php echo $product['image']; ?>" alt="<?php echo $product['name']; ?>" style="padding: 1px; border: 1px solid #DDDDDD;" /></td>
                      <td class="left"><?php echo $product['name']; ?></td>
                      <td class="left"><?php echo number_format($product['price'], '0', '', '.'); ?></td>
                      <td class="left"><?php echo $product['partner']; ?></td>
                      <td class="left"><?php echo $product['status']; ?></td>
                      <td class="right"><?php foreach ($product['action_update'] as $action_update) { ?>
                        [ <a target="_blank" href="<?php echo $action_update['href']; ?>"><?php echo $action_update['text']; ?></a> ]
                        <?php } ?></td>
                        <td class="right"><?php foreach ($product['action_view'] as $action_view) { ?>
                        [ <a target="_blank" href="<?php echo $action_view['href']; ?>"><?php echo $action_view['text']; ?></a> ]
                        <?php } ?></td> 
                    </tr>
                    <?php } ?>
                    <?php } else { ?>
                    <tr>
                      <td class="center" colspan="8">There no any itinerary</td>
                      
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

/*$.widget('custom.catcomplete', $.ui.autocomplete, {
	_renderMenu: function(ul, items) {
		var self = this, currentCategory = '';
		
		$.each(items, function(index, item) {
			if (item.category != currentCategory) {
				ul.append('<li class="ui-autocomplete-category">' + item.category + '</li>');
				
				currentCategory = item.category;
			}
			
			self._renderItem(ul, item);
		});
	}
});*/

//Partner
$('input[name=\'partner\']').autocomplete({
	delay: 500,
	source: function(request, response) {
		$.ajax({
			url: 'index.php?route=catalog/partner/autocomplete&token=<?php echo $token; ?>&filter_name=' +  encodeURIComponent(request.term),
			dataType: 'json',
			success: function(json) {		
				response($.map(json, function(item) {
					return {
						label: item.name,
						value: item.partner_id
					}
				}));
			}
		});
	}, 
	select: function(event, ui) {
		$('#product-category' + ui.item.value).remove();
		
		$('#product-category').append('<div id="product-category' + ui.item.value + '">' + ui.item.label + '<img src="view/image/delete.png" alt="" /><input type="hidden" name="order_parter[]" value="' + ui.item.value + '" /></div>');
        
		$('#product-category div:odd').attr('class', 'odd');
		$('#product-category div:even').attr('class', 'even');
				
		return false;
	},
	focus: function(event, ui) {
      return false;
   }
});

$('#product-category div img').live('click', function() {
	$(this).parent().remove();
	
	$('#product-category div:odd').attr('class', 'odd');
	$('#product-category div:even').attr('class', 'even');	
});


//--></script> 

<?php echo $footer; ?>