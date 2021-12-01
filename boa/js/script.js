
const xs = document.querySelector("#xs-label");
const s = document.querySelector("#s-label");
const m = document.querySelector("#m-label");
const l = document.querySelector("#l-label");

const sizes  = document.querySelectorAll(".description-size");



xs.addEventListener('click', function () {
    xs.classList.add("changeBgColor")
    s.classList.remove("changeBgColor")
    m.classList.remove("changeBgColor")
    l.classList.remove("changeBgColor")
})

s.addEventListener('click', function () {
    xs.classList.remove("changeBgColor")
    s.classList.toggle("changeBgColor")
    m.classList.remove("changeBgColor")
    l.classList.remove("changeBgColor")
})

m.addEventListener('click', function () {
    xs.classList.remove("changeBgColor")
    s.classList.remove("changeBgColor")
    m.classList.toggle("changeBgColor")
    l.classList.remove("changeBgColor")
})

l.addEventListener('click', function () {
    xs.classList.remove("changeBgColor")
    s.classList.remove("changeBgColor")
    m.classList.remove("changeBgColor")
    l.classList.toggle("changeBgColor")
})






