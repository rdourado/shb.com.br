	<hr>
	<footer id="foot">
		<nav class="nav-foot">
<?php 		for ( $i = 1; $i <= 4; $i++ ) 
			wp_nav_menu( array(
				'theme_location'  => "footer_$i",
				'container'       => false, 
				'menu_class'      => 'menu-foot', 
				'fallback_cb'     => false,
				'depth'           => 2 )
			); ?>

		</nav>
		<ul class="social-links">
<?php 		if ( $fb = get_field( 'facebook', 'options' ) ) : ?>
			<li class="social-item"><a href="<?php echo $fb; ?>" target="_blank"><img src="<?php t_url(); ?>/img/icon-facebook-gray.png" alt="Facebook" class="social-icon" width="24" height="24"></a></li>
<?php 		endif;
			if ( $tw = get_field( 'twitter', 'options' ) ) : ?>
			<li class="social-item"><a href="<?php echo $tw; ?>" target="_blank"><img src="<?php t_url(); ?>/img/icon-twitter-gray.png" alt="Twitter" class="social-icon" width="24" height="24"></a></li>
<?php 		endif;
			if ( $yt = get_field( 'youtube', 'options' ) ) : ?>
			<li class="social-item"><a href="<?php echo $yt; ?>" target="_blank"><img src="<?php t_url(); ?>/img/icon-youtube-gray.png" alt="Youtube" class="social-icon" width="24" height="24"></a></li>
<?php 		endif; ?>
		</ul>
		<address id="hcard-shb" class="vcard">
			<strong class="fn org">Sociedade Hípica Brasileira</strong><br>
			<span class="adr">
				<span class="street-address">Av. Borges de Medeiros, 2448</span><br>
				Lagoa – <span class="locality">Rio de Janeiro</span> – <span class="region">RJ</span><br>
				CEP <span class="postal-code">22470-050</span>
			</span> | <span class="tel">(21) 2156-0156</span>
		</address>
		<a href="http://mgstudio.com.br/" id="mgstudio" target="_blank">by MG Studio</a>
	</footer>
	<!-- WP/ --><?php wp_footer(); ?><!-- /WP -->
</body>
</html>