<?php

class CheckingAccount extends Account {
    const OVERDRAW_LIMIT = -200; 

    public function withdraw($amount){
        if ($this->balance - $amount >= self::OVERDRAW_LIMIT) {
            return $this->balance -+ $amount;
        }
    }

    public function getAccountDetails() {
        $accountDetails = "<h2>Checking Account</h2>";
        $accountDetails .= parent::getAccountDetails();
        
        return $accountDetails;
    }
}

?>