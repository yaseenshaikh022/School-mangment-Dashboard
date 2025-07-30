<!DOCTYPE html>
<html>
<head>
  <title>Register</title>
  <link rel="stylesheet" href="../assets/css/style.css">
  <style>
    body {
      background: #f0f2f5;
      font-family: Arial, sans-serif;
    }
    .register-container {
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
      background: #007bff;
      color: white;
      border: none;
      border-radius: 5px;
      font-size: 16px;
    }
    button:hover {
      background: #0056b3;
    }
    .login-link {
      text-align: center;
      margin-top: 15px;
      display: block;
      font-size: 14px;
    }
    .login-link a {
      color: #007bff;
      text-decoration: none;
    }
    .login-link a:hover {
      text-decoration: underline;
    }
  </style>
</head>
<body>
  <div class="register-container">
    <h2>Create Account</h2>
    <form method="POST" action="register_process.php">
      <input type="text" name="fullname" placeholder="Full Name" required>
      <input type="text" name="username" placeholder="Username" required>
      <input type="password" name="password" placeholder="Password" required>
      <button type="submit">Register</button>
    </form>
    <div class="login-link">
      Already have an account? <a href="login.php">Click here to login</a>
    </div>
  </div>
</body>
</html>
