<?php 

class SavingsAccount extends Account {
    
    public function withdraw($amount){
        if ($this->balance - $amount >= 0) {
            $this->balance -+ $amount;
            return true;
        }
        return false;
    }

    public function getAccountDetails() {
        $accountDetails = "<h2>Savings Account</h2>";
        $accountDetails .= parent::getAccountDetails();
        
        return $accountDetails;
    }
}

?>