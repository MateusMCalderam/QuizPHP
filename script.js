document.addEventListener('DOMContentLoaded', () => iniciarContagem())
const iniciarContagem = () => {
    const contador = document.getElementById('contador');
    let s = 59;
    let contagem = setInterval(() => { contador.innerText = s; s !== -1 ? s-- : (clearInterval(contagem), fim()) }, 1000)
}
const fim = () => {
    Array.from(document.getElementsByClassName("dis")).forEach(tag => tag.disabled = true), modal()
}
const modal = () => {
    let modal = document.createElement("div")
    modal.id = "modal"
    let span = document.createElement("span")
    span.innerText = "Acabou o Tempo!"
    let form = document.createElement('form')
    form.action = "verifica.php"
    form.method = "post"
    let btn = document.createElement('button')
    btn.type = "submit"
    btn.value = "Próxima Pergunta." //if
    form.appendChild(btn)
    modal.appendChild(span)
    modal.appendChild(form)
    document.body.appendChild(modal)
}
const removeAlt = document.getElementById('bomba')
removeAlt.addEventListener('click', () => bomba())
const bomba = () => {
    removeAlt.disabled = true
    let inpts = []
    Array.from(document.getElementsByTagName('input')).forEach(input => input !== "requisito" ? inpts.push(input) : undefined)
    while (inpts.length !== 1) { let idx = Math.floor(Math.random() * inpts.length); inpts[idx].disabled = true; inpts.splice(idx, 1) }
}