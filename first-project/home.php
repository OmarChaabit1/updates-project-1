<?php

//start use session 
    $error_message = '';
    session_start();
    if(isset($_SESSION['user'])){
        //maghatmchich l home,php , cs u re already login 
        header('Location: dashboard.php');
    }

    

    if($_POST){

        include('database/cnx.php');

        $email = $_POST['email']; 
        $password = $_POST['password'];

        $query = 'SELECT * FROM  users  WHERE users.email ="'. $email .'" AND users.password="'. $password .'"';
        $stmt = $cnx->prepare($query);
        $stmt->execute();

    

        if($stmt->rowCount() > 0){
            //ansiftoh l dashboard page == correct
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $user = $stmt->fetchAll()[0]; 

            // captures date of currently login users .
            $_SESSION['user'] = $user ;

            header('Location: dashboard.php');
             
        }else {
            $error_message = " Please make sure that username and password are correct.";
        }
        
    }

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>POS System</title>
    <link rel="stylesheet" href="css/first-project.css?v=<?= time();?>">
</head>
<body>
<?php  if(!empty($error_message)) { ?>
    <div id="error">
        <p><strong>Error :</strong></p><?= $error_message ?> </p>
    </div>
<?php } ?>


    

            <div class="login-form-container">

                <div id="close-login-btn" class="fas fa-times">

                </div>

                <form action="home.php" method="POST">
                    
                    <h3>Sign in </h3>
                    
                    <span>Email</span>
                    <input type="email" name="email" class="box" placeholder="entrer your email " id="">

                    <span>password</span>
                    <input type="password" name="password" class="box" placeholder="entrer your password " id="">
                    <p>forget password? <a href="#">click here</a></p>

                    <div class="checkbox"> 
                        <input type="checkbox" name="" id="remember-me">
                        <label for="remember-me">remember me</label>
                    </div>

                    <input type="submit" value="sign in" class="btn">
                   <div class="users">
                   <input type="submit" value="admin" id="btn1" class="btn">
                    <input type="submit" value="sales"id="btn2" class="btn">
                   </div>
                </form>
                
            </div>





<script src="js/first-project.js?v=<?= time();?>"></script>
</body>
</html>