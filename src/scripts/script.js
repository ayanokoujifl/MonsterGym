const login = document.querySelector('#login')
const modal = document.querySelector('dialog')
const close = document.querySelector('#close')

login.onclick = function () {
  modal.showModal()
}

close.onclick = function () {
  modal.close()
}

fetch('https://oslogin.googleapis.com', {}).then((Response) => Response.json())
