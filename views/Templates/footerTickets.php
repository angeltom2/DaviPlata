<!-- Footer -->
<div class="footer">
    &copy; 2024 Ticket Management System - All Rights Reserved
</div>

<script src="https://code.jquery.com/jquery-3.7.1.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


<script>    
    function clearMessage() {
         document.getElementById("ticketMessage").value = ""; 
    }   
    
    function registrarTicket() {
    
    let queja = document.getElementById("ticketMessage").value;

    // Validar que la queja no esté vacía
    if (queja.trim() === "") {
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: 'La queja no puede estar vacía',
        });
        return;
    }

    
    fetch("/registrar_ticket", {
        method: "POST",
        headers: {
            "Content-Type": "application/json"
        },
        body: JSON.stringify({
            queja: queja
        })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            Swal.fire({
                icon: 'success',
                title: 'Ticket Registrado',
                text: 'Tu ticket ha sido registrado exitosamente.',
            });
        } else {
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: data.message || 'Hubo un error al registrar el ticket.',
            });
        }
    })
    .catch(error => {
        console.error("Error:", error);
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: 'No se pudo registrar el ticket debido a un error de conexión.',
        });
    });
}

</script>

</body>
</html>