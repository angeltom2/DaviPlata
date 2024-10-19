</div>
</main>
<footer class="py-4 bg-light mt-auto">
    <div class="container-fluid px-4">
        <div class="d-flex align-items-center justify-content-between small">
            <div class="text-muted">Copyright &copy; Your Website 2023</div>
            <div>
                <a href="#">Privacy Policy</a>
                &middot;
                <a href="#">Terms &amp; Conditions</a>
            </div>
        </div>
    </div>
</footer>
</div>
</div>

<script src="https://code.jquery.com/jquery-3.7.1.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>

<script>
    const base_url = "<?php echo base_url; ?>";
</script>


<script type="module">
    const base_url = "<?php echo base_url; ?>"; // Asegúrate de definir base_url aquí para que sea accesible

    import { frmUsuario } from '<?php echo base_url; ?>assets/js/funciones.js';    
    window.frmUsuario = frmUsuario; // Haz que la función sea global
</script>

<script type="module">
    const base_url = "<?php echo base_url; ?>"; // Asegúrate de definir base_url aquí para que sea accesible

    import { registrarUser } from '<?php echo base_url; ?>assets/js/funciones.js';    
    window.registrarUser = registrarUser; // Haz que la función sea global
</script>


<script src="<?php echo base_url; ?>assets/js/all.min.js" crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.14.3/dist/sweetalert2.all.min.js"></script>



    
</body>
</html>

