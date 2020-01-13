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
        <h2>Advisory List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
			<th>No</th>
             <th>Region</th>
             <th>Sub Region</th>
		    <th>Type</th>
		    <th>Category</th>
			 <th>Message</th>
			 
            </tr><?php
            foreach ($Advisory_data as $advise)
            {
                  $reg = $this->db->get_where('region',array('id'=>$advise->region));
                ?>
                <tr>
		    <td><?php echo ++$start ?></td>
			<td><?php foreach ($reg->result() as $s){ echo $s->name ; } ?></td>
             <td><?php echo $advise->subRegion ?></td>
			<td><?php echo $advise->type ?></td>
			<td><?php echo $advise->advice ?></td>
			<td><?php echo $advise->message ?></td>
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>