const typeEmployee = [
  { nome: 'instrutor' },
  { nome: 'faxineiro' },
  { nome: 'rh' },
  { nome: 'gerente' },
  { nome: 'vendedor' }
]
window.onload = (evt) => {
  let ul = document.querySelector('ul')
  let babell = document.querySelector('#barbell')
  typeEmployee.map((employee) => {
    let li = document.createElement('li')
    li.innerText = employee.nome
    ul.appendChild(li)
    li.style.display = 'none'
    ul.addEventListener('click', () => {
      li.style.display = 'block'
      li.style.cursor = 'pointer'
      li.style.padding = '2px 2px'
      li.style.textAlign = 'center'
      babell.style.display = 'none'
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
      babell.style.display = 'block'
    })
    li.addEventListener('click', () => {
      babell.style.display = 'block'
      let valueemployee = document.querySelector('#value-employee')
      valueemployee.value = employee.nome
      ul.innerText = employee.nome
    })
  })
}
