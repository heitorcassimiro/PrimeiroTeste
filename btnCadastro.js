
function cadastrar(){
    var radio = document.querySelector('input[name="tipoUsuario"]:checked').value;
 
     console.log("testae");
     console.log(radio);
     window.location.href = "www.google.com";
 
     if (radio == "Prestador"){
        console.log('1')
        window.location.href = "www.google.com";

       
         
     }else if(radio == "Tomador"){
        console.log('2')
        window.location.href = "http://www.devmedia.com.br/";
        
       
     }
 }