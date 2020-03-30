<!doctype html>
<html>
    <head>
        <title>Word Doc</title>

        <!---------------------- Amoko ------------------------->
        <!-- Remove the word Boostrap in the url base -->
        <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css') ?>"/>
        <!---------------------- Amoko ------------------------->

        <style>
            .word-table {
                border:1px solid black !important; 
                border-collapse: collapse !important;
                width: 100%;
            }
            .word-table tr th, .word-table tr td{
                border:1px solid black !important; 
                padding: 5px 10px;
            }
        </style>
    </head>
    <body>
        <h2>SEASONAL FORECAST AREA INFORMATION</h2>
        <table class="word-table" style="margin-bottom: 10px;width: 100%">
            <tr style="vertical-align: top">
                <th>No</th>
				<th>Region</th>
				<th>Rain Onset</th>
	            <th>Expected Rain Peak</th>
	            <th>Rain End Period</th>
	            <th>Overall Comment</th>
	            <th>General Info</th>
		
            </tr>
            <?php
            $start = 0;
            foreach ($forecast_area_data2 as $d){ $start++;?>
                <tr style="vertical-align: top">
                    <td><?php echo $start ?></td>
					<td><?php echo $d['region_name']; ?></td>
	                <td><?php echo $d['onsetdesc']."&nbsp;".$d['onset_period']; ?></td>
	                <td><?php echo $d['peakdesc']."&nbsp;".$d['expected_peak']; ?></td>
	                <td><?php echo $d['enddesc']."&nbsp;".$d['end_period']; ?></td>
	                <td><?php echo $d['overall_comment']; ?></td>
	                <td><?php echo $d['general_info']; ?></td>
                </tr>
            <?php }?>
        </table>
    </body>
</html>