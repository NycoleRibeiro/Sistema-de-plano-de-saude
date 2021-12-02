function validacaoadmin() {
    let loginadmin = document.querySelector("#valiadmin").value;
    let senhaadmin = document.querySelector("#senhaadmin").value;
    if (loginadmin != "admin" ){
        alert("Login incorreto");
        document.querySelector("#valiadmin").focus();
    } else if (senhaadmin != "admin") {
        alert("Senha incorreta");
        document.querySelector("#senhaadmin").focus();
    } else {
        window.location.href = "administrador_paciente.html";
    }
}

function validacaopac() {
    let logincpf = document.querySelector("#valicpf").value;
    let senhacpf = document.querySelector("#senhacpf").value;

    let cpf = "banco_de_dados/pacientes/" + logincpf + "/dados.xml"

    $.ajax(cpf)
        .done(function(xml) {
                let xmlcpfsenha = $(xml).find("senha").text();
            if (senhacpf != xmlcpfsenha){
                // Caso a senha não seja a mesma cadastrada no XML, o alerta é exibido
                alert("Senha incorreta");
                document.querySelector("#senhacpf").focus();
            } else {
                // Caso a senha seja a mesma cadastrada no XML, a página de perfil é aberta
                window.location.href = "paciente_dados.php";
            }
        }).fail(function() { 
            // Caso o CPF não exista no banco de dados
            alert("Paciente não cadastrado.")
        });
}

function validacaomed() {
    let logincrm = document.querySelector("#valicrm").value;
    let senhacrm = document.querySelector("#senhacrm").value;

    let crm = "banco_de_dados/medicos/" + logincrm + "/dados.xml"
    $.ajax(crm)
        .done(function(xml) { 
            let xmlcrmsenha = $(xml).find("senha").text();
            if (senhacrm != xmlcrmsenha){
                alert("Senha incorreta");
                document.querySelector("#senhacrm").focus();
            } else {
                window.location.href = "medico_dados.php";
            }
        }).fail(function() { 
            alert("Medico não cadastrado.")
        })
}

function validacaolab() {
    let logincnpj = document.querySelector("#valicnpj").value;
    let senhacnpj = document.querySelector("#senhacnpj").value;

    let cnpj = "banco_de_dados/laboratorios/" + logincnpj + "/dados.xml"
    $.ajax(cnpj)
        .done(function(xml) { 
            let xmlcnpjsenha = $(xml).find("senha").text();
            if (senhacnpj != xmlcnpjsenha){
                alert("Senha incorreta");
                document.querySelector("#senhacnpj").focus();
            } else {
                window.location.href = "laboratorio_dados.php";
            }
        }).fail(function() { 
            alert("Laboratório não cadastrado.")
        })
}