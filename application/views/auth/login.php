<div class="container">

    <!-- Outer Row -->
    <div class="row">

        <div class="col-lg">

            <div class="my-5">
                <div class="card-body">
                    <!-- Nested Row within Card Body -->
                    <div class="row justify-content-center">
                        <div class="col-lg-5">
                            <img class="mb-5" src="<?= base_url('assets/'); ?>img/logo for web warna4.png" alt="" width="70">
                            <div class="text-lg-left">
                                <h2 class="h2 white-color font-weight-bold">Yuk Update Skill UX/</h2>
                                <h2 class="h2 white-color mb-4 font-weight-bold">UI Kamu!</h2>
                                <h5 class="h5 white-color mb-5">Silahkan login dulu</h5>
                            </div>
                            <?= $this->session->flashdata('message'); ?>
                            <form class="user mb-4" method="post" action="<?= base_url('auth'); ?>">
                                <div class="form-group">
                                    <label for="email" class="white-color label-orbit">Email address</label>
                                    <input type="text" class="form-control-kenda form-control-user form-primary-orbit" id="email" name="email" placeholder="Email Address" value="<?= set_value('email'); ?>">
                                    <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="form-group mb-4">
                                    <label for="password" class="white-color label-orbit">Password</label>
                                    <input type="password" class="form-control-kenda form-control-user form-primary-orbit" id="password" name="password" placeholder="Password">
                                    <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="text-right mb-4">
                                    <a class="font-weight-bold" href="<?= base_url('auth/forgotpassword'); ?>">Lupa Password?</a>
                                </div>
                                <button type="submit" class="btn btn-primary-kenda btn-user btn-block">
                                    MASUK
                                </button>
                            </form>
                            <div class="mt-5 text-center">
                                <p class="white-color font-weight-bold">Belum punya akun? <a class="font-weight-bold secondary-color" href="<?= base_url('auth/registration'); ?>">Daftar dulu kuy!</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>