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
            tr{
                vertical-align: top;
            }
        </style>
    </head>
    <body>
        <h2>Minor Sector</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
               <th width="80px">No</th>
                <th>Minor-Sector Name</th>
                <th>Major Sector</th>
            </tr>
            <?php
            foreach ($minor_sector_data as $d)
            {
                ?>
               <tr>
                    <td><?php echo ++$start ?></td>
                    <td><?php echo $d['minor_name']; ?></td>
                    <td><?php echo $d['sector_name']; ?></td>
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>