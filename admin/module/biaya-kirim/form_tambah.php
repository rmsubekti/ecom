
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-info">
                <div class="box-header">
                    <h3 class="box-title">Biaya Kirim
                        <small>Tambah Biaya Kirim</small>
                    </h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body pad">
                    <form action="../admin/module/biaya-kirim/aksi_simpan.php" method="POST" class="form-horizontal">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="kota" class="col-sm-2 control-label">Kota</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" placeholder="Nama Kota" id="kota" name="kota">
                                </div>
                                <label for="biaya" class="col-sm-2 control-label">Biaya Kirim</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" placeholder="Biaya Kirim" id="biaya" name="biaya">
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