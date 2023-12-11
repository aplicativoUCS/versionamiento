<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="logueo.css">
    <title>Iniciar Sesión</title>
</head>

<body>
    <div class="container">
        <form class="login-form" action="inicio_sesion.php" method="POST">
            <img src="../img/ucs.png" alt="" width="30%"><br>
            <h5>Iniciar Sesión</h5>
            <br>
            <input type="text" class="form-control" name="usuario" placeholder="Nombre de usuario" required>
            <input type="password" class="form-control" name="pass" id="password" placeholder="Contraseña" required>
            <input type="checkbox" name="check" id= "showpassword"><p1> Mostrar Contraseña </p1><br><br>

            <button type="submit">Iniciar Sesión</button>
            <br><br>
        </form>

        <p class="register-link">¿Quieres ser distribuidor? <a href="register.php">Regístrate</a></p>
        <a href="../index.html" type="submit">Regresar a la página</a>
    </div>
</body>

<script>
    const passwordField = document.getElementById('password');
const showPasswordCheckbox = document.getElementById('showpassword');

showPasswordCheckbox.addEventListener('change', function() {
    passwordField.type = showPasswordCheckbox.checked ? 'text' : 'password';
});
</script>

</html>