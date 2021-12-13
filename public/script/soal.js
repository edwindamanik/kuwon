var tombolPilihan = document.getElementsByName("opsi");

tombolPilihan.addEventListener("click", function() {
    alert("Gas");
})

function deretanSoal() 
{

    html = '<div class="formatPenambahanSoal">\
                <p>Masukkan Pertanyaan</p>\
                <textarea name="soal[]" cols="30" rows="10" required></textarea>\
                <p>Masukkan Jawaban yang benar</p>\
                <select name="jawaban[]" required>\
                    <option value="">Masukkan Option Jawaban</option>\
                    <option value="A">A</option>\
                    <option value="B">B</option>\
                    <option value="C">C</option>\
                    <option value="D">D</option>\
                </select>\
            </div>'

    var formAction = document.getElementById("formActionSoal");
    formAction.innerHTML+=html
}

function deretanSoal2()
{
    html = '<div class="formatPenambahanSoal">\
                <p>Masukkan Pertanyaan</p>\
                <textarea name="soal[]" cols="30" rows="10" required></textarea>\
                <p>Masukkan Jawaban yang benar</p>\
                <select name="jawaban[]" required>\
                    <option value="">Masukkan Option Jawaban</option>\
                    <option value="A">A</option>\
                    <option value="B">B</option>\
                    <option value="C">C</option>\
                    <option value="D">D</option>\
                </select>\
            </div>'

    var formAction = document.getElementById("formActionSoal2");
    formAction.innerHTML+=html
}

function deretanSoal3()
{
    html = '<div class="formatPenambahanSoal">\
                <p>Masukkan Pertanyaan</p>\
                <textarea name="soal[]" cols="30" rows="10" required></textarea>\
                <p>Masukkan Jawaban yang benar</p>\
                <select name="jawaban[]" required>\
                    <option value="">Masukkan Option Jawaban</option>\
                    <option value="A">A</option>\
                    <option value="B">B</option>\
                    <option value="C">C</option>\
                    <option value="D">D</option>\
                </select>\
            </div>'

    var formAction = document.getElementById("formActionSoal2");
    formAction.innerHTML+=html
}