<?php foreach ($discounts as $index => $discount) : ?>    
    <!-- Edit Modal Begin -->
    <div class="modal fade" id="editModal-<?= $discount['id'] ?>" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Data</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <?= form_open(base_url('discount/edit/' . $discount['id'])) ?>
                <?= csrf_field(); ?>

                <div class="modal-body">
                    <div class="mb-3">
                        <?= form_label('Tanggal', 'tanggal'); ?>
                        <?= form_input([
                            'type'=>'date',
                            'name'=>'tanggal',
                            'value'=>$discount['tanggal'],
                            'class'=>'form-control',
                            'readonly'=>true
                        ]) ?>
                    </div>

                    <div class="mb-3">
                        <?= form_label('Nominal', 'nominal'); ?>
                        <?= form_input([
                            'type'=>'number',
                            'name'=>'nominal',
                            'value'=>$discount['nominal'],
                            'class'=>'form-control'
                        ]) ?>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        Close
                    </button>

                    <?= form_submit('submit', 'Simpan', ['class' => 'btn btn-primary']); ?>
                </div>

                <?= form_close(); ?>
            </div>
        </div>
    </div>
    <!-- Edit Modal End -->
<?php endforeach ?>