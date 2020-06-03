<?php
$path = realpath(__DIR__);
include_once($path . '/./include/header.php');
include_once('./controlllers/CartController.php');
?>

<div class="container mt-3 text-center">
	<p class="h3">Cart</p>
	<?php
	if (isset($alert)) {
		echo $alert;
	}
	?>
</div>


<div class="container mt-4 bg-white">
	<table class="table">
		<thead class="thead-dark">
			<tr>
				<th>ProductName</th>
				<th>Price</th>
				<th>Quantity</th>
				<th>Image</th>
				<th>Total price</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>

			<?php
			$listCart = $cartController->showCart();
			if ($listCart) {
				while ($item = $listCart->fetch_assoc()) {
			?>

					<tr>
						<td scope="row">
							<?php echo $item['productName'] ?>
						</td>
						<td>
							<?php echo $item['price'] ?>
						</td>
						<td>
							<form action="cartEdit.php" method="get">
								<input value="<?php echo $item['id'] ?>" type="hidden" name="itemId">
								<input type="number" name="quantity" id="" value="<?php echo $item['quantity'] ?>" min="1">
								<button class="btn btn-primary" type="submit">
									<i class="fa fa-refresh" aria-hidden="true"></i>
									Update
								</button>
							</form>
						</td>
						<td>
							<img height="50px" src="admin/uploads/<?php echo $item['image'] ?>" alt="">
						</td>
						<td>
							<?php
							echo $item['price'] * $item['quantity'];
							?>
						</td>
						<td>
							<form action="cartDelete.php" method="POST">
								<input value="<?php echo $item['id'] ?>" type="hidden" name="itemId">
								<button type="submit" class="close" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</form>
						</td>
					</tr>

			<?php }
			} ?>
		</tbody>
	</table>
</div>

<?php
include('./include/footer.php');
?>