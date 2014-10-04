	<div class="title">Contacts</div>
	<div class="content padded clearfix">
		<form id="contactSearchForm" action="" method="post">
			<div class="col-md-9">
				<input name="searchString" placeholder="Contact ID, First Name, Last Name, Email" class="text passive input-lg section" type="text" size="30" />
			</div>
			<div class="col-md-3">
				<button id="searchButton" class="btn btn-primary pull-right">Search Contacts</button>
			</div>
		</form>
		<div class="col-md-12">
			<a id="createButton" class="btn btn-primary pull-left" href="index.php/contact/create_contact_modal" data-toggle="modal" data-target="#contactModal">Create New Contact</a>
		</div>
	</div>
	<div id="contactData" class="content padded">
	</div>

	<div class="modal fade" id="contactModal" tabindex="-1" role"dialog" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div><!-- /.modal -->
<script>
$(document).ready(function() {
	$('#contactData').hide();

	$('body').on('hidden.bs.modal', '.modal', function () {
	 	$(this).removeData('bs.modal');
	});
	
	$('#searchButton').click(function(e){
		e.preventDefault();
		$.ajax({
			url: 'index.php/contact/ajax_search',
			data: $('#contactSearchForm').serialize(),
			dataType: 'json',
			type: 'POST',
			success: function(data) {
				if (data.success) {
					$('#contactData').html(data.response).show();
				}
			}
		});
	});
});
</script>