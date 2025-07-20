<?php
    function getAvailableSlots($pdo, $tableNum, $duration) {
        $open = 12;
        $close = 22;
        $slots = [];

        // Step 1: Get all reservations for this table
        $stmt = $pdo->prepare("SELECT res_Time, res_Duration FROM reservation WHERE table_Number = ?");
        $stmt->execute([$tableNum]);
        $reservations = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Step 2: Check each possible start time
        $latestStart = $close - $duration;
        for ($hour = $open; $hour <= $latestStart; $hour++) {
            $start = sprintf('%02d:00', $hour);
            $startDT = DateTime::createFromFormat('H:i', $start);
            $endDT = clone $startDT;
            $endDT->add(new DateInterval("PT{$duration}H"));
            $end = $endDT->format('H:i');

            $isFree = true;

            foreach ($reservations as $res) {
                $resStart = $res['res_Time'];
                $resEnd = $res['res_Duration']; // end time

                if ($start < $resEnd && $resStart < $end) {
                    $isFree = false;
                    break;
                }
            }

            if ($isFree) {
                $slots[] = $start;
        }
    }

        return $slots;
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $TableNumber = isset($_POST['table']) ? (int)$_POST['table'] : null;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>S.I.P.A.T Booking</title>
</head>
<body>

    <?php
        require_once '../reservation/database.inc.php'; // connect to DB
        $duration = isset($_POST['Duration']) ? (int)$_POST['Duration'] : 1;
        $availableSlots = getAvailableSlots($pdo, $TableNumber, $duration);
    ?>

    <p>Table Number: <?= $TableNumber ?></p>

    <form method="POST" action="../reservation/formhandler.inc.php">
        <input type="hidden" name="TableNum" value="<?= $TableNumber ?>">

        <label for="Name">Name:</label>
        <input type="text" name="Name" id="Name" required><br><br>

        <label for="Contact">Contact Number:</label>
        <input type="text" name="Contact" id="Contact" required><br><br>

        <label for="Time">Time:</label>
            <select name="Time" id="Time" required>
            <?php foreach ($availableSlots as $slot): ?>
            <option value="<?= $slot ?>"><?= $slot ?></option>
            <?php endforeach; ?>
        </select><br><br>

        <label for="Duration">Duration (hours):</label>
        <input type="number" name="Duration" id="Duration" min="1" max="10" required><br><br>

        <button type="submit">Submit</button>
    </form>
</body>
</html>

<?php
} else {
    header("Location: ../main.php");
    exit();
}
?>