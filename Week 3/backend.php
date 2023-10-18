<?php 

    include __DIR__ . '/../include/functions.php';

    include ('classes/Account.php');
    include ('classes/Checking.php');
    include ('classes/Savings.php');

    if (isset($_POST['checkingId'])) {
        $checkingId         = filter_input(INPUT_POST, 'checkingId');
        $checkingBalance    = filter_input(INPUT_POST, 'checkingBalance');
        $checkingDate       = filter_input(INPUT_POST, 'checkingDate');
        $savingsId          = filter_input(INPUT_POST, 'savingsId');
        $savingsBalance     = filter_input(INPUT_POST, 'savingsBalance');
        $savingsDate        = filter_input(INPUT_POST, 'savingsDate');
    } else {
        $checkingId         = "C384756";
        $checkingBalance    = 2500;
        $checkingDate       = "2021-09-25";
        $savingsId          = "S4251632";
        $savingsBalance     = 20000;
        $savingsDate        = "2021-09-25";
    }

    $checking = new CheckingAccount ($checkingId, $checkingBalance, $checkingDate);
    $savings = new SavingsAccount ($savingsId, $savingsBalance, $savingsDate);

    if (isset($_POST['btnCheckingWithdraw'])) {
        $checkingWithdraw = filter_input(INPUT_POST, 'checkingWithdrawAmount', FILTER_VALIDATE_INT);
        $checking->withdraw($checkingWithdraw);
    } else if (isset($_POST['btnCheckingDeposit'])) {
        $checkingDeposit = filter_input(INPUT_POST, 'checkingDepositAmount', FILTER_VALIDATE_INT);
        $checking->deposit($checkingDeposit);
    } else if (isset($_POST['btnSavingsWithdraw'])) {
        $savingsWithdraw = filter_input(INPUT_POST, 'savingsWithdrawAmount', FILTER_VALIDATE_INT);
        $savings->withdraw($savingsWithdraw);
    } else if (isset($_POST['btnSavingsDeposit'])) {
        $savingsDeposit = filter_input(INPUT_POST, 'savingsDepositAmount', FILTER_VALIDATE_INT);
        $savings->deposit($savingsDeposit);
    }

?>