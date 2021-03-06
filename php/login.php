

<head>

    <title>Soft Skills Academy Sarajevo '17</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap-theme.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="css/login.css">
        <link rel="shortcut icon" type="image/jpg" href="img/favicon.png"/>


</head>

<html>
<body>

  

<section id="login">
    <div class="container">
    	<div class="row">
    	    <div class="col-xs-12 col-xs-offset-0 col-md-4 col-md-offset-4">
        	    <div >
                <h1>Log in</h1>
                    <form role="form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" id="login-form" autocomplete="off">
                        <div class="form-group">
                            <label for="email" class="sr-only">Email</label>
                            <input type="text" name="username" id="email" class="form-control" placeholder="Username" value="<?php if(isset($user)) echo $user;?>">
                        </div>
                        <div class="form-group">
                            <label for="key" class="sr-only">Password</label>
                            <input type="password" name="password" id="key" class="form-control" placeholder="Password" value="<?php if(isset($pass)) echo $pass;?>">
                        </div>
                        
                        <input type="submit" id="btn-login" class="btn btn-custom btn-lg btn-block" value="Log in" name="loginSubmit">
                    </form>
                    <p class="errorMessage"><?php if(isset($errMessage)) echo $errMessage; ?></p>
                    <hr>
        	    </div>
    		</div> <!-- /.col-xs-12 -->
    	</div> <!-- /.row -->
    </div> <!-- /.container -->
</section>





</body>
</html>