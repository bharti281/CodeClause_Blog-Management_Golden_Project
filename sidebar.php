<?php include 'config.php';
$select = "SELECT * FROM categories";
$query = mysqli_query($config,$select);
// recent Posts
$select2 = "SELECT * FROM blog ORDER BY publish_date limit 5";
$query2 = mysqli_query($config,$select2);
?>
<div class="col-lg-4">
			<div class="card">
				<div class="card-body d-flex right-section">
					<div id="categories">
						<h6 class=" bg-primary text-light">Categories</h6>
						<ul>
						    <?php while($cats = mysqli_fetch_assoc($query)) { ?>
						    <li>
						        <a href ="category.php?id=<?= $cats['cat_id'] ?>"class="text-primary fw-bold"><?= $cats['cate_name']?></a>
						    </li>
						    <?php } ?>
						</ul>
					</div>
				    <div id="posts">
						<h6 class="bg-primary text-light ">Recent Posts</h6>
						<ul>
						    <?php while($posts = mysqli_fetch_assoc($query2)) { ?>
							<li> <a href ="single_post.php?id=<?=$posts['blog_id'] ?>"class="text-primary fw-bold"><?= $posts['blog_title']?></a></li>
							  <?php } ?>
						</ul>
					</div>
				</div>
			</div>
		</div>