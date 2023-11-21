<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11" ></script>
    <title>Iniciar Sesion</title>
</head>
<body>
      <div id="encabezado">
        <div id="menu">
            <ul>
            <li><a href="index.php" title="Página Principal">Inicio</a></li>
                <li><a href="Nosotros.php" >Nosotros</a></li>
                <li><a href="pasos.php" >Pasos</a></li>
                <li style="visibility: hidden;">..................................................................................................,...............................................................................................</li>
                <li><a href="IniciarSesion.php">Iniciar sesion</a></li>
                <li><a href="Registrarse.php" >Registrarse</a></li>
            </ul>
        </div>
    </div><br>

    <section class="vh-100" style="background-image: url('img/fondo1.jpg'); background-size: cover; background-position: center;">
        <div class="container-fluid">
          <div class="row">
            <div class="col-sm-6 text-black">
              <div class="px-5 ms-xl-4">
                <span class="h1 fw-bold mb-0">Ingresar a Delicias Coletas</span>
              </div>

              <div class="d-flex align-items-center h-custom-2 px-5 ms-xl-4 mt-5 pt-5 pt-xl-0 mt-xl-n5">

                <form action="controlador/validaInicioSesion.php" method="POST" style="width: 23rem;">
                <h3 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;"><b>Iniciar sesionn</b></h3>

                  <div class="form-outline mb-4">
                    <input type="email" name="correo" class="form-control form-control-lg" required />
                    <label class="form-label" for="correo"><b>Correo Electrónico</b></label>
                  </div>

                  <div class="form-outline mb-4">
                    <input type="password" name="clave" class="form-control form-control-lg" required />
                    <label class="form-label" for="clave"><b>Contraseña</b></label>
                  </div>

                  <div class="pt-1 mb-4">
                    <button class="btn btn-info btn-lg btn-block" type="submit">Ingresar</button>
                    <br><br>
                    <p><b>No tienes una cuenta?</b></p>
                    <a href="Registrarse.php">
                        <button class="btn btn-info btn-lg btn-block" type="button">Registrate Aqui</button>
                    </a>
                  </div>

                </form>

              </div>
            </div>
          </div>
        </div>
      </section>

</body>
</html>


