  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Master Kelas <span style="font-size: 15px"><?=$t?></span></h1>

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
              <form method="POST" action="<?=base_url('ak/kelas/tampil')?>">
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">Jurusan</label>
                <div class="col-sm-6">
                  <input type="text" hidden name="ta" value="<?=$ta?>">
                  <select class="custom-select" name="jurusan">
                    <?=$j?>
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
        <div class="col-5">
          <div class="card">
            <div class="card-header">Status KRS</div>
            <div class="card-body">
              <form method="POST" action="<?=base_url('ak/kelas/status_krs')?>">
              <div class="form-group row">
                <div class="col-sm-6">
                  <select class="custom-select" name="status">
                    <?=$cs?>
                  </select>
                </div>
                <div class="col-sm-1">
                  <button type="submit" class="btn btn-info">Simpan</button>
                </div>
              </div>
              </form>
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-7">
          <div class="card">
            <div class="card-header">Tambah Kelas</div>
            <div class="card-body">
              <form class="form-horizontal" method="POST" action="<?=base_url('Ak/kelas/tambah')?>">
                <div class="card-body">
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Jurusan</label>
                    <div class="col-sm-8">
                      <select class="custom-select" name="jurusan">
                        <?=$j?>
                      </select>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Kelas</label>
                    <div class="col-sm-8">
                      <input type="text" hidden name="ta" value="<?=$ta?>">
                      <input type="text" class="form-control" name="kelas" placeholder="Kelas">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">SKS</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" name="sks" placeholder="SKS">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Dosen</label>
                    <div class="col-sm-8">
                      <select class="custom-select" name="dosen">
                        <?=$d?>
                      </select>
                    </div>
                  </div>
                </div>
            </div>
            <div class="card-footer">
              <button type="submit" class="btn btn-success  float-right">Simpan</button> 
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>