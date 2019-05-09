
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-info">
                <div class="box-header">
                    <h3 class="box-title">Kategori
                        <small>Tambah Kategori</small>
                    </h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body pad">
                    <form action="../admin/module/kategori/aksi_simpan.php" method="POST" class="form-horizontal">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="namaKategori" class="col-sm-2 control-label">Nama Kategori</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" placeholder="Nama Kategori" id="namaKategori" name="namaKategori">
                                </div>
                            </div>
                        </div>
                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary pull-right">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col-->
    </div>
    <!-- ./row -->
</section>
<!-- /.content -->