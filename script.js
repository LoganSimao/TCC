
/* on scroll, resize img, hamburguer menu 

//menu slide

var contador = 1;
setInterval(function() {
    document.getElementById('radio' + contador).checked = true;
    contador ++;
    if(contador > 3){
        contador = 1;
    }
}, 5000);
*/
// Pontuações no CPF preenchem automaticamente.

//form index


var check = document.getElementById("check").innerHTML;

if(check == "s"){
  document.querySelector("#nomepet").addEventListener("change", nomePet);

  function nomePet(){
    let nomepet = document.querySelector("#nomepet").value;
    document.querySelector("#nomepet-form").innerHTML = `${nomepet}`;
    document.querySelector("#botao-form").innerHTML = `Saber mais sobre o ${nomepet}`
  }
  document.querySelector("#idadepet").addEventListener("change", idadePet);

  function idadePet(){
    let nomepet = document.querySelector("#nomepet").value;
    let idadepet = document.querySelector("#idadepet").value;
    document.querySelector("#idadepet-form").innerHTML = `o ${nomepet}
    tem ${idadepet} anos e
    é da raça !`;
  }
  document.querySelector("#raca").addEventListener("change", racaPet);
  function racaPet(){
  let nomepet = document.querySelector("#nomepet").value;
  let idadepet = document.querySelector("#idadepet").value;
  let raca = document.querySelector("#raca").value;

  document.querySelector("#idadepet-form").innerHTML = `o ${nomepet}
  tem ${idadepet} anos e
  é da raça ${raca}!`;
  }
  document.querySelector("#sexopet").addEventListener("change", sexoPet);

  function sexoPet(){
  let sexopet = document.querySelector("#sexopet").value;
  if(sexopet == "Femêa"){
    let nomepet = document.querySelector("#nomepet").value;
    let idadepet = document.querySelector("#idadepet").value;
    let raca = document.querySelector("#raca").value;
    document.querySelector("#sexopet-form").innerHTML = `Você encontrou a`;
    document.querySelector("#botao-form").innerHTML = `Saber mais sobre a ${nomepet}`
    document.querySelector("#idadepet-form").innerHTML = `a ${nomepet}
    tem ${idadepet} anos e
    é da raça ${raca}!`;
  }
  else{
    let nomepet = document.querySelector("#nomepet").value;
    let idadepet = document.querySelector("#idadepet").value;
    let raca = document.querySelector("#raca").value;
    document.querySelector("#sexopet-form").innerHTML = `Você encontrou o`;
    document.querySelector("#botao-form").innerHTML = `Saber mais sobre o ${nomepet}`
    document.querySelector("#idadepet-form").innerHTML = `o ${nomepet}
    tem ${idadepet} anos e
    é da raça ${raca}!`;
  }
  }
  document.querySelector("#nome").addEventListener("change", nome);

  function nome(){
  let nome = document.querySelector("#nome").value;
  document.querySelector("#nome-form").innerHTML = `${nome}`;
  }

  document.querySelector("#numero").addEventListener("change", numero);

  function numero(){
  let numero = document.querySelector("#numero").value;
  document.querySelector("#numero-form").innerHTML = `${numero}`;
  }

  document.querySelector("#email").addEventListener("change", email);

  function email(){
  let email = document.querySelector("#email").value;
  document.querySelector("#email-form").innerHTML = `${email}`;
  }
}
else{
  //console.log('deu errado');
}

// fim do form pag inicial
function mascara(i){
   
    var v = i.value;
    
    if(isNaN(v[v.length-1])){ // impede entrar outro caractere que não seja número
       i.value = v.substring(0, v.length-1);
       return;
    }
    
    i.setAttribute("maxlength", "14");
    if (v.length == 3 || v.length == 7) i.value += ".";
    if (v.length == 11) i.value += "-";
 
 }

 // Pontuações de DDD e traço do TELEFONE preenchem automaticamente
 function mask(o, f) {
  setTimeout(function() {
    var v = mphone(o.value);
    if (v != o.value) {
      o.value = v;
    }
  }, 1);
}

