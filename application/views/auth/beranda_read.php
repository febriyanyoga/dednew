<div class="card-title">
    <h2 class="text-center"> Detail Data</h2>
</div><br>

<!-- File export -->
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Data DED</h4>
                <h5 class="card-title">Nama SKPA = <b><?php echo $nama_regulasi;?></b></h5>
                <h5 class="card-title">Regulasi = <b><?php echo $nama_regulasi;?></b></h5>
                <div class="table-responsive">
                    <table id="file_export" class="table table-striped table-bordered display" data-options='{ "paging": false; "searching":false}'>
                        <thead>
                            <tr>
                                <th class="text-center" width="20px">No</th>
                                <th class="text-center"  width="150px">Organisasi</th>
                                <th class="text-center">Sub Organisasi</th>
                                <th class="text-center">Fungsi</th>
                                <th class="text-center">Tugas</th>
                                <th class="text-center">Objek Data</th>
                                <th class="text-center">Tabel Data</th>
                                <th class="text-center">Tipe</th>
                                <th class="text-center">Panjang</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 0;
                            foreach($ded as $d){
                               $i++;
                               ?>
                                <tr>
                            
                            
                                    <td class="text-center">
                                        <?php echo $i;?>
                                    </td>
                                    <td class="text-left">
                                        <?php echo $d->bidang;?>
                                    </td>
                                    <td class="text-left">
                                        <?php echo $d->biro;?>
                                    </td>
                                    <td class="text-left">
                                        <?php echo $d->bagian;?>
                                    </td>
                                    <td class="text-left">
                                        <?php echo $d->subag;?>
                                    </td>
                                    <td class="text-left">
                                        <?php echo $d->basisdata;?>
                                    </td>
                                    <td class="text-left">
                                        <?php echo $d->parameter;?>
                                    </td>
                                    <td class="text-left">
                                        <?php echo $d->tipe;?>
                                    </td>
                                    <td class="text-center">
                                        <?php echo $d->panjang;?>
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

<script type="text/javascript">
$(document).ready(function(){
    $('#file_export').DataTable({
        "pageLength": 50
    });
});
</script>
<script src="<?php echo base_url('assets/js/jquery-1.11.2.min.js') ?>"></script>
<script src="<?php echo base_url('assets/datatables/jquery.dataTables.js') ?>"></script>
<script src="<?php echo base_url('assets/datatables/dataTables.bootstrap.js') ?>"></script>
