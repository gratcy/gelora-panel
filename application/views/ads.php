        <!-- Page wrapper  -->
        <div class="page-wrapper">
            <!-- Bread crumb -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">Ads</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Ads</li>
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
                                <h4 class="card-title">Ads</h4>
                                <h6 class="card-subtitle">Show All Ads</h6>
                                <div class="table-responsive m-t-40">
                                <?php echo __get_error_msg(); ?>
                                    <table id="myTable" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>Category</th>
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
                                                    <td><?php echo $v -> cname;?></td>
                                                    <td><?php echo $v -> atitle;?></td>
                                                    <td><?php echo $v -> aname;?></td>
                                                    <td><?php echo __get_date($v -> adate, 2);?></td>
                                                    <td><?php echo __get_status($v -> astatus,1);?></td>
                                                    <td>
                                                        <?php if (__get_roles('AdsExecute')) : ?>
                                                          <a href="<?php echo site_url('ads/edit/' . $v -> aid); ?>"><i class="fa fa-pencil"></i></a>
                                                          &nbsp;
                                                          <a href="<?php echo site_url('ads/remove/' . $v -> aid); ?>" onclick="return confirm('Are you sure you want to delete this item?');"><i class="fa fa-remove"></i></a>
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