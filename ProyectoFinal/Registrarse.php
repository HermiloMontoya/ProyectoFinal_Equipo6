<!DOCTYPE html>
<html lang="es-MX">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Registrarse</title>
    <script>
        function errorTelefono() {
            let numero = document.getElementById("numero").value;
            document.getElementById("erroNumero").innerHTML = 'Valores insertados: ' + numero.length + "/10";

            if (numero.length > 10) {
                Swal.fire({
                    icon: "error",
                    title: "¡ERROR!",
                    text: "El numero de telefono solo acepta 10 numeros: " + numero.length + "/10",
                    showConfirmButton: true,
                    confirmButtonText: "ACEPTAR"
                });
            }
        }
    </script>
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
              <div class="d-flex align-items-center h-custom-2 px-5 ms-xl-4 mt-5 pt-5 pt-xl-0 mt-xl-n5">
      
                <form name="formulario_fmt" method="POST" action="controlador/validaRegistro.php" enctype="application/x-www-form-urlencoded" style="width: 22rem;" >
                <h3 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px; color: white;"><b>Registrarse</b></h3>
                
                <div class="form-outline mb-1">
                  <input type="email" name="usuario" class="form-control" id="inputEmail" required>
                    <label class="form-label" for="form2Example18" style="color: white;"><b>Correo Electronico</b></label>
                  </div>

                <div class="form-outline mb-1">
                  <input type="password" name="pass" class="form-control" id="inputPassword" required >
                    <label class="form-label" for="form2Example28" style="color: white;"><b>Contraseña</b></label>
                  </div>

                  <div class="form-outline mb-1">
                  <input type="text" name="nombre" class="form-control text-uppercase" id="inputNombre">
                    <label class="form-label" for="form2Example18" style="color: white;"><b>Nombre</b></label>
                  </div>

                  <div class="form-outline mb-1">
                  <input type="text" name="apaterno" class="form-control text-uppercase" id="inputaPaterno">
                    <label class="form-label" for="form2Example18" style="color: white;"><b>Apellido Paterno</b></label>
                  </div>

                  <div class="form-outline mb-1">
                  <input type="text" name="amaterno" class="form-control text-uppercase" id="inputaMaterno">
                    <label class="form-label" for="form2Example18" style="color: white;"><b>Apellido Materno</b></label>
                  </div>

                  <div class="form-outline mb-1">
                  <input type="text" name="direccion" class="form-control text-uppercase" id="inputDireccion">
                    <label class="form-label" for="form2Example18" style="color: white;"><b>Direccion</b></label>
                  </div>
    
                  <div class="mb-1">
                      <input type="number" name="telefono" class="form-control" id="numero" onkeyup="errorTelefono()" required name="numeroTelefono">
                   <label for="inpuTelefono" class="form-label" style="color: white; font-weight: bold;">Teléfono</label>
                           <div id="erroNumero"></div>
                  </div><br>
      
                  

                  <div class="pt-1 mb-1">
                    <a href="Felicidades.php">
                        <button type="submit" class="btn btn-primary">Registrarse</button>
                    </a>
                </div>

                </form>
      
              </div>
      
            </div>
            <!--<div class="col-sm-6 px-0 d-none d-sm-block">
              <img src="img/"
                alt="Login image" class="w-100 vh-100" style="object-fit: cover; object-position: left;">
            </div>-->
          </div>
        </div>
      </section>
     <!--BootStrap 5.3 JS-->
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js" integrity="sha384-Rx+T1VzGupg4BHQYs2gCW9It+akI2MM/mndMCy36UVfodzcJcF0GGLxZIzObiEfa" crossorigin="anonymous"></script>
</body>
</html>
