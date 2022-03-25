<!DOCTYPE html>
<html>

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>BDM & Co.</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@400;500;700&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/15181efa86.js" crossorigin="anonymous"></script>
    <script src="script.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/bulma@0.9.0/css/bulma.min.css" />
    <link rel="stylesheet" type="text/css" href="./css/style.css">
  </head>

  <body>
    <section class="container">
      <div class="columns is-multiline">
        <div class="column is-8 is-offset-2 register">
          <div class="columns">
            <div id="DocsDiv" class="column left">
              <h1 class="title is-4">Upload your Google Docs</h1>
              <button id="DocsBttn" onclick="changeDcsStyle(); getDocs()" class="button is-block is-primary is-fullwidth is-medium" style="background-color: #2684fc">Upload</button>
            </div>

            <div id="NewDocsDiv" class="column left" style="display: none">
              <h1 class="title is-4">Upload your Google Docs</h1>
              <div class="cardss">
                <div class="content">
                  <p>Lorem ipsum...</p>
                </div>
              </div>
            </div>

            <div id="SheetsDiv" class="column right has-text-centered">
              <h1 class="title is-4">Upload your Google Sheets</h1>
              <form action="./google/sheets.php" method="post">
                <button id="SheetsBttn" onclick="changeShtsStyle()" class="button is-block is-primary is-fullwidth is-medium" style="background-color: #21a464">Upload</button>
              </form>
            </div>
            
            <div id="NewSheetsDiv" class="column left" style="display: none">
              <h1 class="title is-4">Upload your Google Sheets</h1>
              <div class="cardss">
                <div class="content">
                  <p>Lorem ipsum...</p>
                </div>
              </div>
            </div>

          </div>
        </div>
        <div class="column is-8 is-offset-2">
          <br>
          <nav class="level">
            <div class="level-left">
              <div class="level-item">
                <span class="icon">
                  <a href="https://github.com/Edoardo11/GoogleDocs-GoogleSheets" target="_blank">
                    <i class="fab fa-github"></i>
                  </a>
                </span> &emsp;
              </div>
            </div>
            <div class="level-right">
              <small class="level-item" style="color: var(--textLight)">
                &copy; BDM & Co.
              </small>
            </div>
          </nav>
        </div>
      </div>
    </section>
  </body>

</html> 