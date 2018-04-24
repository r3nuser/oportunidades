function imprimir() {
    window.print();
}
function trocaClasse(elemento, antiga, nova) {
    elemento.classList.remove(antiga);
    elemento.classList.add(nova);
}
function trocarDiv(antiga,nova) {
    var div = document.querySelector('div');
    trocaClasse(div, antiga, nova);
}
