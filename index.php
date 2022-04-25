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
            <button id="DocsBttn" onclick="getDocs();" class="button is-block is-primary is-fullwidth is-medium" style="background-color: #2684fc">Upload</button>
            <input type="button" onclick="location.href='https://docs.google.com/document/d/1Q1P4lYsJVaTaHkWxW78QaGuYwF8mZKn-U3RH9e8pJUk/copy'" value="View Template">
          </div>

          <div id="NewDocsDiv" class="column left" style="display: none">
            <h1 class="title is-4">Upload your Google Docs</h1>
            <div class="DocsCards">
              <!-- <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names.." title="Type in a name"> -->
              <div id="docs">
                <!-- Div dove inserisco tutte le copertine dei docs -->

              </div>
            </div>
          </div>

          <div id="SheetsDiv" class="column right has-text-centered">
            <h1 class="title is-4">Upload your Google Sheets</h1>
            <button id="SheetsBttn" onclick="getSheets();" class="button is-block is-primary is-fullwidth is-medium" style="background-color: #21a464">Upload</button>
            <input type="button" onclick="location.href='https://docs.google.com/spreadsheets/d/1d7OtTz1nDKzn2WjvPkpz9252NkQUBjRWwQExDehBWcA/copy'" value="View Template">
          </div>

          <div id="NewSheetsDiv" class="column right has-text-centered" style="display: none">
            <h1 class="title is-4">Upload your Google Sheets</h1>
            <div class="SheetsCards">
              <div id="sheets">
                <!-- Div dove inserisco tutte le copertine degli sheets -->

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

          <button id="SheetsBttn" onclick="mergeFiles();" class="button is-block is-primary is-fullwidth is-medium" style="background-color: #21a464; width: 30%">Merge</button>

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