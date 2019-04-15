<div class="container">
  <div class="row">
    <div class="col-12">
      <div class="card" style="width: 18rem;">
        <div class="card-body">
          <h5 class="card-title"><?= $employee["name"]; ?></h5>
          <h6 class="card-subtitle mb-2 text-muted"><?= $employee["position"]; ?></h6>
          <p class="card-text"><?= $employee["division"]; ?></p>
          <a href="<?= base_url(); ?>employee" class="card-link">Back</a>
        </div>
      </div>
    </div>
  </div>
</div>
