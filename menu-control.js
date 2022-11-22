async function checkIfUserLogged(){
    let query = `isUserLogged.php`;
    let formData = new FormData();
    const resp = await fetch(query, {method: 'POST', body: formData});
    const json = await resp.json();
    return json[0];
}
async function getUserData(){
    let query = `getUserData.php`;
    let formData = new FormData();
    const resp = await fetch(query, {method: 'POST', body: formData});
    const json = await resp.json();
    console.log(json);
    return json;
}
function ppControl(){
    userData = getUserData();
    if(userData[3]=="none")
        document.querySelector("#settings img").src = "coconut.png";
    else
        document.querySelector("#settings img").src = userData[3];
    console.log(userData[3]);
}


checkIfUserLogged().then((rep)=>{
    if(rep=="true"){
        document.querySelector("#login").style.display = "none";
        ppControl();
    } else {
        document.querySelector("#createPost").style.display = "none";
        document.querySelector("#settings").style.display = "none";
    }
});
