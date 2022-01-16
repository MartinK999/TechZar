function validateInput(element, validationFunction) {
    element.oninput = function (event) {
        let result = validationFunction(event.target.value);
        let erId = "er-" + element.id;
        let errorEle = document.getElementById(erId);

        if (result != null) {
            // nastala chyba
            if (errorEle == null) {
                errorEle = document.createElement("div")
                errorEle.classList.add("error");
                errorEle.id = erId;
            }
            errorEle.innerText = result;
            element.after(errorEle);
            element.parentElement.classList.add("has-error");
        } else {
            // ziadna chyba
            errorEle?.remove();
            element.parentElement.classList.remove("has-error");
        }
        checkFormState();
    }

}

function checkFormState() {
    if (document.querySelectorAll(".error").length == 0) {
        document.getElementById("submit").disabled = false;
        document.getElementById("submit-info").style.display = "none";
    } else {
        document.getElementById("submit").disabled = true;
        document.getElementById("submit-info").style.display = "block";
    }
}



window.onload = () => {

    validateInput(document.getElementById("text"), function (value = null) {
        if (value == null || value.length == 0) {
            return "Vaša recenzia nemôže byť prázdna!";
        }
    });


}
