<?php
$title = "Bienvenido Registarte para Usar el Sitio";
include "includes/header.php";
include "includes/modal-index.html";
?>
<section class="container-fluid pt-3">
    <div class="row">
        <div class="col-md-1"></div>
            <div class="col-md-10">
                <div id="view1">
                    <br><br><br><br>
                    <div class="row">
                        <div class="col-md-7">
                        <br><br><br>
                            <h2>Te Damos la Bienvenida a la WEB de Registro de Usuarios</h2>
                            <br>
                            <h3>Registro de Usuario</h3>
                            <br>
                            <form action="register.php" method="post" enctype="multipart/form-data" onsubmit="return verify()">
                                <label><input type="text" name="username" required> Nombre</label>
                                <br><br>
                                <label><input type="text" name="surname" required> Apellido1</label>
                                <br><br>
                                <label><input type="text" name="surname2"> Apellido2</label>
                                <br><br>
                                <label><input id="dni" type="text" name="dni" required> D.N.I.</label>
                                <br><br>
                                <label><input type="text" name="phone" required> Teléfono</label>
                                <br><br>
                                <label><input type="email" name="email" required> E-mail</label>
                                <br><br>
                                <label><input type="password" name="pass" id="pass1" onkeypress="showEye(1)" required> Contraseña</label>
                                <i onclick="spy(1)" class="far fa-eye" id="togglePassword1" style="margin-left: -140px; cursor: pointer; visibility: hidden;"></i>
                                <br><br>
                                <label><input type="password" id="pass2" onkeypress="showEye(2)" required> Repite Contraseña</label>
                                <i onclick="spy(2)" class="far fa-eye" id="togglePassword2" style="margin-left: -205px; cursor: pointer; visibility: hidden;"></i>
                                <br><br>
                                <label><input type="date" name="bday" required> Cumpleaños</label>
                                <br><br>
                                <label><input type="file" name="profile"> Foto de Perfil<small>(opcional)</small></label>
                                <br><br>
                                <input type="submit" value="Regístrame!">
                            </form>
                        </div>
                        <div class="col-md-5">
                            <br><br><br><br><br><br><br>
                            <h3>Entrada de Usuario</h3>
                            <br>
                            <form action="login.php" method="post">
                                <label><input type="email" name="email" required> E-mail</label>
                                <br><br>
                                <label><input type="password" name="pass" id="pass3" onkeypress="showEye(3)" required> Contraseña</label>
                                <i onclick="spy(3)" class="far fa-eye" id="togglePassword3" style="margin-left: -140px; cursor: pointer; visibility: hidden;"></i>
                                <br><br>
                                <input type="submit" value="Login">
                            </form>
                            <a href="recover.php"><small>Olvidaste tu Contraseña</small></a>
                        </div>
                    </div>
                </div>
            </div>
        <div class="col-md-1"></div>
    </div>
</section>
<br><br><br><br>
<?php
include "includes/footer.html";
?>