        <!-- Left Sidebar  -->
        <div class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li class="nav-devider"></li>
                        <li class="nav-label">Home</li>
                        <li> <a href="<?php echo site_url();?>"><i class="fa fa-tachometer"></i> Dashboard</a>
                        </li>
                        <li class="nav-label">Apps</li>
                        <?php if (__get_roles('PagesView')) : ?>
                           <li> <a href="<?php echo site_url('pages'); ?>"><i class="fa fa-book"></i><span class="hide-menu">Pages </span></a></li>
                        <?php endif; ?>
                        <?php if (__get_roles('PostsView') || __get_roles('PostsCategoriesView')) : ?>
                            <li> <a class="has-arrow  " href="<?php echo site_url('posts'); ?>" aria-expanded="false"><i class="fa fa-pencil"></i><span class="hide-menu">Posts <span class="label label-rouded label-primary pull-right">3</span></span></a>
                                <ul aria-expanded="false" class="collapse">
                                    <li><a href="<?php echo site_url('posts'); ?>">All Posts</a></li>
                                    <li><a href="<?php echo site_url('posts/add'); ?>">Add New</a></li>
                                    <li><a href="<?php echo site_url('categories'); ?>">Categories</a></li>
                                </ul>
                            </li>
                        <?php endif; ?>
                        <?php if (__get_roles('AdsCategoriesView')) : ?>
                           <li> <a href="<?php echo site_url('categories_ads'); ?>"><i class="fa fa-volume-up"></i><span class="hide-menu">Categories Ads</span></a></li>
                        <?php endif; ?>
                        <?php if (__get_roles('MediaView')) : ?>
                            <li> <a href="<?php echo site_url('media'); ?>"><i class="fa fa-file-photo-o"></i><span class="hide-menu">Media </span></a></li>
                        <?php endif; ?>
                        <?php if (__get_roles('UsersView') || __get_roles('UsersGroupView')) : ?>
                            <li class="nav-label">Users</li>
                            <li> <a class="has-arrow  " href="<?php echo site_url('users'); ?>" aria-expanded="false"><i class="fa fa-users"></i><span class="hide-menu">Users <span class="label label-rouded label-warning pull-right">3</span></span></a>
                                <ul aria-expanded="false" class="collapse">
                                    <li><a href="<?php echo site_url('users'); ?>">All Users</a></li>
                                    <li><a href="<?php echo site_url('users/add'); ?>">Add New</a></li>
                                    <li><a href="<?php echo site_url('users_groups'); ?>">Group</a></li>
                                </ul>
                            </li>
                        <?php endif; ?>
                        <li class="nav-label">EXTRA</li>
                        <li> <a href="<?php echo site_url('settings'); ?>"><i class="fa fa-cogs"></i><span class="hide-menu">Settings </span></a>
                        <li> <a href="<?php echo site_url('login/logout'); ?>" onclick="return confirm('<?php echo $this -> permission_lib -> sesresult['uemail']; ?>, are you sure you want to logout?');"><i class="fa fa-power-off"></i><span class="hide-menu">Logout </span></a>
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </div>
        <!-- End Left Sidebar  -->