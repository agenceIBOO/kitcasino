

			<!-- footer -->
			<footer  class="footer" role="contentinfo">
				<div id="comment-ca-marche">
					<div class="wrapper">
						<h3>Comment ça marche ?</h3>
						<table>
							<tr>
								<td>1. <?php 
											echo get_field('etape_1', 71) ;
										?>

								</td>
								<td>2. <?php 
											echo get_field('etape_2', 71) ;
										?></td>
								<td>3. <?php 
											echo get_field('etape_3', 71) ;
										?> </td>
							</tr>
						</table>

						<p id="devis-bouton"><a href='http://www.kit-casino.fr/wordpress/tarifs-et-devis'> Devis en ligne</a></p>
					</div>
				</div>

				<div id="low-footer">
					<div class="wrapper">
						<div>
							<h4>Zones de dépot</h4>
							<p>LOGNES (77185)</p>
							<p>BOULOGNE-BILLANCOURT (xxxxx)</p>
						</div>

						<div>
							<h4>Nos partenaires</h4>
							<p><a href="#">Casino magic</a></p>
							<p><a href="#">Super traiteur</a></p>
						</div>

						<div>
							<h4>Kit Casino</h4>
							<p>Mentions légales</p>
							<p>L'association</p>
							<p>Rejoignez nous sur : <a href="#fb">FB</a></p>
						</div>
					</div>
				</div>

				

			</footer>
			<!-- /footer -->

		<?php wp_footer(); ?>

		<!-- analytics -->
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
