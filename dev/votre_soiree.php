<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>Votre soirée</title>
<link href="jquery-ui-1.10.1.css" rel="stylesheet">
<link rel="stylesheet" href="datepicker.css">
<link href="style.css" rel="stylesheet">
<style>
#progressbar li.active::before, #progressbar li.active::after{
background: #27AE60 !important;
color: white !important;
}
</style>
  <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&signed_in=true&libraries=places"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
  <script src="http://code.jquery.com/ui/1.11.3/jquery-ui.js"></script>
  <script>
    $(function() {
      $( "#date-picker-input-1" ).datepicker({
        altField: "#datepicker",
        closeText: 'Fermer',
        prevText: 'Précédent',
        nextText: 'Suivant',
        currentText: 'Aujourd\'hui',
        monthNames: ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre'],
        monthNamesShort: ['Janv.', 'Févr.', 'Mars', 'Avril', 'Mai', 'Juin', 'Juil.', 'Août', 'Sept.', 'Oct.', 'Nov.', 'Déc.'],
        dayNames: ['Dimanche', 'Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi'],
        dayNamesShort: ['Dim.', 'Lun.', 'Mar.', 'Mer.', 'Jeu.', 'Ven.', 'Sam.'],
        dayNamesMin: ['D', 'L', 'M', 'M', 'J', 'V', 'S'],
        weekHeader: 'Sem.',
        dateFormat: 'dd/mm/yy'
      })
      .datepicker('widget').wrap('<div class="ll-skin-melon"/>');
    });
  </script>
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
    <input type="text" name="date" placeholder="Date de la soirée" id="date-picker-input-1"><br>
    <input type="number" name="nb_invite" placeholder="Nombre d'invités"><br>
  <div class="txtleft">
       <select name="evenement" id="evenement">
            <option value="" disabled selected>Type d'évènement :</option>
             <option value="Anniversaire">Anniversaire</option>
             <option value="Rallyes">Rallyes</option>
             <option value="Séminaire">Séminaire</option>
             <option value="Fêtes">Fêtes</option>
             <option value="Mariage">Mariage</option>
             <option value="Autres">Autres</option>
       </select>

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
