function update() {
    var students = [{ student: "0xdD080fA1b7C4700F2BD7f44238821C26f7392148", goal: 100.00, collected: 10.00, etnia_cor: 1, pcd: 1, tipoArea: 5, curso: 1}, { student: "0xdD000fA1b7C4700F2BD7f44238821C26f7392148", goal: 100.00, collected: 54.55, curso: 2}, { student: "0xdD777A1b7C4700F2BD7f44238821C26f7392148", goal: 200.00, collected: 80.55, etnia_cor: 2, pcd: 1, tipoArea: 2, curso: 2}, { student: "0xdD222fA1b7C4700F2BD7f44238821C26f7392148", goal: 100.00, collected: 54.55, etnia_cor: 3, pcd: 2, tipoArea: 3, curso: 3}, { student: "0xdD871581b7C4700F2BD7f44238821C26f7392148", goal: 100.00, collected: 94.55, etnia_cor: 4, pcd: 2, tipoArea: 2, curso: 3}, { student: "0xdD870fA1b7C4700F2BD7f44238821C26f7392148", goal: 100.00, collected: 54.55, etnia_cor: 2, pcd: 1, tipoArea: 1, curso: 12}, { student: "0xdD870fA1b7C4700F2BD7f44238821C26f7392148", goal: 200.00, collected: 70.70, etnia_cor: 5, pcd: 2, tipoArea: 2, curso: 9}, { student: "0xdD870fA1b7C4700F2BD7f44238821C26f7392148", goal: 265.00, collected: 265.00, etnia_cor: 1, pcd: 1, tipoArea: 6, curso: 11}, { student: "0xdD870fA1b7C4700F2BD7f44238821C26f7392148", goal: 200.00, collected: 70.70, etnia_cor: 1, pcd: 2, tipoArea: 4, curso: 20}, { student: "0xdD870fA1b7C4700F2BD7f44238821C26f7392148", goal: 265.00, collected: 265.00, etnia_cor: 3, pcd: 1, tipoArea: 3, curso: 5}, { student: "0xdD080fA1b7C4700F2BD7f44238821C26f7392148", goal: 100.00, collected: 20.00, etnia_cor: 2, pcd: 2, tipoArea: 2, curso: 5}, { student: "0xdD080fA1b7C4700F2BD7f44238821C26f7392148", goal: 100.00, collected: 11.00, etnia_cor: 5, pcd: 2, tipoArea: 1, curso: 6}, { student: "0xdD080fA1b7C4700F2BD7f44238821C26f7392148", goal: 100.00, collected: 17.00, etnia_cor: 5, pcd: 1, tipoArea: 1, curso: 6}, { student: "0xdD080fA1b7C4700F2BD7f44238821C26f7392148", goal: 100.00, collected: 84.00, etnia_cor: 4, pcd: 1, tipoArea: 1, curso: 7}, { student: "0xdD080fA1b7C4700F2BD7f44238821C26f7392148", goal: 100.00, collected: 66.00, etnia_cor: 2, pcd: 1, tipoArea: 1, curso: 8}, { student: "0xdD080fA1b7C4700F2BD7f44238821C26f7392148", goal: 100.00, collected: 64.00, etnia_cor: 4, pcd: 2, tipoArea: 1, curso: 8}, { student: "0xdD080fA1b7C4700F2BD7f44238821C26f7392148", goal: 100.00, collected: 88.00, etnia_cor: 5, pcd: 1, tipoArea: 1, curso: 9}, { student: "0xdD080fA1b7C4700F2BD7f44238821C26f7392148", goal: 100.00, collected: 74.00, etnia_cor: 1, pcd: 1, tipoArea: 1, curso: 10}, { student: "0xdD080fA1b7C4700F2BD7f44238821C26f7392148", goal: 100.00, collected: 96.00, etnia_cor: 1, pcd: 1, tipoArea: 1, curso: 14}, { student: "0xdD080fA1b7C4700F2BD7f44238821C26f7392148", goal: 100.00, collected: 99.00, etnia_cor: 1, pcd: 1, tipoArea: 1, curso: 14}, { student: "0xdD080fA1b7C4700F2BD7f44238821C26f7392148", goal: 100.00, collected: 99.00, etnia_cor: 1, pcd: 2, tipoArea: 1, curso: 14}, { student: "0xdD080fA1b7C4700F2BD7f44238821C26f7392148", goal: 100.00, collected: 99.00, etnia_cor: 1, pcd: 2, tipoArea: 2, curso: 15}, { student: "0xdD080fA1b7C4700F2BD7f44238821C26f7392148", goal: 100.00, collected: 99.00, etnia_cor: 4, pcd: 2, tipoArea: 2, curso: 15}, { student: "0xdD080fA1b7C4700F2BD7f44238821C26f7392148", goal: 100.00, collected: 99.00, etnia_cor: 3, pcd: 1, tipoArea: 3, curso: 16}, { student: "0xdD080fA1b7C4700F2BD7f44238821C26f7392148", goal: 100.00, collected: 99.00, etnia_cor: 1, pcd: 1, tipoArea: 4, curso: 17}, { student: "0xdD080fA1b7C4700F2BD7f44238821C26f7392148", goal: 100.00, collected: 99.00, etnia_cor: 4, pcd: 2, tipoArea: 1, curso: 18}, { student: "0xdD080fA1b7C4700F2BD7f44238821C26f7392148", goal: 100.00, collected: 99.00, etnia_cor: 4, pcd: 1, tipoArea: 1, curso: 19}];
    var select = document.getElementById('etnia_cor');
	var etnia_cor = select.options[select.selectedIndex].value;
	var select = document.getElementById('pcd');
	var pcd = select.options[select.selectedIndex].value;
    var select = document.getElementById('tipoArea');
    var tipoArea = select.options[select.selectedIndex].value;
    var select = document.getElementById('curso');
	var curso = select.options[select.selectedIndex].value;
    var filter = [];
    for (var i = 0; i < students.length; i++) {
        if ((etnia_cor == 0 || students[i].etnia_cor == etnia_cor) && (pcd == 0 || students[i].pcd == pcd) && (tipoArea == 0 || students[i].tipoArea == tipoArea) && (curso == 0 || students[i].curso == curso)) {
            filter.push(students[i]);
        }
    }
    return filter;
}

