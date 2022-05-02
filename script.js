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
      if(result.redirect) {
        window.open(result.redirect, '_blank').focus();
      }
      else {
        createDocCard(result.files);
        changeDcsStyle(); 
        console.log(result.files);
      }
    }
  };
  xhttp.open("GET", "https://francescodandreastudente.altervista.org/GoogleDocs-GoogleSheets/google/getDocs.php", true);
  xhttp.send();
}

function createDocCard(result){ //Costruisce le copertine dei docs all'interno del div ("docs" in index.php)
  var container = document.querySelector("#docs");
  container.innerHTML = "";
  result.forEach(element => { 
      let cover = document.createElement("div");
      cover.innerHTML = element.name;
      cover.className = "doc";
      cover.setAttribute("onclick", "getDocId('"+element.id+"')"); //Necessario per prendere l'id del doc
      container.appendChild(cover);
  });
}

function getSheets(){  
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      let result = JSON.parse(this.responseText);
      if(result.redirect) window.open(result.redirect, '_blank').focus();
      else{
        createSheetCard(result.files);
        changeShtsStyle(); 
        console.log(result.files);
      }
    }
  };
  xhttp.open("GET", "https://francescodandreastudente.altervista.org/GoogleDocs-GoogleSheets/google/getSheets.php", true);
  xhttp.send();
}

function createSheetCard(result){ 
  var container = document.querySelector("#sheets");
  container.innerHTML = "";
  result.forEach(element => { 
      let cover = document.createElement("div");
      cover.innerHTML = element.name;
      cover.className = "sheet";
      cover.setAttribute("onclick","getSheetId('"+element.id+"')");
      container.appendChild(cover);
  });
}

function mergeFiles(){
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      let result = JSON.parse(this.responseText);
      if(result.redirect) window.open(result.redirect, '_blank').focus();
      else console.log(result.files);
    }
  };
  xhttp.open("GET", "http://francescodandreastudente.altervista.org/GoogleDocs-GoogleSheets/google/merge.php", true);
  xhttp.send();
}

//End Funzioni ottieni docs e sheets -----------------------------------------------------------------------------------

function oauth(){
  window.open("https://francescodandreastudente.altervista.org/GoogleDocs-GoogleSheets/google/oauth.php", '_blank').focus();
  didOauth=true;
}

function myFunction() {
  var input, filter, docs, doc, a, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  docs = document.getElementById("myUL");
  doc = docs.getElementsByTagName("doc");
  for (i = 0; i < doc.length; i++) {
      a = doc[i].getElementsByTagName("a")[0];
      txtValue = a.textContent || a.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        doc[i].style.display = "";
      } else {
        doc[i].style.display = "none";
      }
  }
}