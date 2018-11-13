<div class="card-title">
    <h2 class="text-center"> Manage Obyek Data</h2>
</div><br>
<!-- File export -->
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo site_url('Masterdata/')?>">SKPA</a></li>
                        <li class="breadcrumb-item"><a href="<?php echo site_url('Organisasi/').$skpa[0]->id_skpa?>">Organisasi</a></li>
                        <li class="breadcrumb-item"><a href="<?php echo site_url('SubOrganisasi/').$organisasi[0]->id_organisasi?>">Sub Organisasi</a></li>
                        <!-- <li class="breadcrumb-item"><a href="<?php echo site_url('ObyekData/').$sub_organisasi[0]->id_suborganisasi?>">Obyek Data</a></li> -->
                        <li class="breadcrumb-item active" aria-current="page">Objek Data</li>
                    </ol>
                </nav>
                <div class="col-md-6">
                    <table class="table" style="border-top: 1px none;">
                        <tr>
                            <th>SKPA</th>
                            <td><?php echo $skpa[0]->nama_skpa;?></td>
                        </tr>
                        <tr>
                            <th>Organisasi</th>
                            <td><?php echo $organisasi[0]->nama_organisasi;?></td>
                        </tr>
                        <tr>
                            <th>Sub Organisasi</th>
                            <td><?php echo $sub_organisasi[0]->nama_suborganisasi;?></td>
                        </tr>
                    </table>
                </div>

                <!-- SKPA : <?php echo $skpa[0]->nama_skpa;?><br>Organisasi : <?php echo $organisasi[0]->nama_organisasi;?><br>Sub Organisasi : <?php echo $sub_organisasi[0]->nama_suborganisasi;?> -->

                <br>
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#tambahobyekdata"><i class="fas fa-plus-circle"></i> Tambah Objek Data</button>
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
                                    <th class="text-center">Nama Objek Data</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                $i=0;
                                foreach ($obyek_data as $obj) {
                                    $i++;
                                    ?>
                                    <tr>
                                        <td style="text-align: center;"><?php echo $i;?></td>
                                        <td style="text-align: center;"><?php echo $obj->objek_data;?></td>
                                        <td style="text-align: center;">

                                            <a style="color: white;" class="btn btn-success" href="<?php echo site_url('Parameter/').$obj->id_objek_data?>"><i class="fa fa-edit"></i>Tabel Data</a>

                                            <a style="color: white;" class="btn btn-success" data-toggle="modal" data-target="#editskpa-<?php echo $obj->id_objek_data?>" title="edit"><i class="fa fa-edit"></i></a>

                                            <a href="<?php echo base_url('hapus_obj/'.$obj->id_objek_data)?>"  onClick="return confirm('Anda yakin akan menghapus Objek Data <?php echo $obj->objek_data?>?')" style="color: white;" class="btn btn-danger"><i class="ti-trash"></i></a>
                                        </td>
                                    </tr>

                                    <!-- start edit data obyek data -->
                                    <div class="modal fade" id="editskpa-<?php echo $obj->id_objek_data?>" tabindex="-1" role="dialog" aria-labelledby="editskpa">
                                        <div class="modal-dialog" role="document">
                                            <form action="<?php echo base_url('update_objek')?>" method="post">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title" id="exampleModalLabel1">Data <?php echo $obj->objek_data?></h4>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="form-group">
                                                            <label for="recipient-name" class="control-label">Objek Data :</label>
                                                            <input type="text" class="form-control"  name="objek_data" value="<?php echo $obj->objek_data;?>">
                                                            <input type="hidden" class="form-control"  name="id_objek_data" value="<?php echo $obj->id_objek_data;?>">
                                                            <input type="hidden" class="form-control"  name="id_suborganisasi" value="<?php echo $sub_organisasi[0]->id_suborganisasi;?>">

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

    <div class="modal fade" id="tambahobyekdata" tabindex="-1" role="dialog" aria-labelledby="tambahskpa">
        <div class="modal-dialog" role="document">
            <form action="<?php echo base_url('post_objek')?>" method="post">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="exampleModalLabel1">Tambah Obyek Data</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="recipient-name" class="control-label">Nama Obyek Data:</label>
                            <input type="text" class="form-control"  name="objek_data" required>
                            <input type="hidden" class="form-control"  name="id_suborganisasi" value="<?php echo $sub_organisasi[0]->id_suborganisasi?>" required>
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
</div>