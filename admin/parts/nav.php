<ul class="nav" data-image="assets/img/sidebar-5.jpg">
	<li <?php if($page == "home"){ echo "class='nav-item active'"; }?>>
		<a class="nav-link" href="/admin">
				<i class="nc-icon nc-pin-3"></i>
				<p>Home</p>
		</a>
	</li>
	<li <?php if($page == "users"){ echo "class='nav-item active'"; }?>>
		<a class="nav-link" href="./user.html">
				<i class="nc-icon nc-circle-09"></i>
				<p>Users</p>
		</a>
	</li>
	<li <?php if($page == "products"){ echo "class='nav-item active'"; }?>>
		<a class="nav-link" href="/admin/products.php">
				<i class="nc-icon nc-tag-content"></i>
				<p>Products</p>
		</a>
	</li>
	<li <?php if($page == "catigories"){ echo "class='nav-item active'"; }?>>
		<a class="nav-link" href="/admin/category.php">
				<i class="nc-icon nc-palette"></i>
				<p>Catigories</p>
		</a>
	</li>
	<li <?php if($page == "orders"){ echo "class='nav-item active'"; }?>>
		<a class="nav-link" href="/admin/orders.php">
				<i class="nc-icon pe-7s-shopbag"></i>
				<p>orders</p>
		</a>
	</li>
	<li>
		<a class="nav-link" href="#">
				<i class="nc-icon nc-key-25"></i>
				<p>Log out</p>
		</a>
	</li>
</ul>