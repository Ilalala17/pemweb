let myBtn = document.getElementById("aboutMe");

if(myBtn){
    myBtn.addEventListener("click", function(e){
    e.preventDefault();
    alert("Anda diarahkan ke halaman berikutnya");

    window.location.href = "page2.html";
    });
}
    
document.getElementById("kirim").addEventListener("submit", function(e){
    e.preventDefault();

    let Nama = document.getElementById("nama").value;
    let Email = document.getElementById("email").value;
    let Pesan = document.getElementById("pesan").value;

    if(Nama == ""){
        alert("nama tidak boleh kosong!!")
        return;
    }

    if((!Email.includes("@")) && (!Email.includes("."))){
        alert("Email tidak valid")
        return;
    }

    if(Pesan == ""){
        alert("pesan tidak boleh kosong")
        return;
    }

    alert("mengirim Form...");
});

document.getElementById("moodcare").addEventListener("click", function(e){
    e.preventDefault();
    alert("Anda akan diarahkan ke github");
    window.location.href = "https://github.com/Ilalala17";
});

document.getElementById("rm").addEventListener("click", function(e){
    e.preventDefault();
    alert("Anda akan diarahkan ke github");
    window.location.href = "https://github.com/Ilalala17/Web-Sistem-Informasi-Rumah-Makan";
});
    



