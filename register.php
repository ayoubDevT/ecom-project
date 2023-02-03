<link href="style.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<head><title>Register</title></head>

<div class="wrapper fadeInDown">
  <div id="formContent">
    <!-- Tabs Titles -->

    <!-- Icon -->
    <div class="fadeIn first">
    <a class="navbar-brand" href="index.php" style="margin: 30px;"><img src="assets/images/header-logo.png" alt=""></a>
    </div>

    <!-- Login Form -->
    <form action="registerData.php" method="POST">
      <input type="text" require id="email" class="fadeIn second" name="email" placeholder="email">
      <input type="text" require id="username" class="fadeIn second" name="username" placeholder="user name">
      <input type="text" require id="password" class="fadeIn third" name="password" placeholder="password">
      <input type="text" require id="conferm" class="fadeIn third" name="conferm" placeholder="password confermation">
      <input type="submit" class="fadeIn fourth" value="Log In">
    </form>

    <!-- Remind Passowrd -->
    <div id="formFooter">
      <a class="underlineHover" href="login.php">Already have an account?</a>
    </div>

  </div>
</div>