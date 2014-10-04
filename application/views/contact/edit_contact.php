<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
	<h4 class="modal-title">Update Contact</h4>
	<div class="alert alert-success" role="alert"></div>
	<div class="alert-danger alert" role="alert"></div>
</div>
<div class="modal-body">
	<form action="" id="contactEditForm" autocomplete="off" accept-charset="utf-8" method="post">
		<input type="hidden" id="contactId" name="contact_id" value="<?php echo $contact['contact_id'] ?>">
		<div class="section_row">
			<div class="section half">
				<label>First Name*
				<input placeholder="Joe" value="<?php echo $contact['first_name'] ?>" class="text passive" name="first_name" type="text"></label>
			</div>

			<div class="section half">
				<label>Last Name*
				<input placeholder="Blogg" value="<?php echo $contact['last_name'] ?>" class="text passive" name="last_name" type="text"></label>
			</div>
		</div>
		
		<div class="section_row">
			<div class="section full">
				<label>Email*
				<input placeholder="joe.blogg@email.com" value="<?php echo $contact['email_address'] ?>" class="text passive" name="email_address" type="text"></label>
			</div>
		</div>

		<div class="section_row">
			<div class="section half">
				<label>Home Number
				<input placeholder="+6410000000" value="<?php echo $contact['phone_home'] ?>" class="text passive" name="phone_home" type="text"></label>
			</div>
			<div class="section half">
				<label>Mobile Number
				<input placeholder="+64123456789" value="<?php echo $contact['phone_mobile'] ?>" class="text passive" name="phone_mobile" type="text"></label>
			</div>
		</div>

		<div class="section_row">
			<div class="section half">
				<label>Address Line 1
				<input placeholder="Street Number + Name" value="<?php echo $contact['address_one'] ?>" class="text passive" name="address_one" type="text"></label>
			</div>
			<div class="section half">
				<label>Address Line 2
				<input placeholder="" value="<?php echo $contact['address_two'] ?>" class="text passive" name="address_two" type="text"></label>
			</div>
		</div>

		<div class="section_row">
			<div class="section half">
				<label>Suburb
				<input placeholder="Suburb" value="<?php echo $contact['address_suburb'] ?>" class="text passive" name="address_suburb" type="text"></label>
			</div>
			<div class="section half">
				<label>City&nbsp;&nbsp;
				<input placeholder="City" value="<?php echo $contact['address_city'] ?>" class="text passive" name="address_city" type="text"></label>
			</div>
		</div>
		<div class="section_row">
			<div class="section half">
				<label>Country
				<input placeholder="Country" value="<?php echo $contact['address_country'] ?>" class="text passive" name="address_country" type="text"></label>
			</div>
			<div class="section half">
				<label>Postcode
				<input placeholder="0000" value="<?php echo $contact['address_postcode'] ?>" class="text passive" name="address_postcode" type="text"></label>
			</div>
		</div>
	</form>
</div>
<div class="modal-footer">
	<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
	<button id="editContact" type="button" class="btn btn-primary">Update Contact</button>
</div>
<script>
$(document).ready(function() {
	$('#editContact').click(function(e){
		e.preventDefault();
		$.ajax({
			url: 'index.php/contact/ajax_update',
			data: $('#contactEditForm').serialize(),
			dataType: 'json',
			type: 'POST',
			success: function(data) {
				if (data.success) {
					$('.alert').hide();
					$('.alert-success').html('Successfully Updated Contact.').slideDown(400);
					setTimeout(function(){location.reload()}, 800);
				} else {
					$('.alert').hide();
					var errors = '<b>Please fix up the errors before proceeding</b><br/>';
                    for(error in data.errors) {
                        if (data.errors.hasOwnProperty(error)) {
                            errors += '<li>'+data.errors[error]+'</li>';
                        }
                    }
					$('.alert-danger').html(errors).slideDown(400);
				}
			}
		});
	});
});
</script>