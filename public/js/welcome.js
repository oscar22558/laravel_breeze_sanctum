window.onload = function(event){
    const getToken = document.getElementById("getToken")
    const username = document.getElementById("username")
    const passowrd = document.getElementById("passowrd")
    getToken.addEventListener("click", function(e){
        $.ajax({
            type: "GET",
            url: "/api/tokens/create", 
           
            success: function(result){
                alert(result)
            }
            
        })
    })

}