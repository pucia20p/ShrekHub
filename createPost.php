<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tworzenie postu</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <?php 
session_start();
if(!isset($_SESSION["currentUser"]) || $_SESSION["currentUser"] == "none"){
    header("refresh: 0; login.php");
}

    ?>
    <style>
.d-flexx{
    display: flex;
}
    </style>
</head>
<body>
    <?php require_once "menu.php"; ?>
    <main class="d-flex justify-content-center align-items-center p-3">
        <div class="d-flex flex-column gap-3">
            <div class="d-flex flex-column gap-1 align-items-center">Tytuł: <input type="text" name="title" id="shrekhub-title"></div>
            <div class="d-flex flex-column gap-1 align-items-center">
                Typ postu:
                <select class="select">
                    <option value="text">tekst</option>
                    <option value="image">zdjęcie</option>
                    <!-- <option value="video">wideo</option> -->
                </select>
            </div>

            <div id="shrekhub-contents-text" class="d-flexx flex-column gap-1 align-items-center" style="display: none;">Treść postu: <textarea value="jajco"></textarea></div>

            <div id="shrekhub-contents-img" class="d-flexx flex-column gap-1 align-items-center" style="display: none;">Zdjęcie: <input type="file" name="img" id="shrekhub-img" accept="image/jpeg, image/png, image/jpg, image/gif"></div>

            <input class="btn btn-success" type="button" value="Stwórz post">
            <div id="error"></div>
        </div>
    </main>
    <script>
const selector = document.querySelector("select");
function changeStyle(){
    if(selector.value == "text"){
        document.querySelector("#shrekhub-contents-img").style.display = "none";
        document.querySelector("#shrekhub-contents-text").style.display = "flex";
    } else {
        document.querySelector("#shrekhub-contents-text").style.display = "none";
        document.querySelector("#shrekhub-contents-img").style.display = "flex";
    }
}
changeStyle();
selector.addEventListener("change", changeStyle);
let postid;
async function sendCreatePostRequest(t, vt, c){
    let query = `confirmCreatePost.php`;
    let formData = new FormData();
    formData.append("t", t);
    formData.append("vt", vt);
    formData.append("c", c);
    const resp = await fetch(query, {method: 'POST', body: formData});
    const json = await resp.json();
    postid = json[1];
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
    let t = document.querySelector("#shrekhub-title").value.trim();
    let vt = document.querySelector(".select").value;
    let c;
    if(vt=="text"){
        c = document.querySelector("#shrekhub-contents-text textarea").value.trim();
        c.replace("\n", "<br>");
    } else {
        c = pp;
    }
    console.log(c);

    sendCreatePostRequest(t, vt, c)
    .then((rep)=>{
        console.log(rep);
        if(rep != "post.create.success"){
            document.querySelector("#error").innerText = rep;
        } else {
            document.querySelector("#error").innerText = "Wszystko git";
            window.location.href = `index.php?postid=${postid}`;
        }
    });
});

    </script>
</body>
</html>