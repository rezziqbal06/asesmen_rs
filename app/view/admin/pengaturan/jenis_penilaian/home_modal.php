<!-- modal option -->
<div id="modal_option" class="modal fade " tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-md">
		<div class="modal-content">

			<!-- Modal Header -->
			<div class="modal-header text-center">
				<h2 class="modal-title">Aksi </h2>
				<h5 id="t"></h5>
			</div>
			<!-- END Modal Header -->

			<!-- Modal Body -->
			<div class="modal-body">
				<div class="row">
					<div class="col-xs-12 btn-group-vertical">
						<a id="adetail" href="#" class="btn btn-info btn-left"><i class="fa fa-info"></i> Detail</a>
						<a id="aedit" href="#" class="btn btn-primary btn-left"><i class="fa fa-pencil"></i> Edit</a>
						<button id="bhapus" type="button" class="btn btn-danger btn-left btn-submit"><i class="fa fa-trash-o icon-submit"></i> Hapus</button>
					</div>
				</div>
				<div class="row" style="margin-top: 1em; ">
					<div class="col-md-12" style="border-top: 1px #afafaf dashed;">&nbsp;</div>
					<div class="col-xs-12 btn-group-vertical" style="">
						<button type="button" class="btn btn-default btn-block text-left" data-dismiss="modal" id="btn_close_modal"><i class="fa fa-close"></i> Tutup</button>
					</div>
				</div>
				<!-- END Modal Body -->
			</div>
		</div>
	</div>
</div>

<!-- modal tambah -->
<div id="modal_tambah" class="modal fade " tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">

			<!-- Modal Header -->
			<div class="modal-header text-center">
				<h2 class="modal-title">Tambah</h2>
			</div>
			<!-- END Modal Header -->

			<!-- Modal Body -->
			<div class="modal-body">
				<form action="" method="POST" id="ftambah">
					<div class="row">
						<div class="form-group">
							<div class="row">
								<div class="col-md-12">
									<label for="inama" class="control-label">Nama</label>
									<input id="inama" type="text" name="nama" class="form-control" required>
								</div>
								<div class="col-md-12">
									<label for="ideskripsi" class="control-label">Deskripsi</label>
									<textarea name="deskripsi" id="ideskripsi" class="form-control" cols="30" rows="10"></textarea>
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="row float-end">
								<div class="col-md-2">
									<button id="btn_tambah_indikator" class="btn btn-info"><i class="fa fa-plus"></i></button>
								</div>
							</div>
							<div id="panel_indikator">
								<div id="row_indikator_0" class="row">
									<div class="col-md-4">
										<label for="ikategori_0" class="control-label">Kategori</label>
										<input id="ikategori_0" type="text" name="kategori[]" class="form-control">
									</div>
									<div class="col-md-8">
										<label for="inama_indikator_0" class="control-label">Nama</label>
										<input id="inama_indikator_0" type="text" name="nama_indikator[]" class="form-control">
									</div>
									<div class="col-md-9">
										<label for="itype_0" class="control-label">Tipe</label>
										<select id="itype_0" type="text" name="type[]" class="form-control">
											<option value="indikator">indikator</option>
											<option value="aksi">aksi</option>
										</select>
									</div>
									<div class="col-md-3">
										<label for="" class="control-label">Aksi</label>
										<input type="button" class="btn btn-danger btn-remove-row" value="-" data-id="0">
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="row" style="margin-top: 1em; ">
						<div class="col-md-12" style="border-top: 1px #afafaf dashed;">&nbsp;</div>
						<div class="col-xs-12 btn-group-vertical" style="">
							<button type="submit" class="btn btn-default btn-block text-left" data-dismiss="modal"><i class="fa fa-save"></i> Simpan</button>
						</div>
					</div>
				</form>
				<!-- END Modal Body -->
			</div>
		</div>
	</div>
</div>

<!-- modal edit -->
<div id="modal_edit" class="modal fade " tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">

			<!-- Modal Header -->
			<div class="modal-header text-center">
				<h2 class="modal-title">Edit</h2>
			</div>
			<!-- END Modal Header -->

			<!-- Modal Body -->
			<div class="modal-body">
				<form action="" method="POST" id="fedit">
					<div class="row">
						<div class="form-group">
							<input type="hidden" name="id" id="ieid">
							<div class="row">
								<div class="col-md-6">
									<label for="ienama" class="control-label">Nama</label>
									<input id="ienama" type="text" name="nama" class="form-control" required>
								</div>
								<div class="col-md-6">
									<label for="ie_kd" class="control-label">Kode</label>
									<input id="iekd" type="text" name="kd" class="form-control" required>
								</div>

							</div>
							<div class="col-md-12">
								<label for="iedeskripsi" class="control-label">Deskripsi</label>
								<textarea name="deskripsi" id="iedeskripsi" class="form-control" cols="30" rows="10"></textarea>
							</div>
						</div>
					</div>
					<div class="row" style="margin-top: 1em; ">
						<div class="col-md-12" style="border-top: 1px #afafaf dashed;">&nbsp;</div>
						<div class="col-xs-12 btn-group-vertical" style="">
							<button type="submit" class="btn btn-default btn-block text-left" data-dismiss="modal"><i class="fa fa-save"></i> Simpan</button>
						</div>
					</div>
				</form>
				<!-- END Modal Body -->
			</div>
		</div>
	</div>
</div>