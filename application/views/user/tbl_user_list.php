<div class="card-title">
    <h2 class="text-center"> Kelola Data User</h2>
</div><br>
<!-- File export -->
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#tambahpengguna"><i class="fas fa-plus-circle"></i> Tambah Pengguna</button>
                <br>
                <br>
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
                                <th class="text-center">No</th>
                                <th class="text-center">Nama SKPA</th>
                                <th class="text-center">Username</th>
                                <th class="text-center">Password</th>
                                <th class="text-center">Level</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $i=0;
                            foreach ($data_user as $user) {
                                $i++;
                                ?>
                                <tr>
                                    <td class="text-center">
                                        <?php echo $i;?>
                                    </td>
                                    <td>
                                        <?php echo $user->nama_skpa;?>
                                    </td>
                                    <td class="text-center">
                                        <?php echo $user->username;?>
                                    </td>
                                    <td class="text-center">
                                        <a href="#" title="<?php echo $user->password;?>">password</a>
                                    </td>
                                    <td class="text-center">
                                        <?php echo $user->level;?>
                                    </td>
                                    <td class="text-center">
                                        <?php echo $user->status;?>
                                    </td>
                                    <td class="text-center">
                                        <a style="color: white;" class="btn btn-success" data-toggle="modal" data-target="#edit-<?php echo $user->id_skpa?>" title="edit"><i class="fa fa-edit"></i></a>
                                        <a href="<?php echo base_url('User/hapus_user/').$user->id_skpa?>"  onClick="return confirm('Anda yakin akan menghapus <?php echo $user->full_name?>?')" style="color: white;" class="btn btn-danger"><i class="ti-trash"></i></a>
                                    </td>
                                </tr>

                                <!-- start modal edit -->
                                <div class="modal fade" id="edit-<?php echo $user->id_skpa?>" tabindex="-1" role="dialog" aria-labelledby="edit-<?php echo $user->id_skpa?>">
                                    <div class="modal-dialog" role="document">
                                        <form action="<?php echo site_url('User/post_update_user')?>" method="post">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title" id="exampleModalLabel1">Ubah User-<?php echo $user->username?></h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <label for="recipient-name" class="control-label">Username:</label>
                                                        <input type="text" class="form-control"  name="username" value="<?php echo $user->username?>" required>
                                                        <input type="hidden" class="form-control"  name="id_skpa" value="<?php echo $user->id_skpa?>" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="recipient-name" class="control-label">Password:</label>
                                                        <input type="password" class="form-control"  name="password" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="recipient-name" class="control-label">Konfirmasi Password:</label>
                                                        <input type="password" class="form-control"  name="confirm_password" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="recipient-name" class="control-label">Level:</label>
                                                        <select class="form-control"  name="level" required>
                                                            <?php 
                                                            if($user->level == 'admin'){
                                                                ?>
                                                                <option selected value="admin">admin</option>
                                                                <option value="user">user</option>
                                                                <?php                                
                                                            }else{
                                                                ?>
                                                                <option value="admin">admin</option>
                                                                <option selected value="user">user</option>
                                                                <?php 
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="recipient-name" class="control-label">Status:</label>
                                                        <select class="form-control" name="status" required>
                                                            <?php
                                                            if($user->level == "aktif"){
                                                                ?>
                                                                <option selected value="aktif">aktif</option>
                                                                <option value="non-aktif">non-aktif</option>
                                                                <?php
                                                            }else{
                                                                ?>
                                                                <option value="aktif">aktif</option>
                                                                <option selected value="non-aktif">non-aktif</option>
                                                                <?php
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>   
                                                </div>
                                                <div class="modal-footer">
                                                    <input type="button" class="btn btn-danger" data-dismiss="modal" value="Batal">
                                                    <input class="btn btn-default" type="submit" name="submit" value="Simpan">
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <!-- enda modal edit -->

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

<div class="modal fade" id="tambahpengguna" tabindex="-1" role="dialog" aria-labelledby="tambahpengguna">
    <div class="modal-dialog" role="document">
        <form action="<?php echo site_url('post_user')?>" method="post">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLabel1">Tambah User</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="recipient-name" class="control-label">Username:</label>
                        <input type="text" class="form-control"  name="username" required>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="control-label">Password:</label>
                        <input type="password" class="form-control"  name="password" required>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="control-label">Konfirmasi Password:</label>
                        <input type="password" class="form-control"  name="confirm_password" required>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="control-label">Level:</label>
                        <select class="form-control"  name="level">
                            <option value="user">user</option>
                            <option value="admin">admin</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="control-label">Status:</label>
                        <select class="form-control" name="status">
                            <option value="aktif">aktif</option>
                            <option selected value="non-aktif">non-aktif</option>
                        </select>
                    </div>   
                </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-danger" data-dismiss="modal" value="Batal">
                    <input class="btn btn-default" type="submit" name="submit" value="Simpan">
                </div>
            </div>
        </form>
    </div>
</div>