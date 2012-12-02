<?php
    require_once("FreeriderAPI.php");
?>
<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
<?php
    $foo = new FreeriderAPI();
    $result = $foo->get_all();

    foreach ($result as $freeride) {
        echo "Origin: " . $freeride->origin . "<br />";
        echo "Destination: " . $freeride->destination . "<br />";
        echo "Start date: " . $freeride->startDate . "<br />";
        echo "End date: " . $freeride->endDate . "<br />";
        echo "Car: " . $freeride->carModel . "<br />";
        echo "<hr />";
    }
?>
</body>
</html>