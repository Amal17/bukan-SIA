  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Master Mahasiswa <span style="font-size: 15px"><?=$t?></span></h1>

          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">List Mahasiswa</div>
            <div class="card-body">
              <form method="POST" action="<?=base_url('ak/mahasiswa/tampil')?>">
              <div class="form-group row">
                <label class="col-sm-2 col-form-label">Angkatan</label>
                <div class="col-sm-2">
                  <select class="custom-select" name="angkatan">
                    <?=$a?>
                  </select>
                </div>
                <label class="col-sm-1 col-form-label">Jurusan</label>
                <div class="col-sm-4">
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
      </div>

      <div class="row">
        <div class="col-7">
          <div class="card">
            <div class="card-header">Tambah Mahasiwa</div>
            <div class="card-body">
              <form class="form-horizontal" method="POST" action="<?=base_url('Ak/mahasiswa/tambah')?>">
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
                    <label class="col-sm-3 col-form-label">Nama</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" name="nama" placeholder="Nama">
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