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
                                <h4>Edit Users Groups</h4>
                            </div>
                            <h6 class="card-subtitle">Updated By <?php echo __set_modification_log($data[0] -> gupdatedby, 1, 1);?> | Updated Date <?php echo __set_modification_log($data[0] -> gupdatedby, 2, 1);?></h6>
                            <div class="card-body">
                                <div class="basic-form">
                                    <form action="<?php echo site_url('users_groups/edit'); ?>" method="post">
                                <?php echo __get_error_msg(); ?>
                                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                                        <div class="form-group">
                                            <label>Name</label>
                                            <input type="text" name="name" class="form-control input-default " placeholder="Input Group Name" value="<?php echo $data[0] -> gname; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Description</label>
                                        <textarea class="form-control" rows="3" placeholder="Enter description ..." name="desc" style="height:100px"><?php echo $data[0] -> gdesc; ?></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Status</label>
                                            <?php echo __get_status($data[0] -> gstatus,4); ?>
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
                                            <td>
                                                <label>Yes <?php if ($v -> aaccess == 1) { ?> <input class="uniform" type="radio" value="1" name="perm[<?php echo $v -> pid?>]" checked></label><label> No <input class="uniform" type="radio" value="0" name="perm[<?php echo $v -> pid?>]"></label>
                                                <?php } else { ?>
                                                <label><input class="uniform" type="radio" value="1" name="perm[<?php echo $v -> pid?>]"> No</label>
                                                <label><input class="uniform" type="radio" value="0" name="perm[<?php echo $v -> pid?>]" checked><label>
                                                <?php } ?></td>
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
            </div>
                <!-- /# row -->