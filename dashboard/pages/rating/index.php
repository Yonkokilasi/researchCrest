<?php
require_once 'config.php';

$query = mysqli_query($Con, "SELECT * FROM wcd_rate WHERE writerId = '$regId'"); 
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
account rated at <strong><?php echo round($rate_value,2); ?></strong> out of <strong>5</strong> on <strong><?php echo $rate_times; ?></strong> orders 
