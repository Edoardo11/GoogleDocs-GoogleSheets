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

var didOauth=false;

//Funzioni ottieni doc e sheets
function getDocs(){  //Richiesta apigoogle per ricevere tutti i docs google -----------------------------------------------------------------------------------
 if(didOauth){
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      let result = JSON.parse(this.responseText);
      createDocCard(result.files);
      changeDcsStyle(); 
      console.log(result.files);
    }
  };
  xhttp.open("GET", "https://francescodandreastudente.altervista.org/GoogleDocs-GoogleSheets/google/getDocs.php", true);
  xhttp.send();
} else oauth();
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
  xhttp.open("GET", "https://francescodandreastudente.altervista.org/GoogleDocs-GoogleSheets/test/selectDocs.php?file=" + fileId, true);
  xhttp.send();

  console.log("ID preso con successo:" + result);
}



function getSheets(){  
  if(didOauth){
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      let result = JSON.parse(this.responseText);
      createSheetCard(result.files);
      changeShtsStyle(); 
      console.log(result.files);
    }
  };
  xhttp.open("GET", "https://francescodandreastudente.altervista.org/GoogleDocs-GoogleSheets/google/getSheets.php", true);
  xhttp.send();
  } else oauth();
}

function createSheetCard(result){ 

  var container = document.querySelector("#sheets");
  container.innerHTML = "";
  result.forEach(element => { 
      let cover = document.createElement("div");
      cover.innerHTML = element.name;
      cover.className = "sheet";
      cover.setAttribute("onclick","getSheetId("+element.id+")");
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
  xhttp.open("GET", "https://francescodandreastudente.altervista.org/GoogleDocs-GoogleSheets/test/selectSheets.php?file=" + fileId, true);
  xhttp.send();

  console.log("ID preso con successo:" + result);
}

//End Funzioni ottieni docs e sheets -----------------------------------------------------------------------------------

function oauth(){
  window.open("http://francescodandreastudente.altervista.org/GoogleDocs-GoogleSheets/google/oauth.php", '_blank').focus();
  didOauth=true;
}