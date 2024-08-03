</div> <!-- End Main Page Content -->
</div> <!-- End Page Content Wrapper -->
<?php require_once FOOTER; ?>
</div> <!-- End Overall Page Container -->

<?php require_once FOOTER_SRCS; ?>

<script>
    $(document).ready(function() {
        let redirectTime = 2700 * 1000;
        idleTimeout = setTimeout(() => location.href = '/?logout=ajax-timeout', redirectTime);
    });
</script>
