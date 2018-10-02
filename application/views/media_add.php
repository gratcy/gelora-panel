        <!-- Page wrapper  -->
        <div class="page-wrapper">
            <!-- Bread crumb -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">Media</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Media</li>
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
                                <h4 class="card-title">Dropzone</h4>
                                <h6 class="card-subtitle">You can upload multiple image at <code>dropzone</code> form.</h6>
                                <form action="<?php echo site_url('media/add'); ?>" class="dropzone" method="post">
                                    <div class="fallback">
                                        <input name="file" type="file" multiple />
                                    </div>
                                </form>
                                <br />
                                    <div style="clear: both;"></div>
                                        <div class="form-group">
                                            <button type="button" class="btn btn-secondary" onclick="location.href='<?php echo site_url('media'); ?>'">Back to Media <i class="fa fa-arrow-circle-left"></i></button>
                                        </div>
                            </div>
                        </div>
                    </div>
                </div>
