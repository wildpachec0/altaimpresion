<?php 
  session_start();

  session_unset();

  session_destroy();

?>
<!DOCTYPE html>
<html lang="es">
<head>
  <title>Alta Impresión C.A</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://unpkg.com/tailwindcss@2.2.19/dist/tailwind.min.css">
  <!-- CSS -->
  <link rel="stylesheet" type="text/css" href="../css/normalize.css">
  <!-- BOOTSTRAP -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>
<body class="h-screen overflow-hidden flex items-center justify-center" style="background-color: #f9fafb">
<div class="w-full min-h-screen bg-gray-50 flex flex-col sm:justify-center items-center pt-6 sm:pt-0">
  <div class="w-full sm:max-w-md p-5 mx-auto">
  <!-- Modal -->
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
        <img src="../icons/navlogo.png" alt="Logo" width="30" height="30" class="d-inline-block align-text-top">
          <h5 class="modal-title font-extrabold" id="exampleModalLongTitle" style="color: #e77928">Alta Impresión C.A</h5>
        </div>
        <div class="modal-body">
          <p class="text-center text-1xl font-extrabold" style="color: #212529">Tu sesión finalizó exitosamente</p>
        </div>
        <div class="modal-footer">
          <input type="button" value="Aceptar" class="btn btn-primary w-full inline-flex items-center justify-center" onclick="location='../index.php'"/>
        </div>
      </div>
    </div>
  </div>
  </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
</body>
</html>