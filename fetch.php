<?php

require_once 'connect.php';

// $time= date('Y-m-d H:i:s');
// $update= "update user_status set last_seen='$time' where user='$userID'";
// $conn->query($update);
// Check connection


if (isset($_GET['getMsg'])) {
        $getSQL = "select * from public_chat";
        header('Content-Type: text/xml');
        echo '<?xml version="1.0" encoding="UTF-8" standalone="yes" ?>';
            
        echo '<messages>';
        
        $result = $conn->query($getSQL);

        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                echo '<chat>';
                echo "<user>" . $row["fromName"]. "</user>";
                echo "<message>" . $row["messages"]. "</message>";
                echo '</chat>';
            }
        } 
        else {
            echo "0 results";
        }
   
        echo '</messages>';

        session_start();
        $userID= $_SESSION['id'];
        $time= date('Y-m-d H:i:s');
        $update= "update user_status set last_seen='$time' where user='$userID'";
        $conn->query($update);
}

elseif (isset($_POST['saveMsg'])) {
    session_start();
    $msg = $_POST['saveMsg'];
    $user = $_SESSION['id'];

    $get= "select name from users where emp_id='$user'";


    $result = $conn->query($get);

        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                $name=$row['name'];
            }
        } 

    $saveSQL = "insert into public_chat (fromid,fromName,messages) values ('$user','$name','$msg')";
    $conn->query($saveSQL);
    $conn->close();
}

elseif (isset($_GET['empID'])) {
    $empID= $_GET['empID'];
    $name= $_GET['name'];
    $mobile= $_GET['mobile'];
    $email= $_GET['email'];
    $pass= $_GET['pass'];
    $findID= "select * from users where emp_id='$empID'";
    $findMobile= "select * from users where mobile='$mobile'";
    $findEmail= "select * from users where email='$email'";
    
    $result = $conn->query($findID);
    if ($result->num_rows > 0) {
        echo 'noID';
        $conn->close();
        exit();
    }

    $result = $conn->query($findMobile);
    if ($result->num_rows > 0) {
        echo 'noMob';
        $conn->close();
        exit();
    }

    $result = $conn->query($findEmail);
    if ($result->num_rows > 0) {
        echo 'noEmail';
        $conn->close();
        exit();
    }

        $saveSQL = "insert into users (emp_id, name, mobile, email, pass) 
        values ('$empID', '$name', '$mobile', '$email', '$pass')";
        $saveStatus = "insert into user_status(user) values ('$empID')";

        $conn->query($saveSQL);
        $conn->query($saveStatus);
        echo 'yes';
        $conn->close();
        exit();
}


elseif (isset($_GET['userID'])) {
    $userID= $_GET['userID'];
    $userPass= $_GET['userPass'];
    $time= date('Y-m-d H:i:s');
    $validate= "select * from users where emp_id='$userID' and pass='$userPass'";
    $update= "update user_status set last_seen='$time' where user='$userID'";
    
    $result = $conn->query($validate);
    if ($result->num_rows > 0) {
        session_start();
        $_SESSION['id']=$userID;
        $conn->query($update);
        echo 'success';
    }
    else{
        echo 'invalid';
    }
    $conn->close();
}

elseif (isset($_GET['logout'])) {
    session_start();
    session_unset();
    session_destroy();
}

elseif (isset($_GET['checkStatus'])) {
    $getSQL = "select * from user_status";
    header('Content-Type: text/xml');
    echo '<?xml version="1.0" encoding="UTF-8" standalone="yes" ?>';
        
    echo '<users>';
    
    $result = $conn->query($getSQL);
    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            // var_dump($row);
            $user= $row['user'];
            $systemTime = strtotime(date('Y-m-d H:i:s'))-5;
            $userTime = strtotime($row['last_seen']);
            if ($systemTime < $userTime) {
                $ouSQL = "select * from users where emp_id='$user'";
                $result1 = $conn->query($ouSQL);
                if ($result1->num_rows > 0) {
                // output data of each row
                while ($row1 = $result1->fetch_assoc()) {
                    echo "<user>" . $row1['name']. "</user>";
                }
            }
            }
        }
    } 
    else {
        echo "0 results";
    }

    echo '</users>';
}

elseif (isset($_GET['name'])) {
    session_start();
    $id= $_SESSION['id'];
    $name= $_GET['name'];
    $mobile= $_GET['mobile'];
    $email= $_GET['email'];
    $pass= $_GET['password'];
    $sql= "update users set 
            name='$name', mobile='$mobile', email='$email', pass='$pass' where emp_id='$id'";

    if ($conn->query($sql) === true) {
        echo "ok";
    } else {
        echo "no";
    }
}

?>