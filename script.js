let myBtn = document.getElementById("aboutMe");

if (myBtn) {
    myBtn.addEventListener("click", function (e) {
        e.preventDefault();
        alert("Anda diarahkan ke halaman berikutnya");

        window.location.href = "login.php";
    });
}

let formKirim = document.getElementById("kirim");

if (formKirim) {
    formKirim.addEventListener("submit", function (e) {

        let Nama = document.getElementById("nama").value;
        let Email = document.getElementById("email").value;
        let Pesan = document.getElementById("pesan").value;

        if (Nama == "") {
            alert("nama tidak boleh kosong!!")
            e.preventDefault();
            return;
        }

        if ((!Email.includes("@")) && (!Email.includes("."))) {
            alert("Email tidak valid")
            e.preventDefault();
            return;
        }

        if (Pesan == "") {
            alert("pesan tidak boleh kosong")
            e.preventDefault();
            return;
        }

        alert("mengirim Form...");
    });
}

let moodcare = document.getElementById("moodcare");
if (moodcare) {
    moodcare.addEventListener("click", function (e) {
        e.preventDefault();
        alert("Anda akan diarahkan ke github");
        window.location.href = "https://github.com/Ilalala17";
    });
}

let rm = document.getElementById("rm");
if (rm) {
    rm.addEventListener("click", function (e) {
        e.preventDefault();
        alert("Anda akan diarahkan ke github");
        window.location.href = "https://github.com/Ilalala17/Web-Sistem-Informasi-Rumah-Makan";
    });
}
