<?php foreach ($contacts as $contact) : ?>
	<div class="list clearfix contactListInfo" data-contact-id="<?php echo $contact['contact_id']; ?>">
		<div class="col-md-1 pull-right">
			<a href="index.php/contact/edit_contact_modal/<?php echo $contact['contact_id']; ?>" data-toggle="modal" data-target="#contactModal"><span class="glyphicon glyphicon-edit"></span></a>
		</div>
		<div class="col-md-6">
			<strong><?php echo $contact['first_name'].' '.$contact['last_name']; ?></strong>
			<br>
			<span class="lite"><?php echo $contact['email_address']; ?></span>
		</div>
		<div class="col-md-5">
			<div class="phoneAddressInfo">
				<strong><?php echo empty($contact['phone_home']) ? $contact['phone_mobile'] : $contact['phone_home']; ?></strong>
				<br>
				<span class="lite"><?php echo !empty($contact['address_city']) ? $contact['address_city'].', '.$contact['address_country'] : $contact['address_country']; ?></span>
			</div>
		</div>
		<div class="col-md-12 list altInfo" style="border-top: none"></div>
	</div>
<?php endforeach; ?>
<script>
$(document).ready(function() {
	$('.contactListInfo').click(function () {
		$( '.altInfo' ).slideUp(400);
		$( '.phoneAddressInfo' ).slideDown(400);
		$( this ).children( '.col-md-5' ).children( '.phoneAddressInfo' ).hide();
		$( this ).children( '.altInfo' ).load('index.php/contact/contact_info_modal/' + $( this ).data('contact-id')).slideDown(400);
	});
});
</script>