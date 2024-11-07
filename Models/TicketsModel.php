<?php
class TicketsModel extends Query {

    // Definir las propiedades de la clase
    private $fecha_subida;
    private $queja;
    private $priority;  // Cambiado de 'prioridad' a 'priority'
    private $status;
    private $dni_cliente;

    public function registrarTicket(string $fecha_subida, string $queja, string $priority, string $dni_cliente) {
        // Asignar los valores a las propiedades
        $this->fecha_subida = $fecha_subida;
        $this->queja = $queja;
        $this->priority = $priority;  // Asignar 'priority' en lugar de 'prioridad'
        $this->status = 'Abierto';  // Se asigna 'Abierto' como el estado del ticket
        $this->dni_cliente = $dni_cliente;

        // Comprobar si ya existe un ticket abierto para ese cliente
        $verificar = "SELECT * FROM tickets WHERE dni_cliente = '$this->dni_cliente' AND status = 'Abierto'";
        $existe = $this->select($verificar);

        if (empty($existe)) {
            // Insertar el nuevo ticket en el orden correcto de las columnas de la tabla
            // La columna 'solucion' se pasa como NULL
            $sql = "INSERT INTO tickets (fecha_subida, queja, priority, status, dni_cliente, solucion) VALUES (?, ?, ?, ?, ?, NULL)";
            $datos = array($this->fecha_subida, $this->queja, $this->priority, $this->status, $this->dni_cliente);
            $data = $this->save($sql, $datos);

            // Comprobar si la inserción fue exitosa
            $res = $data == 1 ? "ok" : "error";
        } else {
            $res = "existe";
        }

        return $res;
    }
}
?>

