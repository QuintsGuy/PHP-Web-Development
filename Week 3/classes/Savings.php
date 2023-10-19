<?php 

class SavingsAccount extends Account {
    
    public function withdraw($amount){
        if ($this->balance - $amount >= 0) {
            return $this->balance -= $amount;
        }
    }

    public function getAccountDetails() {
        $accountDetails = "<h2>Savings Account</h2>";
        $accountDetails .= parent::getAccountDetails();
        
        return $accountDetails;
    }
}

?>