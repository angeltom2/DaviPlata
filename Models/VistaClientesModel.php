<?php

class VistaClientesModel extends Query {

    public function modificarPass(string $clave, int $id) {
        $sql = "UPDATE clientes SET clave = ? WHERE id = ?"; // Asegúrate de que la tabla y columnas coincidan
        $datos = array($clave, $id);
        $data = $this->save($sql, $datos);
        return $data;
    }
    
    public function getClienteById(int $id) {
        $sql = "SELECT * FROM clientes WHERE id = ?";
        $data = $this->select($sql, [$id]);
        return $data;
    }
}

?>