<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
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
        <h2>Dekadal_forecast List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Region</th>
		<th>Advisory</th>
		<th>Date From</th>
		<th>Date To</th>
		<th>Issuetime</th>
		
            </tr><?php
            foreach ($decadal_forecast_data as $decadal_forecast)
            {
			$reg = $this->db->get_where('region',array('id'=>$decadal_forecast->region));
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
			  <td><?php  foreach ($reg->result() as $p){ echo $p->name ; }?></td>
		      <td><?php echo $decadal_forecast->advisory ?></td>
		      <td><?php echo $decadal_forecast->date_from ?></td>
		      <td><?php echo $decadal_forecast->date_to ?></td>
		      <td><?php echo $decadal_forecast->issuetime ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>