function changeDcsStyle(){
  var element = document.getElementById("DocsDiv");
  element.style.display = "none";
  var element2 = document.getElementById("NewDocsDiv");
  element2.style.display = "block";
}

function getDocs(){
  var xhr = new XMLHttpRequest();
    xhr.addEventListener("readystatechange", function() {
        if (this.readyState === this.DONE) {
                var result=JSON.parse(this.responseText);
                    console.log(result.results);
                    createDocCard(result.results);
            }
    });
  xhttp.open("GET", "https://www.googleapis.com/drive/v3/files?pageSize=1000&q=mimeType%3D%27application%2Fvnd.google-apps.document%27%20and%20trashed%3Dfalse");
  xhttp.send();
}

function createDocCard(result){
  var container = document.querySelector("#copertine");
  container.innerHTML = "";
  result.forEach((element, i) => {
      let cover = document.createElement("img");
      cover.src="https://image.tmdb.org/t/p/w500" + element.poster_path;
      cover.className = "copertina";
      cover.setAttribute("onclick", "mostraDescrizione(" + i + ")");
      cover.setAttribute("data-bs-toggle", "modal");
      cover.setAttribute("data-bs-target", "#exampleModal");
      container.appendChild(cover);
  });
}

function changeShtsStyle(){
    var element = document.getElementById("SheetsDiv");
    element.style.display = "none";
    var element2 = document.getElementById("NewSheetsDiv");
    element2.style.display = "block";
}

/*
var risultatiRicerca;

function cercaDoc(){
    var xhr = new XMLHttpRequest();
    xhr.addEventListener("readystatechange", function() {
        if (this.readyState === this.DONE) {
                var result=JSON.parse(this.responseText);
                    console.log(result.results);
                    risultatiRicerca = result.results;
                    creaLocandina(result.results);
                    //addToCarusel(result.results);
            }
    });
    xhr.open("GET", "https://www.googleapis.com/drive/v3/files");

    xhr.send();
}
*/