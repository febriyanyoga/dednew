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
                                <th class="text-center">Nama Parameter</th>
                                <th class="text-center">Tipe</th>
                                <th class="text-center">Panjang</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 0;
                            for($m=0; $m < (sizeof($all)); $m++){
                                $k=0;
                                $i++;
                                ?>
                                <tr>
                                    <!-- Nomor -->
                                    <?php
                                    $rowspan_o = $Beranda_model->get_all_data_org($all[$m]['id_organisasi'])->num_rows();
                                    if($all[$m]['nama_organisasi'] != $all[$m-1]['nama_organisasi']){
                                        echo '<td rowspan="'.$rowspan_o.'" class="text-center">'.$i.'</td>';
                                    }else{
                                        echo '';
                                    }
                                    ?>

                                    <!-- nama organisasi -->
                                    <?php
                                    if($all[$m]['nama_suborganisasi'] != ""){
                                        if($all[$m]['nama_organisasi'] != $all[$m-1]['nama_organisasi']){
                                            echo '<td rowspan="'.$rowspan_o.'" class="text-left">'.$all[$m]['nama_organisasi'].'</td>';
                                        }else{
                                            echo "";
                                        }
                                    }else{
                                        echo '<td rowspan="'.$rowspan_s.'" class="text-left">'.$all[$m]['nama_organisasi'].' </td>';
                                    }
                                    ?>

                                    <!-- nama suborganisasi -->
                                    <?php
                                    $rowspan_s = $Beranda_model->get_all_data_org($all[$m]['id_organisasi'])->num_rows();
                                    if($m != 0){
                                        if($all[$m]['nama_suborganisasi'] != ""){
                                            if($all[$m]['nama_suborganisasi'] != $all[$m-1]['nama_suborganisasi']){
                                                echo '<td rowspan="'.$rowspan_s.'" class="text-left">'.$all[$m]['nama_suborganisasi'].' </td>';
                                            }else{
                                                echo "";
                                            }
                                        }else{
                                            echo '<td rowspan="'.$rowspan_s.'" class="text-left">'.$all[$m]['nama_suborganisasi'].' </td>';
                                        }
                                    }else{
                                        echo '<td rowspan="'.$rowspan_s.'" class="text-left">'.$all[$m]['nama_suborganisasi'].' </td>';
                                    }
                                    ?>

                                    <!-- fungsi suborganisasi -->
                                    <?php
                                    if($m != 0){
                                        if($all[$m]['fungsi_sub'] != $all[$m-1]['fungsi_sub']){
                                            if($all[$m]['fungsi_sub'] == ""){
                                                echo '<td style="min-width:300px;" rowspan="'.$rowspan_s.'" class="text-left">'.$all[$m]['fungsi'].'</td>';
                                            }else{
                                                echo '<td style="min-width:300px;" rowspan="'.$rowspan_s.'" class="text-left">'.$all[$m]['fungsi_sub'].'</td>';
                                            }
                                        }else{
                                            echo "";
                                        }
                                    }else{
                                        if($all[$m]['fungsi_sub'] == ""){
                                            echo '<td style="min-width:300px;" rowspan="'.$rowspan_s.'" class="text-left">'.$all[$m]['fungsi'].'</td>';
                                        }else{
                                            echo '<td style="min-width:300px;" rowspan="'.$rowspan_s.'" class="text-left">'.$all[$m]['fungsi_sub'].'</td>';
                                        }
                                    }
                                    ?>

                                    <!-- tugas suborganisasi -->
                                    <?php
                                    if($m != 0){
                                        if($all[$m]['tugas_sub'] != $all[$m-1]['tugas_sub']){
                                            if($all[$m]['tugas_sub'] == ""){
                                                echo '<td style="min-width:300px;" rowspan="'.$rowspan_s.'" class="text-left">'.$all[$m]['tugas'].'</td>';
                                            }else{
                                                echo '<td style="min-width:300px;" rowspan="'.$rowspan_s.'" class="text-left">'.$all[$m]['tugas_sub'].'</td>';
                                            }
                                        }else{
                                            echo "";
                                        }
                                    }else{
                                        if($all[$m]['tugas_sub'] == ""){
                                            echo '<td style="min-width:300px;" rowspan="'.$rowspan_s.'" class="text-left">'.$all[$m]['tugas'].'</td>';
                                        }else{
                                            echo '<td style="min-width:300px;" rowspan="'.$rowspan_s.'" class="text-left">'.$all[$m]['tugas_sub'].'</td>';
                                        }
                                    }
                                    ?>

                                    <!-- nama parameter -->
                                    <?php
                                    $rowspan_obj = $Beranda_model->get_all_data_objek($all[$m]['id_objek_data'])->num_rows();
                                    if($m != 0){
                                        if($all[$m]['objek_data'] != $all[$m-1]['objek_data']){
                                            echo ' <td rowspan="'.$rowspan_obj.'" class="text-left">'.$all[$m]['objek_data'].'</td>';
                                        }else{
                                            echo "";
                                        }
                                    }else{
                                        echo ' <td rowspan="'.$rowspan_obj.'" class="text-left">'.$all[$m]['objek_data'].'</td>';
                                    }
                                    ?>

                                    <td class="text-left">
                                        <?php
                                        if($all[$m]['objek_data'] != ""){
                                            echo $all[$m]['nama_parameter'];
                                        }else{
                                            echo "";
                                        }
                                        ?>
                                    </td>
                                    <td class="text-left">
                                        <?php
                                        if($all[$m]['objek_data'] != ""){
                                            echo $all[$m]['tipe_data'];
                                        }else{
                                            echo "";
                                        }
                                        ?>
                                    </td>
                                    <td class="text-center">
                                        <?php
                                        if($all[$m]['objek_data'] != ""){
                                            echo $all[$m]['panjang_data'];
                                        }else{
                                            echo "";
                                        }
                                        ?>
                                    </td>
                                </tr>
                                <?php
                                $k++;
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
