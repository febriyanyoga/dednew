<div class="card-title">
    <h2 class="text-center"> Manage Tabel Data</h2>
</div><br>
<!-- File export -->
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Tabel Data untuk (Nama SKPA - Nama Organisasi - Nama Sub Organisasi - Nama Obyek Data)</h5>

                <br>
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#tambahtabel"><i class="fas fa-plus-circle"></i> Tambah Tabel Data</button>
                <p>
                    <?php
                    $data=$this->session->flashdata('sukses');
                    if($data!=""){ 
                        ?>
                        <div class="alert alert-success">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>
                            <h3 class="text-success"><i class="fa fa-check-circle"></i> Sukses!</h3> <?=$data;?>
                        </div>
                        <?php 
                    } 
                    ?>
                    <?php 
                    $data2=$this->session->flashdata('error');
                    if($data2!=""){ 
                        ?>
                        <div class="alert alert-danger">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>
                            <h3 class="text-danger"><i class="fa fa-check-circle"></i> Gagal!</h3> <?=$data2;?>
                        </div>
                        <?php 
                    } 
                    ?>
                    <div class="table-responsive">
                        <table id="zero_config" class="table table-striped table-bordered display">
                            <thead>
                                <tr>
                                    <th width="30px">No</th>
                                    <th class="text-center">Nama</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                    <tr>
                                        <td style="text-align: center;">
                                
                                        </td>
                                        <td>
                                       
                                        </td>
                                        <td style="text-align: center;">
                                            <a style="color: white;" class="btn btn-success" data-toggle="modal" data-target="#editskpa-<?php echo $d->id?>" title="edit"><i class="fa fa-edit"></i></a>

                                            <a href="<?php echo base_url('Dedaceh/hapus_skpa/').$d->id?>"  onClick="return confirm('Anda yakin akan menghapus <?php echo $d->nama_peraturan?>?')" style="color: white;" class="btn btn-danger"><i class="ti-trash"></i></a>
                                        </td>
                                    </tr>

                                    <!-- start edit data skpa -->
                                    <div class="modal fade" id="editskpa-<?php echo $d->id?>" tabindex="-1" role="dialog" aria-labelledby="editskpa">
                                        <div class="modal-dialog" role="document">
                                            <form action="<?php echo base_url('Dedaceh/post_update_skpa')?>" method="post">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title" id="exampleModalLabel1">Data <?php echo $d->nama_peraturan?></h4>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="form-group">
                                                            <label for="recipient-name" class="control-label">Parameter :</label>
                                                            <input type="text" class="form-control"  name="nama_peraturan" value="<?php echo $d->nama_peraturan;?>">
                                                            <input type="hidden" class="form-control"  name="id" value="<?php echo $d->id;?>">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="recipient-name" class="control-label">Tipe :</label>
                                                            <input type="text" class="form-control"  name="nama_peraturan" value="<?php echo $d->nama_peraturan;?>">
                                                            <input type="hidden" class="form-control"  name="id" value="<?php echo $d->id;?>">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="recipient-name" class="control-label">Panjang :</label>
                                                            <input type="text" class="form-control"  name="nama_peraturan" value="<?php echo $d->nama_peraturan;?>">
                                                            <input type="hidden" class="form-control"  name="id" value="<?php echo $d->id;?>">
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <input type="submit" class="btn btn-danger" data-dismiss="modal" value="Batal">
                                                        <input type="submit" class="btn btn-default" name="submit" value="Simpan">
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <!-- end edit skpa -->

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="tambahtabel" tabindex="-1" role="dialog" aria-labelledby="tambahskpa">
        <div class="modal-dialog" role="document">
            <form action="<?php echo base_url('Dedaceh/post_skpa')?>" method="post">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="exampleModalLabel1">Tambah Tabel Data</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="recipient-name" class="control-label">Parameter :</label>
                            <input type="text" class="form-control"  name="nama_peraturan" required>
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="control-label">Tipe :</label>
                            <input type="text" class="form-control"  name="nama_peraturan" required>
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="control-label">Panjang :</label>
                            <input type="text" class="form-control"  name="nama_peraturan" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-danger" data-dismiss="modal" name="batal" value="Batal">
                        <input type="submit" class="btn btn-default" name="submit" value="Simpan">
                    </div>
                </div>
            </form>
        </div>
    </div>

  


        <script src="<?php echo base_url('assets/js/jquery-1.11.2.min.js') ?>"></script>
        <script src="<?php echo base_url('assets/datatables/jquery.dataTables.js') ?>"></script>
        <script src="<?php echo base_url('assets/datatables/dataTables.bootstrap.js') ?>"></script>
        <script type="text/javascript">
            $(document).ready(function() {
                $('#zero_config-<?php echo $key->id?>').DataTable();
            } 
            );
        </script>

    <!-- end looping modal dan datatabel -->


</div>