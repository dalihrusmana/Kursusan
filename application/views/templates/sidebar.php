<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary-orbit sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-left" href="index.html" style="background-color: #4424A7;">
        <div class="mt-2">
            <img class="mb-2" src="<?= base_url('assets/'); ?>img/logo for web warna4.png" alt="" width="70">
        </div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- QUERY MENU -->
    <?php
    $role_id = $this->session->userdata('role_id');
    $queryMenu = "SELECT user_menu.id, menu
                    FROM user_menu JOIN user_access_menu 
                        ON user_menu.id = user_access_menu.menu_id
                    WHERE user_access_menu.role_id = $role_id
                ORDER BY user_access_menu.menu_id ASC
                ";
    $menu = $this->db->query($queryMenu)->result_array();
    ?>

    <!-- LOOPING MENU -->
    <?php foreach ($menu as $m) : ?>
        <div class="sidebar-heading white-color-60">
            <?= $m['menu']; ?>
        </div>

        <!-- SIAPKAN SUB-MENU SESUAI MENU -->
        <?php
        $menuId = $m['id'];
        $querySubMenu = "SELECT * 
                                FROM user_sub_menu JOIN user_menu 
                                    ON user_sub_menu.menu_id = user_menu.id
                                WHERE user_sub_menu.menu_id = $menuId
                                AND user_sub_menu.is_active = 1
                        ";
        $subMenu = $this->db->query($querySubMenu)->result_array();
        ?>

        <?php foreach ($subMenu as $sm) : ?>
            <?php if ($title == $sm['title']) : ?>
                <li class="nav-item active-2">
                <?php else : ?>
                <li class="nav-item margin-10">
                <?php endif; ?>
                <a class="nav-link pb-0 white-color-menu" href="<?= base_url($sm['url']); ?>">
                    <i class="<?= $sm['icon']; ?>"></i>
                    <span><?= $sm['title']; ?></span></a>
                </li>
            <?php endforeach; ?>
            <hr class="sidebar-divider mt-3">
        <?php endforeach; ?>

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>

</ul>
<!-- End of Sidebar -->