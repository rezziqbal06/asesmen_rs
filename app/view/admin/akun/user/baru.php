<div id="page-content">
    <!-- Static Layout Header -->
    <div class="content-header">
        <div class="row" style="">
            <div class="col-md-6">
                <div class="btn-group">
                    <button type="button" onclick="history.back()" class="btn btn-info btn-submit"><i class="fa fa-arrow-left icon-submit"></i> Kembali</button>
                </div>
            </div>
            <div class="col-md-6">

            </div>
        </div>
    </div>

    <!-- Content -->
    <div class="card">

        <div class="card-header">
            <h6><strong>Daftar User</strong></h6>
        </div>

        <div class="card-body">

            <form id="ftambah" action="<?= base_url_admin() ?>" method="post" enctype="multipart/form-data" class="form-bordered form-horizontal" onsubmit="return false;">
                <div class="form-group row">
                    <div class="col-md-4">
                        <label for="iis_active" class="control-label">Aktif?</label>
                        <select id="iis_active" name="is_active" class="form-control">
                            <option value="1">Ya</option>
                            <option value="0">Tidak</option>
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-12">
                        <label for="ifnama" class="control-label">Nama Lengkap Kustomer</label>
                        <input type="text" name="fnama" id="ifnama" class="form-control" placeholder="Nama Kustomer">
                    </div>
                </div>

                <!-- <div class="form-group row">
                    <div class="col-md-6">
                        <label for="ialamat_select" class="control-label">Cari Alamat</label>
                        <select id="ialamat_select" class="form-control select2"></select>
                    </div>
                </div> -->
                <div class="form-group row">
                    <div class="col-md-4">
                        <label for="inegara">Negara *</label>
                        <input id="inegara" class="form-control" name="negara" value="INDONESIA" required>
                    </div>
                    <div class="col-md-4">
                        <label for="iprovinsi">Provinsi *</label>
                        <input id="iprovinsi" class="form-control" name="provinsi" required>
                    </div>
                    <div class="col-md-4">
                        <label for="ikabkota">Kabupaten / Kota *</label>
                        <input id="ikabkota" class="form-control" name="kabkota" required>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-4">
                        <label for="ikecamatan">Kecamatan *</label>
                        <input id="ikecamatan" class="form-control" name="kecamatan" required>
                    </div>
                    <div class="col-md-4">
                        <label for="ikelurahan">Desa / Kelurahan *</label>
                        <input id="ikelurahan" class="form-control" name="kelurahan" required>
                    </div>
                    <div class="col-md-4">
                        <label for="ialamat">Alamat *</label>
                        <textarea id="ialamat" class="form-control" name="alamat" maxlength="30" required></textarea>
                    </div>
                    <div class="col-md-4">
                        <label for="ialamat2">Alamat2</label>
                        <textarea id="ialamat2" class="form-control" name="alamat2" maxlength="30"></textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-4">
                        <label for="ikodepos" class="control-label">Kodepos *</label>
                        <input id="ikodepos" class="form-control " name="kodepos" placeholder="Kodepos" required>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-4">
                        <label for="iitelp" class="control-label">Telepon</label>
                        <input id="iitelp" type="number" class="form-control" name="telp" placeholder="Telepon Perusahaan" />
                    </div>
                    <div class="col-md-4">
                        <label for="iemail" class="control-label">Email</label>
                        <input id="iemail" type="email" class="form-control" name="email" placeholder="Email Perusahaan" />
                    </div>
                </div>
                <div class="form-group form-actions">
                    <div class="col-xs-12 text-right">
                        <div class="btn-group pull-right">
                            <button type="submit" class="btn btn-primary btn-submit">
                                Simpan <i class="fa fa-save icon-submit"></i>
                            </button>
                        </div>
                    </div>
                </div>

            </form>
        </div>

    </div>

</div>