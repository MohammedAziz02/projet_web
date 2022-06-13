function validatePwc()                                 
{ 
    var pwc = document.forms["fo"]["pwc"];
    var pw = document.forms["fo"]["pw"];         
    if (pwc.value != pw.value){     
        document.getElementById('errorname').innerHTML="Mots de passe non identiques!<br/>";  
        pwc.focus();           
    }
    else{
        document.getElementById('errorname').innerHTML="";  
    }
}
function validateNom(){
    var nom = document.forms["fo"]["nom"];
    if(nom.value=="")
    {
        document.getElementById('errornom').innerHTML="Veuillez entrez un nom <br />";  
        nom.focus(); 
    }
    else
        document.getElementById('errornom').innerHTML="";
}
function validatePrenom(){
    var prenom = document.forms["fo"]["prenom"];   
    if(prenom.value=="")
    {
        document.getElementById('errorprenom').innerHTML="Veuillez entrez un prenom <br />";  
        prenom.focus(); 
    }
    else
      document.getElementById('errorprenom').innerHTML="";  
}
function validateLogin(){
    var login = document.forms["fo"]["login"];
    if(login.value=="")
    {
        document.getElementById('errorlogin').innerHTML="Veuillez entrez un login <br />";  
        login.focus(); 
    }
    else
        document.getElementById('errorlogin').innerHTML="";  
}
function validatePw(){     
    var pw = document.forms["fo"]["pw"]; 
    if(pw.value=="")
    {
        document.getElementById('errorpw').innerHTML="Veuillez entrez un mot de passe <br />";  
        pw.focus(); 
    }
    else
        document.getElementById('errorpw').innerHTML="";  
}

