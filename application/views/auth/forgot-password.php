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
                                <img class="mb-4" src="<?= base_url('assets/'); ?>img/logo for web warna4.png" alt="" width="70">
                                <div class="text-lg-left">
                                    <h2 class="h2 white-color mb-4 font-weight-bold">Duh saya lupa password :(</h2>
                                    <h5 class="h5 white-color mb-4">Silahkan masukan email kamu</h5>
                                </div>

                                <?= $this->session->flashdata('message'); ?>

                                <form class="user" method="post" action="<?= base_url('auth/forgotpassword'); ?>">
                                    <div class="form-group">
                                        <input type="text" class="form-control-kenda form-control-user" id="email" name="email" placeholder="Masukan Alamat Email" value="<?= set_value('email'); ?>">
                                        <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <button type="submit" class="btn btn-primary-kenda btn-user btn-block">
                                        Ubah Password
                                    </button>
                                </form>
                                <hr>
                                <div class="text-center">
                                    <p class="small white-color">Dengan menekan tombol "Ubah Password" kamu <br> akan mendapatkan link melalui email.</p>
                                </div>
                                <div class="mt-5 text-center">
                                    <p class="white-color font-weight-bold">Kembali ke Login. <a class="font-weight-bold" href="<?= base_url('auth'); ?>">Masuk langsung!</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>