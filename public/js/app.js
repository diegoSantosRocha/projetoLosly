//-------------------------------------------------------
//Aprovadores
//-------------------------------------------------------
function cadastrarAprovadores(e) {
  e.preventDefault();
  let formCadastro = document.getElementById("cad_aprovadores");
  let data = new FormData(formCadastro);
  let queryString = new URLSearchParams(data).toString();

  fetch('http://127.0.0.1:8000/gravarAprovador', {
    method: 'post',
    headers: {
      "Content-Type": "application/x-www-form-urlencoded",
    },
    body: queryString
  }).then(async response => {

    if (response.status == '200') {
      const data = await response.json();
      formCadastro.reset();
      msgOk();
    }
    else {
      msgError();
    }
  })

}
//-------------------------------------------------------
//Fornecedores
//-------------------------------------------------------
function cadastrarFornecedores(e) {
  e.preventDefault();
  let formCadastro = document.getElementById("cad_fornecedor");
  let data = new FormData(formCadastro);
  let queryString = new URLSearchParams(data).toString();

  fetch('http://127.0.0.1:8000/gravarFornecedor', {
    method: 'post',
    headers: {
      "Content-Type": "application/x-www-form-urlencoded",
    },
    body: queryString
  }).then(async response => {

    if (response.status == '200') {
      const data = await response.json();
      formCadastro.reset();
      msgOk();
    }
    else {
      msgError();
    }
  })
}
function adicionaLinha() {

  var tabela = document.getElementById('adicionar');
  var numeroLinhas = tabela.rows.length;
  var linha = tabela.insertRow(numeroLinhas);
  var celula1 = linha.insertCell(0);
  var celula2 = linha.insertCell(1);
  var celula3 = linha.insertCell(2);
  var celula4 = linha.insertCell(3);
  var text = celula1_text();
  celula1.innerHTML = text;
  celula2.innerHTML="<input type='number' class='form-input input_size' name='quantidade[]'>";
  celula3.innerHTML = "<a href='#' onclick='adicionaLinha();'><i class='bi bi-plus-circle-fill'></i></a>";
  celula4.innerHTML = "<a href='#' onclick='removerLinha("+numeroLinhas+");'><i class='bi bi-x-circle-fill'></i></a>";


}
//-------------------------------------------------------
//Defaut Mensagens
//-------------------------------------------------------
function msgOk() {
  $('#msgSucesso').modal('toggle');
}
function msgError() {
  $('#msgErro').modal('toggle');
}

function acesso(){
  $('#acesso').modal('toggle');
}

function voltar() {
  window.history.back();
}
function celula1_text() {


return `
  <select id='produto' class='form-select input_size' name='produto[]' required>
                        <option value=''>Escolha</option>
                        <option value='1'>Losly Externo(BRANCO)</option>
                        <option value='2'>Losly Interno(BRANCO)</option>
                        <option value='3'>Losly Externo(CINZA)</option>
                        <option value='4'>Losly Interno(CINZA)</option>
                        <option value='5'>Losly Externo bloco de Vidro(CINZA)</option>
                        <option value='6'>Losly Internob loco de Vidro(CINZA)</option>
                        <option value='7'>Losly Externo bloco de Vidro(BRANCO)</option>
                        <option value='8'>Losly Interno bloco de Vidro(BRANCO)</option>
                    </select> `;


}

function removerLinha(linha){
  var tabela = document.getElementById('adicionar');
  tabela.deleteRow(linha);
}

function pdfPedido(){
  window.location ='/consultar?pdf=1'
}




