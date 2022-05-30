<?php
    $conn = mysqli_connect('localhost', 'root', '', 'Assignment');
    if(isset($_POST['first_name'])){
        $firstName = mysqli_real_escape_string($conn, $_POST['first_name']);
        $lastName = mysqli_real_escape_string($conn, $_POST['last_name']);
        $emaiL = mysqli_real_escape_string($conn, $_POST['email']);
        $commenT = mysqli_real_escape_string($conn, $_POST['comment']);

        $query = "INSERT INTO user_information(first_name, last_name, email, comment) VALUES('$firstName','$lastName', '$emaiL', '$commenT')";
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <title>Your comment</title>
    <style>
        body {
            background-color: #2b2b2b;
            color: white;
            font-family: 'Cairo', sans-serif;
            word-spacing: 2px;
            line-height: 1.8;
        }
        h1 {
            text-align: center;
            font-size: 50px;
        }
    </style>
</head>
    <body>
            <div>
                <h1>
                    <?php 
                        if(mysqli_query($conn, $query)){
                            echo 'User Added...';
                        } else {
                            echo 'ERROR: '. mysqli_error($conn);
                        }
                    ?>
                </h1>
            </div>
    </body>
</html>