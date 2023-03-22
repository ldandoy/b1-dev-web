console.log('Jeu démarré');

let box = document.querySelector('.box');
console.log(box);
let click = 0;
let scroreElement = document.querySelector('#score');

let chrono = 10;
let chronoElement = document.querySelector('#chrono');
chronoElement.innerHTML = chrono;

box.addEventListener("click", () => {
    console.log('click sur la box !');
    click += 1;
    scroreElement.innerHTML = click;
    
    let top = Math.floor(Math.random() * window.innerHeight);
    let left = Math.floor(Math.random() * window.innerWidth);

    // box.style.top = top + "px";
    box.style.top = `${top}px`;
    // box.style.backgroundColor = "red";
    box.style.left = `${left}px`;
});

setInterval(() => {
    console.log("timer");
    if (chrono != 0) {
        chrono--;
        chronoElement.innerHTML = chrono;
    }

    /*if (chrono == 0) {
        clearInterval()
    }*/
}, 1000)
