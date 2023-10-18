<?php 

    abstract class Account {
        protected $accountId, $balance, $startDate;
        
        public function __construct($id, $bal, $date) {
            $this->accountId = $id;
            $this->balance = $bal;
            $this->startDate = $date;
        }

        public function deposit($amount) {
            $this->balance += $amount;
        }

        abstract public function withdraw($amount);

        public function getAccountId() {
            return $this->accountId;
        }

        public function getBalance() {
            return $this->balance;
        }

        public function getStartDate() {
            return $this->startDate;
        }

        protected function getAccountDetails() {
            $accountDetails = "<li><strong>Account ID: </strong> $this->accountId</li>";
            $accountDetails .= "<li><strong>Balance: </strong> $this->balance</li>";
            $accountDetails .= "<li><strong>Account Opened: </strong> $this->startDate</li>"";
        
            return $accountDetails
        }
    }
?>