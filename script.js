document.addEventListener('DOMContentLoaded', () => iniciarContagem())
let respCorreta
const iniciarContagem = async() => {
    let resp = await fetch("localhost/quiz/carregaPerguntas.php?")
    let respCorreta = resp.json()
    const contador = document.getElementById('contador');
    let s = 59;
    let contagem = setInterval(() => { contador.innerText = s; s !== 0 ? s-- : (clearInterval(contagem), fim()) }, 1000)
}
const fim = () => {
    Array.from(document.getElementsByClassName("opt")).forEach(tag => tag.disabled = true), modal()
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
    btn.value = "Próxima Pergunta."
    form.appendChild(btn)
    modal.appendChild(span)
    modal.appendChild(form)
    document.body.appendChild(modal)
}
const removeAlt = document.getElementById('bomba')
removeAlt.addEventListener('click', () => bomba())
const bomba = () => {
    removeAlt.disabled = true
    let inpts = Array.from(document.getElementsByTagName('input'))
    inpts.forEach((input, idx) => input === respCorreta.respCorreta ? inpts.splice(idx, 1) : undefined)
    while (inpts.length !== 1) { let idx = Math.floor(Math.random() * inpts.length); inpts[idx].disabled = true; inpts.splice(idx, 1) }
}