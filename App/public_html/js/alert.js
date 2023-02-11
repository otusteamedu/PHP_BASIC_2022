const msgAlert = document.getElementById('msg-alert')

function storeUrl() {
  let url = window.location.href
  localStorage.setItem('url', url)
}

if (msgAlert && localStorage.hasOwnProperty('url')) {
  setTimeout(() => {
    let url = localStorage.getItem('url')
    msgAlert.remove()
    window.location.replace(url)
    localStorage.removeItem('url')
  }, 3000)
}
