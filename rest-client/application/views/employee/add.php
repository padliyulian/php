<div class="container">
  <div class="row">
    <div class="col-12">
      <div>
        <form action="" method="post">
          <div class="form-group">
            <label for="name">Name</label>
            <input
              type="text"
              class="form-control"
              id="name"
              name="name"
              aria-describedby="emailHelp"
              placeholder="Enter name"
            >
            <small class="form-text text-danger"><?= form_error("name"); ?></small>
          </div>
          <div class="form-group">
            <label for="position">Position</label>
            <select class="form-control" id="position" name="position">
              <option value="">-- select position --</option>
              <option value="UI/UX">UI/UX</option>
              <option value="Front End">Front End</option>
              <option value="Back End">Back End</option>
              <option value="SQA">SQA</option>
              <option value="DevOps">DevOps</option>
              <option value="Project Manager">Project Manager</option>
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
              aria-describedby="emailHelp"
              placeholder="Enter division"
            >
            <small class="form-text text-danger"><?= form_error("division"); ?></small>
          </div>
          <div class="form-group">
            <button class="btn btn-sm btn-primary">
              Add
            </button>
          </div>
        </form>  
      </div>
    </div>
  </div>
</div>