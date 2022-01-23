<?php require_once 'includes/header.php'; ?>
<!-- page title -->
<section class="section py-5 catalog" data-bg="catalog" style="margin-top: -24px !important;">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="section__wrap">
						<!-- section title -->
						<h2 class="section__title py-5">Book Store Catalog</h2>
						<!-- end section title -->

						<!-- breadcrumb -->
						
						<!-- end breadcrumb -->
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- end page title -->

	<!-- about -->
	<section class="section py-5 text-light" style="background: #2B2B31; font-size: 14px;">
  <div class="container">
    <div class="row py-5 justify-content-center text-dark">
      <?php require_once 'allbooks.php';?>
    </div>
  </div>
	</section>
	<!-- end about -->

	<!-- end how it works -->
  <?php require_once 'includes/authentic.php'; ?>


<?php require_once 'includes/footer.php'; ?>