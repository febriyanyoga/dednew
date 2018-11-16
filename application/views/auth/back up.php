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
                                        echo '<td rowspan="'.$rowspan_o.'" class="text-center">'.$i.'</td>';
                                    }else{
                                        echo '<td style="display: none;"></td>';
                                    }
                                    ?>

                                    <!-- nama organisasi -->
                                    <?php
                                    if($all[$m]['nama_organisasi'] != $all[$m-1]['nama_organisasi']){
                                        echo '<td rowspan="'.$rowspan_o.'" class="text-left">'.$all[$m]['nama_organisasi'].'</td>';
                                        $i++;
                                    }else{
                                        echo '<td style="display: none;"></td>';
                                    }
                                    ?>

                                    <!-- nama suborganisasi -->
                                    <?php
                                    $rowspan_s = $Beranda_model->get_all_data_obj_by_id_sub($all[$m]['id_suborganisasi'])->num_rows();
                                    if($all[$m]['nama_suborganisasi'] != $all[$m-1]['nama_suborganisasi']){
                                        echo '<td rowspan="'.$rowspan_s.'" class="text-left">'.$all[$m]['nama_suborganisasi'].' </td>';
                                    }else{
                                        echo '<td style="display: none;"></td>';
                                    }
                                    ?>


                                    <!-- tugas suborganisasi -->
                                    <?php
                                    $rowspan_s = $Beranda_model->get_all_data_obj_by_id_sub($all[$m]['id_suborganisasi'])->num_rows();
                                    if($all[$m]['tugas_sub'] != $all[$m-1]['tugas_sub']){
                                        echo '<td style="min-width:300px;" rowspan="'.$rowspan_s.'" class="text-left">'.$all[$m]['tugas_sub'].'</td>';
                                    }else{
                                        echo '<td style="display: none;"></td>';
                                    }

                                    ?>
                                    <!-- fungsi suborganisasi -->
                                    <?php
                                    $rowspan_s = $Beranda_model->get_all_data_obj_by_id_sub($all[$m]['id_suborganisasi'])->num_rows();
                                    if($all[$m]['nama_suborganisasi'] != $all[$m-1]['nama_suborganisasi']){
                                        echo '<td style="min-width:300px;" rowspan="'.$rowspan_s.'" class="text-left">'.$all[$m]['fungsi_sub'].'</td>';
                                    }else{
                                        if($all[$m]['fungsi_sub'] != $all[$m-1]['fungsi_sub']){
                                            echo '<td style="min-width:300px;" rowspan="'.$rowspan_s.'" class="text-left">'.$all[$m]['fungsi_sub'].'</td>';
                                        }else{
                                            echo '<td style="display: none;"></td>';
                                        }
                                    }
                                    ?>

                                    <!-- nama parameter -->
                                    <?php
                                    $rowspan_obj = $Beranda_model->get_all_data_objek($all[$m]['id_objek_data'])->num_rows();
                                    if($all[$m]['nama_suborganisasi'] != $all[$m-1]['nama_suborganisasi']){
                                        echo '<td rowspan="'.$rowspan_obj.'" class="text-left">'.$all[$m]['objek_data'].'</td>';
                                    }else{
                                        if($all[$m]['objek_data'] != $all[$m-1]['objek_data']){
                                            echo '<td rowspan="'.$rowspan_obj.'" class="text-left">'.$all[$m]['objek_data'].'</td>';
                                        }else{
                                            echo '<td style="display: none;"></td>';
                                        }
                                    }
                                    ?>

                                    <td class="text-left">
                                        <?php
                                        if($all[$m]['objek_data'] != ""){
                                            echo $all[$m]['nama_parameter'];
                                        }else{
                                            echo '<td style="display: none;"></td>';
                                        }
                                        ?>
                                    </td>
                                    <td class="text-left">
                                        <?php
                                        if($all[$m]['objek_data'] != ""){
                                            echo $all[$m]['tipe_data'];
                                        }else{
                                            echo '<td style="display: none;"></td>';
                                        }
                                        ?>
                                    </td>
                                    <td class="text-center">
                                        <?php
                                        if($all[$m]['objek_data'] != ""){
                                            echo $all[$m]['panjang_data'];
                                        }else{
                                            echo '<td style="display: none;"></td>';
                                        }
                                        
                                        ?>
                                    </td>
                                </tr>
                                <?php
                                $k++;
                            }
                            ?>