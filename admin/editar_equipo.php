<?php
    // Sesión
    require_once 'funciones/sesiones.php';
    // Funciones
    require_once 'funciones/funciones.php';
    $id = $_GET['id'];
    if(!filter_var($id, FILTER_VALIDATE_INT)):
        die("Error!");
    else:
    // Header
    require_once 'templates/header.php';
    // Barra
    require_once 'templates/barra.php';
    // Sidebar
    require_once 'templates/navegacion.php';
?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Editar Miembros del Equipo</h1>
            </div>
        </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="row">
        <div class="col-md-8">
            <div class="card">
            <div class="card-header">
                <h3 class="card-title">Editar Nuevo Miembro del Equipo</h3>
            </div>

            <div class="card-body">
                <?php
                    $sql = "SELECT * FROM equipo WHERE id_equipo = $id ";
                    $resultado = $conn->query($sql);
                    $equipo = $resultado->fetch_assoc();
                ?>
                <!-- form start -->
                <form role="form" name="guardar_registro" id="guardar_registro_archivo" data-tipo="equipo" method="post" action="modelo_equipo.php" enctype="multipart/form-data">
                    <div class="card-body has-validation">

                        <!-- Nombre -->
                        <div class="form-group">
                            <label for="nombre">Nombre</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingresa el Nombre" value="<?php echo $equipo['nombre']; ?>">
                        </div>

                        <!-- Apellido -->
                        <div class="form-group">
                            <label for="apellido">Apellido</label>
                            <input type="text" class="form-control" id="apellido" name="apellido" placeholder="Ingresa el Apellido" value="<?php echo $equipo['apellido']; ?>">
                        </div>

                        <!-- Imagen Actual -->
                        <div class="form-group">
                            <label for="imagen">Imagen Actual</label>
                            <div class="input-group">
                                <img src="../img/direc_locutores/<?php echo $equipo['url_imagen']; ?>" alt="img<?php echo $equipo['nombre'] ?>" width="200">
                            </div>
                        </div>

                        <!-- Imagen -->
                        <div class="form-group">
                            <label for="imagen">Imagen</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="imagen" name="imagen">
                                    <label class="custom-file-label" for="imagen"><?php echo $equipo['url_imagen']; ?></label>
                                </div>
                            </div>
                        </div>

                        <!-- Descripción -->
                        <div class="form-group">
                            <label for="biografia">Descripción</label>
                            <textarea id="biografia" class="form-control" rows="3" placeholder="Escribe algo sobre el miembro" name="descripcion"><?php echo $equipo['descripcion']; ?></textarea>
                        </div>

                        <!-- Cargo -->
                        <div class="form-group">
                            <label>Seleccione el Nivel del Miembro del Equipo</label>
                            <select id="nivel" class="custom-select" name="cargo" required>
                                <option value="">-- Selecciona un Cargo del Miembro --</option>
                                <option value="Directivo">Directivo</option>
                                <option value="Locutor">Locutor</option>
                            </select>
                        </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <input type="hidden" name="registro" value="actualizar">
                        <input type="hidden" name="id_registro" value="<?php echo $equipo['id_equipo']; ?>">
                        <button type="submit" class="btn btn-primary">Actualizar</button>
                    </div>
                </form>
            </div>
            <!-- /.card-body -->

            </div>
            <!-- /.card -->

        </div>
        </div>
    </section>
    <!-- /.content -->

    </div>
    <!-- /.content-wrapper -->

<?php
    // Footer
    require_once 'templates/footer.php';
    endif;
?>
