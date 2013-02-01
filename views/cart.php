<div class="hero-unit" id="largeCart">
	<?php if (isset($cart) && is_array($cart)): ?>
	<h2>In Your Cart:</h2>
	<table>
		<tr>
			<th>Product</th>
			<th></th>
			<th class="qty">Qty</th>
			<th class="subtotal">Subtotal</th>
		</tr>
		<?php foreach ($cart as $item): ?>
		<tr>
			<td class="img"><img src="<?=BASE_PATH?>media/<?=$item['img']?>" width="50" /></td>
			<td class="name"><?=$item['name']?></td>
			<td class="qty"><input type="number" min="0" id="qty<?=$item['id']?>" max="999" value="<?=$item['qty']?>"></td>
			<td class="cost">$<span id="subtotal<?=$item['id']?>"><?=number_format($item['cost'])?></span></td>
		</tr>
		<?php endforeach; ?>
	</table>
	<div class="totalbox">
	<h4>Grand Total</h4>
	<p class="price total">$<span>100.00</span></p>
	<p><a class="btn btn-primary btn-large" href="javascript:alert('This is only a demo.')">Checkout &raquo;</a></p>
	</div>
	<?php else: ?>
	<h2>Cart is Empty</h2>
	<p><a class="btn btn-primary btn-large" href="<?=BASE_PATH?>products">Go Shopping &raquo;</a></p>
	<?php endif; ?>
</div>
