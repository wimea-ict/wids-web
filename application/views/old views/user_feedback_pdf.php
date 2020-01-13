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
        <h2>Indigenous Knowledge List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
            <th>No</th>
        <th>Name</th>
        <th>Region</th>
        <th>District</th>
        <th>Observation</th>
        <th>Implication(s)</th>
        <th>Action(s) to take</th>
		
            </tr><?php
            foreach ($user_feedback_data as $user_feedback)
            {
                $reg = $this->db->get_where('region',array('id'=>$user_feedback->region));
                $district = $this->db->get_where('ussddistricts', array('districtid'=>$user_feedback->district));
                ?>
                <tr>
                <td style="width: 100px;"><?php echo ++$start ?></td>
			<td><?php echo $user_feedback->names ?></td>
			<td><?php  foreach ($reg->result() as $p){ echo $p->name ; }?></td>
            <td><?php  foreach ($district->result() as $p){ echo $p->districtname ; }?></td>
            <td><?php echo $user_feedback->observation ?></td>
            <td><?php echo $user_feedback->implication ?></td>
            <td><?php echo $user_feedback->action_to_take ?></td>
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>