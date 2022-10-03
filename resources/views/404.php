<?php include __DIR__ . "/includes/header.php" ?>

<!-- Main content -->
<section class="content mt-auto mb-auto p-5">
  <div class="error-page">
    <h2 class="headline text-warning"> 404</h2>

    <div class="error-content">
      <h3><i class="fas fa-exclamation-triangle text-warning"></i> Oops! Page not found.</h3>

      <p>
        We could not find the page you were looking for.
        Meanwhile, you may <a href="<?= url('welcome'); ?>">return to dashboard</a> or try using the search form.
      </p>

      <form class="search-form">
        <div class="input-group">
          <input type="text" name="search" class="form-control" placeholder="Search">

          <div class="input-group-append">
            <button type="submit" name="submit" class="btn btn-warning"><i class="fas fa-search"></i>
            </button>
          </div>
        </div>
        <!-- /.input-group -->
      </form>
    </div>
    <!-- /.error-content -->
  </div>
  <!-- /.error-page -->
</section>
<!-- /.content -->

<?php include __DIR__ . "/admin/includes/footer.php" ?>