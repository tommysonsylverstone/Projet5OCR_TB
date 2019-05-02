<footer>
	<div class="container">
		<div class="row">
			<div class="col-lg-8 col-md-10 mx-auto">
				<ul class="list-inline text-center">
					<li class="list-inline-item">
						<a href="https://www.linkedin.com/in/benjamin-tenreiro-1563a2173/" target="_blank">
							<span class="fa-stack fa-lg">
								<i class="fas fa-circle fa-stack-2x"></i>
								<i class="fab fa-linkedin fa-stack-1x fa-inverse"></i>
							</span>
						</a>
					</li>
					<li class="list-inline-item">
						<a href="https://www.github.com/tommysonsylverstone/" target="_blank">
							<span class="fa-stack fa-lg">
								<i class="fas fa-circle fa-stack-2x"></i>
								<i class="fab fa-github fa-stack-1x fa-inverse"></i>
							</span>
						</a>
					</li>
					<?php if ($user->isAdmin()) { ?>
						<li class="list-inline-item">
							<a href="?action=administration">
								<span class="fa-stack fa-lg">
									<i class="fas fa-circle fa-stack-2x"></i>
									<i class="fa fa-cogs fa-stack-1x fa-inverse"></i>
								</span>
							</a>
						</li>
					<?php } ?>				
				</ul>
				<p class="copyright text-muted">Copyright &copy; Mon Blog 2019</p>
			</div>
		</div>
	</div>
</footer>
