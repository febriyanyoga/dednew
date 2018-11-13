<div class="card-title">
    <h2 class="text-center"> Master Data Tupoksi</h2>
</div><br>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Data SKPA</h4>
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
                                    <th class="text-center">SKPA</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 0;
                                foreach($ded as $d){
                                    $i++;
                                    ?>
                                    <tr>
                                        <td style="text-align: center;">
                                            <?php echo $i;?>
                                        </td>
                                        <td>
                                            <?php echo $d->nama_peraturan;?>
                                        </td>
                                        <td style="text-align: center;">
                                        <a style="color: white;" class="btn btn-success" href="<?php echo base_url()?>tupoksi/organisasi"><i class="fa fa-edit"></i>Tupoksi</a>
                                    
                                        </td>
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