function pagination(pageId = 1) {
    var students = update();
    var cardsPerPage = 12;
    var pages = Math.floor((students.length) / cardsPerPage);
    if ((students.length) % cardsPerPage != 0) {
        pages += 1;
    }
    var pagination = document.getElementsByClassName("pagination");
    pagination[0].innerHTML = '';
    for (var i = 0; i < pages; i++) {
        if ((i + 1) == pageId) {
            pagination[0].innerHTML += '<li class="page-item active"><a class="page-link" id="' + (i + 1) + '" onClick="pagination(this.id)">' + (i + 1) + '</a></li>';
        } else {
            pagination[0].innerHTML += '<li class="page-item"><a class="page-link" id="' + (i + 1) + '" onClick="pagination(this.id)">' + (i + 1) + '</a></li>';
        }
    }
    createCards(pageId);
}

function createCards(pageId) {
    var lista = update();
    var cardsPerPage = 12;
    lista.sort(function sorter(a, b) {
        var diferencaa = ((a.collected * 100) / a.goal);
        var diferencab = ((b.collected * 100) / b.goal);
        if (diferencaa > diferencab) {
            return 1;
        }
        if (diferencaa < diferencab) {
            return -1;
        }
        return 0;
    });
    var students = document.getElementById("students");
    students.innerHTML = "";
    if (lista.length == 0) {
        students.className = "";
        students.innerHTML += '<div class="alert alert-primary" role="alert"><h4 class="alert-heading">Não há registros!</h4><p>Não há alunos registrados nessas categorias selecionadas. Caso ainda deseje efetuar sua doação, será necessário optar por outras categorias.</p><hr><p class="mb-0">Ficaremos felizes com sua contribuição para a Educação!</p></div>';
    }
    else {
        students.className = "row row-cols-1 row-cols-md-3";
        for (var i = (pageId * cardsPerPage) - cardsPerPage; i < pageId * cardsPerPage; i++) {
            var progress = ((lista[i].collected * 100) / lista[i].goal);
            students.innerHTML += '<div class="col mb-4"><div class="card h-100"><div class="card-body"><div class="progress progress-bar-striped"><div class="progress-bar progress-bar-striped" role="progressbar" style="width: ' + progress.toFixed(2) + '%;" aria-valuenow="' + progress.toFixed(2) + '" aria-valuemin="0" aria-valuemax="100"></div></div><small class="text-muted">' + progress.toFixed(2) + '% arrecadado</small><h5 class="card-title collected">R$ ' + lista[i].collected.toFixed(2) + '</h5><p class="card-text">Meta R$ ' + lista[i].goal.toFixed(2) + '</p><a data-toggle="modal" data-target="#makeDonation" class="btn btn-primary">Doar</a></div></div>';
        }
    }
}

