<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

</head>
<body class="d-flex justify-content-center align-items-center p-3">
    <main class="d-flex flex-column gap-3">
        <div>Email: <input type="text" name="email" id="shrekhub-email"></div>
        <div>Hasło: <input type="password" name="pass" id="shrekhub-pass"></div>
        <input class="btn btn-success" type="button">
        <a class="btn btn-primary" href="register.php">Zarejestruj się</a>
        <div id="error"></div>
    </main>
    <script>
document.querySelector("input[type=button]").addEventListener("click", ()=>{
    let ea = document.querySelector("input[name='email']").value.trim();
    let p = document.querySelector("input[name='pass']").value.trim();
    let query = `confirmLogin.php?ea=${ea}+p=${p}`;
    fetch(query)
    .then(()=>{
        if(response == "account.login.success"){
            document.querySelector("#error").innerText = response;
        }
    })
})

    </script>
</body>
</html>