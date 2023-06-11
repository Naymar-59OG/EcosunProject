document.addEventListener("DOMContentLoaded", function () {
  var form = document.querySelector("form");
  form.addEventListener("submit", function (event) {
    var inputs = form.querySelectorAll("input[type='number']");
    var invalidInput = false;

    for (var i = 0; i < inputs.length; i++) {
      var inputValue = parseInt(inputs[i].value);

      if (inputValue <= 0 || isNaN(inputValue)) {
        invalidInput = true;
        break;
      }
    }

    if (invalidInput) {
      event.preventDefault();
      alert(
        "Veuillez entrer des valeurs supérieures à zéro pour tous les champs."
      );
    }
  });
});
