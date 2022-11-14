<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rejestracja</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <?php 
session_start();
if(!isset($_SESSION["currentUser"]) || $_SESSION["currentUser"] == "none"){
    header("refresh: 0; login.php");
}
    ?>
</head>
<body class="d-flex justify-content-center align-items-center p-3">
    <main class="d-flex flex-column gap-3">
        <div class="d-flex flex-column gap-1 align-items-center">Tytuł: <input type="text" name="title" id="shrekhub-title"></div>
        <div class="d-flex flex-column gap-1 align-items-center">
            Typ postu:
            <select class="select">
                <option value="text">tekst</option>
                <option value="image">zdjęcie</option>
                <option value="video">wideo</option>
            </select>
        </div>
        <div id="shrekhub-contents-text" class="d-flex flex-column gap-1 align-items-center">Treść postu: <textarea></textarea></div>
        
        <input class="btn btn-success" type="button" value="Stwórz post">
        <div id="error"></div>
    </main>
    <script>
const selector = document.querySelector("select");
selector.addEventListener("change", () => {
    document.querySelector("#shrekhub-contents-text").display = "none";
});

async function sendRegisterRequest(ea, p, n, d, pp){
    let query = `confirmRegister.php`;
    let formData = new FormData();
    formData.append("ea", ea);
    formData.append("p", p);
    formData.append("n", n);
    formData.append("d", d);
    formData.append("pp", pp);
    const resp = await fetch(query, {method: 'POST', body: formData});
    const json = await resp.json();
    return json[0];
}
let pp = "none";
const pps = document.querySelector("#shrekhub-img"); 
pps.addEventListener("change", ()=>{
    if(document.querySelector("#shrekhub-img").files[0]!=undefined){
        const reader = new FileReader();
        reader.addEventListener("load", () => {
            pp = reader.result;
        });
        reader.readAsDataURL(document.querySelector("#shrekhub-img").files[0]);
    } else {
        pp = "none";
    }
});

document.querySelector("input[type=button]").addEventListener("click", ()=>{
    let ea = document.querySelector("#shrekhub-email").value.trim();
    let p = document.querySelector("#shrekhub-pass").value.trim();
    let n = document.querySelector("#shrekhub-nickname").value.trim();
    let d = document.querySelector("#shrekhub-desc").innerText.trim();

    console.log(pp);
    sendRegisterRequest(ea, p, n, d, pp)
    .then((rep)=>{
        console.log(rep);
        if(rep != "account.register.success"){
            document.querySelector("#error").innerText = rep;
        } else {
            document.querySelector("#error").innerText = "Wszystko git";

        }
    });
});

    </script>
</body>
</html>