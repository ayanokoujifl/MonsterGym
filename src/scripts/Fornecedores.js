fetch('http://localhost/Monstergym/src/api/fornecedores.php')
  .then((response) => {
    return response.json()
  })
  .then((dados) => {
    /* let select = document.querySelector('#provider')
      dados.map((provider) => {
        let opt = document.createElement('option')
        opt.innerHTML = `<p> ${provider.nome} </p>`
        opt.value = provider.id
        select.append(opt)
      })*/
    let ul = document.querySelector('ul')
    dados.map((provider) => {
      let li = document.createElement('li')
      li.innerText = provider.nome
      li.value = provider.id
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
        let valueprovider = document.querySelector('#value-provider')
        valueprovider.value = provider.id
        ul.innerText = provider.nome
      })
    })
  })
