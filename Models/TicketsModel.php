<?php
class TicketsModel extends Query{

    public function registrarTicket(string $dni_cliente, string $queja, string $prioridad, string $fecha_subida, string $status) {
        // Asignar los valores a las variables
        $this->dni_cliente = $dni_cliente;
        $this->queja = $queja;
        $this->prioridad = $prioridad;
        $this->fecha_subida = $fecha_subida;
        $this->status = $status;
    
        // Comprobar si ya existe un ticket para ese cliente (puedes agregar lógica adicional si es necesario)
        $verificar = "SELECT * FROM tickets WHERE dni_cliente = '$this->dni_cliente' AND status = 'Abierto'";
    
        $existe = $this->select($verificar);
    
        if (empty($existe)) {
            // Insertar el nuevo ticket en la base de datos
            $sql = "INSERT INTO tickets (dni_cliente, queja, prioridad, fecha_subida, status) VALUES (?, ?, ?, ?, ?)";
            $datos = array($this->dni_cliente, $this->queja, $this->prioridad, $this->fecha_subida, $this->status);
            $data = $this->save($sql, $datos);
    
            // Comprobar si la inserción fue exitosa
            if ($data == 1) {
                $res = "ok";
            } else {
                $res = "error";
            }
        } else {
            $res = "existe";  // Puede haber un ticket abierto para ese cliente
        }
    
        return $res;
    }
    




}

?>
