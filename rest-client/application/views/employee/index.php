<div class="container">
  <div class="row">
    <?php if ( $this->session->flashdata("flash") ) : ?>
      <div class="col-12">
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          The data employee <strong>success</strong> <?= $this->session->flashdata("flash"); ?>.
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      </div>
    <?php endif; ?>  
  </div>
  <div class="row">
    <div class="col-12">
      <a
        href="<?= base_url(); ?>employee/add"
        class="btn btn-sm btn-primary"
      >
        Add Employee
      </a>
    </div>
  </div>
  <div class="row">
    <div class="col-12">
      <?php if(empty($employees)) : ?>
        <div class="alert alert-danger" role="alert">
          The data not found ...
        </div>
      <?php endif; ?>
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
            <?php foreach($employees as $employee) : ?>
              <tr>
                <td class="text-center"><?= $no; ?></td>
                <td>
                  <a href="<?= base_url(); ?>employee/detail/<?= $employee["id"]; ?>">
                    <?= $employee["name"]; ?>
                  </a>
                </td>
                <td><?= $employee["position"]; ?></td>
                <td><?= $employee["division"]; ?></td>
                <td>
                <a
                    href="<?= base_url(); ?>employee/edit/<?= $employee["id"]; ?>"
                    class="btn btn-primary btn-sm"
                  >
                    edit
                  </a>
                  <a
                    href="<?= base_url(); ?>employee/del/<?= $employee["id"]; ?>"
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