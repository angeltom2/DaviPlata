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

<script src="https://code.jquery.com/jquery-3.7.1.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
<script src="<?php echo base_url; ?>assets/js/VistaClientes.js" crossorigin="anonymous"></script>
<script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>

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