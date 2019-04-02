<div class="container">
  <div class="row">
    <div class="col-12">
      <?= Flasher::flash(); ?>
    </div>
    <div class="col-12">
      <!-- Button trigger modal -->
      <button
        type="button"
        class="btn btn-primary btn-sm"
        data-toggle="modal"
        data-target="#exampleModal"
        id="mvc-add-btn"
      >
        Add Employee
      </button>
      <form action="<?= BASEURL; ?>/employee/search" method="post">
        <div class="input-group mb-3">
          <input
            type="text"
            name="keyword"
            id="keyword"
            class="form-control"
            placeholder="serach employee ..."
            autocomplete="off"
          >
          <div class="input-group-append">
            <button
              class="btn btn-primary"
              type="submit"
              id="search-btn"
            >
              Button
            </button>
          </div>
        </div>
      </form>  
      <div class="emp-table">
        <table>
          <thead>
            <tr>
              <th class="text-center">No</th>
              <th>Name</th>
              <th>Position</th>
              <th>Division</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            <?php $no = 1; ?>
            <?php foreach($data["employees"] as $employee) : ?>
              <tr>
                <td class="text-center"><?= $no; ?></td>
                <td>
                  <a href="<?= BASEURL; ?>/employee/detail/<?= $employee["id"]; ?>">
                    <?= $employee["name"]; ?>
                  </a>
                </td>
                <td><?= $employee["position"]; ?></td>
                <td><?= $employee["division"]; ?></td>
                <td>
                  <button
                    data-toggle="modal"
                    data-target="#exampleModal"
                    data-id="<?= $employee["id"]; ?>"
                    class="btn btn-primary btn-sm mvc-edit-btn"
                  >
                    edit
                  </button>
                  <a
                    href="<?= BASEURL; ?>/employee/del/<?= $employee["id"]; ?>"
                    class="btn btn-danger btn-sm"
                    onClick="return confirm('are you sure ?')"
                  >
                    delete
                  </a>
                </td>
              </tr>
            <?php $no++; ?>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Employee</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?= BASEURL; ?>/employee/add" method="post">
          <input type="hidden" name="id" id="id">
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
          </div>
      </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Add</button>
          </div>
        </form>
    </div>
  </div>
</div>