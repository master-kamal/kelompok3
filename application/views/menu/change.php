                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
					<form action="" method="post">
	                    <input type="hidden" name="id" value="<?= $menu['id']; ?>">
						<input type="text" name="menu" class="form-control" id="menu" value="<?=$menu['menu']; ?>"> 
						<button type="submit" name="tambah" class="btn btn-primary float-right mt-3">Change</button>   
					</form>
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->