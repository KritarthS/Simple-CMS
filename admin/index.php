<!DOCTYPE html>
<html>
<head>
  <title>Login</title>
  <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700" rel="stylesheet">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous"> 
  <link rel="stylesheet" href="css/style.css">
</head>
<body class="fill col-12 col-s-12">

<div class="wrapper col-12 col-s-12"> <!-- login page -->
  
  <div class="logo col-6 col-s-6">
  <i class="fab fa-pied-piper"></i>
    <h1>Simple CMS</h1>
  </div>
  
  <div class="halfpane col-6 col-s-6">
    
  </div>

  <article class="logFrm col-10 col-s-10"> <!-- login form -->
    <div class="frmBlock">
      <h1>Login to Simple CMS</h1>
      <p>A simple content management system made for optimized user functionality.</p>
      
      <form method="post" action="actions/processLogin.php">
      <input type="text" placeholder="Email Address" name="strEmail"/>
      <input type="password" placeholder="Password" name="strPassword"/>
      <input type="submit" value="Login">
      </form>
   </div>
  </article>

</div>

</body>
</html>