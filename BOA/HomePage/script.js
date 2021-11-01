const khaki = document.querySelector("#khaki-label");
const black = document.querySelector("#black-label");

const xs = document.querySelector("#xs-label");
const s = document.querySelector("#s-label");
const m = document.querySelector("#m-label");
const l = document.querySelector("#l-label");




khaki.addEventListener('click', function () {
    khaki.classList.toggle("changeBgColor")
    black.classList.remove("changeBgColor")
})

black.addEventListener('click', function () {
    black.classList.toggle("changeBgColor")
    khaki.classList.remove("changeBgColor")
})


xs.addEventListener('click', function () {
    xs.classList.toggle("changeBgColor")
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






