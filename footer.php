

	</div> <!-- end of #main  -->
    
  </div> <!-- end of #container -->
  
  <!-- Javascript at the bottom for fast page loading -->
  
  <!-- Grab Google CDN's jQuery. fall back to local if necessary -->
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
  <script>!window.jQuery && document.write('<script src="<?php bloginfo('template_url'); ?>/js/libs/jquery-1.6.2.min.js"><\/script>')</script>


  <script src="<?php bloginfo('template_url'); ?>/js/plugins.js?v=1"></script>
  <script src="<?php bloginfo('template_url'); ?>/js/script.js?v=1"></script>

  <!-- Prompt IE 6 users to install Chrome Frame. Remove this if you want to support IE 6.
       chromium.org/developers/how-tos/chrome-frame-getting-started -->
  <!--[if lt IE 7 ]>
    <script src="//ajax.googleapis.com/ajax/libs/chrome-frame/1.0.3/CFInstall.min.js"></script>
    <script>window.attachEvent('onload',function(){CFInstall.check({mode:'overlay'})})</script>
  <![endif]-->

  <!-- wp_footer() content added by plugins -->
  <!-- Do not remove this, it's required for certain plugins which generally use this hook to reference JavaScript files. -->
	
  <?php wp_footer(); ?>

</body>
</html>
