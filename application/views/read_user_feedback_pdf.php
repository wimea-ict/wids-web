<!doctype html>
<html>
    <head>
        <title>User Feedback</title>
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
        <h2 style="text-align: center;">User Feedback</h2>
        
        <table class="word-table" style="margin-bottom: 10px;width: 70%;margin-right: auto;margin-left: auto;">
            <tr>
                <form method="post" action="">
                    <td colspan="6"><input type="submit" name="download" value="Download PDF"></td>
                </form>
            </tr>
            <tr>
            <th>No</th>
		<th>District Name</th>
		<th>Accuracy (out of 10)</th>
        <th>Applicability (out of 10)</th>  
        <th>Timeliness (out of 10)</th>
		<th>General Comment</th>
		
            </tr><?php
            
           if(isset($_POST['download'])){
                header('Content-Type: application/octet-stream');
                $file = 'user_feedback.pdf';
                header('Content-Disposition: attachment; filename='.urlencode($file));
                header('Content-Type: application/download');
                header('Content-Description: File Transfer');
                header('Content-Length:'.filesize($file));

                flush();
                $fp = fopen($file, "r");
                while (!feof($fp)) {
                    echo fread($fp, 65536);
                    flush();
                }
                fclose($fp);
           }
            ////////////////////// ////////////////////////////////
           // Create this new loop to get the data
           foreach ($user_feedback_data as $pdf) {
               ?>
               <tr>
                   <td><?php echo $pdf['id'] ?></td>
                   <td><?php echo $pdf['city_name'] ?></td>
                   <td><?php echo $pdf['accuracy'] ?></td>
                   <td><?php echo $pdf['applicability'] ?></td>
                   <td><?php echo $pdf['timeliness'] ?></td>
                   <td><?php echo $pdf['generalComment'] ?></td>
               </tr>

               <?php
           }
           ////////////////////// ////////////////////////////////
            foreach ($user_feedback as $user_feedback)
            {
                
                // $reg = $this->db->get_where('user_feedback');
                ?>
                <tr style="display: none;">
                <td><?php echo ++$start ?></td>
              <!-- <td><?php  foreach ($reg->result() as $p){ echo $p->districtname ; }?></td> -->
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