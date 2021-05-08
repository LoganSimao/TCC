
/* on scroll, resize img, hamburguer menu */

var contador = 1;
setInterval(function() {
    document.getElementById('radio' + contador).checked = true;
    contador ++;
    if(contador > 3){
        contador = 1;
    }
}, 5000);

// Pontuações no CPF preenchem automaticamente.
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
  console.log(log);
  if(log == "Login"){
     
   var modal = document.getElementById("login");
   var span = document.getElementById("close");
   var botao = document.getElementById("botao-modal");
  
   botao.onclick = function(){
     modal.style.display = "block";
     document.getElementById("inp-focus").focus();
     modal.style.transition = "2s"; //transitioncheckout
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
  else{
    var botao = document.getElementById("botao-modal");
    botao.href = "dashboard.php"; //modal do botao aqui
  }
 }

 onload = function(){login()};


  