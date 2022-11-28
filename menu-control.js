async function checkIfUserLogged(){
    let query = `isUserLogged.php`;
    let formData = new FormData();
    const resp = await fetch(query, {method: 'POST', body: formData});
    const json = await resp.json();
    return json[0];
}
async function getUserData(){
    let query = `getUserData.php`;
    const resp = await fetch(query);
    const json = await resp.json();
    return json;
}


let bulUmyslu = false;
checkIfUserLogged().then((rep)=>{
    if(rep=="true"){
        bulUmyslu = true;
        document.querySelector("#login").style.display = "none";
    } else {
        document.querySelector("#createPost").style.display = "none";
        document.querySelector("#settings").style.display = "none";
    }
}).then(()=>{
    if(bulUmyslu){
        getUserData()
        .then((userData) => {
            // console.log(userData);
            if(userData[3]=="none")
                document.querySelector("#settings img").src = "pobrane.jpg";
            else
                document.querySelector("#settings img").src = userData[3];
            // console.log(userData[3]);
            document.querySelector("#settings>a").innerHTML += userData[1];
        });
    }
})

