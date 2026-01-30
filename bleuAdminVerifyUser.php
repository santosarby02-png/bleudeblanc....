<?php
session_start();

include "bleuConnection.php";

if(isset($_POST['bleuLogIn'])) {
    $bleuuname = trim($_POST['uname']);
    $bleupass = trim($_POST['pass']);

    // SQL query for login
    $bleuverifysql = "SELECT * FROM bleuregistration WHERE uname = ?";
    $stmt = mysqli_prepare($bleuConn, $bleuverifysql);
    mysqli_stmt_bind_param($stmt, "s", $bleuuname);
    mysqli_stmt_execute($stmt);
    $bleuverify = mysqli_stmt_get_result($stmt);

    if(mysqli_num_rows($bleuverify) === 1) {
        $bleuuser = mysqli_fetch_assoc($bleuverify);

        $bleuvpass = $bleuuser['pass'];
        $bleuusername = $bleuuser['uname'];
        $bleutype = $bleuuser['bleu_Type'];
        $bleustatus = $bleuuser['bleu_Status'];
        $bleufname = $bleuuser['fname'];

        if($bleupass === $bleuvpass) { // For production, use password_verify()
            switch($bleutype) {
                case '0': // Client
                    if($bleustatus === '1'){
                        $_SESSION['bleuusername'] = $bleuusername;
                        echo "<script>
                            alert('Successful Log in. Welcome, Client {$bleufname}.');
                            window.location.href = 'bleuMainPage.php';
                        </script>";
                    } else {
                        header("Location: bleuLogin.php?message=Your account is still not approved by the admin.");
                        exit(); 
                    }
                    break;

                case '1': // Admin
                    $_SESSION['bleuusername'] = $bleuusername;
                    echo "<script>
                        alert('Successful Log in. Welcome, Admin {$bleufname}.');
                        window.location.href = 'bleuAdminMainPage.php';
                    </script>";
                    break;

                default: // Guest or others
                    header("Location: bleuGuestProduct.php");
                    exit();
            }
            exit();

        } else {
            header("Location: bleuLogin.php?message=Incorrect Password");
            exit();
        }
    } else {
        header("Location: bleuLogin.php?message=User does not exist");
        exit();
    }
}
?>
