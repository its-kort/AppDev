<?php
function Duration($time, $duration) {
    $startTime = DateTime::createFromFormat('H:i', $time);
    $endTime = clone $startTime;
    $endTime->add(new DateInterval('PT' . $duration . 'H'));
    return $endTime->format('H:i');
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $Time = $_POST["Time"];
    $Duration = $_POST["Duration"];
    $Table = $_POST["TableNum"];
    $Name = $_POST["Name"];
    $PhoneNumber = $_POST["Contact"];

    $startDT = DateTime::createFromFormat('H:i', $Time);
    $endDT = clone $startDT;
    $endDT->add(new DateInterval('PT' . $Duration . 'H'));

    $EndTime = $endDT->format('H:i');

    $startTimeObj = DateTime::createFromFormat('H:i', $Time);
    $closingTime = DateTime::createFromFormat('H:i', '22:00');
    $endTimeObj = clone $startTimeObj;
    $endTimeObj->add(new DateInterval("PT{$Duration}H"));

    if ($endTimeObj > $closingTime) {
    $allowedDuration = ($closingTime->getTimestamp() - $startTimeObj->getTimestamp()) / 3600;
    $allowedDuration = floor($allowedDuration); // only allow whole hours

    echo "<script>
        alert('Reservation exceeds closing time (10:00 PM). Maximum allowed duration for this time is {$allowedDuration} hour(s).');
        window.history.back();
    </script>";
    exit();
}

    try {
        require_once 'database.inc.php';

        $query = "INSERT INTO reservation (res_Time, res_Duration, res_Name, res_PhoneNum, table_Number) VALUES (?, ?, ?, ?, ?)";
        $stmt = $pdo->prepare($query);
        $stmt->execute([$Time, $EndTime, $Name, $PhoneNumber, $Table]);

        $pdo = null;
        $stmt = null;

        header("Location: success.php");
        die();

    } catch (PDOException $e) {
        die("Query failed: " . $e->getMessage());
    }
} else {
    header("Location: ../main.php");
    exit();
}
