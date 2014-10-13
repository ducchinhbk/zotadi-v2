<?php echo $header;?>
<div id="content">
    <div class="box">
        <div class="heading">
            <h1>
                <img alt="" src="view/image/information.png">
                Custom tour info
            </h1>
        </div>
        <div class="content">
            <form>
                <table class="list">
                    <thead>
                    <tr>
                        <td width="100">Tour name</td>
                        <td class="left">Cities</td>
                        <td class="left">Start date</td>
                        <td class="left">Number of date</td>
                        <td class="left">Travel style</td>
                        <td class="left">Accommodation</td>
                        <td class="left">UserInfo</td>
                        <td class="left">Action</td>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach($tours as $tour) { ?>
                    <tr id="tr_<?php echo $tour['custom_tour_id']?>">
                        <td class="left"><?php echo $tour['tripname']?></td>
                        <td class="left"><?php echo $tour['cities']?></td>
                        <td class="left"><?php echo $tour['startdate']?></td>
                        <td class="left"><?php echo $tour['numdate']?></td>
                        <td class="left"><?php echo $tour['suites']?></td>
                        <td class="left"><?php echo $tour['accommodation']?></td>
                        <td class="left"><a class="tooltipster"
                                            title="&lt;table style=&quot;font-family:Georgia, Garamond, Serif; font-style:italic;&quot;&gt;&lt;tr&gt;&lt;td&gt;FirstName&lt;/td&gt;&lt;td&gt;<?php echo $tour['firstname']?>&lt;/td&gt;&lt;td&gt;LastName&lt;/td&gt;&lt;td&gt;<?php echo $tour['lastname']?>&lt;/td&gt;&lt;/tr&gt;&lt;tr&gt;&lt;td&gt;Phone&lt;/td&gt;&lt;td&gt;<?php echo $tour['telephone']?>&lt;/td&gt;&lt;td&gt;Email&lt;/td&gt;&lt;td&gt;<?php echo $tour['email']?>&lt;/td&gt;&lt;/tr&gt;&lt;tr&gt;&lt;td&gt;Nation&lt;/td&gt;&lt;td&gt;&lt;/td&gt;&lt;td&gt;Address&lt;/td&gt;&lt;td&gt;<?php echo $tour['address']?>&lt;/td&gt;&lt;/tr&gt;&lt;/table&gt;"
                                            href="javascript:void(0);"><?php echo $tour['firstname']. $tour['lastname']?>
                                (i)</a>
                        </td>
                        <td class="left">
                            <a style="text-decoration: none;" href="javascript:void(0);"
                               onclick="customTourAction('Done', <?php echo $tour['custom_tour_id']?>,'<?php echo HTTP_CATALOG;?>');">Done</a>
                            &nbsp; | &nbsp;
                            <a style="text-decoration: none;" href="javascript:void(0);"
                               onclick="customTourAction('Cancel', <?php echo $tour['custom_tour_id']?>,'<?php echo HTTP_CATALOG;?>');">Cancel</a>
                        </td>
                    </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </form>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function () {
        $('.tooltipster').tooltipster({
            animation: 'fade',
            delay: 200,
            theme: 'tooltipster-default',
            touchDevices: false,
            trigger: 'hover',
            contentAsHTML: true
        });
    });
</script>

<?php echo $footer; ?>