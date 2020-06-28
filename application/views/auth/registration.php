<div class="container">

    <div class="my-5">
        <div class="card-body">
            <!-- Nested Row within Card Body -->
            <div class="row justify-content-center">
                <div class="col-lg-5">
                    <img class="mb-5" src="<?= base_url('assets/'); ?>img/logo for web warna4.png" alt="" width="70">
                    <div class="text-lg-left">
                        <h2 class="h2 white-color mb-4 font-weight-bold">Buat Akun Dulu lalu Pelajari Ilmu Baru.</h2>
                        <h5 class="h5 white-color mb-5">Belajar UI/UX jadi lebih mudah</h5>
                    </div>
                    <form class="user mb-4" method="post" action="<?= base_url('auth/registration'); ?>">
                        <div class="form-group">
                            <label for="name" class="white-color label-orbit">Nama kamu</label>
                            <input type="text" class="form-control-kenda form-control-user form-primary-orbit" id="name" name="name" placeholder="sobron" value="<?= set_value('name'); ?>">
                            <?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="email" class="white-color label-orbit">Email kamu</label>
                            <input type="text" class="form-control-kenda form-control-user form-primary-orbit" id="email" name="email" placeholder="your@example.com" value="<?= set_value('email'); ?>">
                            <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="password1" class="white-color label-orbit">Password</label>
                            <input type="password" class="form-control-kenda form-control-user form-primary-orbit" id="password1" name="password1" placeholder="Password">
                            <?= form_error('password1', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="form-group mb-5">
                            <label for="password2" class="white-color label-orbit">Ulangi Password</label>
                            <input type="password" class="form-control-kenda form-control-user form-primary-orbit" id="password2" name="password2" placeholder="Ulangi Password">
                        </div>
                        <button type="submit" class="btn btn-primary-kenda btn-user btn-block">
                            DAFTARKAN
                        </button>
                    </form>
                    <div class="text-center">
                        <p class="white-color font-weight-bold">Sudah punya akun? <a class="font-weight-bold" href="<?= base_url('auth'); ?>">Masuk langsung!</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>