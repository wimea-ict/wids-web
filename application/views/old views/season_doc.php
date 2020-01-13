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
        <h2>Season List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
			<th>Advisory</th>
			<th>Region</th>
		    <th>Month From</th>
		    <th>Month To</th>
		    <th>Issuetime</th>
		
            </tr><?php
            foreach ($season_data as $season)
            {
			$reg = $this->db->get_where('region',array('id'=>$season->region));
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
			<td><?php  foreach ($reg->result() as $p){ echo $p->name ; }?></td>
                    <td><?php echo $season->subRegion ?></td>
                    <td><?php echo $season->season ?></td>
                    <td><?php echo $season->description ?></td>
                    <td><?php echo $season->impact ?></td>
			<td><?php echo $season->issuetime ?></td>
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>