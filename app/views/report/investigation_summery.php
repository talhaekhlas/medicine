<h3>Investigation Summery Report From 2014-12-01 To current date</h3>
<?php
foreach ($report as $value) {

    if (strtotime($value->created_at) >= strtotime('2014-12-01')) {
        $investigation_name[] = $value->investigation_list_id;
        $group_name[] = $value->group_name;
        $name[] = $value->investigation_name;
        $amount[] = $value->amount;
    }
}
$investigation_name = array_count_values($name);
$amt = array_combine($name, $amount);
$count = array_count_values($group_name);
$group_name = array_unique($group_name);
?>
<?php
$k = 0;

foreach ($group_name as $value) {
    echo $value;
    $sl = 1;
    $sl2 = 1;
    $sum = 0;
    $a = array();
    ?>
    <table border="1">

        <th>SL</th>
        <th>Investigation Name</th>
        <th>Count</th>
        <th>Amount</th>
        <?php
        for ($i = 1; $i <= $count[$value]; $i++) {
            if (!in_array($name[$k], $a)) {
                $a[] = $name[$k];
                ?>
                <tr>
                    <td><?php echo $sl2; ?></td>
                    <td><?php echo $name[$k]; ?></td>
                    <td><?php echo $investigation_name[$name[$k]]; ?></td>
                    <td><?php $sum+=$investigation_name[$name[$k]] * $amt[$name[$k]];
                echo $investigation_name[$name[$k]] * $amt[$name[$k]]; ?></td>

                </tr>

                <?php
                $sl2++;
            }
            $k++;
            $sl++;
        }
        ?>
        <tr>
            <td style="text-align: right" colspan="2">total=</td><td><?php echo $sl - 1; ?></td><td><?php echo $sum; ?></td>
        </tr>
    </table>  
<?php } ?>