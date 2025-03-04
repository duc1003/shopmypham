<?php
    class clsketnoi{
        public function moketnoi(){
            return mysqli_connect('localhost','root','','shopmypham');
        }
        public function dongketnoi($conn){
            $conn->close();
        }
    }
?>