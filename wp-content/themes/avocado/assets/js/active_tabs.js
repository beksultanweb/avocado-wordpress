window.addEventListener('DOMContentLoaded', () => {
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