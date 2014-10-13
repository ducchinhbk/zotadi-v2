<div class="cityNumber">
    <?php echo count($cities); ?> <?php echo $text_city_available;?> &nbsp; <strong> <?php echo $countryName; ?> </strong>
</div>

<ul class="liCiy">
    <?php foreach($cities as $city){ ?>
    <li>
        <?php $temp = trim($city['en_description']); ?>
        <?php $image = $city['image']; ?>
        <?php $name = $city['en_name']; ?>
        <a href="javascript:void(0);"
           onclick="addCity('<?php echo $name; ?>', '/<?php echo DIR_ROOT_NAME; ?>/image/<?php echo $image; ?>', '<?php echo $temp;?>' , '<?php echo DIR_ROOT_NAME; ?>');">
            <?php echo $city['en_name'] ?>
        </a>
    </li>
    <?php } ?>
    <div class="clearfix"></div>
</ul>
