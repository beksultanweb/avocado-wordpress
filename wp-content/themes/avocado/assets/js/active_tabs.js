const btnmore = document.querySelector('.see_more')
window.addEventListener('DOMContentLoaded', () => {
    const loading = document.createElement('div')
    loading.className = 'loader'
    if(btnmore) btnmore.style.display = "none"
    document.querySelector('.tabs__body').appendChild(loading)
})

window.addEventListener('load', () => {
    if(btnmore) btnmore.style.display = "block"
    document.querySelector('.loader').style.display = 'none'
    const storage = localStorage.getItem('active_tabs')
    if(storage) {
        document.querySelector(`#${storage}`).checked = true
    }
    else document.querySelector('#btn-1').checked = true
})

const btn1 = document.querySelector('#btn-1'),
      btn2 = document.querySelector('#btn-2');

btn1.addEventListener('click', () => {
    localStorage.setItem('active_tabs', 'btn-1')
})

btn2.addEventListener('click', () => {
    localStorage.setItem('active_tabs', 'btn-2')
})