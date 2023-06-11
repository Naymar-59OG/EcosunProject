var myInput = document.getElementById("psswrd");
var alpabet = document.getElementById("alpabet");
var capital = document.getElementById("capital");
var nombre = document.getElementById("nombre");
var long = document.getElementById("longueur");

myInput.onfocus = function () {
  document.getElementById("Message").style.display = "block";
};

myInput.onblur = function () {
  document.getElementById("Message").style.display = "none";
};

myInput.onkeyup = function () {
  var lowerCaseLetters = /[a-z]/g;
  var upperCaseLetters = /[A-Z]/g;
  var numbers = /[0-9]/g;
  var validLength = myInput.value.length >= 8;

  // Vérifier les critères un par un
  var isLowerCaseValid = myInput.value.match(lowerCaseLetters);
  var isUpperCaseValid = myInput.value.match(upperCaseLetters);
  var isNumberValid = myInput.value.match(numbers);

  // Mettre à jour les classes CSS en fonction des critères
  alpabet.classList.toggle("valide", isLowerCaseValid);
  alpabet.classList.toggle("invalide", !isLowerCaseValid);
  capital.classList.toggle("valide", isUpperCaseValid);
  capital.classList.toggle("invalide", !isUpperCaseValid);
  nombre.classList.toggle("valide", isNumberValid);
  nombre.classList.toggle("invalide", !isNumberValid);
  long.classList.toggle("valide", validLength);
  long.classList.toggle("invalide", !validLength);

  // Vérifier si tous les critères sont respectés
  var isFormValid =
    isLowerCaseValid && isUpperCaseValid && isNumberValid && validLength;

  // Récupérer le bouton de soumission du formulaire
  var submitButton = document.getElementById("submit");

  // Activer ou désactiver le bouton de soumission en fonction de la validité du formulaire
  submitButton.disabled = !isFormValid;
};

// Écouter l'événement de soumission du formulaire
var form = document.getElementById("myForm");
form.addEventListener("submit", function (event) {
  // Vérifier si les critères ne sont pas respectés
  if (
    !myInput.value.match(/[a-z]/) ||
    !myInput.value.match(/[A-Z]/) ||
    !myInput.value.match(/[0-9]/) ||
    myInput.value.length < 8
  ) {
    // Empêcher la soumission du formulaire
    event.preventDefault();
    // Afficher un message d'alerte
    alert("Veuillez respecter les critères du mot de passe.");
  }
});

function passcheck() {
  let confpass = document.getElementById("confPasswrd").value;
  let passkeys = document.getElementById("psswrd").value;

  if (passkeys !== confpass) {
    alert("Vos mots de passe ne correspondent pas.");
  } else {
    console.log(passkeys);
    console.log(confpass);
  }
}

function validateNameLength() {
  var nomInput = document.getElementById("nom").value;
  var prenomInput = document.getElementById("prenom").value;

  if (nomInput.length < 2) {
    alert("Le nom est trop court. Veuillez saisir au moins 2 lettres.");
    return false;
  }

  if (prenomInput.length < 2) {
    alert("Le prénom est trop court. Veuillez saisir au moins 2 lettres.");
    return false;
  }

  return true;
}
function validateForm() {
  passcheck();

  if (!validateNameLength()) {
    return false;
  }
  return true;
}
