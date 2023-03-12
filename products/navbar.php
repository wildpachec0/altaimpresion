<nav class="navbar navbar-expand-lg navbar-dark fixed-top" style="background-color: #212529;">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">
    <img src="../icons/navlogo.png" alt="Logo" width="30" height="30" class="d-inline-block align-text-top">
    Alta Impresión C.A
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse"   data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"  aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item active">
          <a class="nav-link" id="link" href="../session/logout.php" onclick="return confirm('¿Desea cerrar sesión?');">
          <img src="../icons/out.png" width="24" height="24" class="d-inline-block align-text-top">
          Salir<span class="sr-only">(current)</span></a>
        </li>
      </ul>
    </div>
  </nav>

<script type="text/javascript">
  function Confirm(message){
    return (confirm(message))?true:false;
  }
</script>