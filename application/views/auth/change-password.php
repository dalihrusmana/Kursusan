<div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

        <div class="col-lg-6">

            <div class="my-5">
                <div class="card-body">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg">
                            <div class="p-5">
                                <img class="mb-4" src="<?= base_url('assets/'); ?>img/logo_fix.png" alt="" width="100">
                                <div class="text-lg-left">
                                    <h1 class="h1 black-color mb-4 font-weight-bold">Ubah password untuk</h1>
                                    <h5 class="h5 black-color mb-4"><?= $this->session->userdata('reset_email'); ?></h5>
                                </div>

                                <?= $this->session->flashdata('message'); ?>

                                <form class="user" method="post" action="<?= base_url('auth/changepassword'); ?>">
                                    <div class="form-group">
                                        <input type="password" class="form-control-kenda form-control-user" id="password1" name="password1" placeholder="Masukan Password Baru">
                                        <?= form_error('password1', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control-kenda form-control-user" id="password2" name="password2" placeholder="Ulangi Password Baru">
                                        <?= form_error('password2', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <button type="submit" class="btn btn-primary-kenda btn-user btn-block">
                                        UBAH PASSWORD
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>