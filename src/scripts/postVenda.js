const button = document.querySelector('#buttonVenda')
button.addEventListener('click', (event) => {
  event.preventDefault()

  const dados = new FormData()

  dados.append('client', document.querySelector('#client').value)
  dados.append('dateSale', document.querySelector('#dateSale').value)
  dados.append('quantity', document.querySelector('#quantity').value)
  dados.append('value-product', document.querySelector('#value-product').value)

  const config = {
    method: 'POST',
    body: dados
  }

  fetch('../cadastro/cadastroVenda.php', config)
    .then((response) => {
      return response.json()
    })
    .then((data) => {
      window.alert(
        `${document.querySelector('#list-client').innerHTML} ${data.message}`
      )
      if (data.status == 'ok') {
        document.querySelector('#formVenda').reset()
      }
    })
})
