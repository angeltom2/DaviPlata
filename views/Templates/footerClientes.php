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
        "¿Qué tipos de interés tendrá mi crédito?": {
            "message": "Los tipos de interés para tu crédito pueden variar entre el 12% y el 18% anual, dependiendo del monto solicitado y tu perfil crediticio. ¿Te gustaría hacer otra consulta?"
        },
        "¿Cuánto dinero me pueden prestar?": {
            "message": "Podemos prestarte hasta $1,000,000 dependiendo de tu perfil crediticio.¿Te gustaría hacer otra consulta?"
        },
        "¿Qué comisiones me cobrarán?": {
            "message": "Las comisiones varían según el tipo de transacción. Por ejemplo, transferencias nacionales tienen una comisión de $5,000, mientras que las internacionales pueden tener una comisión de hasta $50,000. ¿Te gustaría hacer otra consulta?"
        },
        "default": {
            "message": "Lo siento, no entendí esa pregunta. Si necesitas ayuda, puedes generar un ticket haciendo clic en el siguiente enlace: <a href='http://localhost/daviplata/Tickets' target='_blank'>Generar ticket</a>"
        },
        "¿Dónde se encuentran ubicados los centros financieros del banco?": {
            "message": "Los centros financieros del banco se encuentran en las principales ciudades del país. Puedes consultar la lista completa y sus direcciones en nuestro sitio web oficial. ¿Te gustaría hacer otra consulta?"
        },
        "¿Cuál es la diferencia entre las cuentas de cheques y las de ahorros?": {
            "message": "La principal diferencia es que las cuentas de cheques se utilizan para transacciones frecuentes, como pagos y retiros, mientras que las cuentas de ahorros están diseñadas para guardar dinero a largo plazo y generar intereses. ¿Te gustaría hacer otra consulta?"
        },
        "¿Qué tipos de cuentas ofrecen?": {
            "message": "Ofrecemos varios tipos de cuentas, como cuentas corrientes, cuentas de ahorro, y cuentas a plazo fijo. Cada tipo tiene características y beneficios diferentes. ¿Te gustaría saber más sobre algún tipo de cuenta en particular?"
        },
        "¿Qué tipos de tarjetas ofrecen?": {
            "message": "Ofrecemos varios tipos de tarjetas, como tarjetas de débito, crédito y prepagadas. Cada tipo tiene características y beneficios diferentes. ¿Te gustaría saber más sobre algún tipo de tarjeta en particular?"
        },
        "¿Cómo solicito una tarjeta?": {
            "message": "Para solicitar una tarjeta, primero debes elegir el tipo de tarjeta que deseas ,Luego  te guiaremos en el proceso de solicitud. ¿Quiere solicitar una tarjeta?"
        },
        "¿Cómo puedo comunicarme con el banco?": {
            "message": "Puedes comunicarte con nosotros a través de varios canales: por teléfono, correo electrónico, o visitando una de nuestras sucursales. ¿Te gustaría saber más sobre alguno de estos métodos?"
        },
        "¿Cuáles son los requisitos para solicitar un crédito?": {
            "message": "Para solicitar un crédito, necesitas cumplir con ciertos requisitos. ¿Te gustaría saber más sobre los requisitos específicos para solicitar un crédito?"
        },

        "¿Cómo puedo calcular una cuota?": {
            "message": "Para calcular la cuota de un crédito, se considera el monto prestado, la tasa de interés y el plazo de pago. ¿Te gustaría que te ayudemos a calcularla?"
        },

        "¿Qué pasa si no puedo pagar una cuota?": {
            "message": "Si no puedes pagar una cuota, es importante que te pongas en contacto con el banco lo antes posible. Dependiendo del tipo de crédito, el banco podría ofrecerte opciones como reestructurar tu deuda, extender el plazo o establecer un plan de pagos más accesible. ¿Te gustaría saber más sobre las opciones disponibles?"
        },

    };

    let currentState = "start";  
    let amountToRecargar = null; 
    let loanAmount = 0;  // Monto del préstamo
    let interestRate = 0; // Tasa de interés
    let numberOfPayments = 0; // Número de pagos

    function handleConversation(userInput) {
        userInput = userInput.toLowerCase().trim();  

        const keywords = {
            "Consulta de saldo": ["saldo", "disponible", "cuanto tengo"],
            "Últimos movimientos": ["movimientos", "transacciones", "historial", "recientes"],
            "Recargar cuenta": ["recargar", "anadir dinero", "cargar", "depositar", "recargar mi cuenta" ,"recarga"],
            "Bloquear tarjeta": ["bloquear", "suspender", "desactivar"],
            "Horarios de atención": ["horarios", "cuando atienden", "horarios de servicio"],
            "¿Qué tipos de interés tendrá mi crédito?": ["interes", "tipos de interes", "credito interes", "tasa de interes", "intereses del credito" , "intereses"],
            "¿Cuánto dinero me pueden prestar?": ["prestamo", "dinero prestado", "cuanto puedo pedir", "dinero que me pueden prestar","prestar"],
            "Salir": ["salir", "adios", "cerrar sesion", "terminar"],
            "¿Qué comisiones me cobrarán?": ["comisiones", "cobros", "tarifas", "costos de transaccion", "cuanto me cobran"],
            "¿Dónde se encuentran ubicados los centros financieros del banco?": ["ubicacion", "centros financieros", "donde estan", "sucursales", "direccion del banco", "oficinas del banco", "ubican"],
            "¿Cuál es la diferencia entre las cuentas de cheques y las de ahorros?": ["diferencia", "cheques", "cuentas de cheques", "cuentas de ahorros", "diferencia entre cuentas"],
            "¿Qué tipos de cuentas ofrecen?": ["tipos de cuentas", "cuentas corrientes", "cuentas de ahorro", "cuentas a plazo fijo", "tipos de cuentas ofrecidas", "cuenta corriente","cuenta de ahorro"],
            "¿Qué tipos de tarjetas ofrecen?": ["tipos de tarjetas", "tarjetas de debito", "tarjetas de credito", "tarjetas prepagadas", "tarjetas"],
            "¿Cómo solicito una tarjeta?": ["como solicito una tarjeta", "solicitar tarjeta", "quiero una tarjeta", "tarjeta solicitud" , "quiero solicitar una tarjeta"],
            "¿Cómo puedo comunicarme con el banco?": ["como contactar con el banco", "como comunicarme con el banco", "metodos de contacto", "contactar banco", "quiero comunicarme con el banco" , " como me puedo comunicar con el banco" ,"como puedo contactar al banco"],
            "¿Cómo puedo calcular una cuota?": ["calcular cuota", "cálculo de cuota", "cómo calcular la cuota", "calcular cuota crédito", "cuota préstamo" , "Como puedo calcular una cuota"],
            "¿Cuáles son los requisitos para solicitar un crédito?": ["requisitos credito", "como solicitar un credito", "requisitos para credito", "credito requisitos", "que necesito para solicitar un credito" , "cuales son los requisitos para solicitar un credito"],
            "¿Qué pasa si no puedo pagar una cuota?": ["no puedo pagar cuota", "problema con pago cuota", "no pagué la cuota", "impago cuota", "qué pasa si no pago la cuota", "no puedo pagar el préstamo", "problema con pago de una cuota"]
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

        if (currentState === "¿Qué tipos de cuentas ofrecen?") {
            currentState = "Elegir tipo de cuenta";
            return " Responde con el tipo de cuenta que te gustaría saber más (corriente, ahorro, a plazo fijo)";
        }

        if (currentState === "Elegir tipo de cuenta") {
            // Normalizamos la entrada del usuario
            let userInputNormalized = userInput.trim().toLowerCase().replace(/[^\w\s]/g, ''); 

            console.log("Estado actual:", currentState);
            console.log("Entrada normalizada:", userInputNormalized);

            // Dependiendo del tipo de cuenta elegido, mostramos una descripción
            if (userInputNormalized === "corriente") {
                currentState = "start"; // Reiniciar el flujo después de dar la respuesta
                return "Una cuenta corriente te permite realizar transacciones frecuentes como depósitos, retiros y pagos de cheques. Ideal para quienes necesitan acceso fácil a su dinero. ¿Te gustaría hacer otra consulta?";
            } 
            else if (userInputNormalized === "ahorro") {
                currentState = "start"; // Reiniciar el flujo después de dar la respuesta
                return "Una cuenta de ahorro es perfecta para guardar tu dinero y ganar intereses sobre el saldo. Se utiliza para ahorrar de manera segura a largo plazo. ¿Te gustaría hacer otra consulta?";
            }
            else if (userInputNormalized === "plazo fijo") {
                currentState = "start"; // Reiniciar el flujo después de dar la respuesta
                return "Una cuenta a plazo fijo es ideal si buscas una inversión segura. Colocas tu dinero en la cuenta por un período específico a cambio de un interés garantizado. ¿Te gustaría hacer otra consulta?";
            }
            // Si no entendemos la entrada, pedimos al usuario que elija un tipo válido
            else {
                return "No entendí el tipo de cuenta que mencionaste. Por favor, elige entre 'corriente', 'ahorro', o 'plazo fijo'.";
            }
        }

        if (currentState === "¿Qué tipos de tarjetas ofrecen?") {
            currentState = "Elegir tipo de tarjeta";
            return "Responde con el tipo de tarjeta que te gustaría saber más (débito, crédito, prepagada)";
        }

        if (currentState === "Elegir tipo de tarjeta") {
            // Normalizamos la entrada del usuario
            let userInputNormalized = userInput.trim().toLowerCase().replace(/[^\w\s]/g, ''); 

            console.log("Estado actual:", currentState);
            console.log("Entrada normalizada:", userInputNormalized);

            // Dependiendo del tipo de tarjeta elegido, mostramos una descripción
            if (userInputNormalized === "débito") {
                currentState = "start"; // Reiniciar el flujo después de dar la respuesta
                return "Las tarjetas de débito te permiten realizar pagos directamente desde tu cuenta bancaria. Ideal para quienes prefieren no endeudarse y tener control total sobre sus gastos. ¿Te gustaría hacer otra consulta?";
            } 
            else if (userInputNormalized === "crédito") {
                currentState = "start"; // Reiniciar el flujo después de dar la respuesta
                return "Las tarjetas de crédito te permiten realizar compras y pagarlas a plazos. Ideal para quienes necesitan flexibilidad y ventajas como puntos o beneficios adicionales. ¿Te gustaría hacer otra consulta?";
            }
            else if (userInputNormalized === "prepagada") {
                currentState = "start"; // Reiniciar el flujo después de dar la respuesta
                return "Las tarjetas prepagadas son ideales para quienes no desean vincular su cuenta bancaria. Puedes cargarlas con el monto que elijas y usarla como una tarjeta de débito. ¿Te gustaría hacer otra consulta?";
            }
            // Si no entendemos la entrada, pedimos al usuario que elija un tipo válido
            else {
                return "No entendí el tipo de tarjeta que mencionaste. Por favor, elige entre 'débito', 'crédito', o 'prepagada'.";
            }
        }

        if (currentState === "¿Cómo solicito una tarjeta?") {
            currentState = "Elegir tipo de tarjetas";
            return "Elija la tarjeta que desea solicitar entre crédito, débito y prepagada.";
        }

        if (currentState === "Elegir tipo de tarjetas") {
            // Normalizamos la entrada del usuario, convirtiendo todo a minúsculas y eliminando caracteres no alfabéticos.
            let userInputNormalized = userInput.trim().toLowerCase().replace(/[^\w\s]/g, '');

            console.log("Estado actual:", currentState);
            console.log("Entrada normalizada:", userInputNormalized);

            // Dependiendo del tipo de tarjeta elegido, mostramos el siguiente paso
            if (userInputNormalized === "debito" || userInputNormalized === "débito") {
                currentState = "start"; // Reiniciar el flujo después de dar la respuesta
                return "Para solicitar una tarjeta de débito, solo necesitas tener una cuenta en el banco. ";
            } 
            else if (userInputNormalized === "credito" || userInputNormalized === "crédito") {
                currentState = "start"; // Reiniciar el flujo después de dar la respuesta
                return "Para solicitar una tarjeta de crédito, necesitamos verificar tu historial crediticio. ¿Te gustaría hacer otra consulta? ";
            }
            else if (userInputNormalized === "prepagada") {
                currentState = "start"; // Reiniciar el flujo después de dar la respuesta
                return "Las tarjetas prepagadas pueden ser solicitadas en cualquier oficina del banco o a través de la aplicación. ¿Te gustaría hacer otra consulta? ";
            }
            // Si no entendemos la entrada, pedimos al usuario que elija un tipo válido
            else {
                return "No entendí el tipo de tarjeta que mencionaste. Por favor, elige entre 'débito', 'crédito', o 'prepagada'. ¿Te gustaría hacer otra consulta? ";
            }
        }

        if (currentState === "¿Cómo puedo comunicarme con el banco?") {
            currentState = "Elegir método de comunicación";
            return "¿Qué método te gustaría utilizar?";
        }

        if (currentState === "Elegir método de comunicación") {
            // Normalizamos la entrada del usuario
            let userInputNormalized = userInput.trim().toLowerCase().replace(/[^\w\s]/g, ''); 

            console.log("Estado actual:", currentState);
            console.log("Entrada normalizada:", userInputNormalized);

            // Dependiendo del método elegido, mostramos más detalles
            if (userInputNormalized.includes("telefono") || userInputNormalized.includes("llamar")) {
                currentState = "start"; // Reiniciar el flujo después de dar la respuesta
                return "Puedes llamarnos al número de atención al cliente: 800-123-4567. Nuestro horario de atención es de lunes a viernes, de 9 AM a 6 PM. ¿Te gustaría hacer otra consulta?";
            } 
            else if (userInputNormalized.includes("correo") || userInputNormalized.includes("email")) {
                currentState = "start"; // Reiniciar el flujo después de dar la respuesta
                return "También puedes enviarnos un correo electrónico a soporte@banco.com. Te responderemos en un plazo de 24 a 48 horas. ¿Te gustaría hacer otra consulta?";
            }
            else if (userInputNormalized.includes("sucursal") || userInputNormalized.includes("oficina")) {
                currentState = "start"; // Reiniciar el flujo después de dar la respuesta
                return "Si prefieres venir en persona, puedes visitarnos en cualquiera de nuestras sucursales. Consulta nuestra página web para encontrar la más cercana a tu ubicación. ¿Te gustaría hacer otra consulta?";
            }
            // Si no entendemos la entrada, pedimos al usuario que elija un método válido
            else {
                return "No entendí el método de contacto que mencionaste. Por favor, elige entre 'teléfono', 'correo electrónico', o 'sucursal'.";
            }
        }

        if (currentState === "¿Cuáles son los requisitos para solicitar un crédito?") {
            currentState = "Explicar requisitos crédito";
        }

        if (currentState === "Explicar requisitos crédito") {
            
            let userInputNormalized = userInput.trim().toLowerCase().replace(/[^\w\s]/g, ''); 

            console.log("Estado actual:", currentState);
            console.log("Entrada normalizada:", userInputNormalized);

            
            if (userInputNormalized.includes("si") || userInputNormalized === "quiero saber" || userInputNormalized === "sí") {
                currentState = "start"; // Reiniciar el flujo después de dar la respuesta
                return "Los requisitos generales para solicitar un crédito son los siguientes:\n" +
                    "1. Ser mayor de 18 años.\n" +
                    "2. Tener un documento de identidad válido.\n" +
                    "3. Tener un historial crediticio positivo o aceptable. (dependiendo del tipo de crédito)\n" +
                    "4. Tener una fuente de ingresos estable y verificable.\n" +
                    "5. Dependiendo del tipo de crédito, puede ser necesario presentar garantías o cofirmantes,\n" +
                    "\n¿Te gustaría saber más sobre algún aspecto en particular de los requisitos?";
            } 
            // Si el usuario no muestra interés o no entiende la respuesta, pedimos más detalles
            else {
                return "No entendí muy bien tu respuesta. Si quieres saber más sobre los requisitos para solicitar un crédito, solo responde 'sí' o 'quiero saber'.";
            }
        }

        if (currentState === "¿Cómo puedo calcular una cuota?") {
            currentState = "Pedir monto del préstamo";
            return "Para calcular la cuota, necesito saber el monto del préstamo. ¿Cuál es el monto que deseas pedir?";
        }

        if (currentState === "Pedir monto del préstamo") {
            // Se espera que el usuario ingrese el monto
            loanAmount = parseFloat(userInput);  // Guardamos el monto
            currentState = "Pedir tasa de interés";
            return "¿Cuál es la tasa de interés anual (en porcentaje) para el préstamo?";
        }

        if (currentState === "Pedir tasa de interés") {
            // Se espera que el usuario ingrese la tasa de interés
            interestRate = parseFloat(userInput) / 100;  // Convertimos el porcentaje en decimal
            currentState = "Pedir plazo del préstamo";
            return "¿En cuántos meses deseas pagar el préstamo? (Por ejemplo, 12 meses, 24 meses, etc.)";
        }

        if (currentState === "Pedir plazo del préstamo") {
            // Se espera que el usuario ingrese el número de meses
            numberOfPayments = parseInt(userInput);  // Guardamos el número de pagos
            currentState = "Calcular cuota";
            return "Estoy calculando la cuota para el préstamo. Un momento...";
        }

        if (currentState === "Calcular cuota") {
            // Realizamos el cálculo de la cuota
            let monthlyInterestRate = interestRate / 12;  // Convertimos la tasa anual a mensual
            let monthlyPayment = loanAmount * (monthlyInterestRate * Math.pow(1 + monthlyInterestRate, numberOfPayments)) / (Math.pow(1 + monthlyInterestRate, numberOfPayments) - 1);
            currentState = "start";  // Reiniciar el flujo

            return `Tu cuota mensual para un préstamo de $${loanAmount} con una tasa de interés anual del ${interestRate * 100}% y un plazo de ${numberOfPayments} meses es de $${monthlyPayment.toFixed(2)}. ¿Te gustaría hacer mas preguntas o quieres aclarar otra duda?`;
        }

        if (currentState === "¿Qué pasa si no puedo pagar una cuota?") {
            // Normalizamos la entrada del usuario
            let userInputNormalized = userInput.trim().toLowerCase().replace(/[^\w\s]/g, ''); 

            console.log("Estado actual:", currentState);
            console.log("Entrada normalizada:", userInputNormalized);

            // Dependiendo de la respuesta del usuario, mostramos la información sobre opciones o consecuencias
            if (userInputNormalized === "si" || userInputNormalized === "quiero saber" || userInputNormalized === "sí") {
                currentState = "Explicar consecuencias impago cuota"; // Reiniciar el flujo después de dar la respuesta
                return " Dependiendo del tipo de crédito, el banco podría ofrecerte opciones como reestructurar tu deuda, extender el plazo o establecer un plan de pagos más accesible. ¿Te gustaría saber más sobre cómo solicitar una reestructuración de deuda o ver las opciones disponibles?";
            } 
            else if (userInputNormalized === "no" || userInputNormalized === "no quiero saber") {
                currentState = "Explicar consecuencias impago cuota"; // Reiniciar el flujo después de dar la respuesta
                return "Entendido. Si en algún momento necesitas más información, no dudes en preguntarnos. ¿Te gustaría saber algo más sobre otros temas o servicios?";
            } 
            else {
                return "No entendí muy bien tu respuesta. Si quieres saber más sobre lo que pasa si no puedes pagar una cuota, responde 'sí' o 'quiero saber'.";
            }
        }

        if (currentState === "Explicar consecuencias impago cuota") {
            // Normalizamos la entrada del usuario
            let userInputNormalized = userInput.trim().toLowerCase().replace(/[^\w\s]/g, ''); 

            console.log("Estado actual:", currentState);
            console.log("Entrada normalizada:", userInputNormalized);

            // Dependiendo de la respuesta del usuario, mostramos las consecuencias del impago
            if (userInputNormalized === "si" || userInputNormalized === "quiero saber" || userInputNormalized === "sí") {
                currentState = "start"; // Reiniciar el flujo después de dar la respuesta
                return "El impago de una cuota puede traer consecuencias como:\n" +
                    "1. **Cobro de intereses moratorios.**\n" +
                    "2. **Afectación en tu historial crediticio.**\n" +
                    "3. **Ejecutar garantías o cofirmantes.**\n" +
                    "\nLo mejor es siempre tratar de comunicarte con el banco para evitar estos problemas. ¿Te gustaría saber algo más sobre otros temas o servicios?";
            } 
            else if (userInputNormalized === "no" || userInputNormalized === "no quiero saber") {
                currentState = "start"; // Reiniciar el flujo después de dar la respuesta
                return "Entendido. Si en algún momento necesitas más información, no dudes en preguntarnos. ¿Te gustaría saber algo más sobre otros temas o servicios?";
            }
            else {
                return "No entendí muy bien tu respuesta. Si quieres saber más sobre las consecuencias de no pagar una cuota, responde 'sí' o 'quiero saber'.";
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