const msgAlert = document.getElementById('msg-alert')

let url = window.location.href
const re = /\?.*/

if (msgAlert) {
  msgAlert.addEventListener('closed.bs.alert', (event) => {
    let start_url = url.replace(re, '')
    window.location.replace(start_url)
  })
}
