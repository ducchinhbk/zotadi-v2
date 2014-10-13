<html lang="en">
<head>
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type">
    <title>Zotadi</title>
</head>
<body>
<table width="690" align="center" cellspacing="0" cellpadding="0" border="0">
    <tr>
        <td colspan="2"><img width="575px" src="http://s14.postimg.org/hpp7f1lyl/big_logo.png" alt="logo" /></td>
    </tr>
    <tr>
        <td col-span="2"><span style="color: blue; font-size:20px;"><strong>Trip information</strong></span></td>
    </tr>
    <tr>
        <td>
            <table style="background-color: #eeeeee; width: 97%;">
                <tr>
                    <td><span><strong>Places visit:</strong></span></td>
                </tr>
                <tr class="lstCity">
                    <td>
                        <ul style="padding-left: 0;">
                            <?php foreach($lstCities as $city){ ?>
                            <li style="display: inline-block; padding: 5px">
                                <img style="border: 0; width: 100px; height: 100px;" src="<?php echo $city['imageLink'] ?>" />
                                <p style="text-align: center; margin: 8px;" class="title"><?php echo $city['cityName']?></p>
                            </li>
                            <?php } ?>
                        </ul>
                    </td>
                </tr>
                <tr><td>Start date: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $startdate; ?></td></tr>
                <tr><td>No. of days: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $numdate; ?></td></tr>
                <tr><td>Travel style: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <?php $i=0; foreach($suites as $style){ ?>
                        <?php if($style != '' && $style !=  null){ ?>
                        <?php if($i != (count($suites)-1)){ echo $style; ?>,&nbsp;
                        <?php }else{ echo $style; }?>
                        <?php } ?>
                        <?php $i++; } ?>
                    </td></tr>
                <tr><td>Accommodation: &nbsp;
                        <?php $j=0; foreach($accommodation as $hotel){ ?>
                        <?php if($hotel != '' && $hotel !=  null){ ?>
                        <?php if($j != (count($accommodation)-1)){ echo $hotel; ?>,&nbsp;
                        <?php }else{ echo $hotel; }?>
                        <?php } ?>
                        <?php $j++; } ?>
                    </td></tr>
            </table>
        </td>
        <td>
            <table>
                <tr>
                    <td><span style="color: blue; font-size:20px;"><strong>Your contact</strong></span></td>
                </tr>
                <tr>
                    <table>
                        <tr>
                            <td>Name:</td>
                            <td>&nbsp;<?php echo $name;?></td>
                        </tr>
                        <tr>
                            <td>Nationality:</td>
                            <td>&nbsp;<?php echo $national; ?></td>
                        </tr>
                        <tr>
                            <td>Email:</td>
                            <td>&nbsp;<?php echo $email; ?></td>
                        </tr>
                        <tr>
                            <td>Phone:</td>
                            <td>&nbsp;<?php echo $telephone; ?></td>
                        </tr>
                    </table>
                </tr>
            </table>
        </td>
    </tr>
</table>

</body>
</html>