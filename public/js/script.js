function duplicateIngredient() {
    var originalIngredient = document.querySelector('.ingredient:last-child');
    var newIngredient = originalIngredient.cloneNode(true);

    newIngredient.value = '';

    originalIngredient.parentNode.appendChild(newIngredient);
}

function duplicateStep() {
    var originalStep = document.querySelector('.step:last-child');
    var newStep = originalStep.cloneNode(true);

    newStep.value = '';

    originalStep.parentNode.appendChild(newStep);
}