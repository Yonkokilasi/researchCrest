            <?php
            $orderId = $_GET['id'];
            require_once 'config.php';
            
            $sql1        = "SELECT * FROM `order` WHERE orderId = '$orderId'";
            $query1      = mysqli_query($Con, $sql1);
            $row1        = mysqli_fetch_assoc($query1);
            $clientId    = $row1['clientId'];
            $writerId    = $row1['writerId'];

                $query = mysqli_query($Con, "SELECT * FROM wcd_rate WHERE writerId = '$writerId'"); 
                while($data = mysqli_fetch_assoc($query)){
                    $rate_db[] = $data;
                    $sum_rates[] = $data['rate'];
                }
                if(@count($rate_db)){
                    $rate_times     = count($rate_db);
                    $sum_rates      = array_sum($sum_rates);
                    $rate_value     = $sum_rates/$rate_times;
                    $rate_bg        = (($rate_value)/5)*100;
                }else{
                    $rate_times = 0;
                    $rate_value = 0;
                    $rate_bg    = 0;
                }
            ?>
            <hr>
            this writer has been rated by <strong><?php echo $rate_times; ?></strong> students.
            <hr>
            Current writer rating is at <strong><?php echo round($rate_value,2); ?></strong> .
            <center>
            <div class="rate-result-cnt">
                <div class="rate-bg" style="width:<?php echo $rate_bg; ?>%"></div>
                <div class="rate-stars"></div>
            </div>
            </center>
            <hr>