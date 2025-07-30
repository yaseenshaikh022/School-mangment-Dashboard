<!DOCTYPE html>
<html>
<head>
  <title>Login</title>
  <link rel="stylesheet" href="../assets/css/style.css">
  <style>
    body {
      background: #f0f2f5;
      font-family: Arial, sans-serif;
    }
    .login-container {
      width: 360px;
      margin: 100px auto;
      background: #fff;
      padding: 30px;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }
    h2 {
      text-align: center;
      margin-bottom: 20px;
    }
    input[type="text"], input[type="password"] {
      width: 100%;
      padding: 10px;
      margin: 10px 0;
      border-radius: 5px;
      border: 1px solid #ccc;
    }
    button {
      width: 100%;
      padding: 10px;
      background: #4CAF50;
      color: white;
      border: none;
      border-radius: 5px;
      font-size: 16px;
    }
    button:hover {
      background: #45a049;
    }
  </style>
</head>
<body>
  <div class="login-container">
    <h2>Admin Login</h2>
    <form method="POST" action="login_process.php">
      <input type="text" name="username" placeholder="Username" required>
      <input type="password" name="password" placeholder="Password" required>
      <button type="submit">Login</button>
    </form>
  </div>
</body>
</html>
