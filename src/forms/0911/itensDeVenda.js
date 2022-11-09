window.addEventListener('load', () => {
  fetch('http://localhost/Monstergym/src/api/listagemProduto.php')
    .then((response) => {
      return response.json()
    })
    .then((dados) => {
      let select = document.querySelector('select')
      for (let i = 0; i < array.length; i++) {
        let opt = document.createElement('option')
        opt.innerText = dados[i].nome
        opt.value = dados[i].id
        select.append(opt)
      }
    })
})
