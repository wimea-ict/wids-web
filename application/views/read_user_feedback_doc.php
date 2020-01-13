<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css') ?>"/>
        
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
        <h2>WIDS User Feedback</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <?php

            foreach ($user_feedback as $d)
            {
               
                ?>
        <th>No</th>
		<th><?php echo $d['division_type']; ?></th>
		<th>Category</th>
		<th>Accuracy (out of 10)</th>
        <th>Applicability (out of 10)</th>  
        <th>Timeliness (out of 10)</th>
		<th>General Comment</th>
            </tr><?php
             $reg = $this->db->get_where('user_feedback');
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
			  <td><?php  foreach ($reg->result() as $p){ echo $p->districtname ; }?><?php echo $d['division_name']; ?></td>
			  <td><?php echo $d['sector']; ?></td>
			  <td><?php echo $d['accuracy']; ?></td>
              <td><?php echo $d['applicability']; ?></td>
              <td><?php echo $d['timeliness']; ?></td>
              <td><?php echo $d['generalComment']; ?></td>
		      
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>