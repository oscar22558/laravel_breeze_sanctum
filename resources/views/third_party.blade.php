<!DOCTYPE html>
<html>
<head>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script>
        window.onload = function(event){
            const apiClient = axios.create({
                withCredentials: true,
            });
            const username = document.getElementById("username")
            const password = document.getElementById("password")
            console.log(username)
                                console.log(password)
            const btn = document.getElementById("btn")
            const btn1 = document.getElementById("btn1")
            const p = document.getElementById("p")
            const errordiv = document.getElementById("errordiv")
            let auth_token = ""
            btn.onclick = function(event){
                apiClient
                    .get("/sanctum/csrf-cookie")
                    .then(function (response) {
                        console.log(response);
                        return apiClient(
                        {  
                            url: '/api/tokens',
                            method: 'post',
                            responseType: 'json',
                            data:    {    
                                email: username.value,
                                password: password.value,
                                token_name: "newtoken"
                            }
                        })
                    })
                    .then(function (response) {
                        console.log(response)
                        errordiv.innerHTML = "signed in"
                        auth_token = response.data.token 
                    })
                    .catch(function (error) {
                        console.log(error)
                        errordiv.innerHTML = "sign in failed"
                        
                    })
            }

            btn1.onclick = function(event){
                apiClient.get("/api/user")
                    .then(function (response) {
                        p.innerHTML = JSON.stringify(response.data)
                    }).catch(function (error) {
                        console.log(error)
                        p.innerHTML = "no data"
                        
                    })
            }
        }
    </script>
</head>
<body>
    <input id="username" type="text" value="oscar@123.com">    
    <br>
    <input id="password" type="text" value="123123123">
    <div id="errordiv"></div>
    <p id="p"></p>
    <button id="btn">Login</button>
    <button id="btn1">access path require sing in</button>
</body>
</html>
