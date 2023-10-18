<?php 
    include __DIR__ . '/../include/header.php';
    include ('backend.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="styles.css">

    <title>ATM Interface | Tristan Knott</title>

</head>
<body>
    <h1>ATM Interface</h1>
    <form name="ATM_Interface" method="POST" action="">
        <div class="wrapper">
            <div class="account">
                <ul><?= $checking->getAccountDetails(); ?></ul>

                <input type="hidden" name="checkingId" value="<?= $checking->getAccountId(); ?>"/>
                <input type="hidden" name="checkingBalance" value="<?= $checking->getBalance(); ?>"/>
                <input type="hidden" name="checkingDate" value="<?= $checking->getStartDate(); ?>"/>

                <div class="transactionps">
                    <input type="text" name="checkingWithdrawAmount" value="">
                    <input class="button" type="submit" name="btnCheckingWithdraw" value="Withdraw">
                </div>

                <div class="transactions">
                    <input type="text" name="checkingDepositAmount" value="">
                    <input class="button" type="submit" name="btnCheckingDeposit" value="Deposit">
                </div>
            </div>
            <div class="account">
                <ul><?= $savings->getAccountDetails(); ?></ul>

                <input type="hidden" name="savingsId" value="<?= $savings->getAccountId(); ?>"/>
                <input type="hidden" name="savingsBalance" value="<?= $savings->getBalance(); ?>"/>
                <input type="hidden" name="savingsDate" value="<?= $savings->getStartDate(); ?>"/>

                <div class="transactions">
                    <input type="text" name="savingsWithdrawAmount" value="">
                    <input class="button" type="submit" name="btnSavingsWithdraw" value="Withdraw">
                </div>

                <div class="transactions">
                    <input type="text" name="savingsDepositAmount" value="">
                    <input class="button" type="submit" name="btnSavingsDeposit" value="Deposit">
                </div>
            </div>
        </div>
    </form>

    <?php include __DIR__ . '/../include/footer.php'; ?>

</body>
</html>

