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
    <link rel="stylesheet" href="../css//booking.css">
    <title>S.I.P.A.T Booking</title>
</head>
<body>
<?php require_once('../components/navbar.php')?>

    <div class="booking-container">
        
    <?php
        require_once '../reservation/database.inc.php'; // connect to DB
        $duration = isset($_POST['Duration']) ? (int)$_POST['Duration'] : 1;
        $availableSlots = getAvailableSlots($pdo, $TableNumber, $duration);
    ?>
        <div class="table-num-head">
            <div class="table-num">
                <?= $TableNumber ?>
            </div>
            Table Number

        </div>

        <div class="form">

        <form method="POST" action="../reservation/formhandler.inc.php">
            <input type="hidden" name="TableNum" value="<?= $TableNumber ?>">
            <h1>Booking</h1>
            <div class="name">
                <label for="Name">Name:</label>
                <input type="text" name="Name" id="Name" required><br><br>
            </div>
            
            <div class="contact">
                <label for="Contact">Contact Number:</label>
                <input type="text" name="Contact" id="Contact" required><br><br>
            </div>
            
            <div class="time">
                <label for="Time">Time:</label>
                    <select name="Time" id="Time" required>
                    <?php foreach ($availableSlots as $slot): ?>
                    <option value="<?= $slot ?>"><?= $slot ?></option>
                    <?php endforeach; ?>
                </select><br><br>
            </div>
            
            <div class="duration">
                <label for="Duration">Duration (hours):</label>
                <input type="number" name="Duration" id="Duration" min="1" max="10" required><br><br>
            </div>
            
            <button type="submit">Submit</button>
        </form>
        </div>

    </div>
    <?php require_once('../components/footer.php')?>
                        
</body>
</html>

<?php
} else {
    header("Location: ../main.php");
    exit();
}
?>