function mphone(v) {
  var r = v.replace(/\D/g, "");
  r = r.replace(/^0/, "");
  if (r.length > 10) {
    r = r.replace(/^(\d\d)(\d{5})(\d{4}).*/, "($1) $2-$3");
  } else if (r.length > 5) {
    r = r.replace(/^(\d\d)(\d{4})(\d{0,4}).*/, "($1) $2-$3");
  } else if (r.length > 2) {
    r = r.replace(/^(\d\d)(\d{0,5})/, "($1) $2");
  } else {
    r = r.replace(/^(\d*)/, "($1");
  }
  return r;
}

// Validar senha - Verifica se a senha e o confirmar senha está correto.
let senha = document.getElementById('senha');
let senha2 = document.getElementById('senha2');

function validarSenha() {
  if (senha.value != senha2.value) {
    senha2.setCustomValidity("Senhas diferentes!");
    senha2.reportValidity();
    return false;
  } else {
    senha2.setCustomValidity("");
    return true;
  }
}

/* Quando o formulario está preenchido o botão "cadastrar" se habilita.
function checkInputs(inputs) {
   var filled = true;
   
   inputs.forEach(function(input) {
       
     if(input.value === "") {
         filled = false;
     }
   
   });
   
   return filled;
 }
 */

 var inputs = document.querySelectorAll("input");
 var button = document.querySelector("button");
 inputs.forEach(function(input) {
     
   input.addEventListener("keyup", function() {
     if(checkInputs(inputs)) {
       button.disabled = false;
       document.getElementById('Cadastrar').style.display = 'block';

     } else {
       button.disabled = true;
       document.getElementById('Cadastrar').style.display = 'none';
     }
   });
 });

 // botao de login

 function login(){
 var log = document.getElementById("botao-modal").innerHTML;



  if(log == "Login"){
     
    var modal = document.getElementById("login");
    var span = document.getElementById("close");
    var botao = document.getElementById("botao-modal");
    //var log = document.getElementById("login-ani");
    
    botao.onclick = function(){
      modal.style.display = "block";
      document.getElementById("inp-focus").focus();
      //log.style.transition = "2s"; //transitioncheckout
    }

    span.onclick = function(){
    modal.style.display = "none";
    
  }

    window.onclick = function (event) {
      if(event.target == modal){
        modal.style.display = "none";
      }
    }


  }
  else{//botaologar
    var botao = document.getElementById("botao-modal");
    

    botao.onclick = function(){
      var logout = document.getElementById("clos-modal");
        logout.style.display = "block";
        console.log("dentro-botao");
      }
    window.onclick = function (event) {
      var logout = document.getElementById("clos-modal");
      if(event.target == logout){
        var logout = document.getElementById("clos-modal");
        logout.style.display = "none";
 
        console.log("fora-janela");
      }
    
    }
    //botaodeletar
    /* DON'T YOU WANNA DANCE WITH ME? NO? I COULD DANCE LIKE MICHAEL JACKSON
    var deletar = document.getElementById("deletar");
    var span2 = document.getElementById("close2");
    var botaomod = document.getElementById("modaldeletar");
  
    botaomod.onclick = function(){
      deletar.style.display = "block";
      //document.getElementById("inp-focus").focus();
      deletar.style.transition = "2s"; //transitioncheckout
    }
  
    span2.onclick = function(){
      deletar.style.display = "none";
      
    }
    deletar.onclick = function(){
      deletar.style.display = "none";
    }
    window.onclick = function (ev) {
      if(ev.target == deletar){
        deletar.style.display = "none";
        console.log("fora-janela");
      }
    }*/
    var qnt = document.getElementsByClassName("modal-cl");
    console.log(qnt.length);
    }
    console.log("fora-botao");
  }
  
  
  onload = function(){login()};


  //sgript para imagens

/*
  window.onclick = function(){
    if(document.getElementsByTagName('img').length === 4){
    var icon = document.getElementsByTagName('img');
    var icon2 = icon[3];
    icon2.remove();
  }
}
var tamanho = document.getElementsByTagName('img').length;
count = 0
if(count < 1){
  tamanho -= 1;
  var imgs = document.getElementsByTagName('img');
  imgs[tamanho].remove();
  count ++

}

var tamanho = document.getElementsByTagName('img').length;
count = 0
if(count < 1){
  tamanho -= 1;
  var imgs = document.getElementsByTagName('img');
  imgs[tamanho].remove();
  count ++

}
*/




