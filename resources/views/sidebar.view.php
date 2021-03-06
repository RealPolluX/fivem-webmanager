<div class="text-gray-400 text-uppercase px-3 px-lg-4 py-4 font-weight-bold small headings-font-family">MAIN
</div>
<ul class="sidebar-menu list-unstyled">
    <li class="sidebar-list-item"><a href="<?= $this->url() ?>" class="sidebar-link text-muted active"><i
                    class="o-home-1 mr-3 text-gray"></i><span>Home</span></a></li>
    <li class="sidebar-list-item"><a href="<?= $this->url() ?>admin/servers" class="sidebar-link text-muted"><i
                    class="o-table-content-1 mr-3 text-gray"></i><span>Servers</span></a></li>
    <li class="sidebar-list-item"><a href="<?= $this->url() ?>admin/users" data-toggle="collapse" data-target="#pages" aria-expanded="false"
                                     aria-controls="pages" class="sidebar-link text-muted"><i
                    class="o-wireframe-1 mr-3 text-gray"></i><span>Users</span></a>
        <div id="pages" class="collapse">
            <ul class="sidebar-menu list-unstyled border-left border-primary border-thick">
                <li class="sidebar-list-item"><a href="#" class="sidebar-link text-muted pl-lg-5">Page one</a>
                </li>
                <li class="sidebar-list-item"><a href="#" class="sidebar-link text-muted pl-lg-5">Page two</a>
                </li>
                <li class="sidebar-list-item"><a href="#" class="sidebar-link text-muted pl-lg-5">Page three</a>
                </li>
                <li class="sidebar-list-item"><a href="#" class="sidebar-link text-muted pl-lg-5">Page four</a>
                </li>
            </ul>
        </div>
    </li>

    <?php if ($this->session('logged_in')) {
        ?>
        <li class="sidebar-list-item"><a href="<?= $this->url() ?>account/logout" class="sidebar-link text-muted"><i
                        class="o-exit-1 mr-3 text-gray"></i><span>Logout</span></a></li>
        <?php
    } else {
        ?>
        <li class="sidebar-list-item"><a href="<?= $this->url() ?>account/login" class="sidebar-link text-muted"><i
                        class="o-exit-1 mr-3 text-gray"></i><span>Login</span></a></li>
        <?php
    }
    ?>
</ul>
<div class="text-gray-400 text-uppercase px-3 px-lg-4 py-4 font-weight-bold small headings-font-family">EXTRAS
</div>
<ul class="sidebar-menu list-unstyled">
    <li class="sidebar-list-item"><a href="https://github.com/realpollux/fivem-webmanager" class="sidebar-link text-muted"><i
                    class="o-paperwork-1 mr-3 text-gray"></i><span>Github</span></a></li>
</ul>