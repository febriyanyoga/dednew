<div class="card-title">
    <h2 class="text-center"> Detail Data</h2>
</div><br>

<!-- File export -->
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="col-md-6">
                    <h4 class="card-title">Data DED</h4>
                    <table class="table" style="border-top: 1px none;">
                        <tr>
                            <th>Nama SKPA</th>
                            <td>&nbsp;:&nbsp;<?php echo $skpa->nama_skpa;?></td>
                        </tr>
                        <tr>
                            <th>Regulasi</th>
                            <td>&nbsp;:&nbsp;<?php echo $skpa->regulasi;?></td>
                        </tr>
                    </table>
                </div>
                <hr>
                <div class="table-responsive">
                    <table id="file_export" class="table table-striped table-bordered display" data-options='{ "paging": false; "searching":false}'>
                        <thead>
                            <tr>
                                <th class="text-center" max-width="20px">No</th>
                                <th class="text-center">Organisasi</th>
                                <th class="text-center">Sub Organisasi</th>
                                <th class="text-center">Fungsi</th>
                                <th class="text-center">Tugas</th>
                                <th class="text-center">Objek Data</th>
                                <!-- <th class="text-center">Tabel Data</th> -->
                                <th class="text-center">Tipe</th>
                                <th class="text-center">Panjang</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            print_r($all);
                            $i = 0;
                            foreach($all as $a){
                                $i++;
                                ?>
                                <tr>
                                    <td class="text-center">
                                        <?php
                                        echo $i;
                                        ?>
                                    </td>
                                    
                                    <td class="text-left">
                                        <?php echo $a->nama_organisasi;?>
                                    </td>
                                    <td class="text-left">
                                        <?php echo $a->nama_suborganisasi;?>
                                    </td>
                                    <td class="text-left">
                                        <?php echo $a->fungsi;?>
                                    </td>
                                    <td class="text-left">
                                        <?php echo $a->tugas;?>
                                    </td>
                                    <td class="text-left">
                                        <?php echo $a->objek_data;?>
                                    </td>
                                    <td class="text-left">
                                        <?php echo $a->tipe_data;?>
                                    </td>
                                    <td class="text-center">
                                        <?php echo $a->panjang_data;?>
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