/*function makeDonation(i) {

}

function clearTable() {
    var table = document.getElementById("table");
    var lines = table.getElementsByTagName('tr');
    for (var i = lines.length; i > 1 ; i--) {
        table.deleteRow(i - 1);
    }

}

function updateTable() {
    var lista = [{student: "0xdD080fA1b7C4700F2BD7f44238821C26f7392148", goal: 100.00, collected: 25.00}, {student: "0xdD000fA1b7C4700F2BD7f44238821C26f7392148", goal: 100.00, collected: 54.55}, {student: "0xdD777A1b7C4700F2BD7f44238821C26f7392148", goal: 200.00, collected: 80.55}, {student: "0xdD222fA1b7C4700F2BD7f44238821C26f7392148", goal: 100.00, collected: 54.55}, {student: "0xdD871581b7C4700F2BD7f44238821C26f7392148", goal: 100.00, collected: 94.55}, {student: "0xdD870fA1b7C4700F2BD7f44238821C26f7392148", goal: 100.00, collected: 54.55}, {student: "0xdD870fA1b7C4700F2BD7f44238821C26f7392148", goal: 200.00, collected: 70.70}, {student: "0xdD870fA1b7C4700F2BD7f44238821C26f7392148", goal: 265.00, collected: 265.00}];
    lista.sort(function sorter(a, b){
        var diferencaa = ((a.collected * 100) / a.goal);
        var diferencab = ((b.collected * 100) / b.goal);
        if (diferencaa > diferencab) {
            return 1;
        }
        if (diferencaa < diferencab) {
            return -1;
        }
        return 0;
    });

    var table = document.getElementById("table");
    clearTable();
    for (var i = 0; i < lista.length; i++) {
        var newRow = table.insertRow(i + 1);
        var progresso = ((lista[i].collected * 100) / lista[i].goal);
        newRow.insertCell(0).innerHTML = "<b>" + (i + 1) + "</b>";
        newRow.insertCell(1).innerHTML = lista[i].student;
        newRow.insertCell(2).innerHTML = "R$ " + lista[i].goal.toFixed(2);
        newRow.insertCell(3).innerHTML = "R$ " + lista[i].collected.toFixed(2);
        newRow.insertCell(4).innerHTML = '<div class="progress"><div class="progress-bar bg-success" id="progressbar" role="progressbar" style="width: ' + progresso +'%;" aria-valuenow="' + progresso +'" aria-valuemin="0" aria-valuemax="100">' + progresso.toFixed(2) +'%</div> </div>';
        if (i % 2 == 0) {
            newRow.style.background = "#f2f2f2";
        }
    }
}*/