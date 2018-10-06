document.addEventListener("DOMContentLoaded", function(event) {
  increaseDecreaseQuantity();
  enableUpdateButton('.quantity-input');
  showPOForm();
  showGDPRForm();
});


function increaseDecreaseQuantity() {
  $('.qty-increment-cart').click(function(event) {
    var quantityFieldID=$(this).attr('data-id');
    var input=  document.getElementById(quantityFieldID);
    var maxValue=$(input).attr('max');
    if(!input.value){
      input.value=1;
    }
    if(parseInt(input.value)>=maxValue){
      return;
    }
    var buttonID= $('#'+quantityFieldID).attr('button-target');
    var button= $('#'+buttonID).removeAttr('disabled');
    input.value=parseInt(input.value)+1;
  });

  $('.qty-decrement-cart').click(function(event) {
    var quantityFieldID=$(this).attr('data-id');
    var input=  document.getElementById(quantityFieldID);
    if(!input.value ){
      input.value=1;
    }
    if(input.value>1){
      input.value=parseInt(input.value)-1;

    }
    var buttonID= $('#'+quantityFieldID).attr('button-target');
    var button= $('#'+buttonID).removeAttr('disabled');
  });



}

function increaseDecreaseQuantityField(quantityFieldID) {

  console.log(input.value);
  return input;
}

function enableUpdateButton(quantityInput) {
  $(quantityInput).change(function(event) {
    var buttonID= $(this).attr('button-target');
    var button= $('#'+buttonID).removeAttr('disabled');
  });

}

function showPOForm() {
  $('input[name=paymentMethod]').change(function(event) {
    if($(this).val()=='invoiceRequest'){
      console.log('it has changed');
      $('.poCode').slideDown();
      $('.paypal-btn').hide('slow');
      $('.place-booking-btn').show('slow');
    }else {
      $('.poCode').slideUp('slow');
      $('.place-booking-btn').hide('slow');
      $('.paypal-btn').show('slow');

    }
  });
}

function showGDPRForm() {
  $('input[name=signUpForNews]').change(function(event) {
    if($(this).val()=='Yes'){
      console.log('it has changed');
      $('.check-box-group-gdpr').slideDown();
    }else {
      $('.check-box-group-gdpr').slideUp('slow');
    }
  });
}
