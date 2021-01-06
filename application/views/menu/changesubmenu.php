                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
					<form action="" method="post">
						<input type="hidden" name="id" value="<?= $submenu['id']; ?>">
	                    <div class="form-group">
						    <label for="title">Title</label>
						    <input type="text" name="title" class="form-control" id="title" value="<?=$submenu['title']; ?>">
						</div>
						<div class="form-group">
							<select name="menu_id" id="menu_id" class="form-control">
						    	<?php foreach ($menu as $m) : ?>
						    	<?php if( $m['menu'] == "Administrator") : ?>
						    		<?php $smenu=1; ?>
						    	<?php elseif ($m['menu'] == "Skpi") : ?>
						    		<?php $smenu=2; ?>
						    	<?php elseif ($m['menu'] == "User") : ?>
						    		<?php $smenu=3; ?>
						    	<?php else : ?>
						    		<?php $smenu=4; ?>
						    	<?php endif ?>
						    	<?php if( $smenu == $submenu['menu_id']) : ?>
						    		<option value="<?= $m['id']; ?>" selected>
						    		<?= $m['menu']; ?>
						    	<?php else : ?>
						    		<option value="<?= $m['id']; ?>">
						    		<?= $m['menu']; ?>
						    	</option>
						    	<?php endif; ?>
						    	<?php endforeach; ?>
						    </select>
						</div>
						<div class="form-group">
						    <label for="url">Url</label>
						    <input type="text" name="url" class="form-control" id="url" value="<?= $submenu['url']; ?>">
						</div>
						<div class="form-group">
						    <label for="icon">Icon</label>
						    <input type="text" name="icon" class="form-control" id="icon" value="<?= $submenu['icon']; ?>">
						</div>
						<div class="form-group">
							<?php if($submenu['is_active']==1) : ?>
								<div class="form-check">
								  <input class="form-check-input" type="checkbox" value="1" id="is_active" name="is_active" checked>
								  <label class="form-check-label" for="is_active">
								    Active?
								  </label>
								</div>
							<?php else : ?>
								<div class="form-check">
								  <input class="form-check-input" type="checkbox" value="1" id="is_active" name="is_active">
								  <label class="form-check-label" for="is_active">
								    Active?
								  </label>
								</div>
							<?php endif ?>
						</div>
						<button type="submit" name="tambah" class="btn btn-primary float-right mt-3">Change</button>   
					</form>
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->