<?php 

class conexion
    {
        private $servidor="localhost";
        private $usuario="sa";
        private $contrasena="3l#b0l4d0R13";
        private $dbase="album";
        private $conexion;
    
        public function __construct(){
            try {
                $this->conexion = new PDO("sqlsrv:server=$this->servidor;database=$this->dbase", $this->usuario, $this->contrasena);
                $this->conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//                echo "Conexion exitosa...";
                }
            catch (PDOException $e){
                return "Falla de conexion ".$e;
                }    
            }

        public function ejecutar ($sql){ //insertar, borrar, actualizar|
            $this->conexion->exec($sql);
            return $this->conexion->lastInsertId();
            }
        
        public function consultar($sql)
            {
            $sentencia=$this->conexion->prepare($sql);
            $sentencia->execute();
            return $sentencia->fetchAll();
            }
    }
?>