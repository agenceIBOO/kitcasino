<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>Votre soirée</title>
<link rel="stylesheet" href="style.css">
<style>
#progressbar li.active::before, #progressbar li.active::after{
background: #27AE60 !important;
color: white !important;
}
</style>
  <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&signed_in=true&libraries=places"></script>
    <script>
// This example displays an address form, using the autocomplete feature
// of the Google Places API to help users fill in the information.

var placeSearch, autocomplete;
var componentForm = {
  street_number: 'short_name',
  route: 'long_name',
  locality: 'long_name',
  administrative_area_level_1: 'short_name',
  country: 'long_name',
  postal_code: 'short_name'
};

function initialize() {
  // Create the autocomplete object, restricting the search
  // to geographical location types.
  autocomplete = new google.maps.places.Autocomplete(
      /** @type {HTMLInputElement} */(document.getElementById('autocomplete')),
      { types: ['geocode'] });
  // When the user selects an address from the dropdown,
  // populate the address fields in the form.
  google.maps.event.addListener(autocomplete, 'place_changed', function() {
    fillInAddress();
  });
}

// [START region_fillform]
function fillInAddress() {
  // Get the place details from the autocomplete object.
  var place = autocomplete.getPlace();

  for (var component in componentForm) {
    document.getElementById(component).value = '';
    document.getElementById(component).disabled = false;
  }

  // Get each component of the address from the place details
  // and fill the corresponding field on the form.
  for (var i = 0; i < place.address_components.length; i++) {
    var addressType = place.address_components[i].types[0];
    if (componentForm[addressType]) {
      var val = place.address_components[i][componentForm[addressType]];
      document.getElementById(addressType).value = val;
    }
  }
}
// [END region_fillform]

    </script>
<style>
</style>
</head>
<body onload="initialize()">

  <form method="post" action="vos_jeux.php" id="msform">
  <!-- progressbar -->
   <ol class="progtrckr" data-progtrckr-steps="5">
    <li class="progtrckr-done">Vous</li><li class="progtrckr-todo">Votre soirée</li><li class="progtrckr-todo">Vos jeux</li><li class="progtrckr-todo">Récapitulatif</li><li class="progtrckr-todo">Confirmation</li>
  </ol>
  <!-- fieldsets -->
<fieldset>
    <h2 class="fs-title">Votre soirée</h2>
    <h3 class="fs-subtitle">Dites-nous en plus sur la soirée que vous voulez organiser</h3>
    <span id="locationField"><input id="autocomplete" name="adresse2" onFocus="geolocate()" type="text" size="50" placeholder="Adresse de l'évènement" autofocus></input></span><br>
    <input type="date" name="date" placeholder="Date de la soirée"><br>
    <input type="number" name="nb_invite" placeholder="Nombre d'invités"><br>
  <div class="txtleft">
<label for="evnment">Type de soirée :</label>
<input list="evenement" type="text" id="evnment">
<datalist id="evenement">
<option value="Anniversaire">
      <option value="Mariage">
      <option value="Séminaires">
      <option value="Rallyes">
      <option value="Jupiter">
      <option value="Fêtes (Noël etc...)">
      <option value="Autres">
</datalist>
  </div>
    <input type="hidden" name="nom" value="<?php echo $_POST['nom']; ?>">
<input type="hidden" name="prenom" value="<?php echo $_POST['prenom']; ?>">
<input type="hidden" name="adresse" value="<?php echo $_POST['adresse']; ?>">
<input type="hidden" name="tel" value="<?php echo $_POST['tel']; ?>">
<input type="hidden" name="mail" value="<?php echo $_POST['mail']; ?>">

<input type="button" value="Retour en arrière" class="red" onClick="self.history.back();">
<input type="submit" name="submit" class="action-button" value="Poursuivre">
  </fieldset>
</form>

<!-- Mascotte: Afin de vous guider au mieux dans l'organisation de votre soirée, merci de nous donner plus d'infos sur celle-ci! (frais de livraison?) -->
</body>
</html>
