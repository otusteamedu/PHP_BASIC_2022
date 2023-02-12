const msgAlert = document.getElementById('msg-alert')
const url = window.location.href
const re = /\?.*/

function storeUrl() {
  let url = window.location.href
  localStorage.setItem('url', url)
}

if (msgAlert) {
  if (localStorage.hasOwnProperty('url')) {
    setTimeout(() => {
      let stored_url = localStorage.getItem('url')
      msgAlert.remove()
      window.location.replace(stored_url)
      localStorage.removeItem('url')
    }, 2000)
  } else {
    setTimeout(() => {
      msgAlert.remove()
      let start_url = url.replace(re, '')
      window.location.replace(start_url)
    }, 2000)
  }
}
