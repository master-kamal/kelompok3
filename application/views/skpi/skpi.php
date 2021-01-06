                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

                    <div class="row">
                        <div class="col-lg">
                            <table class="table table-hover">
                              <thead>
                                <tr>
                                  <th scope="col">#</th>
                                  <th scope="col">Activity of Name</th>
                                  <th scope="col">Location</th>
                                  <th scope="col">Date</th>
                                  <th scope="col">Level</th>
                                  <th scope="col">Code Number</th>
                                  <th scope="col">File</th>
                                  <th scope="col">Point</th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($skpi as $s) : ?>
                                <tr>
                                  <th scope="row"><?= $i; ?></th>
                                  <td><?= $s['activity_name']; ?></td>
                                  <td><?= $s['location']; ?></td>
                                  <td><?= $s['date']; ?></td>
                                  <td><?= $s['level']; ?></td>
                                  <td><?= $s['code_number']; ?></td>
                                  <td><a href="<?= base_url('assets/file/skpi/') . $s['file']; ?>" class="btn btn-primary btn-sm">Open</a></td>
                                  <td><?= $s['point']; ?></td>
                                </tr>
                                <?php $i++; ?>
                                <?php endforeach; ?>
                              </tbody>
                            </table>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->