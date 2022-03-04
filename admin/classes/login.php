<?php
class login {

    private $connection;
    public $username;
    public $password;

    public function __construct() {
        $db               = new database();
        $this->connection = $db->connection;

    }
    public function logindata( $username, $password ) {

        $select = mysqli_query( $this->connection, "SELECT * FROM users WHERE username='$username' AND password = '$password' AND role_id = 1" );
        $rows   = mysqli_num_rows( $select );
        if ( $rows === 1 ) {
            return true;
        } else {
            return false;
        }

    }

    public function islogin() {
        if ( !isset( $_SESSION['username'] ) && isset( $_SESSION['username'] ) == '' ) {
            return false;
        } else {
            return true;
        }
    }

    public function logout() {
        if ( isset( $_SESSION['username'] ) && $_SESSION['username'] !== '' ) {
            unset( $_SESSION['username'] );
            header( 'location:login.php' );
            exit();
        } else if ( isset( $_SESSION['is_login'] ) && $_SESSION['is_login'] !== '' ) {
            unset( $_SESSION['is_login'] );
            header( 'location:index.php' );

            exit();
        }

    }

    

}

?>