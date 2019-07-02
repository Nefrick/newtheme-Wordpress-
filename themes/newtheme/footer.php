<!-- Footer -->
<footer class="py-5 bg-dark">
    <div class="container">
        <?php wp_nav_menu(['theme_location' => 'footer-menu']); ?>
        <p class="m-0 text-center text-white">
            <?php
            $theme_opts             =   get_option('sj_opts');
            echo $theme_opts['footer'];
            ?>
        </p>
    </div>
    <!-- /.container -->
</footer>

<!-- Bootstrap core JavaScript -->

<?php wp_footer(); ?>
</body>

</html>