  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Master Jurusan | Tambah Jurusan</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-7">
          <div class="card">
            <div class="card-body">
              <form class="form-horizontal" method="POST" action="<?=base_url('Ak/jurusan/tambah_jurusan')?>">
                <div class="card-body">
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">KODE</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" name="kode" placeholder="KODE">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Jurusan</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" name="jurusan" placeholder="Jurusan">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Fakultas</label>
                    <div class="col-sm-8">
                      <select class="custom-select" name="fakultas">
                        <?=$c?>
                      </select>
                    </div>
                  </div>
                </div>
            </div>
            <div class="card-footer">
              <button type="submit" class="btn btn-success  float-right">Simpan</button> 
              </form>
              <a href="<?=base_url('ak/jurusan')?>"><button class="btn btn-info">Cancel</button></a>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>