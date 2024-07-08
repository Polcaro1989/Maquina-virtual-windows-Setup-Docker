function validateForm() {
    var name = document.getElementById("name").value;
    var phonenumber = document.getElementById("phonenumber").value;
    var emailaddres = document.getElementById("emailaddres").value;
    var subject = document.getElementById("subject").value;
    var message = document.getElementById("message").value;
    var isValid = true;

    // Validar o campo de nome
    if (name == "") {
        document.getElementById("nameError").innerHTML = "Por favor, preencha o campo de nome!";
        isValid = false;
    } else {
        document.getElementById("nameError").innerHTML = "";
    }

    // Validar o campo de número de telefone
    if (phonenumber == "") {
        document.getElementById("phonenumberError").innerHTML = "Por favor, preencha o campo de número de telefone!";
        isValid = false;
    } else {
        document.getElementById("phonenumberError").innerHTML = "";
    }

    // Validar o campo de email
    if (emailaddres == "") {
        document.getElementById("emailError").innerHTML = "Por favor, preencha o campo de email!";
        isValid = false;
    } else {
        document.getElementById("emailError").innerHTML = "";
    }

    // Validar o campo de mensagem
    if (message == "") {
        document.getElementById("messageError").innerHTML = "Por favor, preencha o campo de mensagem!";
        isValid = false;
    } else {
        document.getElementById("messageError").innerHTML = "";
    }

    return isValid;
}