<div class="card-title">
    <h2 class="text-center"> Dashboard </h2>
</div><br>
<div class="card-group">

   <!-- Card -->
   <div class="container-fluid">
       <div class="card-group">
           <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="m-r-10">
                        <span class="btn btn-circle btn-lg bg-danger">
                            <i class="ti-clipboard text-white"></i>
                        </span>
                    </div>
                    <div>
                        Total SKPA =
                    </div>
                    <div class="ml-auto">
                        <h2 class="m-b-0 font-light">&nbsp <?php echo $jumlah_skpa;?></h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="m-r-10">
                        <span class="btn btn-circle btn-lg btn-info">
                            <i class="ti-clipboard text-white"></i>
                        </span>
                    </div>
                    <div>
                        Total Organisasi =
                    </div>
                    <div class="ml-auto">
                        <h2 class="m-b-0 font-light">&nbsp<?php echo $jumlah_org;?></h2>
                    </div>
                </div>
            </div>
        </div>
        <!-- Card -->
        <!-- Card -->
        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="m-r-10">
                        <span class="btn btn-circle btn-lg bg-success">
                            <i class="ti-clipboard text-white"></i>
                        </span>
                    </div>
                    <div>
                        Total Sub Organisasi =

                    </div>
                    <div class="ml-auto">
                        <h2 class="m-b-0 font-light">&nbsp<?php echo $jumlah_suborg;?></h2>
                    </div>
                </div>
            </div>
        </div>
        <!-- Card -->
        <!-- Card -->
        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="m-r-10">
                        <span class="btn btn-circle btn-lg bg-warning">
                            <i class="ti-clipboard text-white"></i>
                        </span>
                    </div>
                    <div>
                        Total Objek Data =

                    </div>
                    <div class="ml-auto">
                        <h2 class="m-b-0 font-light">&nbsp<?php echo $jumlah_obj;?></h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Card -->
<!-- Column -->


<!-- File export -->
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Data DED</h4>
                <h6 class="card-subtitle">Data DED dari masing-masing SKPA</h6>
                <div class="table-responsive">
                    <table id="zero_config" class="table table-striped table-bordered display">
                        <thead>
                            <tr>
                                <th width="20px">No</th>
                                <th class="text-center">SKPA</th>
                                <th class="text-center">Jumlah Organisasi</th>
                                <th class="text-center">Jumlah Sub Organisasi</th>
                                <th class="text-center">Jumlah Objek Data</th>
                                <th class="text-center">Dokumen Pendukung</th>
                                <th class="text-center">DED</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 0;
                            foreach($ded as $d){
                               $i++;
                               ?>
                               <tr>
                                <td>
                                    <?php echo $i;?>
                                </td>
                                <td>
                                    <?php echo $d->nama_skpa;?>
                                </td>
                                <td class="text-center">
                                    <?php
                                    $jml_org = $Beranda_model->get_all_org_by_id_skpa($d->id_skpa)->num_rows();
                                    echo $jml_org;
                                    ?>
                                </td>
                                <td class="text-center">
                                    <?php
                                    $jml_suborg = $Beranda_model->get_all_suborg_by_id_skpa($d->id_skpa)->num_rows();
                                    echo $jml_suborg;
                                    ?>
                                </td>
                                <td class="text-center">
                                    <?php 
                                    $jml_obj = $Beranda_model->get_all_obj_by_id_skpa($d->id_skpa)->num_rows();
                                    echo $jml_obj;
                                    ?>
                                </td>
                                <td class="text-center">
                                    <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#dokumen-<?php echo $d->id_skpa?>">Detail</button>
                                </td>
                                <td class="text-center"><a href="<?php echo site_url('Read/').$d->id_skpa; ?>" class="btn waves-effect waves-light btn-primary">Detail</button><i class="icon-eye" aria-hidden="true"></i></a></td>
                            </tr>
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

<!--start looping modal dan datatable -->

<?php
foreach ($ded as $key) {
    ?>
    <div class="modal fade" id="dokumen-<?php echo $key->id_skpa?>" tabindex="-1" role="dialog" aria-labelledby="dokumen">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Dokumen Pendukung - <b><?php echo $key->nama_peraturan?> </b></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>

                <div class="modal-body">
                    <table id="zero_config-<?php echo $key->id_skpa?>" class="table table-striped table-bordered display">
                        <thead>
                            <tr>
                                <th width="30px">No</th>
                                <th class="text-center">Nama Dokumen</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $data = $Ded_m->get_dokumen_by_id_skpa($key->id_skpa)->result();
                                // print_r($Ded_m);
                            $i=0;
                            foreach ($data as $key) {
                                $i++;
                                ?>
                                <tr>
                                    <td><?php echo $i;?></td>
                                    <td><?php echo $key->nama_dokumen;?></td>
                                    <td class="text-center">
                                        <a href="<?php echo base_url()."uploads/".$key->nama_file?>" target="_blank" style="color: white;" class="btn btn-info"><i class="fas fa-download"></i></a>
                                        <!--  <a href="<?php echo base_url('skpa/delete/').$key->id_dokumen?>" onClick="return confirm('Anda yakin akan menghapus <?php echo $key->nama_dokumen?>?')" style="color: white;" class="btn btn-danger"><i class="ti-trash"></i></a> -->
                                    </td>
                                </tr>
                                <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                </div>
            </div>
        </div>
    </div>

    <script src="<?php echo base_url('assets/js/jquery-1.11.2.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/datatables/jquery.dataTables.js') ?>"></script>
    <script src="<?php echo base_url('assets/datatables/dataTables.bootstrap.js') ?>"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#zero_config-<?php echo $key->id_skpa?>').DataTable();
        } 
        );
    </script>
    
    <?php
}
?>

    <!-- end looping modal dan datatabel -->