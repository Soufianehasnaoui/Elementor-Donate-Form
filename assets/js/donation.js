var data = {
    type_product: 'fois',
    type_amount:'',
    name: '',
    email: '',
    telephone: '',
    amount: 20,
    note: '',
    confirme : '',
};
jQuery(document).ready(function(jQuery) {
    jQuery('.taggle-button .right').click(function(){
        jQuery('.taggle-button .active').removeClass('left');
        jQuery('.taggle-button .active').addClass('right');
    });
    jQuery('.taggle-button .left').click(function(){
        jQuery('.taggle-button .active').removeClass('right');
        jQuery('.taggle-button .active').addClass('left');
    });
    jQuery('.list-amount span').click(function(){
        jQuery('.list-amount span').removeClass('active');
        jQuery(this).addClass('active');
        console.log('amount',jQuery(this).data("amount"));
        if(jQuery(this).data("amount") === ""){
            jQuery('.custom-amount').addClass('active');
            data['type_amount']="custom";
        }else{
            jQuery('.custom-amount').removeClass('active');
            jQuery('.custom-amount #amount').val('');
            data['amount'] = jQuery(this).data("amount");
            data['type_amount']="";
        }
    });
    jQuery('#donation-button').click(function(){
        data['name'] = jQuery('.form-info #name').val();
        data['email'] = jQuery('.form-info #email').val();
        data['telephone'] = jQuery('.form-info #numberphone').val();
        data['note'] = jQuery('.form-info #note').val();
        data['amount'] = data['amount'];
        if(checkfildes(data)){
            add_product_custom_amount(data);
        }
    });
});
function checkfildes(data){
    var status = true ; 
    jQuery('.error').remove();
    if(data.name == ''){
        jQuery('#donation-button').after('<p class="error" style="color:red">* Le champ du nom est requis et ne peut pas être vide.</p>');
        status=false;
    }
    if(data.email == ''){
        jQuery('#donation-button').after("<p class='error' style='color:red'>* Le champ de l'adresse e-mail est requis.</p>");
        status=false;
    }
    if(data.telephone == ''){
        jQuery('#donation-button').after('<p class="error" style="color:red">* Le numéro de téléphone doit contenir 10 chiffres.</p>');    
        status=false;
    }
    if(data.amount == '' &&  data['type_amount'] === 'custom'){
        jQuery('.custom-amount').after('<p class="error" style="color:red">* Veuillez choisir le montant que vous souhaitez donner.</p>');    
        status=false;
    }
    if(jQuery('#confirmation').is(':not(:checked)')){
        jQuery('#donation-button').after('<p class="error" style="color:red">* Veuillez accepter les termes et conditions.</p>');    
        status=false;
    }
    return status;
}
const domainName = window.location.origin;
var popupHtmlthank = `
<div id="product-popup" class="popup">
    <div class="popup-content">
        <span class="close">&times;</span>
        <h2>L’arbre a été ajouté avec succès à votre panier ! 🎉</h2>
        <p>Souhaitez-vous continuer à ajouter des dons</p>
        <div class="grp-buttons">
            <a href="#" class="btn-Complete">Compléter le don</a>
            <a href="${domainName}/paiement/">Aller au paiement</a>
        </div>
    </div>
</div>
`;
var popupHtmlerror = `
<div id="product-popup" class="popup">
    <div class="popup-content">
        <span class="close">&times;</span>
        <h2>Une erreur est survenue lors de l'ajout du don, l'opération n'a pas pu être effectuée. Veuillez réessayer.</h2>
    </div>
</div>
`;
function add_product_custom_amount(){
  jQuery.ajax({
      url: ajax_object.ajax_url,
      type: 'POST',
      data: {
          action: 'add_to_cart_with_custom_amount',
          type_product : data.type_product,
          name: data.name,
          email: data.email,
          telephone: data.telephone,
          note: data.note,
          amount: data.amount,
      },
      success: function(response) {
          console.log('Response:', response);
          jQuery('body').append(popupHtmlthank);
      },
      error: function(xhr, status, error) {
          console.error('Error:', error);
          jQuery('body').append(popupHtmlerror);
      }
  });
}