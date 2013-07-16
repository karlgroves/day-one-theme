</main>
    <footer role="contentinfo">
        <p id="copyright">
            <?php 
            	echo sprintf(__('%1$s %2$s %3$s. All Rights Reserved.', 'dayone'), '&copy;', date('Y'), esc_html(get_bloginfo('name')));
                echo sprintf(__(' Theme By: %1$s.', 'dayone'), '<a href="http://www.karlgroves.com/">Karl Groves</a>');
            ?>
        </p>
    </footer>
</div>
<?php 
    wp_footer(); 
?>
<script src="<?php echo get_template_directory_uri(); ?>/js/dayone.js"></script>
</body>
</html>