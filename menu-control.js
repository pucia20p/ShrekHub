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
    return json[0];
}

checkIfUserLogged().then((rep)=>{
    if(rep=="true"){
        document.querySelector("#login").style.display = "none";
        
    } else {
        document.querySelector("#createPost").style.display = "none";
        document.querySelector("#settings").style.display = "none";
    }
});
