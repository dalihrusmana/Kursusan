$(function () {

    $('.tombolTambahData').on('click', function () {
        $('#newSubMenuModalLabel').html('Tambah Submenu Baru');
        $('.modal-footer button[type=submit]').html('Tambah Data');
        $('#title').val('');
        $('#menu_id').val('');
        $('#url').val('');
        $('#icon').val('');
        $('#is_active').val('');
    });

    $('.tampilModalUbah').on('click', function () {

        $('#newSubMenuModalLabel').html('Edit Submenu Baru');
        $('.modal-footer button[type=submit]').html('Simpan');
        $('.modal-content form').attr('action', 'http://localhost/kenda-app/menu/ubah');

        const id = $(this).data('id');

        $.ajax({
            url: 'http://localhost/kenda-app/menu/getubah',
            data: { id: id },
            method: 'post',
            dataType: 'json',
            success: function (data) {
                $('#title').val(data.title);
                $('#menu_id').val(data.menu_id);
                $('#url').val(data.url);
                $('#icon').val(data.icon);
                $('#is_active').val(data.is_active);
                $('#id').val(data.id);
            }
        });
    });

    //menu
    $('.tombolTambahMenu').on('click', function () {
        $('#newMenuModalLabel').html('Tambah Menu Baru');
        $('.modal-footer button[type=submit]').html('Tambah');
        $('#menu').val('');
    });

    $('.tombolMenuUbah').on('click', function () {
        $('#newMenuModalLabel').html('Edit Menu');
        $('.modal-footer button[type=submit]').html('Simpan');
        $('.modal-content form').attr('action', 'http://localhost/kenda-app/menu/ubahmenu')

        const id = $(this).data('id');

        $.ajax({
            url: 'http://localhost/kenda-app/menu/getubahmenu',
            data: { id: id },
            method: 'post',
            dataType: 'json',
            success: function (data) {
                $('#menu').val(data.menu);
                $('#id').val(data.id);
            }
        });
    });
});