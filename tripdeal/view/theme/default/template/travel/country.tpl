<?php $i = 0; ?>
<?php foreach($countries as $country){ ?>
<?php if($i==0){ ?>
<li class="itemCity active"><a href="javascript:void(0);" onclick="$('.itemCity').removeClass('active'); $(this).parent().addClass('active'); changeCountry('<?php echo $country['en_name']?>','<?php echo DIR_ROOT_NAME?>')"><img src="/<?php echo DIR_ROOT_NAME;?>/image/<?php echo $country['image']; ?>"><span><?php echo $country['en_name'] ?></span></a></li>
<?php }else{ ?>
<li class="itemCity"><a href="javascript:void(0);" onclick="$('.itemCity').removeClass('active'); $(this).parent().addClass('active'); changeCountry('<?php echo $country['en_name']?>','<?php echo DIR_ROOT_NAME?>')"><img src="/<?php echo DIR_ROOT_NAME;?>/image/<?php echo $country['image']; ?>"><span><?php echo $country['en_name'] ?></span></a></li>
<?php } ?>
<?php $i++; } ?>