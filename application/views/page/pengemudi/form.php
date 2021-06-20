<?php
    if (isset($data_detail)) {
        foreach ($data_detail as $row) {
            $id = $row['id'];
            $nama = $row['nama'];
            $jk = $row['jk'];
            $usia = $row['usia'];
            $alamat = $row['alamat'];
            $no_telp = $row['no_telp'];
        }
        $link_do = 'driver/doUpdate/'.$id;
        $btn_value = 'Update';
    }else{
        $nama = '';
        $jk = '';
        $usia = '';
        $alamat = '';
        $no_telp = '';
        $link_do = 'driver/doSimpan';
        $btn_value = 'Simpan';
    }
?>
<?php echo form_open($link_do); ?>
    <div class="card rounded-lg">
        <div class="card-header">Form Data Driver</div>
        <div class="card-body">            
            <div class="form-row">
                <div class="col-lg-12 row">
                    <label class="col-md-2">Nama</label>
                    <div class="col-md-6">
                        <div class="form-group">
                            <input class="form-control" name="txtNama" value="<?=$nama;?>" type="text" placeholder="Nama" />
                        </div>
                    </div>                        
                </div>

                <div class="col-lg-12 row">
                    <label class="col-md-2">Jenis Kelamin</label>
                    <div class="col-md-6">
                    <div class="form-group">
                            <select class="form-control" id="exampleFormControlSelect1" name="txtJK" value="<?=$jk;?>" type="text" placeholder="Jenis Kelamin">
                            <option>Pria</option>
                            <option>Wanita</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="col-lg-12 row">
                    <label class="col-md-2">Usia</label>
                    <div class="col-md-6">
                        <div class="form-group">
                            <input class="form-control" name="txtUsia" value="<?=$usia;?>" type="text" placeholder="Usia" />
                        </div>
                    </div>
                </div>

                <div class="col-lg-12 row">
                    <label class="col-md-2">Alamat</label>
                    <div class="col-md-6">
                        <div class="form-group">
                            <input class="form-control" name="txtAlamat" value="<?=$alamat;?>" type="text" placeholder="Alamat" />
                        </div>
                    </div>
                </div>

                <div class="col-lg-12 row">
                    <label class="col-md-2">Nomor Telepon</label>
                    <div class="col-md-6">
                        <div class="form-group">
                            <input class="form-control" name="txtNoTelp" value="<?=$no_telp;?>" type="text" placeholder="Nomor Telepon" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer text-right">
            <a href="<?php echo base_url();?>driver" class="btn btn-secondary">Batal</a>
            <input class="btn btn-primary" type="submit" value="<?=$btn_value;?>" />
        </div>
    </div>
</form>
