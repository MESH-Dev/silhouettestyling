</div><!-- #page -->

<footer class="site-footer <?php if( is_page_template('templates/homepage-fullscreen.php') ) { echo "footer-fullscreen"; } ?> <?php if (is_404()){ ?> footer-404 <?php } ?>">

	<div class=""><!-- container -->
		<div class="row">
			<div class="twelve columns">
				<p>Copyright <?php echo date('Y');?> Silhouette Styling. Site by <a href="http://meshfresh.com" target="_blank">MESH</a></p>
			</div><!-- End of Footer -->
		</div>
	</div>

</footer>

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-66206223-13', 'auto');
  ga('send', 'pageview');

</script>

<?php wp_footer(); ?>

</body>
</html>
