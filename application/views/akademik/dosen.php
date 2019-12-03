  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Master Dosen</h1>
          </div>
          <div class="col-sm-6">
            <a href="<?=base_url('ak/dosen/in_dosen')?>"><button class="btn btn-success  float-right">Tambah Dosen Baru</button></a>
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
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>NIP</th>
                  <th>Nama</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                <?=$x?>
                </tbody>
                <tfoot>
                <tr>
                  <th>ID</th>
                  <th>NIP</th>
                  <th>Nama</th>
                  <th>Aksi</th>
                </tr>
                </tfoot>
              </table>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

<!-- Modal Hapus-->
<div class="modal fade" id="myModal" aria-modal="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Hapus Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <center>
          <p>Anda yakin akan menghapus data dosen ini ?</p>
        </center>
      </div>
      <div class="modal-footer">
          <button type="button" class="btn btn-info" data-dismiss="modal"><i class="far fa-times-circle"></i> Close</button>
          <a id="modalDelete" class="btn btn-danger"><i class="far fa-trash-alt"></i> Hapus</a>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- END Modal Hapus-->
