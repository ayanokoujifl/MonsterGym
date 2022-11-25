window.addEventListener('load', () => {
  fetch('http://localhost/Monstergym/src/api/clientes.php')
    .then((response) => {
      return response.json()
    })
    .then((dados) => {
      let ul = document.querySelector('#list-client')
      ul.style.color = '#0f766e'
      ul.style.cursor = 'pointer'
      dados.map((client) => {
        let li = document.createElement('li')
        li.innerText = client.nome
        li.value = client.id
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
          let valueProduct = document.querySelector('#client')
          valueProduct.value = client.id
          ul.innerText = client.nome
          ul.style.color = '#ccfbf1'
        })
      })
    })
    .then((response) => {
      response.map((product) => {
        console.log(product.nome)
      })
    })
})
