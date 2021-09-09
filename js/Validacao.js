function validacao() {
    let loginadmin = document.querySelector("#valiadmin").value;
    let senhaadmin = document.querySelector("#senhaadmin").value;
    if (loginadmin == "admin" && senhaadmin == "admin"){
        window.location.href="../administrador.html"
    }
}
