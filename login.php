<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <?php 
session_start();
if(isset($_SESSION["currentUser"]) && $_SESSION["currentUser"] != "none"){
    header("refresh: 0; index.php");
} 
    ?>
</head>
<body class="d-flex justify-content-center align-items-center p-3">
    <main class="d-flex flex-column gap-3">
        <div class="d-flex flex-column gap-1 align-items-center">Email: <input type="text" name="email" id="shrekhub-email"></div>
        <div class="d-flex flex-column gap-1 align-items-center">Hasło: <input type="password" name="pass" id="shrekhub-pass"></div>
        <input class="btn btn-success" type="button" value="Zaloguj się">
        <a class="btn btn-primary" href="register.php">Zarejestruj się</a>
        <div id="error"></div>
    </main>
    <script>
async function sendLoginRequest(ea, p) {
    let query = `confirmLogin.php`;
    let formData = new FormData();
    formData.append("ea", ea);
    formData.append("p", p);
    const resp = await fetch(query, {method: 'POST', body: formData});
    const json = await resp.json();
    return json[0];
}
document.querySelector("input[type=button]").addEventListener("click", ()=>{
    let ea = document.querySelector("#shrekhub-email").value.trim();
    let p = document.querySelector("#shrekhub-pass").value.trim();
    sendLoginRequest(ea, p)
    .then((rep)=>{
        if(rep != "account.login.success"){
            document.querySelector("#error").innerText = rep;
        } else 
            document.querySelector("#error").innerText = "Wszystko git";
    })
})
    </script>
</body>
</html>