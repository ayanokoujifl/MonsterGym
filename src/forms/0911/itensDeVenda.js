window.addEventListener('load', () => {
  fetch('http://localhost/Monstergym/src/api/listagemProduto.php')
    .then((response) => {
      return response.json()
    })
    .then((dados) => {
      /* let select = document.querySelector('#product')
      dados.map((product) => {
        let opt = document.createElement('option')
        opt.innerHTML = `<p> ${product.nome} </p>`
        opt.value = product.id
        select.append(opt)
      })*/
      let ul = document.querySelector('ul')
      dados.map((product) => {
        let li = document.createElement('li')
        li.innerText = product.nome
        li.value = product.id
        ul.appendChild(li)
        li.style.display = 'none'
        ul.addEventListener('click', () => {
          li.style.display = 'block'
          li.style.cursor = 'pointer'
          li.style.padding = '2px 2px'
          li.style.textAlign = 'center'
        })
        li.addEventListener('mouseenter', () => {
          li.style.border = '2px solid #ccfbf1'
          li.style.borderRight = 'none'
          li.style.borderLeft = 'none'
          li.style.borderRadius = '4px'
        })
        li.addEventListener('mouseout', () => {
          li.style.border = 'none'
        })
        ul.addEventListener('mouseleave', () => {
          li.style.display = 'none'
        })
        li.addEventListener('click', () => {
          let valueProduct = document.querySelector('#value-product')
          valueProduct.value = product.id
          ul.innerText = product.nome
        })
      })
    })
})
