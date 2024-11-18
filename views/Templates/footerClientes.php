<footer class="footer-section">
    <div class="container">
        <div class="footer-content">
            <div class=" text-center"> <!-- Contenedor para el botón "Volver" -->
                <button class="btn-volver" onclick="scrollToTop();">
                    <i class="fas fa-arrow-up"></i> Volver
                </button>
            </div>
            
            <div class="col-md-4 text-center"> <!-- Contenedor combinado para mensaje y descargas -->
                <p style="color:white;"><strong>¡DESCARGUE EL APP DAVIPLATA Y ACTÍVESE YA!</strong></p>
                <div class="app-download">
                    <a href="https://apps.apple.com/app/id1234567890" target="_blank">
                        <img src="assets/img/Appstore.png" alt="Descargue en App Store" />
                    </a>
                    <a href="https://play.google.com/store/apps/details?id=com.daviplata" target="_blank">
                        <img src="assets/img/google.png" alt="Disponible en Google Play" />
                    </a>
                    <a href="https://appgallery.huawei.com/#/app/C123456789" target="_blank">
                        <img src="assets/img/huawei.png" alt="Explóralo en AppGallery" />
                    </a>
                </div>
            </div>

            <div class="soacial-icons"> <!-- Espacio para los iconos de redes sociales -->
                <div class="social-icons"> <!-- Iconos de redes sociales a la derecha -->
                    <a href="https://www.facebook.com/DaviPlata" class="social-icon" target="_blank"><i class="fab fa-facebook-f"></i></a>
                    <a href="https://x.com/Daviplatacaido" class="social-icon" target="_blank"><i class="fab fa-twitter"></i></a>
                    <a href="https://www.instagram.com/daviplataoficial/" class="social-icon" target="_blank"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
        </div>
    </div>
</footer>

<div id="cambiarPass" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background: #800000; color: white;">
        <h5 class="modal-title">Modificar Contraseña</h5>
      </div>
      <div class="modal-body">
        <form id="frmCambiarPass">
          <div class="form-group">
            <label for="clave_actual">Contraseña Actual</label>
            <input id="clave_actual" class="form-control" type="password" name="clave_actual" placeholder="Contraseña Actual" required>
          </div>
          <div class="form-group">
            <label for="clave_nueva">Contraseña Nueva</label>
            <input id="clave_nueva" class="form-control" type="password" name="clave_nueva" placeholder="Nueva contraseña" required>
          </div>
          <div class="form-group">
            <label for="confirmar_clave">Confirmar Contraseña</label>
            <input id="confirmar_clave" class="form-control" type="password" name="confirmar_clave" placeholder="Confirmar contraseña" required>
          </div>

          <div class="form-group text-right" style="margin-top: 20px;">
          <button class="btn btn-primary" type="button" onclick="frmCambiarPass(event);" id="btnAcciones"> modificar </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>


<script src="https://code.jquery.com/jquery-3.7.1.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
<script src="<?php echo base_url; ?>assets/js/VistaClientes.js" crossorigin="anonymous"></script>
<script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js"></script>



