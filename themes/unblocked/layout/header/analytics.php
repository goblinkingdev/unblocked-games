<?php $google_analystic = \helper\options::options_by_key_type('google_analystic'); ?>
<?php if ((!isset($_SERVER['HTTP_USER_AGENT']) || stripos($_SERVER['HTTP_USER_AGENT'], 'Speed Insights') === false) && $google_analystic != '') : ?>
	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=<?php echo $google_analystic; ?>"></script>
	<script>
		window.dataLayer = window.dataLayer || [];

		function gtag() {
			dataLayer.push(arguments);
		}
		gtag('js', new Date());

		gtag('config', '<?php echo $google_analystic; ?>');
	</script>
<?php endif; ?>