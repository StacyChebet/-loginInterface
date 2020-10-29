<?php 
    require_once("account.php");
    session_start();

    class User implements Account{
        private $name, $eAddress, $city, $username, $pass, $avi, $enteredPassword, $updatedPassword;

        public function __construct(){
            $this->name = "";
            $this->eAddress = "";
            $this->city = "";
            $this->username = "";
            $this->pass = "";
            $this->avi = "";
        }

        public function setName($name)
        {
            return $this->name = $name;
        }
        public function getName()
        {
            return $this->name;
        }

        public function setEAddress($eAddress)
        {
            return $this->eAddress = $eAddress;
        }
        public function getEAddress()
        {
            return $this->eAddress;
        }

        public function setCity($city)
        {
            return $this->city = $city;
        }
        public function getCity()
        {
            return $this->city;
        }
        public function setUsername($username)
        {
            return $this->username = $username;
        }
        public function getUsername()
        {
            return $this->username;
        }

        public function setPass($pass)
        {
            return $this->pass = $pass;
        }
        public function getPass()
        {
            return $this->pass;
        }

        public function setAvi($avi)
        {
            return $this->avi = $avi;
        }
        public function getAvi()
        {
            return $this->avi;
        }

        public function setEnteredPassword($enteredPassword)
        {
            return $this->enteredPassword = $enteredPassword;
        }
        public function getEnteredPassword()
        {
            return $this->enteredPassword;
        }

        public function setUpdatedPassword($updatedPassword)
        {
            return $this->updatedPassword = $updatedPassword;
        }
        public function getUpdatedPassword()
        {
            return $this->updatedPassword;
        }

        public function register($pdo){
            $file_path = "images/profiles";
            $file_name = $this->avi['name'];
            $file_tmp_location = $this->avi['tmp_name'];

            move_uploaded_file($file_tmp_location, $file_path.$file_name);

            try{
                $stmt = $pdo->prepare("INSERT INTO `userdetails`(`name`, `email`, `city`, `username`, `password`, `avi`) VALUES (?,?,?,?,?,?)");
                $stmt->execute([$this->name, $this->eAddress, $this->city, $this->username, $this->pass, $this->avi]);
                $stmt = null;
                return "New user created!";
            }catch (PDOException $e){
                return $e->getMessage();
            }
        }

        public function login($pdo){
            try{
                $stmt = $pdo->prepare("SELECT * FROM userdetails WHERE email = ?");
                $stmt->execute([$this->eAddress]);
                $result = $stmt->fetch();
                $stmt = null;
                $this->pass = $result['password'];

                if(password_verify($this->enteredPassword, $this->pass)){
                    $stmt = $pdo->prepare("SELECT * FROM userdetails WHERE email = ? AND password = ?");
                    $stmt->execute([$this->eAddress, $this->pass]);
                    $result = $stmt->fetch(); 
                    $stmt = null;
                    return $result;
                }else{
                    $message = "Login Successful!";
                    echo "<script type='text/javascript'>alert('$message');</script>";
                }
            }catch (PDOException $e){
                return $e->getMessage();
            }
            
        }

        public function changePassword($pdo){
            try{
                $stmt = $pdo->prepare("SELECT * FROM userdetails WHERE email = ?");
                $stmt->execute([$_SESSION['eAddress']]);
                $result = $stmt->fetch();
                $this->pass = $result['password'];
                if(password_verify($this->enteredPassword, $this->pass)){
                    $stmt = $pdo->prepare("UPDATE `userdetails` SET `password`=? WHERE `username`=?");
                    $stmt->execute([$this->updatedPassword, $_SESSION['username']]);
                    $result = $stmt->fetch();
                    $stmt = null;

                    $message = "Password has been updated successfully!";
                    echo "<script type='text/javascript'>alert('$message');</script>";
                }
            }catch (PDOException $e){
                return $e->getMessage();
            }
        }

        public function logout($pdo){
            session_destroy();
        }

        public function __destruct(){}

    }
?>