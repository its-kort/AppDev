<head>
    <link rel="stylesheet" href="./css/reservation.css">
    
</head>

<?php require_once 'reservation/tablestatus.inc.php'; ?>
<div class="reservation-container">
    <div class="heading">Reservations</div>
    <p>An active list of reserved tables.</p>
    <div class="tables-container">
        <div class="table">
            <img class="table-img" src="../assets/images/table.png" alt="table">
            <div class="table-details">
                <div class="heading">Table 1</div>

                <div class="details"><?php echo $tableStatuses[1]['status']; ?></div>
                
                <form action="pages/booking.php" method="post">
                <input type="hidden" name="table" value="1">
                <button type="submit"
                class="view-more-btn"
                <?= !$tableStatuses[1]['available'] ? 'style="pointer-events:none; opacity:0.5;" disabled' : '' ?>>
                Book Now
                </button>
                </form>

            </div>
        </div>

        <div class="table">
            <img class="table-img" src="../assets/images/table.png" alt="table">
            <div class="table-details">
                <div class="heading">Table 2</div>

                <div class="details"><?php echo $tableStatuses[2]['status']; ?></div>
                
                <form action="pages/booking.php" method="post">
                <input type="hidden" name="table" value="2">
                <button type="submit"
                class="view-more-btn"
                <?= !$tableStatuses[2]['available'] ? 'style="pointer-events:none; opacity:0.5;" disabled' : '' ?>>
                Book Now
                </button>
                </form>

            </div>
        </div>

        <div class="table">
            <img class="table-img" src="../assets/images/table.png" alt="table">
            <div class="table-details">
                <div class="heading">Table 3</div>
                
                <div class="details"><?php echo $tableStatuses[3]['status']; ?></div>
                
                <form action="pages/booking.php" method="post">
                <input type="hidden" name="table" value="3">
                <button type="submit"
                class="view-more-btn"
                <?= !$tableStatuses[3]['available'] ? 'style="pointer-events:none; opacity:0.5;" disabled' : '' ?>>
                Book Now
                </button>
                </form>
                
            </div>
        </div>

        <div class="table">
            <img class="table-img" src="../assets/images/table.png" alt="table">
            <div class="table-details">
                <div class="heading">Table 4</div>
                
                <div class="details"><?php echo $tableStatuses[4]['status']; ?></div>
                
                <form action="pages/booking.php" method="post">
                <input type="hidden" name="table" value="4">
                <button type="submit"
                class="view-more-btn"
                <?= !$tableStatuses[4]['available'] ? 'style="pointer-events:none; opacity:0.5;" disabled' : '' ?>>
                Book Now
                </button>
                </form>
                
            </div>
        </div>

        <div class="table">
            <img class="table-img" src="../assets/images/table.png" alt="table">
            <div class="table-details">
                <div class="heading">Table 5</div>
                
                <div class="details"><?php echo $tableStatuses[5]['status']; ?></div>

                <form action="pages/booking.php" method="post">
                <input type="hidden" name="table" value="5">
                <button type="submit"
                class="view-more-btn"
                <?= !$tableStatuses[5]['available'] ? 'style="pointer-events:none; opacity:0.5;" disabled' : '' ?>>
                Book Now
                </button>
                </form>
                
            </div>
        </div>

        <div class="table">
            <img class="table-img" src="../assets/images/table.png" alt="table">
            <div class="table-details">
                <div class="heading">Table 6</div>
                
                <div class="details"><?php echo $tableStatuses[6]['status']; ?></div>
                
                <form action="pages/booking.php" method="post">
                <input type="hidden" name="table" value="6">
                <button type="submit"
                class="view-more-btn"
                <?= !$tableStatuses[6]['available'] ? 'style="pointer-events:none; opacity:0.5;" disabled' : '' ?>>
                Book Now
                </button>
                </form>
                
            </div>
        </div>
    </div>
</div>