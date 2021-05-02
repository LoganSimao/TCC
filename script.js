// Prenchimento do CEP

var cep = document.getElementById("cep");

$(cep).focusout(function(){
  //Início do Comando AJAX
  $.ajax({
      //O campo URL diz o caminho de onde virá os dados
      //É importante concatenar o valor digitado no CEP
      url: 'https://viacep.com.br/ws/'+$(this).val()+'/json/unicode/',
      //Aqui você deve preencher o tipo de dados que será lido,
      //no caso, estamos lendo JSON.
      dataType: 'json',
      //SUCESS é referente a função que será executada caso
      //ele consiga ler a fonte de dados com sucesso.
      //O parâmetro dentro da função se refere ao nome da variável
      //que você vai dar para ler esse objeto.
      success: function(resposta){
          //Agora basta definir os valores que você deseja preencher
          //automaticamente nos campos acima.
          $("#endereco").val(resposta.logradouro);

          $("#bairro").val(resposta.bairro);
          $("#cidade").val(resposta.localidade);
          $("#uf").val(resposta.uf);
          //Vamos incluir para que o Número seja focado automaticamente
          //melhorando a experiência do usuário
          $("#complemento").focus();
      }
  });
});

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
