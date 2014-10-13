<?php $i=0; ?>
<?php foreach($continents as $continent){ ?>
<?php if($i==0) { ?>
<li><a href="javascript:void(0);" class="cont_active"
       onclick="$('.js_cont_list li a').removeClass('cont_active'); $(this).addClass('cont_active'); changeContinent('<?php echo $continent['en_name'] ?>','<?php echo DIR_ROOT_NAME;?>');"><?php echo $continent['en_name'] ?></a>
</li>
<?php }else{ ?>
<li><a href="javascript:void(0);"
       onclick="$('.js_cont_list li a').removeClass('cont_active'); $(this).addClass('cont_active'); changeContinent('<?php echo $continent['en_name'] ?>', '<?php echo DIR_ROOT_NAME;?>');"><?php echo $continent['en_name'] ?></a>
</li>
<?php } ?>
<?php $i++; } ?>
