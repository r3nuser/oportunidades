function confirmUpdate(){
    
    if(confirm("Deseja alterar os dados cadastrados?"))
        return true;
    else
        return false;  
}
function confirmDelete() {
    if(confirm("Deseja apagar os dados cadastrados?"))
        return true;
    else
        return false;  
}
function confirmCadastro() {
    if(confirm("Deseja realizar um  novo cadastro?"))
        return true;
    else
        return false;  
}
// detect enter keypress
function handleEnter(e){
    var keycode = (e.keyCode ? e.keyCode : e.which);
    if (keycode == '13') {
        if(confirmCadastro())
        return true;
        else return false;
    }
}