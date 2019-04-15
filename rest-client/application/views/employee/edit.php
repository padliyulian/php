<div class="container">
  <div class="row">
    <div class="col-12">
      <div>
        <form action="" method="post">
          <input type="hidden" name="id" value="<?= $employee["id"]; ?>">
          <div class="form-group">
            <label for="name">Name</label>
            <input
              type="text"
              class="form-control"
              id="name"
              name="name"
              value="<?= $employee["name"]; ?>"
              aria-describedby="emailHelp"
              placeholder="Enter name"
            >
            <small class="form-text text-danger"><?= form_error("name"); ?></small>
          </div>
          <div class="form-group">
            <label for="position">Position</label>
            <select class="form-control" id="position" name="position">
              <?php foreach($position as $p) : ?>
                <?php if ($p == $employee["position"]) : ?>
                  <option value="<?= $p; ?>" selected><?= $p; ?></option>
                <?php  else : ?> 
                  <option value="<?= $p; ?>"><?= $p; ?></option>
                <?php  endif ; ?>  
              <?php endforeach; ?>
            </select>
            <small class="form-text text-danger"><?= form_error("position"); ?></small>
          </div>
          <div class="form-group">
            <label for="division">Division</label>
            <input
              type="text"
              class="form-control"
              id="division"
              name="division"
              value="<?= $employee["division"]; ?>"
              aria-describedby="emailHelp"
              placeholder="Enter division"
            >
            <small class="form-text text-danger"><?= form_error("division"); ?></small>
          </div>
          <div class="form-group">
            <button class="btn btn-sm btn-primary">
              Update
            </button>
          </div>
        </form>  
      </div>
    </div>
  </div>
</div>