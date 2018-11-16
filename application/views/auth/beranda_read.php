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
                    <table id="lele" class="table table-bordered display" data-options='{ "paging": false; "searching":false}'>
                        <thead>
                            <tr>
                                <th class="text-center" max-width="20px">No</th>
                                <th class="text-center">Organisasi</th>
                                <th class="text-center">Sub Organisasi</th>
                                <th class="text-center">Tugas</th>
                                <th class="text-center">Fungsi</th>
                                <th class="text-center">Objek Data</th>
                                <th class="text-center">Nama Parameter</th>
                                <th class="text-center">Tipe</th>
                                <th class="text-center">Panjang</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $suborg = $Beranda_model->get_all_suborg()->result();
                            $data_suborg = array();
                            foreach ($suborg as $s) {
                                array_push($data_suborg, $s->id_organisasi);
                            }
                            // print_r($data_suborg);
                            $data_org_no = array();
                            foreach ($org_by_skpa as $orb) {
                                if(!in_array($orb->id_organisasi, $data_suborg)){
                                    array_push($data_org_no, $orb->id_organisasi);
                                }
                            }
                            // print_r($data_org_no);
                            $p=0;
                            foreach ($data_org_no as $k=>$key) {
                                $data = $Beranda_model->get_org($data_org_no[$k])->row();
                                ?>
                                <tr>
                                    <td><?php echo $p+1;?></td>
                                    <td><?php echo $data->nama_organisasi;?></td>
                                    <?php echo '<td></td>';?>
                                    <td><?php echo $data->tugas;?></td>
                                    <td><?php echo $data->fungsi;?></td>
                                    <?php echo '<td ></td>';?>
                                    <?php echo '<td ></td>';?>
                                    <?php echo '<td ></td>';?>
                                    <?php echo '<td ></td>';?>
                                </tr>
                                <?php
                                $p++;
                            }
                            ?>
                            <?php
                            $i = $p+1;
                            for($m=0; $m < (sizeof($all)); $m++){
                                $k=0;
                                
                                ?>
                                <tr>
                                    <!-- Nomor -->
                                    <?php
                                    $rowspan_o = $Beranda_model->get_all_data_org($all[$m]['id_organisasi'])->num_rows();
                                    if($all[$m]['nama_organisasi'] != $all[$m-1]['nama_organisasi']){
                                        echo '<td class="text-center">'.$i.'</td>';
                                    }else{
                                        echo '<td style="border-top : 0px solid transparent; border-bottom : 0px solid transparent; text-color : transparent; color : transparent; font-size: 1pt; ">'.$i.'</td>';
                                    }
                                    ?>

                                    <!-- nama organisasi -->
                                    <?php
                                    if($all[$m]['nama_organisasi'] != $all[$m-1]['nama_organisasi']){
                                        echo '<td class="text-left">'.$all[$m]['nama_organisasi'].'</td>';
                                        $i++;
                                    }else{
                                        echo '<td style="border-top : 0px solid transparent; border-bottom : 0px solid transparent; text-color : transparent; color : transparent; font-size: 1pt;">'.$all[$m] ['nama_organisasi'].'</td>';
                                    }
                                    ?>

                                    <!-- nama suborganisasi -->
                                    <?php
                                    $rowspan_s = $Beranda_model->get_all_data_obj_by_id_sub($all[$m]['id_suborganisasi'])->num_rows();
                                    if($all[$m]['nama_suborganisasi'] != $all[$m-1]['nama_suborganisasi']){
                                        echo '<td class="text-left">'.$all[$m]['nama_suborganisasi'].' </td>';
                                    }else{
                                        echo '<td style="border-top : 0px solid transparent; border-bottom : 0px solid transparent; text-color : transparent; color : transparent; font-size: 1pt;">'.$all[$m] ['nama_suborganisasi'].'</td>';
                                    }
                                    ?>


                                    <!-- tugas suborganisasi -->
                                    <?php
                                    $rowspan_s = $Beranda_model->get_all_data_obj_by_id_sub($all[$m]['id_suborganisasi'])->num_rows();
                                    if($all[$m]['tugas_sub'] != $all[$m-1]['tugas_sub']){
                                        echo '<td style="min-width:300px;" class="text-left">'.$all[$m]['tugas_sub'].'</td>';
                                    }else{
                                        echo '<td style="border-top : 0px solid transparent; border-bottom : 0px solid transparent; text-color : transparent; color : transparent; font-size: 1pt;">'.$all[$m] ['tugas_sub'].'</td>';
                                    }

                                    ?>
                                    <!-- fungsi suborganisasi -->
                                    <?php
                                    $rowspan_s = $Beranda_model->get_all_data_obj_by_id_sub($all[$m]['id_suborganisasi'])->num_rows();
                                    if($all[$m]['nama_suborganisasi'] != $all[$m-1]['nama_suborganisasi']){
                                        echo '<td class="text-left">'.$all[$m]['fungsi_sub'].'</td>';
                                    }else{
                                        if($all[$m]['fungsi_sub'] != $all[$m-1]['fungsi_sub']){
                                            echo '<td class="text-left">'.$all[$m]['fungsi_sub'].'</td>';
                                            // echo '<td style="min-width:300px;" rowspan="'.$rowspan_s.'" class="text-left">'.$all[$m]['fungsi_sub'].'</td>';
                                        }else{
                                            echo '<td style="border-top : 0px solid transparent; border-bottom : 0px solid transparent; text-color : transparent; color : transparent; font-size: 1pt;">'.$all[$m] ['fungsi_sub'].'</td>';
                                        }
                                    }
                                    ?>

                                    <!-- nama parameter -->
                                    <?php
                                    $rowspan_obj = $Beranda_model->get_all_data_objek($all[$m]['id_objek_data'])->num_rows();
                                    if($all[$m]['nama_suborganisasi'] != $all[$m-1]['nama_suborganisasi']){
                                        echo '<td class="text-left">'.$all[$m]['objek_data'].'</td>';
                                    }else{
                                        if($all[$m]['objek_data'] != $all[$m-1]['objek_data']){
                                            echo '<td class="text-left">'.$all[$m]['objek_data'].'</td>';
                                        }else{
                                            echo '<td style="border-top : 0px solid transparent; border-bottom : 0px solid transparent; text-color : transparent; color : transparent; font-size: 1pt;">'.$all[$m] ['objek_data'].'</td>';
                                        }
                                    }
                                    ?>

                                    <td class="text-left">
                                        <?php
                                        if($all[$m]['objek_data'] != ""){
                                            echo $all[$m]['nama_parameter'];
                                        }else{
                                            echo '<td style="border-top : 0px solid transparent; border-bottom : 0px solid transparent;"></td>';
                                        }
                                        ?>
                                    </td>
                                    <td class="text-left">
                                        <?php
                                        if($all[$m]['objek_data'] != ""){
                                            echo $all[$m]['tipe_data'];
                                        }else{
                                            echo '<td style="border-top : 0px solid transparent; border-bottom : 0px solid transparent;"></td>';
                                        }
                                        ?>
                                    </td>
                                    <td class="text-center">
                                        <?php
                                        if($all[$m]['objek_data'] != ""){
                                            echo $all[$m]['panjang_data'];
                                        }else{
                                            echo '<td style="border-top : 0px solid transparent; border-bottom : 0px solid transparent;"></td>';
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
<script src="<?php echo base_url('assets/js/jquery-1.11.2.min.js') ?>"></script>
<script src="<?php echo base_url('assets/datatables/jquery.dataTables.js') ?>"></script>
<script src="<?php echo base_url('assets/datatables/dataTables.bootstrap.js') ?>"></script>
