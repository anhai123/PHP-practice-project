<?php
    class E_user {
        protected $id;
        protected $firstName;
        protected $lastName;
        protected $email;
        protected $phoneNumber;
        protected $role;

        function __construct($id,$firstName, $lastName, $email, $phoneNumber,  $role) {
            $this->id = $id;
            $this->firstName = $firstName;
            $this->lastName = $lastName;
            $this->email = $email;
            $this->phoneNumber = $phoneNumber;
            $this->role = $role;
        }
        public function getId() {
            return $this->id;
        }

        public function getFirstName() {
            return $this->firstName;
        }
        public function getLastName() {
            return $this->lastName;
        }
        public function getEmail() {
            return $this->email;
        }
        public function getPhoneNumber() {
            return $this->phoneNumber;
        }
        public function getRole() {
            return $this->role;
        }
        public function setId($id) {
            $this->id = $id;
        }

        public function setfirstName($firstName) {
            $this->firstName = $firstName;
        }

        public function setlastName($lastName) {
            $this->lastName = $lastName;
        }

        public function setemail($email) {
            $this->email = $email;
        }

        public function setphoneNumber($phoneNumber) {
            $this->phoneNumber = $phoneNumber;
        }
        public function setrole($role) {
            $this->role = $role;
        }
    }
