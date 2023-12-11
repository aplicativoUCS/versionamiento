<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="logueo.css">
    <title>Registro</title>
</head>
<body>

<div class="container">
        <img src="../img/ucs.png" alt="" width="30%"><br>
    <h5>Registro</h5>
    <br>
        <form class="register-form" action="guardar_registro.php" method="POST">
            <input type="text" class="form-control" name="Nombre" placeholder="Nombre de usuario" required> 

            <input type="text" class="form-control" name="Ciudad" placeholder="Ciudad" required>

            <input type="email" class="form-control" name="Correo" placeholder="Correo electrónico" required>

            <input type="text" class="form-control" name="Empresa" placeholder="Empresa" required>

            <input type="text" class="form-control" name="Direccion" placeholder="Direccion" required>

            <input type="text" class="form-control" name="Telefono" placeholder="Telefono" required>

            <input type="number" class="form-control" name="Nit" placeholder="Nit" required>

            <input type="hidden" class="form-control" name="rol" placeholder="rol" required>

            <input type="password" class="form-control" id="password" name="Pass" placeholder="Contraseña" required>

            <input type="checkbox" name="check" id= "showpassword"><p1> Mostrar Contraseña </p1>
            <br><br>

            <button type="submit">Registrarse</button>
            
            <br><br>
            <p class="login-link">¿Ya tienes una cuenta? <a href="login.php">Inicia Sesión</a></p>
        </form>
    </div>

    </form>   
</div>

<script>

const passwordField = document.getElementById('password');
const showPasswordCheckbox = document.getElementById('showpassword');

showPasswordCheckbox.addEventListener('change', function() {
    passwordField.type = showPasswordCheckbox.checked ? 'text' : 'password';
});

</script>

</body>
</html>
