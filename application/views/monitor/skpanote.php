<div class="card-title">
    <h2 class="text-center"> Monitoring SKPA</h2>
</div><br>
<!-- File export -->
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Monitoring untuk <b><?php echo $skpa->nama_peraturan;?></b></h4>
                <br>
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#tambahnote"><i class="fas fa-plus-circle"></i> Tambah Note</button>
                <br>
                <br>
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
                    <table id="file_export" class="table table-striped table-bordered display">
                        <thead>
                            <tr>
                                <th class="text-center">No</th>
                                <th class="text-center">Judul</th>
                                <th class="text-center">Tanggal</th>
                                <th class="text-center">Catatan</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 0;
                            foreach($note as $n){
                                $i++;
                                ?>
                                <tr>
                                    <td class="text-center">
                                        <?php echo $i;?>
                                    </td>
                                    <td>
                                        <?php echo $n->judul?>
                                    </td>
                                    <td class="text-center">
                                        <?php
                                        $tgl = $n->tanggal;
                                        $new_tgl = date('d-m-Y', strtotime($tgl));
                                        echo $new_tgl;
                                        ?>
                                    </td>
                                    <td>
                                        <?php echo $n->note?>
                                    </td>
                                    <td  class="text-center">
                                        <a style="color: white;" class="btn btn-success" data-toggle="modal" data-target="#edit-<?php echo $n->id_note?>" title="edit"><i class="fa fa-edit"></i></a>

                                        <a href="<?php echo base_url('Monitoring/hapus_note/').$n->id_note?>"  onClick="return confirm('Anda yakin akan menghapus <?php echo $n->judul?>?')" style="color: white;" class="btn btn-danger"><i class="ti-trash"></i></a>
                                    </td>
                                </tr>


                                <!-- start edit note -->
                                <div class="modal fade" id="edit-<?php echo $n->id_note;?>" tabindex="-1" role="dialog" aria-labelledby="tambahnote">
                                    <div class="modal-dialog" role="document">
                                        <form action="<?php echo site_url('Monitoring/post_ubah_note')?>" method="post">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title" id="exampleModalLabel1">Ubah Catatan</h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <label for="recipient-name" class="control-label">Judul:</label>
                                                        <input type="text" class="form-control"  name="judul" required value="<?php echo $n->judul?>">
                                                        <input type="hidden" class="form-control"  name="id_ded" value="<?php echo $id_ded?>" required>
                                                        <input type="hidden" class="form-control"  name="id_note" value="<?php echo $n->id_note?>" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="recipient-name" class="control-label">Tanggal:</label>
                                                        <input type="date" class="form-control"  name="tanggal" required value="<?php echo $n->tanggal?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="message-text" class="control-label">Catatan:</label>
                                                        <textarea class="form-control" id="message-text1" name="note" required><?php echo $n->note?></textarea>
                                                    </div> 
                                                </div>
                                                <div class="modal-footer">
                                                    <input type="button" class="btn btn-danger" data-dismiss="modal" value="Batal">
                                                    <input class="btn btn-default" type="submit" name="submit" value="Simpan">
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <!-- end edit note -->


                                <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="tambahnote" tabindex="-1" role="dialog" aria-labelledby="tambahnote">
    <div class="modal-dialog" role="document">
        <form action="<?php echo site_url('Monitoring/post_note')?>" method="post">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLabel1">Tambah Catatan</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="recipient-name" class="control-label">Judul:</label>
                        <input type="text" class="form-control"  name="judul" required>
                        <input type="hidden" class="form-control"  name="id_ded" value="<?php echo $id_ded?>" required>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="control-label">Tanggal:</label>
                        <input type="date" class="form-control"  name="tanggal" required>
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="control-label">Catatan:</label>
                        <textarea class="form-control" id="message-text1" name="note" required></textarea>
                    </div> 
                </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-danger" data-dismiss="modal" value="Batal">
                    <input class="btn btn-default" type="submit" name="submit" value="Simpan">
                </div>
            </div>
        </form>
    </div>
</div>



<script src="<?php echo base_url('assets/js/jquery-1.11.2.min.js') ?>"></script>
<script src="<?php echo base_url('assets/datatables/jquery.dataTables.js') ?>"></script>
<script src="<?php echo base_url('assets/datatables/dataTables.bootstrap.js') ?>"></script>