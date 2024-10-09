<?php include("cabecera.php");
require("conexion.php");
$conexion = retornarConexion();
if($_POST){
mysqli_query($conexion, "insert into usuarios(nombres,apellidos,email,telefono) values 
                       ('$_REQUEST[nombre]','$_REQUEST[apellido]','$_REQUEST[correo]','$_REQUEST[telefono]' )")
    or die("Problemas en el select" . mysqli_error($conexion));

  mysqli_close($conexion);
  header("location:index.php");
 // echo '<script>    swal("Guardado!", "registro exitoso!", "success");</script>';
}
?>
<div class="card"><br>
    <div class="card-header">
        Formulario de Registro de Usuario
    </div><br>
    <div class="card-body">
    <form action="" method="post">
    <div class="form-group"><br>
      <label for="email">Nombre:</label>
      <input type="text" class="form-control" id="nombre" placeholder="Ingrese sus nombres" name="nombre">
    </div><br>
    <div class="form-group">
      <label for="pwd">Apellido:</label>
      <input type="text" class="form-control" id="apellido" placeholder="Ingrese sus apellidos" name="apellido">
    </div><br>
    <div class="form-group">
      <label for="pwd">Correo:</label>
      <input type="text" class="form-control" id="correo" placeholder="Ingrese su correo" name="correo">
    </div><br>
    <div class="form-group">
      <label for="pwd">telefono:</label>
      <input type="text" class="form-control" id="telefono" placeholder="Ingrese su telefono" name="telefono">
    </div><br>
    <br>
    <button type="submit" class="btn btn-primary">Registrar</button><br>
  </form>
    </div>
    
</div>
<?php include("pie.php"); ?>