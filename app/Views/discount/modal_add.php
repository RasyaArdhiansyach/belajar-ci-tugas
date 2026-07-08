<!-- Add Modal Begin -->
<div class="modal fade" id="addModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
	        <div class="modal-header">
	            <h5 class="modal-title">Tambah Data</h5>
	            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
	        </div>
	        <?= form_open(base_url('discount')) ?>
			<?= csrf_field() ?>

			<div class="mb-3">
				<?= form_label('Tanggal') ?>
					<?= form_input([
						'type'=>'date',
						'name'=>'tanggal',
						'class'=>'form-control',
						'required'=>true
					])
				?>
			</div>

			<div class="mb-3">
				<?= form_label('Nominal') ?>
					<?= form_input([
						'type'=>'number',
						'name'=>'nominal',
						'class'=>'form-control',
						'required'=>true
					])
				?>
			</div>

			<?= form_submit('submit','Simpan',['class'=>'btn btn-primary']) ?>
			<?= form_close() ?>
        </div>
    </div>
</div>
<!-- Add Modal End -->