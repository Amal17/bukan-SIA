  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>KRS</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-body">
              <form method="POST" action="<?=base_url('mahasiswa/krs')?>">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>Kelas</th>
                  <th>Dosen</th>
                  <th>Pilih</th>
                </tr>
                </thead>
                <tbody>
                <?=$x?>
                </tbody>
                <tfoot>
                <tr>
                  <th>ID</th>
                  <th>Kelas</th>
                  <th>Dosen</th>
                  <th>Pilih</th>
                </tr>
                </tfoot>
              </table>
              <?php if (isset($x)) {
                 echo '<button type="submit" class="btn btn-success  float-right">Simpan</button>';
              } ?>
              </form>
            </div>
          </div>
        </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->