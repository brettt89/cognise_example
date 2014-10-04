<div class="modal-header">
  <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
  <h4 class="modal-title">Create New Contact</h4>
  <div class="alert alert-success" role="alert"></div>
  <div class="alert alert-danger " role="alert"></div>
</div>
<div class="modal-body">
  <form action="" id="contactCreateForm" autocomplete="off" accept-charset="utf-8" method="post">
    <div class="section_row">
      <div class="section half">
        <label>First Name*
        <input placeholder="Joe" class="text passive" name="first_name" type="text"></label>
      </div>

      <div class="section half">
        <label>Last Name*
        <input placeholder="Blogg" class="text passive" name="last_name" type="text"></label>
      </div>
    </div>
    
    <div class="section_row">
      <div class="section full">
        <label>Email*
        <input placeholder="joe.blogg@email.com" class="text passive" name="email_address" type="text"></label>
      </div>
    </div>

    <div class="section_row">
      <div class="section half">
        <label>Home Number
        <input placeholder="+6410000000" class="text passive" name="phone_home" type="text"></label>
      </div>
      <div class="section half">
        <label>Mobile Number
        <input placeholder="+64123456789" class="text passive" name="phone_mobile" type="text"></label>
      </div>
    </div>

    <div class="section_row">
      <div class="section half">
        <label>Address Line 1
        <input placeholder="Street Number + Name" class="text passive" name="address_one" type="text"></label>
      </div>
      <div class="section half">
        <label>Address Line 2
        <input placeholder="" class="text passive" name="address_two" type="text"></label>
      </div>
    </div>

    <div class="section_row">
      <div class="section half">
        <label>Suburb
        <input placeholder="Suburb" class="text passive" name="address_suburb" type="text"></label>
      </div>
      <div class="section half">
        <label>City
        <input placeholder="City" class="text passive" name="address_city" type="text"></label>
      </div>
    </div>
    <div class="section_row">
      <div class="section half">
        <label>Country
        <input placeholder="Country" class="text passive" name="address_country" type="text"></label>
      </div>
      <div class="section half">
        <label>Postcode
        <input placeholder="0000" class="text passive" name="address_postcode" type="text"></label>
      </div>
    </div>
  </form>
</div>
<div class="modal-footer">
  <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
  <button id="createContact" type="button" class="btn btn-primary">Create Contact</button>
</div>
<script>
$(document).ready(function() {
  $('#createContact').click(function(e){
    e.preventDefault();
    $.ajax({
      url: 'index.php/contact/ajax_register',
      data: $('#contactCreateForm').serialize(),
      dataType: 'json',
      type: 'POST',
      success: function(data) {
        if (data.success) {
          $('.alert').hide();
          $('.alert-success').html('Successfully Created New Contact.').slideDown(400);
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