<?php

    if($advice =='water'){ $date_displayed = $get_advice; $cat = 'Water Advisory'; }
    else if ($advice == 'health'){$date_displayed = $get_advice; $cat = 'Health Advisory';}

    $season = "unknown";
    if((date('m') == 1) || (date('m') == 2)) $season = 'JF';
    else if((date('m') == 3) || (date('m') == 4)  || (date('m') == 5) ) $season = 'MAM';
    else if ((date('m') == 6) || (date('m') == 7)  || (date('m') == 8) ) $season = 'JJA';
    else $season = 'SOND';


?>
<style type="text/css">
	#advisory{
		margin-top: 20px;
		  background-color: white;
		  width: 78%;
		  /*overflow-y: scroll;*/
		  border-top: 2px solid #d2d6de;
		  margin-left: 2%;
		  padding-top: 15px;
		  padding-left: 30px;
		  padding-right: 30px;
		  border-bottom: 2px solid #d2d6de;
		  padding-bottom: 20px;
	}
	#advisory_desc_und{background-color: cornflowerblue;height: 2px; margin-bottom:15px;width: 100%}
	#advisory_head{margin-top: 10px}
    .advice_table{width: 100%}
    .advice_table tr td:first-child{width: 12%; }
	.advice_table td{padding: 10px;border: 1px solid rgb(240,240,240);vertical-align: top;}
</style>


<div id="advisory">
	<h4 id='advisory_head'><?php echo $cat ?></h4>
    <div id='advisory_desc_und'></div>
    <?php $flag = false; foreach ($date_displayed as $ad) : ?>

        <?php 
            if((isset($ad['abbreviation'])) && (  $ad['abbreviation'] == $season)){ ?>
                 <table class="advice_table">
                    <tr>
                        <td>Division</td>
                        <td><?=strtoupper($ad['division_name']) ?></td>
                    </tr>
                    <tr>
                        <td>Climatic Zone</td>
                        <td><?=strtoupper($ad['region_name']) ?></td>
                    </tr>
                    <tr>
                        <td>Sub Zone</td>
                        <td><?=strtoupper($ad['sub_region_name']) ?></td>
                    </tr>
                    <tr>
                        <td>Category</td>
                        <td><?=$ad['category'] ?></td>
                    </tr>
                    <tr>
                        <td>Message</td>
                        <td><?=$ad['message_summary'] ?></td>
                    </tr>
                </table> <?php
                $flag = true;
            }
        ?>
       
    <?php endforeach; if($flag == false) echo "<p>Data has not yet been uploaded. Please try again later.</p>";?>
</div>