var inputProfil = document.getElementById("inputProfil"),
    inputProfil2 = document.getElementById("inputProfil2"),
    inputProfil3 = document.getElementById("inputProfil3"),
    inputProfil4 = document.getElementById("inputProfil4"),
    inputProfil5 = document.getElementById("inputProfil5"),
    tblEditProfile = document.getElementById("tblEditProfile");

function enalbeDisable() {
    if(inputProfil.disabled == true && inputProfil2.disabled == true && inputProfil3.disabled == true && inputProfil4.disabled == true && inputProfil5.disabled == true && tblEditProfile.disabled == true) {
        inputProfil.disabled = false;
        inputProfil2.disabled = false;
        inputProfil3.disabled = false;
        inputProfil4.disabled = false;
        inputProfil5.disabled = false;
        tblEditProfile.disabled = false;
    }

    else {
        inputProfil.disabled = true;
        inputProfil2.disabled = true;
        inputProfil3.disabled = true;
        inputProfil4.disabled = true;
        inputProfil5.disabled = true;
        tblEditProfile.disabled = true;
    }
}

var ratingValue = document.getElementById("ratingValue"),
    star5 = document.getElementById("star5"),
    star4 = document.getElementById("star4"),
    star3 = document.getElementById("star3"),
    star2 = document.getElementById("star2"),
    star1 = document.getElementById("star1");

star5.addEventListener("click", function() {
    ratingValue.value = "5";
});

star4.addEventListener("click", function() {
    ratingValue.value = "4";
});

star3.addEventListener("click", function() {
    ratingValue.value = "3";
});

star2.addEventListener("click", function() {
    ratingValue.value = "2";
});

star1.addEventListener("click", function() {
    ratingValue.value = "1";
});
