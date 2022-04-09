<?php include("cabecera.php"); ?>

<?php include("conexion.php"); ?>

<?php

if ($_POST)
    {
//    print_r($_POST);

    $nombre=$_POST['nombre'];
    $descripcion=$_POST['descripcion'];

    $fecha=new DateTime();

    $imagen=$fecha->getTimestamp()."_".$_FILES['archivo']['name'];



    $imagen_temporal=$_FILES['archivo']['tmp_name'];

    move_uploaded_file($imagen_temporal,"imagenes/".$imagen);


//    $nombre="Oswaldo";
//    $imagen="imagen4";
//    $descripcion="Ni como...";


    $objconexion=new conexion();
    $sql="INSERT INTO proyectos (nombre, imagen, descripcion) VALUES ('".$nombre."','".$imagen."','".$descripcion."');";
    //$sql="INSERT INTO proyectos (nombre, imagen, descripcion) VALUES ('Fernando','imagen2','Zorron...');";
    $objconexion->ejecutar($sql);
    header("location:portafolio.php");
    }

if ($_GET)
    {
    $id=$_GET['borrar'];
    $objconexion=new conexion();
    
    $borrar_img=$objconexion->consultar("select imagen from proyectos where id=".$id);
    //print_r($borrar_img[0]['imagen']);
    unlink("imagenes/".$borrar_img[0]['imagen']);

    
    $sql="delete from proyectos where id=".$id;
    $objconexion->ejecutar($sql);
    header("location:portafolio.php");      
    }
    

$objconexion=new conexion();
$proyectos=$objconexion->consultar("select * from proyectos;");
print_r($proyectos);
// echo json_encode($proyectos);


?>

<br/>


<div class="container">
    <div class="row">
        <div class="col-md-4">
            
            <div class="card">
                <div class="card-header">
                    Datos del proyecto
                </div>
                <div class="card-body">
                    <form action="portafolio.php" method="post" enctype="multipart/form-data">

                        Nombre del proyecto: 
                        <input required class="form-control" Type="text" name="nombre" id="">
                        <br/>
                        Imagen del proyecto:
                        <input required class="form-control" Type="file" name="archivo" id="">
                        <br/>
                        Descripcion: 
                        <textarea required class="form-control" name="descripcion" id="" rows="3"></textarea>
                        <br/>
                        <input class="btn btn-success" Type="submit" value="Enviar proyecto">
                        <br/>
                    </form>
                </div>
                <div class="card-footer text-muted">
                    <!-- derechos reservados. -->
                </div>
            </div>

        </div>
        <div class="col-md-8">

            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Imagen</th>
                        <th>Descripcion</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($proyectos as $proyecto) 
                    { ?>
                    <tr>
                        <td><?php echo $proyecto["id"]; ?></td>
                        <td><?php echo $proyecto['nombre']; ?></td>
                        <td>
                        
                            <img width="200" src="imagenes/<?php echo $proyecto['imagen']; ?>" alt="" srcset="">
                        
                        </td>                    
                        <td><?php echo $proyecto['descripcion']; ?></td>
                        <th><a class="btn btn-danger" href="?borrar=<?php echo $proyecto['id']; ?>">Eliminar</a></th>
                    </tr>
                    <?php 
                    } ?>
                </tbody>
            </table>

        </div>
    </div>
</div>


<?php include("pie.php"); ?>