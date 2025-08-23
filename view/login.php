<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/main.css">
</head>
<body>
   <form action="Controller/Login.php" method="post">
    <div class="form-group">
        <label for="">Name</label>
        <input type="text" name="name" placeholder="Enter you Name"/>
    </div>
     <div class="form-group">
        <label for="">Email</label>
        <input type="text" name="name" placeholder="Enter you Name"/>
    </div>
     <div class="form-group">
        <label for="">Password</label>
        <input type="text" name="name" placeholder="Enter you Name"/>
    </div>

    <a href="Controller/Signup.php">Sign up?</a>

  
    <div class="form-group">
         <button type="submit">Login</button>
    </div>
  
   </form>
</body>
</html>