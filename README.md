# GoogleDocs-GoogleSheets

## Try it out

-------- updating ---------

## Templates

[document](https://docs.google.com/document/d/1Q1P4lYsJVaTaHkWxW78QaGuYwF8mZKn-U3RH9e8pJUk/copy) & [spreadsheet](https://docs.google.com/spreadsheets/d/1d7OtTz1nDKzn2WjvPkpz9252NkQUBjRWwQExDehBWcA/copy)

## How to set up your document for the docs-sheets app

Use your field name as placeholder for your data.
Your field name must be between curly brackets: e.g.
Header of your sheet column name → docs placeholder {name}
Header of your sheet column DateTime → docs placeholder {DateTime}

Please note:

- Placeholders are case sensitive: make sure to type your field name correctly.
- Every document will contain data from a single sheet row.
- If the field data is empty the placeholder will be wiped off.
- If there is no placeholder for a field name in the sheet, no data will be applied from that column.
- If a placeholder is referencing a missing field name in the sheet, no data will replace it.
