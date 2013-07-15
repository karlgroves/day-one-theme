</main>
<footer>
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
</body>
</html>