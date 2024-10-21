<?php

class UsuariosModel extends Query {

    private $usuario , $nombre , $clave, $id_caja , $id , $estado; 

    public function __construct() {
        parent::__construct();
    }

    public function getUsuario(string $usuario) {
        $sql = "SELECT * FROM usuarios WHERE usuario = ?";
        $datos = array($usuario);
        $data = $this->select($sql, $datos);
        
        return $data;
    }
    
    public function getUsuarios() {
        $sql = "SELECT u.*, c.caja FROM usuarios u INNER JOIN caja c ON u.id_caja = c.id"; 
        $data = $this->selectALL($sql);
        return $data;
    }

    public function getCajas() {
        $sql = "SELECT * FROM caja WHERE estado = 1";
        $data = $this->selectAll($sql);
        return $data;
    }

    public function registrarusuario(string $usuario, string $nombre, string $clave, int $id_caja) {

        $this->usuario = $usuario;
        $this->nombre = $nombre;
        $this->clave = $clave;
        $this->id_caja = $id_caja;
    
        $verificar = "SELECT * FROM usuarios WHERE usuario = '$this->usuario'";
    
        $existe = $this->select($verificar);
    
        if (empty($existe)) {
            $sql = "INSERT INTO usuarios(usuario,nombre,clave,id_caja) VALUES (?,?,?,?)";
            $datos = array($this->usuario, $this->nombre, $this->clave, $this->id_caja);
            $data = $this->save($sql, $datos);
            
            if ($data == 1) {
                $res = "ok";
            } else {
                $res = "error";
            }
        } else {
            $res = "existe";
        }
    
        return $res;
    }

    public function modificarUsuario(string $usuario, string $nombre, int $id_caja, int $id) {

        $this->usuario = $usuario;
        $this->nombre = $nombre;
        $this->id = $id;
        $this->id_caja = $id_caja;
        $sql = "UPDATE usuarios SET usuario = ? , nombre = ? , id_caja = ? WHERE id = ?";
        $datos = array($this->usuario, $this->nombre, $this->id_caja, $this->id);
        $data = $this->save($sql, $datos);
        if ($data == 1) {
            $res = "modificado";
        } else {
            $res = "error";
        }
        return $res;
    } 

    public function editarUser(int $id){
        $sql = "SELECT * FROM usuarios WHERE id = $id";
        $data = $this->select($sql);
        return $data;

    }
    
    public function accionUser(int $estado , int $id ) {
        $this->id = $id; 
        $this->estado = $estado; // No es necesario si solo estás usando $id como parámetro
        $sql = "UPDATE usuarios SET estado = ? WHERE id = ?";
        $datos = array($this->estado,$this->id);  // Cambia this->$id a this->id
        $data = $this->save($sql, $datos);  // Cambia this-save a this->save
        return $data;
    }
    
       
}
    

?>
