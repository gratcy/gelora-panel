        <!-- Page wrapper  -->
        <div class="page-wrapper">
            <!-- Bread crumb -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">Users Groups</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Users Groups</li>
                    </ol>
                </div>
            </div>
            <!-- End Bread crumb -->
            <!-- Container fluid  -->
            <div class="container-fluid">
                <!-- Start Page Content -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Users Groups</h4>
                                <h6 class="card-subtitle">Show All Users Groups</h6>
                                <?php if (__get_roles('UsersGroupExecute')) : ?>
                                    <div class="col-6">
                                        <a href="<?php echo site_url('users_groups/add'); ?>" class="btn btn-primary"><i class="icon-plus"></i> Add New</a>
                                    </div>
                                <?php endif; ?>
                                <div class="table-responsive m-t-40">
                                <?php echo __get_error_msg(); ?>
                                    <table id="myTable" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Description</th>
                                                <th>Created Date</th>
                                                <th>Created By</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach($data as $k => $v) : ?>
                                                <tr>
                                                    <td><?php echo $v -> gname;?></td>
                                                    <td><?php echo $v -> gdesc;?></td>
                                                    <td><?php echo __set_modification_log($v -> gcreatedby, 2, 1);?></td>
                                                    <td><?php echo __set_modification_log($v -> gcreatedby, 1, 1);?></td>
                                                    <td><?php echo __get_status($v -> gstatus,1);?></td>
                                                    <td>
                                                        <?php if (__get_roles('UsersGroupExecute')) : ?>
                                                          <a href="<?php echo site_url('users_groups/edit/' . $v -> gid); ?>"><i class="fa fa-pencil"></i></a>
                                                          &nbsp;
                                                          <a href="<?php echo site_url('users_groups/remove/' . $v -> gid); ?>" onclick="return confirm('Are you sure you want to delete this item?');"><i class="fa fa-remove"></i></a>
                                                        <?php endif; ?>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End PAge Content -->