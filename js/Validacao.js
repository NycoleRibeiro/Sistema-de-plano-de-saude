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
    
    let cpf = "../banco_de_dados/pacientes/" + logincpf + "/dados.xml"
    $.get(cpf)
        .done(function(senha) { 
            // exists code  
            $(senha).find()
            
            let xmlcpfsenha = 1;
            if (senhacpf != xmlcpfsenha){
                alert("Senha incorreta");
                document.querySelector("#senhacpf").focus();
            }else{
                document.querySelector('.btn_ok').classList.add("desaparecer");
                alert("Dados corretos! Você pode logar agora!")
                document.querySelector('.btn_true_ok').classList.remove("desaparecer");
            }
        }).fail(function() { 
            // not exists code
            alert("Paciente não cadastrado.")
        })
}
function validacaomed() {
    let logincrm = document.querySelector("#valicrm").value;
    let senhacrm = document.querySelector("#senhacrm").value;

    let crm = "../banco_de_dados/medicos/" + logincrm + "/dados.xml"
    $.get(crm)
        .done(function() { 
            // exists code 
            let xmlcrmsenha = 1;
            if (senhacrm != xmlcrmsenha){
                alert("Senha incorreta");
                document.querySelector("#senhacrm").focus();
            }else{
                document.querySelector('.btn_ok').classList.add("desaparecer");
                alert("Dados corretos! Você pode logar agora!")
                document.querySelector('.btn_true_ok').classList.remove("desaparecer");
            }
        }).fail(function() { 
            // not exists code
            alert("Medico não cadastrado.")
        })
}
function validacaolab() {
    let logincnpj = document.querySelector("#valicnpj").value;
    let senhacnpj = document.querySelector("#senhacnpj").value;

    let cnpj = "../banco_de_dados/laboratorios/" + logincnpj + "/dados.xml"
    $.get(cnpj)
        .done(function() { 
            // exists code 
            let xmlcnpjsenha = 1;
            if (senhacnpj != xmlcnpjsenha){
                alert("Senha incorreta");
                document.querySelector("#senhacnpj").focus();
            }else{
                document.querySelector('.btn_ok').classList.add("desaparecer");
                alert("Dados corretos! Você pode logar agora!")
                document.querySelector('.btn_true_ok').classList.remove("desaparecer");
            }
        }).fail(function() { 
            // not exists code
            alert("Laboratório não cadastrado.")
        })
}
