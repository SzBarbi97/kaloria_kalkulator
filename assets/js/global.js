function calculateBMR(magassag, testsuly, eletkor, nem) {
    var bmr;
    if (nem.toLowerCase() == "férfi") {
        // Férfiaknak: BMR = 10 x testsuly + 6,25 x magassag – 5 x eletkor + 5
        bmr = 10 * testsuly + 6.25 * magassag - 5 * eletkor + 5;
    } else {
        // Nőknek: BMR = 10 x testsuly + 6,25 x magassag – 5 x eletkor – 161
        bmr = 10 * testsuly + 6.25 * magassag - 5 * eletkor - 161;
    }

    return bmr;
}

function logout() {
    // todo : session kezelés
    window.location.href = "../index.php";
}