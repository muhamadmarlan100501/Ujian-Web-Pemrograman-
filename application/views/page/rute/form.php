
<?php echo form_open('rute/doSimpan'); ?>
    <div class="card rounded-lg">
        <div class="card-header">Form Data Rute</div>
        <div class="card-body">            
            <div class="form-row">
                <div class="col-lg-12 row">
                    <label class="col-md-2">Tujuan</label>
                    <div class="col-md-6">
                        <div class="form-group">
                            <input class="form-control" name="txtTujuan" type="text" placeholder="tujuan" />
                        </div>
                    </div>                        
                </div>

                <div class="col-lg-12 row">
                    <label class="col-md-2">Jarak</label>
                    <div class="col-md-6">
                        <div class="form-group">
                            <input class="form-control" name="txtJarak" type="text" placeholder="jarak" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer text-right">
            <a href="<?php echo base_url();?>rute" class="btn btn-secondary">Batal</a>
            <input class="btn btn-primary" type="submit" value="Simpan" />
        </div>
    </div>
</form>
