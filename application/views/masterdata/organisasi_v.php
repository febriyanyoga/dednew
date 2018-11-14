<div class="card-title">
    <h2 class="text-center"> Manage Organisasi</h2>
</div><br>
<!-- File export -->
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo site_url('Masterdata/')?>">SKPA</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Organisasi</li>
                    </ol>
                </nav>
                <div class="col-md-6">
                    <table class="table" style="border-top: 1px none;">
                        <tr>
                            <th>SKPA</th>
                            <td><?php echo $skpa[0]->nama_skpa;?></td>
                        </tr>
                    </table>
                </div>
                <br>
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#tambahorganisasi"><i class="fas fa-plus-circle"></i> Tambah Organisasi</button>
                <br>
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
                                    <th class="text-center">Fungsi</th>
                                    <th class="text-center">Tugas</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i=0;
                                foreach ($organisasi as $or) {
                                    $i++;
                                    ?>
                                    <tr>
                                        <td style="text-align: center;"><?php echo $i;?></td>
                                        <td style="text-align: center;"><?php echo $or->nama_organisasi;?></td>
                                        <td style="text-align: left; min-width: 250px;"><?php echo $or->fungsi;?></td>
                                        <td style="text-align: left; min-width: 250px;"><?php echo $or->tugas;?></td>
                                        <td style="text-align: center; min-width: 200px;">
                                            <a class="btn btn-sm btn-danger" href="<?php echo site_url('enough/'.$or->id_organisasi)?>"><i class="fas fa-ban"></i></a>
                                            <a class="btn btn-sm btn-success" href="<?php echo site_url('SubOrganisasi/'.$or->id_organisasi)?>"><i class="fas fa-plus-circle"></i> Sub Organisasi</a>

                                            <a style="color: white;" class="btn btn-sm btn-success" data-toggle="modal" data-target="#editorganisasi-<?php echo $or->id_organisasi?>" title="edit"><i class="fa fa-edit"></i></a>

                                            <a href="<?php echo base_url('hapus_org/').$or->id_organisasi?>"  onClick="return confirm('Anda yakin akan menghapus organisasi <?php echo $or->nama_organisasi?>?')" style="color: white;" class="btn btn-sm btn-danger"><i class="ti-trash"></i></a>
                                        </td>
                                    </tr>

                                    <!-- start edit -->
                                    <div class="modal fade" id="editorganisasi-<?php echo $or->id_organisasi?>" tabindex="-1" role="dialog" aria-labelledby="editskpa">
                                        <div class="modal-dialog" role="document">
                                            <form action="<?php echo base_url('post_update_organisasi')?>" method="post">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title" id="exampleModalLabel1">Data <?php echo $or->nama_organisasi?></h4>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="form-group">
                                                            <label for="recipient-name" class="control-label">Nama Organisasi:</label>
                                                            <input type="text" class="form-control"  name="nama_organisasi" value="<?php echo $or->nama_organisasi;?>">
                                                            <input type="hidden" class="form-control"  name="id_organisasi" value="<?php echo $or->id_organisasi;?>">
                                                            <input type="hidden" class="form-control"  name="id_skpa" value="<?php echo $or->id_skpa;?>">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="recipient-name" class="control-label">Tugas:</label>
                                                            <textarea class="form-control" name="tugas" id="editor-<?php echo $or->id_organisasi?>" rows="3"><?php echo $or->tugas?></textarea>
                                                            <script>
                                                                ClassicEditor
                                                                .create( document.querySelector( '#editor-<?php echo $or->id_organisasi?>' ) )
                                                                .then( editor => {
                                                                    console.log( editor );
                                                                } )
                                                                .catch( error => {
                                                                    console.error( error );
                                                                } );
                                                            </script>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="recipient-name" class="control-label">Fungsi:</label>
                                                            <textarea class="form-control" name="fungsi" id="editor2-<?php echo $or->id_organisasi?>" rows="3"><?php echo $or->fungsi?></textarea>
                                                            <script>
                                                                ClassicEditor
                                                                .create( document.querySelector( '#editor2-<?php echo $or->id_organisasi?>' ) )
                                                                .then( editor => {
                                                                    console.log( editor );
                                                                } )
                                                                .catch( error => {
                                                                    console.error( error );
                                                                } );
                                                            </script>
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

    <div class="modal fade" id="tambahorganisasi" tabindex="-1" role="dialog" aria-labelledby="tambahorganisasi">
        <div class="modal-dialog" role="document">
            <form action="<?php echo base_url('post_organisasi')?>" method="post">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="exampleModalLabel1">Data Organisasi</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="recipient-name" class="control-label">Nama Organisasi:</label>
                            <input type="text" class="form-control"  name="nama_organisasi" required>
                            <input type="hidden" class="form-control" name="id_skpa" value="<?php echo $skpa[0]->id_skpa;?>" required>
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="control-label">Fungsi:</label>
                            <textarea class="form-control" name="fungsi" id="editor2" rows="3"></textarea>
                            <script>
                                ClassicEditor
                                .create( document.querySelector( '#editor2' ) )
                                .then( editor => {
                                    console.log( editor );
                                } )
                                .catch( error => {
                                    console.error( error );
                                } );
                            </script>
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="control-label">Tugas:</label>
                            <textarea class="form-control" name="tugas" id="editor" rows="3"></textarea>
                            <script>
                                ClassicEditor
                                .create( document.querySelector( '#editor' ) )
                                .then( editor => {
                                    console.log( editor );
                                } )
                                .catch( error => {
                                    console.error( error );
                                } );
                            </script>
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