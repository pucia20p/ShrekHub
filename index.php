<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ShrekHub</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <?php
if(!isset($_GET["page"]))
    $_GET["page"] = 0;
    ?>
</head>
<body>
    <?php require_once "menu.php"; ?>
    
    <div>
        <main class="d-grid">

        </main>
        <div class="d-flexx flex-row align-items-center gap-1">
            <input type="button" value="<<" class="btn btn-primary">
            <input type="button" value="<" class="btn btn-primary">
            <p></p>
            <input type="button" value=">" class="btn btn-primary">
            <input type="button" value=">>" class="btn btn-primary">
        </div>
    </div>
</body>
<script defer>
async function getLastPosts(page){
    let query = `getLastPosts.php`;
    let formData = new FormData();
    formData.append("page", page);
    const resp = await fetch(query, {method: 'POST', body: formData});
    const json = await resp.json();
    return json;
}
async function getPublicUserData(id){
    let query = `getPublicUserData.php`;
    let formData = new FormData();
    formData.append("id", id);
    const resp = await fetch(query, {method: 'POST', body: formData});
    const json = await resp.json();
    return json;
}
async function getNumOfPosts(){
    let query = `getNumOfPosts.php`;
    const resp = await fetch(query, {method: 'POST', body: new FormData()});
    const json = await resp.json();
    return json[0];
}
async function getPost(id){
    let query = `getPost.php`;
    let formData = new FormData();
    formData.append("id", id);
    const resp = await fetch(query, {method: 'POST', body: formData});
    const json = await resp.json();
    return json;
}
async function createElements(x){
    const img = document.createElement("img");
    if(x[8] == "none")
        img.src = "pobrane.jpg";
    else 
        img.src=x[8];

    const authorText = document.createTextNode(x[7]);
    const author = document.createElement("p");
    author.appendChild(authorText);
            
    const creationDateText = document.createTextNode(`Opublikowano ${x["publication_date"]}`);
    const creationDate = document.createElement("p");
    creationDate.appendChild(creationDateText);

    const div3 = document.createElement("div");
    div3.appendChild(author);
    div3.appendChild(creationDate);

    const div2 = document.createElement("div");
    div2.appendChild(img);
    div2.appendChild(div3);

    const titleText = document.createTextNode(x["title"]);
    const title = document.createElement("h3");
    title.appendChild(titleText);

    let contents;

    if(x["value_type"] == "text"){
        const contentsText = document.createTextNode(x["contents"]);
        contents = document.createElement("p");
        contents.appendChild(contentsText);
    } else if(x["value_type"] == "image"){
        contents = document.createElement("img");
        contents.src = x["contents"];
        contents.addEventListener("click", ()=>{
            window.location.href = contents.src;
        });
    }

    const idText = document.createTextNode(x[0]);
    const id = document.createElement("h5");
    id.appendChild(idText);
    id.style.display = 'none';

    const div = document.createElement("div");
    div.appendChild(div2);
    div.appendChild(title);
    div.appendChild(contents);
    div.appendChild(id);

    // console.log(x["id_post"]);
    document.querySelector("main").appendChild(div);
}

let page = <?php echo $_GET["page"];?>;
let numOfPosts, lastPage;

// getLastPosts(page).then((result)=>{
//     result.forEach((z)=>{
//         createElements(z);
//     })
//     // console.log(result);
// });
function displayPost(post){
    createElements(post);
}
function postsGetter(){
    let it;
    document.querySelector("main").innerHTML = "";
    getNumOfPosts().then((num)=>{
        numOfPosts = num;
        it=num-(10*page);
    })
    .then(()=>getPost(it)).then((post)=>displayPost(post)).then(()=>it--)
    .then(()=>getPost(it)).then((post)=>displayPost(post)).then(()=>it--)
    .then(()=>getPost(it)).then((post)=>displayPost(post)).then(()=>it--)
    .then(()=>getPost(it)).then((post)=>displayPost(post)).then(()=>it--)
    .then(()=>getPost(it)).then((post)=>displayPost(post)).then(()=>it--)
    .then(()=>getPost(it)).then((post)=>displayPost(post)).then(()=>it--)
    .then(()=>getPost(it)).then((post)=>displayPost(post)).then(()=>it--)
    .then(()=>getPost(it)).then((post)=>displayPost(post)).then(()=>it--)
    .then(()=>getPost(it)).then((post)=>displayPost(post)).then(()=>it--)
    .then(()=>getPost(it)).then((post)=>displayPost(post)).then(()=>it--)
    .then(()=>{
        if(numOfPosts <= 10)
            document.querySelector("body>div>div").style.display = "none";
        lastPage = Math.floor(numOfPosts/10);
    });
}
function postsGetter2(){
    getNumOfPosts().then((num)=>{
        if(num!=numOfPosts){
            postsGetter();
        }
    })
}
postsGetter();
setInterval(postsGetter2, 10000);



// getNumOfPosts().then((num)=>{
//     numOfPosts = num;
//     if(num <= 10)
//         document.querySelector("body>div>div").style.display = "none";
//     lastPage = Math.floor(numOfPosts/10);
// });




let postnav = document.querySelectorAll("body>div>div>input");

document.querySelector("body>div>div>p").innerText = page;


function redirector(page){
    if(page > lastPage)
        window.location.href = `index.php?page=${lastPage}`;
    else if(page < 0)
        window.location.href = `index.php?page=0`;
    else
        window.location.href = `index.php?page=${page}`;
}
postnav[0].addEventListener("click", ()=>{
    redirector(0);
})
postnav[1].addEventListener("click", ()=>{
    redirector(page-1);
})
postnav[2].addEventListener("click", ()=>{
    redirector(page+1);    
})
postnav[3].addEventListener("click", ()=>{
    redirector(lastPage);
})


</script>
</html>

<?php

// require_once "DatabaseConnection.php";
// require_once "Account.php";
// require_once "Post.php";
// session_start();

// $_SESSION["currentUser"]="none";
// echo $_SESSION["currentUser"];


?>