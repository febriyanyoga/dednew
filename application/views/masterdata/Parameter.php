<div class="card-title">
    <h2 class="text-center"> Manage Tabel Data</h2>
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
                        <li class="breadcrumb-item"><a href="<?php echo site_url('ObyekData/').$sub_organisasi[0]->id_suborganisasi?>">Obyek Data</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Parameter</li>
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
                        <tr>
                            <th>Objek Data</th>
                            <td><?php echo $obyek_data[0]->objek_data;?></td>
                        </tr>
                    </table>
                </div>

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
                                    <th class="text-center">Nama Parameter</th>
                                    <th class="text-center">Tipe Data</th>
                                    <th class="text-center">Panjang Data</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i=0;
                                foreach ($parameter as $par) {
                                    $i++;
                                    ?>
                                    <tr>
                                        <td style="text-align: center;"><?php echo $i;?></td>
                                        <td style="text-align: center;"><?php echo $par->nama_parameter?></td>
                                        <td style="text-align: center;"><?php echo $par->tipe_data?></td>
                                        <td style="text-align: center;"><?php echo $par->panjang_data?></td>
                                        <td style="text-align: center;">
                                            <a style="color: white;" class="btn btn-success" data-toggle="modal" data-target="#editparam-<?php echo $par->id_paramater?>" title="edit"><i class="fa fa-edit"></i></a>

                                            <a href="<?php echo base_url('hapus_par/').$par->id_parameter?>"  onClick="return confirm('Anda yakin akan menghapus parameter <?php echo $par->nama_parameter?>?')" style="color: white;" class="btn btn-danger"><i class="ti-trash"></i></a>
                                        </td>
                                    </tr>

                                    <!-- start edit data skpa -->
                                    <div class="modal fade" id="editparam-<?php echo $par->id_paramater?>" tabindex="-1" role="dialog" aria-labelledby="editparam">
                                        <div class="modal-dialog" role="document">
                                            <form action="<?php echo base_url('update_parameter')?>" method="post">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title" id="exampleModalLabel1">Data <?php echo $par->nama_parameter?></h4>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="form-group">
                                                            <label for="recipient-name" class="control-label">Nama Parameter :</label>
                                                            <input type="text" class="form-control"  name="nama_parameter" value="<?php echo $par->nama_parameter;?>">
                                                            <input type="hidden" class="form-control"  name="id_parameter" value="<?php echo $par->id_parameter;?>">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="recipient-name" class="control-label">Tipe Data :</label>
                                                            <select class="form-control" name="tipe_data" required>
                                                                <?php
                                                                if($par->tipe_data == 'string'){
                                                                    ?>
                                                                    <option selected value="string">string</option>
                                                                    <option value="numeric">numeric</option>
                                                                    <option value="text">text</option>
                                                                    <option value="date">date</option>
                                                                    <?php
                                                                }elseif ($par->tipe_data == 'numeric') {
                                                                    ?>
                                                                    <option value="string">string</option>
                                                                    <option selected value="numeric">numeric</option>
                                                                    <option value="text">text</option>
                                                                    <option value="date">date</option>
                                                                    <?php
                                                                }elseif ($par->tipe_data == 'text') {
                                                                    ?>
                                                                    <option value="string">string</option>
                                                                    <option value="numeric">numeric</option>
                                                                    <option selected value="text">text</option>
                                                                    <option value="date">date</option>
                                                                    <?php
                                                                }else{
                                                                    ?>
                                                                    <option value="string">string</option>
                                                                    <option value="numeric">numeric</option>
                                                                    <option value="text">text</option>
                                                                    <option selected value="date">date</option>
                                                                    <?php
                                                                }
                                                                ?>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="recipient-name" class="control-label">Panjang Data:</label>
                                                            <input type="text" class="form-control"  name="panjang_data" value="<?php echo $par->panjang_data;?>">
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

    <div class="modal fade" id="tambahtabel" tabindex="-1" role="dialog" aria-labelledby="tambahskpa">
        <div class="modal-dialog" role="document">
            <form action="<?php echo base_url('post_parameter')?>" method="post">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="exampleModalLabel1">Tambah Tabel Data</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="recipient-name" class="control-label">Nama Parameter :</label>
                            <input type="text" class="form-control"  name="nama_parameter" required>
                            <input type="hidden" class="form-control"  name="id_objek_data" value="<?php echo $obyek_data[0]->id_objek_data?>" required>
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="control-label">Tipe Data :</label>
                            <select class="form-control" name="tipe_data" required>
                                <option value="string">string</option>
                                <option value="numeric">numeric</option>
                                <option value="text">text</option>
                                <option value="date">date</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="control-label">Panjang :</label>
                            <input type="number" class="form-control"  name="panjang_data" required>
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