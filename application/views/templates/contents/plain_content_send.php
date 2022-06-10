<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h5 class="m-0 text-dark"><?php echo $block_header ?></h5>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="col-12">
                                <?php
                                echo $alert;
                                ?>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <h5>
                                        <?php echo strtoupper($header) ?>
                                        <p class="text-secondary"><small><?php echo $sub_header ?></small></p>
                                    </h5>
                                </div>
                                <div class="col-6">
                                    <div class="row">
                                        <div class="col-2"></div>
                                        <div class="col-10">
                                            <div class="float-right">
                                                <?php echo (isset($header_button)) ? $header_button : '';  ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="container"><br>
                            <div class="col-md-5" style="margin:0 ">
                                <div class="well bs-component">
                                    <form action="<?php echo base_url('uadmin/pesan/sendmsg') ?>" method="post" class="form-horizontal">

                                        <fieldset>
                                            <div class="form-group">
                                                <label for="inputEmail" class="col-lg-3 control-label">No Telepon</label>
                                                <div class="col-lg-12">
                                                    <input type="text" name="mobile" class="form-control" placeholder="Ex:Masukan No Tujuan">
                                                </div>
                                                <div class="col-md-12">
                                                    <?php echo form_error('mobile', '<span class="text-danger">', '</span>') ?>
                                                </div>
                                            </div>


                                            <div class="form-group">
                                                <label for="inputEmail" class="col-lg-3 control-label">Pesan</label>
                                                <div class="col-lg-12">
                                                    <textarea name="message" class="form-control" placeholder="Masukan Pesan Anda"></textarea>
                                                </div>
                                                <div class="col-md-12">
                                                    <?php echo form_error('message', '<span class="text-danger">', '</span>') ?>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-lg-10 col-lg-offset-2">
                                                    <button type="reset" class="btn btn-default">Batal</button>
                                                    <button type="submit" class="btn btn-primary"><span class="fa fa-send"></span> Kirim</button>
                                                </div>
                                            </div>
                                        </fieldset>
                                    </form>
                                </div>
                            </div>

                        </div>

                        <div id="AddModal" class="modal fade">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <div class="modal-title">
                                            <!-- <button type="button" class="close" data-dismiss="modal">&times;</button> -->
                                            <h1 style="margin-left: 150px;">Tambah Data</h1>
                                        </div>
                                    </div>
                                    <div class="modal-body">
                                        <form action="<?php echo base_url('c_mahasiswa/insertMahasiswa') ?>" method="post" />
                                        <div class="form-group">
                                            <label>Nim</label>
                                            <input class="form-control" type="text" name="nim" placeholder="Masukkan nim anda" required="">
                                        </div>
                                        <div class="col-md-12">
                                            <?php echo form_error('nim', '<span class="text-danger">', '</span>') ?>
                                        </div>
                                        <div class="form-group">
                                            <label>Nama</label>
                                            <input class="form-control" type="text" name="nama" placeholder="Masukkan nama anda" required="">
                                        </div>
                                        <div class="col-md-12">
                                            <?php echo form_error('nama', '<span class="text-danger">', '</span>') ?>
                                        </div>
                                        <div class="form-group">
                                            <label>Alamat</label>
                                            <textarea name="alamat" class="form-control" style="resize: none;"></textarea>
                                        </div>
                                        <div class="col-md-12">
                                            <?php echo form_error('alamat', '<span class="text-danger">', '</span>') ?>
                                        </div>
                                        <div class="form-group">
                                            <label>Status</label>
                                            <select name="status" class="form-control">
                                                <option value="Aktif">Aktif</option>
                                                <option value="Tidak Aktif">Tidak Aktif</option>
                                            </select>
                                        </div>
                                        <div class="col-md-12">
                                            <?php echo form_error('status', '<span class="text-danger">', '</span>') ?>
                                        </div>


                                        <div class="form-group">
                                            <input class="btn btn-default" type="button" value="Batal" data-dismiss="modal">
                                            <input class="btn btn-primary" type="submit" name="" value="Simpan">
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>