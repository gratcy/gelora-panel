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
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-title">
                                <h4>Add Users Groups</h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                    <form action="<?php echo site_url('users_groups/add'); ?>" method="post">
                                <?php echo __get_error_msg(); ?>
                                        <div class="form-group">
                                            <label>Name</label>
                                            <input type="text" name="name" class="form-control input-default " placeholder="Input Group Name">
                                        </div>
                                        <div class="form-group">
                                            <label>Description</label>
                                        <textarea class="form-control" rows="3" placeholder="Enter description ..." name="desc" style="height:100px"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Status</label>
                                            <?php echo __get_status(0,4); ?>
                                        </div>
                                        <div class="form-group">
                                        <label>Permission</label>
                                            <table class="table table-striped table-bordered table-hover">
                                              <thead>
                                                <tr>
                                                <th>Name</th>
                                                <th>Access</th>
                                                </tr>
                                              </thead>
                                              <tbody>
                                                <?php foreach($permission as $k => $v) : ?>
                                                <tr>
                                                <td><?php echo ($v -> pparent != 0 ? '-- '.$v -> pdesc.'' : $v -> pdesc); ?></td>
                                                <td><label>Yes <input type="radio" class="uniform" value="1" name="perm[<?php echo $v -> pid?>]"></label><label> No <input class="uniform" type="radio" value="0" name="perm[<?php echo $v -> pid?>]" checked></label></td>
                                                </tr>
                                                <?php endforeach; ?>
                                              </tbody>
                                              </table>
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-info">Submit <i class="fa fa-save"></i></button>
                                            <button type="button" class="btn btn-secondary" onclick="location.href='javascript:history.go(-1);'">Back <i class="fa fa-arrow-circle-left"></i></button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /# column -->
            </div>
                <!-- /# row -->