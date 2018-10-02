        <!-- Page wrapper  -->
        <div class="page-wrapper">
            <!-- Bread crumb -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">Pages</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Pages</li>
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
                                <h4 class="card-title">Pages</h4>
                                <h6 class="card-subtitle">Show All Pages</h6>
                                <?php if (__get_roles('PagesExecute')) : ?>
                                    <div class="col-6">
                                        <a href="<?php echo site_url('pages/add'); ?>" class="btn btn-primary"><i class="icon-plus"></i> Add New</a>
                                    </div>
                                <?php endif; ?>
                                <div class="table-responsive m-t-40">
                                <?php echo __get_error_msg(); ?>
                                    <table class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>Title</th>
                                                <th>Created Date</th>
                                                <th>Created By</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach($data as $k => $v) : ?>
                                                <tr>
                                                    <td>Main</td>
                                                    <td><?php echo $v -> ptitle;?></td>
                                                    <td><?php echo __set_modification_log($v -> pcreatedby, 2, 1);?></td>
                                                    <td><?php echo __set_modification_log($v -> pcreatedby, 1, 1);?></td>
                                                    <td><?php echo __get_status($v -> pstatus,1);?></td>
                                                    <td>
                                                        <?php if (__get_roles('PagesExecute')) : ?>
                                                          <a href="<?php echo site_url('pages/edit/' . $v -> pid); ?>"><i class="fa fa-pencil"></i></a>
                                                          &nbsp;
                                                          <a href="<?php echo site_url('pages/remove/' . $v -> pid); ?>" onclick="return confirm('Are you sure you want to delete this item?');"><i class="fa fa-remove"></i></a>
                                                        <?php endif; ?>
                                                    </td>
                                                </tr>
                                            <?php
                                            $childs = $this -> Pages_model -> __get_pages($v -> pid);
                                            foreach($childs as $k1 => $v1) :
                                            ?>
                                                <tr>
                                                    <td>-- <?php echo $v1 -> pname;?></td>
                                                    <td><?php echo $v1 -> ptitle;?></td>
                                                    <td><?php echo __set_modification_log($v1 -> pcreatedby, 2, 1);?></td>
                                                    <td><?php echo __set_modification_log($v1 -> pcreatedby, 1, 1);?></td>
                                                    <td><?php echo __get_status($v1 -> pstatus,1);?></td>
                                                    <td>
                                                        <?php if (__get_roles('PagesExecute')) : ?>
                                                          <a href="<?php echo site_url('pages/edit/' . $v1 -> pid); ?>"><i class="fa fa-pencil"></i></a>
                                                          &nbsp;
                                                          <a href="<?php echo site_url('pages/remove/' . $v1 -> pid); ?>" onclick="return confirm('Are you sure you want to delete this item?');"><i class="fa fa-remove"></i></a>
                                                        <?php endif; ?>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End PAge Content -->