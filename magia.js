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

function creaLocandina(risultati){
    
    var container = document.querySelector("#copertine");
    container.innerHTML = "";
    risultati.forEach((element, i) => {
        let cover = document.createElement("img");
        cover.src="https://image.tmdb.org/t/p/w500" + element.poster_path;
        cover.className = "copertina";
        cover.setAttribute("onclick", "mostraDescrizione(" + i + ")");
        cover.setAttribute("data-bs-toggle", "modal");
        cover.setAttribute("data-bs-target", "#exampleModal");
        container.appendChild(cover);
    });
}