<script>
    const base_url = "http://localhost/daviplata/";

    function frmCambiarPass(e) {

        e.preventDefault(); 
        
        // Obtener valores de los campos
        const actual = document.getElementById('clave_actual').value.trim();
        const nueva = document.getElementById('clave_nueva').value.trim();
        const confirmar = document.getElementById('confirmar_clave').value.trim();

        // Validar campos vacíos
        if (actual === '' || nueva === '' || confirmar === '') {
            Swal.fire({
                position: 'center',
                icon: 'error',
                title: 'Todos los campos son obligatorios',
                showConfirmButton: false,
                timer: 3000
            });
            return;
        }

        // Validar coincidencia de contraseñas
        if (nueva !== confirmar) {
            Swal.fire({
                position: 'center',
                icon: 'error',
                title: 'Las contraseñas no coinciden',
                showConfirmButton: false,
                timer: 3000
            });
            return;
        }

        // Enviar datos al servidor
        const url = base_url + "VistaClientes/cambiarPass"; // Ruta hacia el controlador
        const frm = document.getElementById("frmCambiarPass");
        const http = new XMLHttpRequest();
        http.open("POST", url, true);
        http.send(new FormData(frm));

        http.onreadystatechange = function () {
            if (this.readyState === 4) {
                let res;

                try {
                    res = JSON.parse(this.responseText); // Parsear respuesta del servidor
                } catch (error) {
                    Swal.fire({
                        position: 'center',
                        icon: 'error',
                        title: 'Error al procesar la respuesta del servidor',
                        showConfirmButton: false,
                        timer: 3000
                    });
                    return;
                }

                // Comprobar respuesta
                if (res === "ok") {
                    $("#cambiarPass").modal("hide"); // Cerrar el modal
                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: 'Contraseña modificada con éxito',
                        showConfirmButton: false,
                        timer: 3000
                    });
                    frm.reset(); // Limpiar formulario
                } else {
                    Swal.fire({
                        position: 'center',
                        icon: 'error',
                        title: res, // Mostrar mensaje del servidor
                        showConfirmButton: false,
                        timer: 3000
                    });
                }
            }
        }
    }

    function abrirModal() {
    // Abre el modal de manera programática
    $('#cambiarPass').modal('show');
    }

    function toggleChatbot() {
        var chatbot = document.getElementById('chatbotContainer');
        if (chatbot.style.display === "none" || chatbot.style.display === "") {
            chatbot.style.display = "flex";
        } else {
            chatbot.style.display = "none";
        }
    }

    const conversationFlow = {
        "start": {
            "message": "¡Hola! Soy el asistente de Daviplata. ¿En qué puedo ayudarte?"
        },
        "Consulta de saldo": {
            "message": "Tu saldo disponible es de $500,000. ¿Te gustaría hacer otra consulta?"
        },
        "Últimos movimientos": {
            "message": "Estos son tus últimos 5 movimientos:\n1. Pago en tienda A - $50,000\n2. Recarga de teléfono - $20,000\n3. Transferencia a amigo - $100,000\n4. Compra en línea - $30,000\n5. Pago de servicios - $25,000.\n¿Te gustaría hacer otra consulta?"
        },
        "Recargar cuenta": {
            "message": "¿desea recargar su cuenta?"
        },
        "Confirmar recarga": {
            "message": "¿Confirmas la recarga de $? ¿Te gustaría hacer otra consulta?"
        },
        "Bloquear tarjeta": {
            "message": "¿Accediste a bloquear tu tarjeta quiere continuar?"
        },
        "Confirmar bloqueo": {
            "message": "Tu tarjeta ha sido bloqueada. ¿Te gustaría hacer otra consulta?"
        },
        "Horarios de atención": {
            "message": "Nuestro horario de atención es de lunes a viernes de 8:00 AM a 6:00 PM, y sábados de 9:00 AM a 1:00 PM. ¿Te gustaría hacer otra consulta?"
        },
        "Salir": {
            "message": "¡Gracias por usar Daviplata! Si necesitas ayuda nuevamente, no dudes en contactarnos."
        },
        "default": {
            "message": "Lo siento, no entendí esa pregunta. Si necesitas ayuda, puedes generar un ticket haciendo clic en el siguiente enlace: <a href='http://localhost/daviplata/Tickets' target='_blank'>Generar ticket</a>"
        }
    };

    let currentState = "start";  
    let amountToRecargar = null; 


    function handleConversation(userInput) {
        userInput = userInput.toLowerCase().trim();  
        const keywords = {
            "Consulta de saldo": ["saldo", "disponible", "cuánto tengo"],
            "Últimos movimientos": ["movimientos", "transacciones", "historial", "recientes"],
            "Recargar cuenta": ["recargar", "añadir dinero", "cargar", "depositar", "recargar mi cuenta" ,"recarga"],
            "Bloquear tarjeta": ["bloquear", "suspender", "desactivar", "tarjeta"],
            "Horarios de atención": ["horarios", "cuándo atienden", "horarios de servicio"],
            "Salir": ["salir", "adiós", "cerrar sesión", "terminar"]
        };

        for (const [state, words] of Object.entries(keywords)) {
            if (words.some(keyword => userInput.includes(keyword))) {
                currentState = state;
                return conversationFlow[state].message;
            }
        }

        // Respuestas iniciales de saludo
        if (userInput.includes("hola") || userInput.includes("buenos días") || userInput.includes("buenas tardes") || userInput.includes("buenas noches")) {
            currentState = "start";
            return conversationFlow["start"].message;
        }
        if (userInput.includes("consulta de saldo") || userInput.includes("saldo disponible") || userInput.includes("cuánto tengo")) {
            currentState = "Consulta de saldo";
            return conversationFlow["Consulta de saldo"].message;
        } else if (userInput.includes("últimos movimientos") || userInput.includes("movimientos recientes") || userInput.includes("transacciones recientes") || userInput.includes("historial de movimientos")) {
            currentState = "Últimos movimientos";
            return conversationFlow["Últimos movimientos"].message;
        } else if (userInput.includes("recargar cuenta") || userInput.includes("recargar saldo") || userInput.includes("añadir dinero") || userInput.includes("cargar cuenta") || userInput.includes("depositar") || userInput.includes("quisiera recargar mi cuenta")) {
            currentState = "Recargar cuenta";
            return conversationFlow["Recargar cuenta"].message;
        } else if (userInput.includes("bloquear tarjeta") || userInput.includes("bloquear mi tarjeta") || userInput.includes("suspender tarjeta") || userInput.includes("desactivar tarjeta")) {
            currentState = "Bloquear tarjeta";
            return conversationFlow["Bloquear tarjeta"].message;
        } else if (userInput.includes("horarios de atención") || userInput.includes("horarios") || userInput.includes("cuándo atienden") || userInput.includes("horarios de servicio")) {
            currentState = "Horarios de atención";
            return conversationFlow["Horarios de atención"].message;
        } else if (userInput.includes("salir") || userInput.includes("adiós") || userInput.includes("cerrar sesión") || userInput.includes("terminar")) {
            currentState = "Salir";
            return conversationFlow["Salir"].message;
        }

        if (currentState === "Recargar cuenta") {
            currentState = "Esperando monto de recarga";
            return "¿Cuánto deseas recargar a tu cuenta? Por favor, indica el monto.";
        }

        if (currentState === "Esperando monto de recarga") {
            let monto = parseFloat(userInput.replace(/[^0-9.]/g, ""));
            if (!isNaN(monto) && monto > 0) {
                amountToRecargar = monto;
                currentState = "Confirmar recarga";
                return `Has solicitado recargar $${amountToRecargar}. ¿Confirmas que deseas recargar esta cantidad? Responde con 'sí' o 'no'.`;
            } else {
                return "Por favor, ingresa un monto válido para la recarga.";
            }
        }

        if (currentState === "Confirmar recarga") {
            // Normalizar la entrada de usuario, eliminando espacios y convirtiendo todo a minúsculas
            let userInputNormalized = userInput.trim().toLowerCase().replace(/[^\w\s]/g, ''); 
            
            console.log("Estado actual:", currentState);
            console.log("Entrada normalizada:", userInputNormalized);

            if (userInputNormalized.includes("si") || userInputNormalized.includes("si, recargar") || userInputNormalized.includes("confirmo")) {
                currentState = "Recargar cuenta";
                console.log("Cambio de estado a Recargar cuenta");
                return `Tu cuenta ha sido recargada con $${amountToRecargar}. ¿Te gustaría hacer otra consulta?`;
            } 
            // Revisar si la respuesta incluye "no" o variaciones de cancelación
            else if (userInputNormalized.includes("no") || userInputNormalized.includes("no, cancelar") || userInputNormalized.includes("cancelar")) {
                currentState = "start"; // Reiniciar el flujo
                console.log("Cambio de estado a start");
                return "Recarga cancelada. ¿Te gustaría hacer otra consulta?";
            } 
            // Si la respuesta no es "sí" ni "no", pedimos una respuesta válida
            else {
                console.log("No se entendió la respuesta.");
                return "No entendí tu respuesta. Por favor responde con 'sí' o 'no'.";
            }
        }   

        if (currentState === "Bloquear tarjeta") {
            currentState = "Confirmar bloqueo";
            return conversationFlow["Bloquear tarjeta"].message + " Responde con 'sí' para confirmar o 'no' para cancelar.";
        }

        if (currentState === "Confirmar bloqueo") {
            // Normalizar la entrada de usuario, eliminando espacios y convirtiendo todo a minúsculas
            let userInputNormalized = userInput.trim().toLowerCase().replace(/[^\w\s]/g, ''); 
            
            console.log("Estado actual:", currentState);
            console.log("Entrada normalizada:", userInputNormalized);

            // Si la respuesta es afirmativa (sí)
            if (userInputNormalized === "si" || userInputNormalized === "confirmo") {
                currentState = "start"; // Reiniciar el flujo
                console.log("Cambio de estado a start");
                return conversationFlow["Confirmar bloqueo"].message; // Mensaje de confirmación de bloqueo
            } 
            // Si la respuesta es negativa (no)
            else if (userInputNormalized === "no" || userInputNormalized === "cancelar") {
                currentState = "start"; // Reiniciar el flujo
                console.log("Cambio de estado a start");
                return "Bloqueo cancelado. " + conversationFlow["start"].message; // Mensaje de cancelación
            } 
            // Si la respuesta no es válida
            else {
                console.log("No se entendió la respuesta.");
                return "No entendí tu respuesta. Por favor responde con 'sí' o 'no'.";
            }
        }

        if (currentState === "Horarios de atención") {
            if (userInput.includes("horarios") || userInput.includes("atención")) {
                currentState = "start";
                return conversationFlow["Horarios de atención"].message;
            }
        }

        if (currentState === "Salir") {
            if (userInput.includes("salir") || userInput.includes("adiós")) {
                currentState = "start";
                return conversationFlow["Salir"].message;
            }
        }

        return conversationFlow["default"].message;
    }


    async function sendMessage() {
        const userInput = document.getElementById('userInput').value;
        if (userInput.trim() === "") return;

        // Mostrar el mensaje del usuario
        var message = `<p><strong>Usuario:</strong> ${userInput}</p>`;
        document.getElementById('chatbotBody').innerHTML += message;
        
        // Limpiar el campo de entrada
        document.getElementById('userInput').value = "";

        // Obtener la respuesta del chatbot
        const botResponse = handleConversation(userInput);
        message = `<p><strong>Asistente:</strong> ${botResponse}</p>`;
        document.getElementById('chatbotBody').innerHTML += message;

        // Hacer que el chat se desplace hacia abajo
        var chatbotBody = document.getElementById('chatbotBody');
        chatbotBody.scrollTop = chatbotBody.scrollHeight;
    }


    document.getElementById("chatForm").addEventListener("submit", function(event) {
        event.preventDefault();
        sendMessage();
    });

    function closeChatbot() {

        document.getElementById('chatbotContainer').style.display = 'none';

        document.getElementById('chatbotBody').innerHTML = '';
    }


</script>


<script>
    function scrollToTop() {
        window.scrollTo({
            top: 0,
            behavior: 'smooth' // Añade un desplazamiento suave
        });
    }
</script>


</body>
</html>