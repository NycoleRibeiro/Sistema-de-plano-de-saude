function validacaoadmin() {
    let loginadmin = document.querySelector("#valiadmin").value;
    let senhaadmin = document.querySelector("#senhaadmin").value;
    if (loginadmin == "admin" && senhaadmin == "admin"){
        alert("dados corretos")
    } else{
        alert("dados incorretos")
    }
    
}
function validacaopac() {
    let logincpf = document.querySelector("#valicpf").value;
    let senhacpf = document.querySelector("#senhacpf").value;
    if (logincpf == "*" && senhacpf == "*"){
        
    }
}
function validacaomed() {
    let logincrm = document.querySelector("#valicrm").value;
    let senhacrm = document.querySelector("#senhacrm").value;
    if (logincrm == "*" && senhacrm == "*"){
        
    }
}
function validacaolab() {
    let logincnpj = document.querySelector("#valicnpj").value;
    let senhacnpj = document.querySelector("#senhacnpj").value;
    if (logincnpj == "*" && senhacnpj == "*"){
        
    }
}
