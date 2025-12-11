<?= $this->extend('template/template-backend-admin') ?>
<?= $this->section('content') ?>

 <div class="col-sm-12"
    <div class="card">
          <div class="card-header">
            <h3>DataTables</h3>
          </div>
          <div class="card-body p-0">
            <table id="example2" class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Sekolah</th>
                        <th>Action</th>
                    </tr>
                </thead>
            </table>
          </div>
        </div>

<?= $this->endSection() ?>