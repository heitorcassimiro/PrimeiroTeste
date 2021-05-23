var usersLogin = [
    {
      user:"exemple@gmail.com",
      senha:"12345678"
    },
    {
      user:"crazy@gmail.com",
      senha:"brabo"
    },
    {
      user:"usuario@gmail.com",
      senha:"usuario123",
    },
    {
      user:"user@hotmail.com",
      senha:"brabissimo"
    }
    
    ];
    
    function autenticar(){
        const usuario = document.getElementById("emailLog");
        const senha = document.getElementById("senhaLog");
    
        contador = 0;
    
        for (i=0; i< usersLogin.length; i++){
    
          if ((usuario.value == usersLogin[i].user) && (senha.value == usersLogin[i].senha)){
            contador= contador + 1;
            window.location.href="homePage.html";
    
    
        }
        if (contador == 0){
          document.getElementById("incorreto").innerHTML = "Usuário ou senha incorreto"
        }
        }
    }