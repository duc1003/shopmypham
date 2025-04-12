<?php 

    class Connect {
        public function connect(){
            return mysqli_connect('localhost:3307','root','','shopmypham');
        }
        public function closeConnect($conn){
            $conn->close();
        }
    }



?>