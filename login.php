<?php 
session_start();

require 'conn/conn_db.php';

if(!empty($_POST['username']) && !empty($_POST['password'])) {
  $sentence=$pdo->prepare('SELECT id, username, password FROM users WHERE username=:username');
  $sentence->bindParam(':username', $_POST['username']);
  $sentence->execute();
  $result = $sentence->fetch(PDO::FETCH_ASSOC);

  $message = '';

  if($result ? count($result) : 0 && password_verify($_POST['password'], $result['password'])) {
    $_SESSION['user_id'] = $result['id'];
    header('Location: products/index.php');
  }else{
    $message = 'Los datos introducidos son incorrectos';
  }
}

?>
<!DOCTYPE html>
<html lang="es">
<head>
  <title>Iniciar Sesión - Alta Impresión C.A</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://unpkg.com/tailwindcss@2.2.19/dist/tailwind.min.css">
</head>

<body class="h-screen overflow-hidden flex items-center justify-center" style="background-color: #f9fafb">
  <div class="w-full min-h-screen bg-gray-50 flex flex-col sm:justify-center items-center pt-6 sm:pt-0">
  <div class="w-full sm:max-w-md p-5 mx-auto">
    <h2 class="mb-12 text-center text-5xl font-extrabold" style="color: #212529">BIENVENIDO A SU SISTEMA</h2>
    <?php if (!empty($message)) : ?>
      <p style='color:#dc2626'><?= $message ?></p>
    <?php endif;?>

    <form  action="login.php" method="POST">
    
    <div class="mb-4">
        <label class="block mb-1">Usuario</label>
        <input type="text" name="username" class="py-2 px-3 border border-gray-300 focus:border-red-300 focus:outline-none focus:ring focus:ring-red-200 focus:ring-opacity-50 rounded-md shadow-sm disabled:bg-gray-100 mt-1 block w-full" required/>
      </div>
      <div class="mb-4">
        <label class="block mb-1">Contraseña</label>
        <input type="password" name="password" class="py-2 px-3 border border-gray-300 focus:border-red-300 focus:outline-none focus:ring focus:ring-red-200 focus:ring-opacity-50 rounded-md shadow-sm disabled:bg-gray-100 mt-1 block w-full" />
      </div>
      <div class="mt-6">
        <input type="submit" value="Enviar" name="cnx" class="w-full inline-flex items-center justify-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold capitalize text-white hover:bg-red-700 active:bg-red-700 focus:outline-none focus:border-red-700 focus:ring focus:ring-red-200 disabled:opacity-25 transition" style="cursor: pointer">
      </div>

    </form>
    </div>
  </div>
</body>
</html>