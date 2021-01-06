                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

                    <div class="row">
                        <div class="col-lg-8">
                            <?php if ($this->session->flashdata('flash')) : ?>
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                              SKPI <strong>successful</strong> <?= $this->session->flashdata('flash'); ?>
                              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <?php endif; ?>
                            <?= form_open_multipart('skpi/index');?>
                            <input type="hidden" name="user_id" value="<?= $user['id']; ?>">
                            <div class="form-group">
                                <select name="category_id" id="category_id" class="form-control">
                                    <option selected>-- Select Category --</option>
                                    <?php foreach ($category as $C) : ?>
                                    <option value="<?= $C['id']; ?>"><?= $C['category']; ?></option>
                                    <?php endforeach; ?> -->
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="activity_name">Name of Activity</label>
                                <input type="text" name="activity_name" class="form-control" id="activity_name" value="">
                                <?= form_error('activity_name','<small class="text-danger ml-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="location">Location</label>
                                <input type="text" name="location" class="form-control" id="location" value="">
                                <?= form_error('location','<small class="text-danger ml-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="date">Date</label>
                                <input type="date" id="date" name="date" class="form-control col-lg-4">
                            </div>
                            <div class="form-group">
                                <select name="level" id="level" class="form-control col-lg-4">
                                    <option selected>-- Select Level --</option>
                                    <?php foreach ($level as $L) : ?>
                                    <option value="<?= $L['id']; ?>"><?= $L['level']; ?></option>
                                    <?php endforeach; ?> -->
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="code_number">Code Number</label>
                                <input type="text" name="code_number" class="form-control" id="code_number" value="">
                                <?= form_error('code_number','<small class="text-danger ml-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="file">Upload File</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="fileskpi" name="fileskpi">
                                    <label class="custom-file-label" for="fileskpi">Choose file</label>
                                </div>
                            </div>
                            <div class="form-group row justify-content-end">
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-primary float-right">
                                        Upload
                                    </button>
                                </div>
                            </div>

                            </form>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->