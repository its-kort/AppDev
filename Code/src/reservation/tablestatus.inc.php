
<?php
require_once 'database.inc.php';

$maxSlots = 12;
$tableStatuses = [];

function getAvailableSlotsForTable($pdo, $tableNum) {
    $open = 12;
    $close = 22;

    $stmt = $pdo->prepare("SELECT res_Time, res_Duration FROM reservation 
                           WHERE table_Number = ? AND DATE(res_Time) = CURDATE()");
    $stmt->execute([$tableNum]);
    $reservations = $stmt->fetchAll(PDO::FETCH_ASSOC);

    for ($hour = $open; $hour < $close; $hour++) {
        $start = sprintf('%02d:00', $hour);
        $startDT = DateTime::createFromFormat('H:i', $start);
        $endDT = clone $startDT;
        $endDT->add(new DateInterval("PT1H"));
        $end = $endDT->format('H:i');

        $isFree = true;
        foreach ($reservations as $res) {
            $resStart = $res['res_Time'];
            $resEnd = $res['res_Duration'];

            if ($start < $resEnd && $resStart < $end) {
                $isFree = false;
                break;
            }
        }

        if ($isFree) {
            return true; // At least 1 slot free
        }
    }

    return false; // No free slot
}

for ($tableNumber = 1; $tableNumber <= 6; $tableNumber++) {
    $isAvailable = getAvailableSlotsForTable($pdo, $tableNumber);

    $statusText = $isAvailable
        ? "<span class='status available'>Available for reservation.</span>"
        : "<span class='status booked'>Table booked.</span>";

    $tableStatuses[$tableNumber] = [
        'status' => $statusText,
        'available' => $isAvailable
    ];
}
