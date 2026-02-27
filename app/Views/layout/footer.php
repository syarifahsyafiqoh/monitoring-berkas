    </div> <!-- end container / container-fluid -->

    <!-- HARUS PALING ATAS: Bootstrap Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Baru boleh script lain -->
    <?php if (file_exists(FCPATH . 'assets/js/scripts.js')): ?>
        <script src="<?= base_url('assets/js/scripts.js') ?>"></script>
    <?php endif; ?>

</body>
</html>