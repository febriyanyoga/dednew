<div class="content-wrapper">
    <section class="content">
        <div class="box box-warning box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">PENGATURAN</h3>
            </div>
            <form enctype="multipart/form-data" action="<?php echo $action; ?>" method="post">

                <table class='table'>        

                       <tr><td width='200'>Nama<?php echo form_error('nama_sistem') ?></td><td><input type="text" class="form-control" name="nama_sistem" id="nama_sistem" placeholder="Nama Sistem" value="<?php echo $nama_sistem; ?>" /></td>
                        <td rowspan="5" width="300">
                            <p>Logo</p>
                            <img src="<?php echo base_url()?>assets\foto_profil/<?php echo $logo;?>" width="250px" borde="1">
                        </td></tr>

                    <tr><td width='200'>Alamat <?php echo form_error('alamat') ?></td><td> <textarea class="form-control" rows="3" name="alamat" id="alamat" placeholder="Alamat"><?php echo $alamat; ?></textarea></td></tr>
                    <tr><td width='200'>provinsi <?php echo form_error('provinsi') ?></td><td><input type="text" class="form-control" name="provinsi" id="provinsi" placeholder="provinsi" value="<?php echo $provinsi; ?>" /></td></tr>
                    <tr><td width='200'>Kabupaten <?php echo form_error('kabupaten') ?></td><td><input type="text" class="form-control" name="kabupaten" id="kabupaten" placeholder="Kabupaten" value="<?php echo $kabupaten; ?>" /></td></tr>
                    <tr><td width='200'>No Telpon <?php echo form_error('no_telp') ?></td><td><input type="text" class="form-control" name="no_telp" id="no_telp" placeholder="No Telpon" value="<?php echo $no_telp; ?>" /></td></tr>

                    <tr><td width='200'>Logo <?php echo form_error('logo') ?></td><td> 
                            <input type="file" name="logo" style="margin-left: -200px;">
                           </td></tr>
                    <tr><td width="250">
                        <button type="submit" class="btn btn-danger btn-lg"><i class="icon-save"></i> <?php echo $button ?></button> 
                        <a href="<?php echo site_url('profile') ?>" class="btn btn-primary btn-lg"><i class="icon-sign-out"></i> Kembali</a></td><td><input type="hidden" name="id" value="<?php echo $id; ?>" /> </td></tr>
                </table></form>        </div>
</div>
</div>