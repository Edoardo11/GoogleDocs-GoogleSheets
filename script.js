function changeDcsStyle(){

  var element = document.getElementById("DocsDiv");
  element.style.display = "none";
  var element2 = document.getElementById("NewDocsDiv");
  element2.style.display = "block";
}

function changeShtsStyle(){

    var element = document.getElementById("SheetsDiv");
    element.style.display = "none";
    var element2 = document.getElementById("NewSheetsDiv");
    element2.style.display = "block";
}



//Funzioni ottieni doc e sheets
function getDocs(){  //Richiesta apigoogle per ricevere tutti i docs google -----------------------------------------------------------------------------------

  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      let result = JSON.parse(this.responseText);
      createDocCard(result.files);
      console.log(result.files);
    }
  };
  xhttp.open("GET", "http://francescodandreastudente.altervista.org/GoogleDocs-GoogleSheets/test/getDocs.php", true);
  xhttp.send();
}

function createDocCard(result){ //Costruisce le copertine dei docs all'interno del div ("docs" in index.php)

  var container = document.querySelector("#docs");
  container.innerHTML = "";
  result.forEach(element => { 
      let cover = document.createElement("doc");
      cover.textContent = element;
      cover.className = "doc";
      cover.setAttribute("onclick", "getDocId(" + toString(element) + ")"); //Necessario per prendere l'id del doc
      container.appendChild(cover);
  });
}

function getDocId(fileId){ //Funzione per prendere l'id, incompleta

  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      let result = JSON.parse(this.responseText);
      console.log(result.files);
    }
  };
  xhttp.open("GET", "http://francescodandreastudente.altervista.org/GoogleDocs-GoogleSheets/test/selectDocs.php?file=" + fileId, true);
  xhttp.send();

  console.log("ID preso con successo:" + result);
}



function getSheets(){  

  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      let result = JSON.parse(this.responseText);
      createSheetCard(result.files);
      console.log(result.files);
    }
  };
  xhttp.open("GET", "http://francescodandreastudente.altervista.org/GoogleDocs-GoogleSheets/test/getSheets.php", true);
  xhttp.send();
}

function createSheetCard(result){ 

  var container = document.querySelector("#sheets");
  container.innerHTML = "";
  result.forEach(element => { 
      let cover = document.createElement("sheet");
      cover.textContent = element;
      cover.className = "sheet";
      cover.setAttribute("onclick", "getSheetId(" + toString(element) + ")"); 
      container.appendChild(cover);
  });
}

function getSheetId(fileId){   //Funzione per prendere l'id, incompleta

  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      let result = JSON.parse(this.responseText);
      console.log(result.files);
    }
  };
  xhttp.open("GET", "http://francescodandreastudente.altervista.org/GoogleDocs-GoogleSheets/test/selectSheets.php?file=" + fileId, true);
  xhttp.send();

  console.log("ID preso con successo:" + result);
}
//End Funzioni ottieni docs e sheets -----------------------------------------------------------------------------------