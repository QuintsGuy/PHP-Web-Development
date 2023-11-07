<?php 

    abstract class User {
        protected $userId, $userName, $passWord, $firstName, $lastName, $regDate, $birthDate, $userType;
        
        public function __construct($id, $user, $pass, $first, $last, $reg, $birth, $type) {
            $this->userId = $id;
            $this->userName = $user;
            $this->passWord = $pass;
            $this->firstName = $first;
            $this->lastName = $last;
            $this->regDate = $reg;
            $this->birthDate = $birth;
            $this->userType = $type;
        }

        public function deposit($amount) {
            return $this->balance += $amount;
        }

        abstract public function withdraw($amount);

        public function getUserId() {
            return $this->userId;
        }

        public function getUsername() {
            return $this->userName;
        }

        public function getPassword() {
            return $this->passWord;
        }

        public function getFirstName() {
            return $this->firstName;
        }

        public function getLastName() {
            return $this->lastName;
        }

        public function getBirthDate() {
            return $this->birthDate;
        }

        public function getRegDate() {
            return $this->regDate;
        }

        public function getUserType() {
            return $this->userType;
        }

        protected function getAccountDetails() {
            $accountDetails = "<li><strong>User ID: </strong> $this->userId</li>";
            $accountDetails .= "<li><strong>Username: </strong> $this->userName</li>";
            $accountDetails .= "<li><strong>First Name: </strong> $this->firstName</li>";
            $accountDetails .= "<li><strong>Last Name: </strong> $this->lastName</li>";
            $accountDetails .= "<li><strong>Date of Birth: </strong> $this->birthDate</li>";
            $accountDetails .= "<li><strong>Registration Date: </strong> $this->regDate</li>";
            $accountDetails .= "<li><strong>User Status: </strong> $this->userType</li>";
        
            return $accountDetails;
        }
    }
?>