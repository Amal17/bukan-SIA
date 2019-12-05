  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Input Nilai</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-7">
          <div class="card">
            <div class="card-header">List Kelas</div>
            <div class="card-body">
              <form method="POST" action="<?=base_url('dosen/tampil_nilai')?>">
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">Kelas</label>
                <div class="col-sm-6">
                  <select class="custom-select" name="kelas">
                    <?=$k?>
                  </select>
                </div>
                <div class="col-sm-1">
                  <button type="submit" class="btn btn-info">Tampilkan</button>
                </div>
              </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->