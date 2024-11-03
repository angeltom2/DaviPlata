<footer class="footer-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4 text-center">
                <button class="btn-volver" onclick="scrollToTop();"><i class="fas fa-arrow-up"></i> Volver</button>
            </div>
        </div>
        <div class="social-icons">
            <a href="#" class="social-icon"><i class="fab fa-facebook-f"></i></a>
            <a href="#" class="social-icon"><i class="fab fa-twitter"></i></a>
            <a href="#" class="social-icon"><i class="fab fa-instagram"></i></a>
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