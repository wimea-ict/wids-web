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
        <h2>User Feedback</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
        <th>No</th>
		<th>District Name</th>
		<th>Category</th>
		<th>Accuracy (out of 10)</th>
        <th>Applicability (out of 10)</th>  
        <th>Timeliness (out of 10)</th>
		<th>General Comment</th>
            </tr><?php
            foreach ($user_feedback as $user_feedback)
            {
                $reg = $this->db->get_where('user_feedback');
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
			  <td><?php  foreach ($reg->result() as $p){ echo $p->districtname ; }?></td>
			  <td><?php echo $user_feedback->category; ?></td>
			  <td><?php echo $user_feedback->accuracy; ?></td>
              <td><?php echo $user_feedback->applicability; ?></td>
              <td><?php echo $user_feedback->timeliness; ?></td>
              <td><?php echo $user_feedback->generalComment; ?></td>
		      
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>