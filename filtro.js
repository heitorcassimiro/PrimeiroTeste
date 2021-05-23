function busca() {

    var users = [{
            nome: "Francineide",
            idade: 25,
            servico: 3,
            profissao: "decorador",
            cidades: "Recife",
            comentario: "Bom",
        },
        {
            nome: "Pedro",
            idade: 21,
            servico: 5,
            profissao: "decorador",
            cidades: "Gravatá",
            comentario: "A festa da minha filha ficou linda, recomendo.",
        },
        {
            nome: "Fabio",
            idade: 34,
            servico: 5,
            profissao: "fotografo",
            cidades: "Caruaru",
            comentario: "Fotos ficaram lindas",
        },
        {
            nome: "Marcelo",
            idade: 22,
            servico: 3,
            profissao: "fotografo",
            cidades: "Olinda",
            comentario: "Bom profissional",
        },
        {
            nome: "Marcia",
            idade: 25,
            servico: 5,
            profissao: "florista",
            cidades: "Camaragibe",
            comentario: "Flores lindas, a igraja ficou um sonho",
        },
        {
            nome: "Moises",
            idade: 66,
            servico: 5,
            profissao: "Churrasqueiro",
            cidades: "Jaboatao dos Guararapes",
            comentario: "Excelente atendimento",
        },
        {
            nome: "João",
            idade: 54,
            servico: 5,
            profissao: "Churrasqueiro",
            cidades: "Torre",
            comentario: "Excelente atendimento, churrasco estava sensacional",
        },
        {
            nome: "Neide",
            idade: 60,
            servico: 4,
            profissao: "florista",
            cidades: "Camaragibe",
            comentario: "Excelente atendimento",
        },
        {
            nome: "Ricardo",
            idade: 30,
            servico: 5,
            profissao: "segurança",
            cidades: "Igarassu",
            comentario: "Bom atendimento",
        },
        {
            nome: "Gabriel",
            idade: 20,
            servico: 5,
            profissao: "segurança",
            cidades: "Camaragibe",
            comentario: "Otimo, gentil e não fica conversando potoca com os outros",
        },
        {
            nome: "Yuri",
            idade: 30,
            servico: 5,
            profissao: "fotografo",
            cidades: "Recife",
            comentario: "Excelente, fotos bonitas e criativas",
        },
        {
            nome: "Camilla",
            idade: 43,
            servico: 5,
            profissao: "confeteiro",
            cidades: "Caruaru",
            comentario: "O bolo estava lindo",
        },
        {
            nome: "José",
            idade: 22,
            servico: 5,
            profissao: "confeteiro",
            cidades: "Jaboatão dos Guararapes",
            comentario: "Os docinhos estavam lindos",
        },
        {
            nome: "Marinalva",
            idade: 27,
            servico: 5,
            profissao: "musico",
            cidades: "Recife",
            comentario: "Muito afinada",
        },
        {
            nome: "Lourenço",
            idade: 18,
            servico: 1,
            profissao: "garcom",
            cidades: "Olinda",
            comentario: "Não trouxe minha Coca",
        },
        {
            nome: "Darius",
            idade: 89,
            servico: 2,
            profissao: "musico",
            cidades: "Camaragibe",
            comentario: "Só tocou brega",
        },
        {
            nome: "Elói",
            idade: 32,
            servico: 3,
            profissao: "garcom",
            cidades: "Recife",
            comentario: "Estou esperando minha agua até agora",
        },
        {
            nome: "Alcino",
            idade: 23,
            servico: 3,
            profissao: "recreador",
            cidades: "Recife",
            comentario: "A criançada ficou cansada",
        },
        {
            nome: "Eduardo",
            idade: 60,
            servico: 3,
            profissao: "cerimonialista",
            cidades: "Olinda",
            comentario: "Mandou tocarem a musica antes da hora",
        },
        {
            nome: "Geraldo",
            idade: 21,
            servico: 4,
            profissao: "decorador",
            cidades: "Recife",
            comentario: "O painel lindo mas se soltou durante a festa",
        }
    ];

    const prof = document.getElementById("prof");
    const estrelas = document.getElementById("estrela");
    const cidades = document.getElementById("cidades");

    const name1 = document.getElementById("name1");
    const idade1 = document.getElementById("idade1");
    const servico1 = document.getElementById("servico1");
    const cidAt1 = document.getElementById("cidAt1");
    const coment1 = document.getElementById("coment1");

    const name2 = document.getElementById("name2");
    const idade2 = document.getElementById("idade2");
    const servico2 = document.getElementById("servico2");
    const cidAt2 = document.getElementById("cidAt2");
    const coment2 = document.getElementById("coment2");

    const name3 = document.getElementById("name3");
    const idade3 = document.getElementById("idade3");
    const servico3 = document.getElementById("servico3");
    const cidAt3 = document.getElementById("cidAt3");
    const coment3 = document.getElementById("coment3");

    const encontrou = document.getElementById("naoEncontrou");

    document.getElementById("user1").style.visibility = "none";

    document.getElementById("user2").style.visibility = "none";

    document.getElementById("user3").style.visibility = "none";



    var contador = 0;
    var contadorUser = 0;

    function star(nEstrela) {
        if (nEstrela == 1) {
            estrela = "&#11088";
        } else if (nEstrela == 2) {
            estrela = "&#11088" + "&#11088";
        } else if (nEstrela == 3) {
            estrela = "&#11088" + "&#11088" + "&#11088";
        } else if (nEstrela == 4) {
            estrela = "&#11088" + "&#11088" + "&#11088" + "&#11088";
        } else if (nEstrela == 5) {
            estrela = "&#11088" + "&#11088" + "&#11088" + "&#11088" + "&#11088";
        }

        return estrela

    }

    for (i = 0; i < users.length; i++) {

        if ((users[i].profissao == prof.value) && (contadorUser == 0) && (users[i].servico >= estrelas.value)) {
            contadorUser = contadorUser + 1;
            contador = contador + 1;

            name1.innerHTML = users[i].nome;
            idade1.innerHTML = users[i].idade + " anos";
            servico1.innerHTML = "Serviço" + star(users[i].servico);
            cidAt1.innerHTML = users[i].cidades;
            coment1.innerHTML = "comentário mais relevante: " + users[i].comentario;

            document.getElementById("user1").style.visibility = "visible";

            encontrou.innerHTML = "";
            encontrou.style.visibility = "none";

            name2.innerHTML = "";
            idade2.innerHTML = "";
            servico2.innerHTML = "";
            cidAt2.innerHTML = "";
            coment2.innerHTML = "";

            name3.innerHTML = "";
            idade3.innerHTML = "";
            servico3.innerHTML = "";
            cidAt3.innerHTML = "";
            coment3.innerHTML = "";


        } else if ((users[i].profissao == prof.value) && (contadorUser == 1) && (users[i].servico >= estrelas.value)) {
            name2.innerHTML = users[i].nome;
            contadorUser = contadorUser + 1;
            contador = contador + 1;

            name2.innerHTML = users[i].nome;
            idade2.innerHTML = users[i].idade + " anos";
            servico2.innerHTML = "Serviço" + star(users[i].servico);
            cidAt2.innerHTML = users[i].cidades;
            coment2.innerHTML = "comentário mais relevante: " + users[i].comentario;

            document.getElementById("user2").style.visibility = "visible";

            encontrou.style.visibility = "none";

            name3.innerHTML = "";
            idade3.innerHTML = "";
            servico3.innerHTML = "";
            cidAt3.innerHTML = "";
            coment3.innerHTML = "";


        } else if ((users[i].profissao == prof.value) && (contadorUser == 2) && (users[i].servico >= estrelas.value)) {
            name3.innerHTML = users[i].nome;
            contadorUser = contadorUser + 1;
            contador = contador + 1;

            name3.innerHTML = users[i].nome;
            idade3.innerHTML = users[i].idade + " anos";
            servico3.innerHTML = "Serviço" + star(users[i].servico);
            cidAt3.innerHTML = users[i].cidades;
            coment3.innerHTML = "comentário mais relevante: " + users[i].comentario;

            document.getElementById("user3").style.visibility = "visible";

            encontrou.style.visibility = "none";

        }

    }

    if (contador == 0) {
        encontrou.innerHTML = "Não encontrado";

        name1.innerHTML = "";
        idade1.innerHTML = "";
        servico1.innerHTML = "";
        cidAt1.innerHTML = "";
        coment1.innerHTML = "";

        name2.innerHTML = "";
        idade2.innerHTML = "";
        servico2.innerHTML = "";
        cidAt2.innerHTML = "";
        coment2.innerHTML = "";

        name3.innerHTML = "";
        idade3.innerHTML = "";
        servico3.innerHTML = "";
        cidAt3.innerHTML = "";
        coment3.innerHTML = "";

        document.getElementById("user1").style.visibility = "none";

        document.getElementById("user2").style.visibility = "none";

        document.getElementById("user3").style.visibility = "none";

        encontrou.style.visibility = "visible";


    }

}