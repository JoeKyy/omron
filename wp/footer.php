    <footer>
        <div class="footer__menu">
            <div class="container">
                <div class="row">
                    <div class="col-xl mb-5">
                        <?php if(!function_exists('dynamic_sidebar') || !dynamic_sidebar('widget-area-1')) ?>
                    </div>
                    <div class="col-xl mb-5">
                        <?php if(!function_exists('dynamic_sidebar') || !dynamic_sidebar('widget-area-2')) ?>
                    </div>
                    <div class="col-xl mb-5">
                        <?php if(!function_exists('dynamic_sidebar') || !dynamic_sidebar('widget-area-3')) ?>
                    </div>
                    <div class="col-xl-3 mb-5">
                        <?php if(!function_exists('dynamic_sidebar') || !dynamic_sidebar('widget-area-4')) ?>
                    </div>
                    <div class="col-xl-3 mb-5">
                        <?php if(!function_exists('dynamic_sidebar') || !dynamic_sidebar('widget-area-5')) ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-8 m-auto">
                        <div class="row align-items-center justify-items-center">
                            <div class="col-xl-5">
                                <h1 class="footer__logo">
                                    <a href="#">Omron</a>
                                </h1>
                            </div>
                            <div class="col-xl-2">
                                <span class="footer__tecnologia_japonesa">
                                    Tecnologia Japonesa
                                </span>
                            </div>
                            <div class="col-xl-5">
                                <p class="h4">Conectada em você</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer__bottom-menu align-items-center justify-items-center">
            <nav>
                <ul>
                    <li>
						&copy; <?php echo date('Y'); ?> &copy; <?php bloginfo('name'); ?>.
					</li>
                    <li><a href="">Privacidade e Cookies</a></li>
                    <li><a href="">Contato</a></li>
                </ul>
            </nav>
        </div>
    </footer>
    <!--build:js js/main.min.js -->
    <script src="<?php echo get_template_directory_uri(); ?>/js/main.min.js"></script>
    <!-- endbuild -->
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://cdn.jsdelivr.net/g/html5shiv@3.7.3(html5shiv.min.js+html5shiv-printshiv.min.js),respond@1.4.2"></script>
    \<![endif]-->

	<?php wp_footer(); ?>

	<script>
		(function(f,i,r,e,s,h,l){i['GoogleAnalyticsObject']=s;f[s]=f[s]||function(){
		(f[s].q=f[s].q||[]).push(arguments)},f[s].l=1*new Date();h=i.createElement(r),
		l=i.getElementsByTagName(r)[0];h.async=1;h.src=e;l.parentNode.insertBefore(h,l)
		})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
		ga('create', 'UA-XXXXXXXX-XX', 'yourdomain.com');
		ga('send', 'pageview');
	</script>
</body>

</html>