function validacaoadmin() {
    let loginadmin = document.querySelector("#valiadmin").value;
    let senhaadmin = document.querySelector("#senhaadmin").value;
    if (loginadmin != "admin" ){
        alert("Login incorreto");
        document.querySelector("#valiadmin").focus();
    } else if (senhaadmin != "admin") {
        alert("Senha incorreta");
        document.querySelector("#senhaadmin").focus();
    }else {
        document.querySelector('.btn_ok').classList.add("desaparecer");
        alert("Dados corretos! Você pode logar agora!")
        document.querySelector('.btn_true_ok').classList.remove("desaparecer");
    }
}

function validacaopac() {
    let logincpf = document.querySelector("#valicpf").value;
    let senhacpf = document.querySelector("#senhacpf").value;
    if (logincpf == "*" && senhacpf == "*"){
        
    }

    let url = "../banco_de_dados/pacientes/" + logincpf + "/dados.xml"
    $.get(url)
        .done(function() { 
            // exists code 
            alert("Não existe")
        }).fail(function() { 
            // not exists code
            alert("Não exite")
        })
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
