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

    validateInput(document.getElementById("title"), function (value = null) {
        if (value == null || value.length == 0) {
            return "Nadpis musí byť zadaný!";
        }
    });

    validateInput(document.getElementById("address"), function (value = null) {
        if (value == null || value.length == 0) {
            return "Adresa musí byť zadaná!";
        }
    });

    validateInput(document.getElementById("mobil"), function (value = null) {
        if (value != null && value.length > 0) {
            let re = new RegExp('^\\+421([0-9]{9}|(( {0,1}[0-9]{3}){3}))$');
            if (!re.test(value)) {
                return "Zadané telefónne číslo nie je v správnom tvare!"
            }
        }
    });

    validateInput(document.getElementById("price"), function (value = null) {
        if (value == null || value.length == 0) {
            return "Cena musí byť zadaná!";
        }

        let re = new RegExp('^\\d+$');
        if (!re.test(value)) {
            return "Cena môže obsahovať len čísla!"
        }
    });
}
