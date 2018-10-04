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
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-title">
                                <h4>Edit Ads</h4>
                            </div>
                            <?php if (!empty($data[0] -> aupdatedby)) : ?>
                            <h6 class="card-subtitle">Updated By <?php echo __set_modification_log($data[0] -> aupdatedby, 1, 1);?> | Updated Date <?php echo __set_modification_log($data[0] -> aupdatedby, 2, 1);?></h6>
                            <?php endif; ?>
                            <?php 
                                $photos = json_decode($data[0] -> aphotos, true);
                            ?>
                            <div class="card-body">
                                <div class="basic-form">
                                <?php echo __get_error_msg(); ?>
                                    <form action="<?php echo site_url('ads/edit'); ?>" method="post">
                                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                                        <div class="form-group">
                                            <label>Category</label>
                                            <select name="category" class="form-control input-flat" placeholder="Input Flat ">
                                                <?php echo $categories; ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Name</label>
                                            <input type="text" name="name" class="form-control input-default " placeholder="Input Name" value="<?php echo $data[0] -> aname; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Phone</label>
                                            <input type="text" name="phone" class="form-control input-default " placeholder="Input Phone I" value="<?php echo $data[0] -> aphone; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Phone II</label>
                                            <input type="text" name="phone2" class="form-control input-default " placeholder="Input Phone II" value="<?php echo $data[0] -> aphone2; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Province</label>
                                            <input type="text" name="prov" class="form-control input-default " placeholder="Input Province" value="<?php echo $data[0] -> aprovince; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>City</label>
                                            <input type="text" name="city" class="form-control input-default " placeholder="Input City" value="<?php echo $data[0] -> acity; ?>">
                                        </div>
                                        <hr />
                                        <div class="form-group">
                                            <label>Title</label>
                                            <input type="text" name="title" class="form-control input-default " placeholder="Input Title" value="<?php echo $data[0] -> atitle; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Price</label>
                                            <input type="text" name="price" class="form-control input-default " placeholder="Input Price" value="<?php echo $data[0] -> aprice; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Content</label>
                                        <textarea class="textarea_editor form-control" placeholder="Enter text ..." name="content"><?php echo $data[0] -> adesc; ?></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Status</label>
                                            <?php echo __get_status($data[0] -> astatus,2); ?>
                                        </div>
                                        <div class="form-group">
                                            <label>See <?php echo count($photos); ?> photos</label>
                                            <div class="row">
                                            <?php foreach($photos as $k => $v) : ?>
                                                <a href="<?php echo __get_upload_file($v['img'], 2); ?>" target="_blank">
                                                <div class="col-3" style="border: 1px solid #ccc;margin: 5px;display: table;"><img src="<?php echo __get_upload_file($v['img'], 2); ?>" style="max-height: 100px"></div>
                                                  <a href="<?php echo site_url('ads/image-remove/'. $id .'/?img=' . $v['img']); ?>" onclick="return confirm('Are you sure you want to delete this item?');"><i class="fa fa-remove"></i></a>
                                                </a>
                                            <?php endforeach;?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-info">Submit <i class="fa fa-save"></i></button>
                                            <button type="button" class="btn btn-secondary" onclick="location.href='javascript:history.go(-1);'">Back <i class="fa fa-arrow-circle-left"></i></button>
                                        </div>
                                    </form>
                                    <form action="<?php echo site_url('ads/upload/' . $id); ?>" class="dropzone" method="post">
                                        <div class="fallback">
                                            <input name="file" type="file" multiple />
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /# column -->
                </div>
                <!-- /# row -->