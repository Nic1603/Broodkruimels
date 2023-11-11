<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bakery Login</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <link rel="stylesheet" href="login.css">
</head>
<body>

<div class="login-container">
  <div class="bakery-img">
    <img src="images/bakkery-login-image.jpg" alt="Bakery Logo">
  </div>
  <h2>Bakery Login</h2>
  <form action="login_process.php" method="post">
    <div class="input-group">
      <i class="fas fa-envelope"></i>
      <label for="email">Email:</label>
      <input type="text" id="email" name="email" required>
    </div>

    <div class="input-group">
      <i class="fas fa-lock"></i>
      <label for="password">Password:</label>
      <input type="password" id="password" name="password" required>
    </div>

    <p>Nog geen account aangemaakt?</p>
    <a href="register.php" class="btn">Klik hier</a>
    
    <button type="submit">Login</button>

    <a href="index.html" class="btn">Home</a>
  </form>
</div>

</body>
</html>
