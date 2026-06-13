function sortTable(n) {
  var table = document.getElementById("myTable");
  if (!table) return;

  var rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
  switching = true;
  dir = "asc";

  while (switching) {
    switching = false;
    rows = table.getElementsByTagName("TR");

    for (i = 1; i < (rows.length - 1); i++) {
      shouldSwitch = false;
      x = rows[i].getElementsByTagName("TD")[n];
      y = rows[i + 1].getElementsByTagName("TD")[n];

      if (dir === "asc") {
        if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
          shouldSwitch = true;
          break;
        }
      } else if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
        shouldSwitch = true;
        break;
      }
    }

    if (shouldSwitch) {
      rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
      switching = true;
      switchcount++;
    } else if (switchcount === 0 && dir === "asc") {
      dir = "desc";
      switching = true;
    }
  }
}

function scoreButtonHtml(score) {
  if (score > 9) {
    return '<button type="button" class="btn btn-success">' + score + '</button>';
  }
  if (score <= 3) {
    return '<button type="button" class="btn btn-danger">' + score + '</button>';
  }
  if (score <= 6) {
    return '<button type="button" class="btn btn-primary">' + score + '</button>';
  }
  return '<button type="button" class="btn btn-success">' + score + '</button>';
}

function escapeHtml(text) {
  var div = document.createElement('div');
  div.textContent = text;
  return div.innerHTML;
}

function renderGamesTable(games) {
  var tbody = document.getElementById('myTable');
  if (!tbody) return;

  var html = '';
  var rowNum = 0;

  games.slice(1).forEach(function (game) {
    rowNum++;
    var editorsChoice = game.editors_choice === 'Y' ? 'Yes' : 'NO';
    html +=
      '<tr>' +
      '<td>' + rowNum + '</td>' +
      '<td>' + escapeHtml(game.title) + '</td>' +
      '<td>' + escapeHtml(game.platform) + '</td>' +
      '<td>' + scoreButtonHtml(Number(game.score)) + '</td>' +
      '<td>' + escapeHtml(game.genre) + '</td>' +
      '<td>' + editorsChoice + '</td>' +
      '</tr>';
  });

  tbody.innerHTML = html;
}

fetch('web-data/gamesarena.json')
  .then(function (response) { return response.json(); })
  .then(function (data) {
    renderGamesTable(data.games || []);
  })
  .catch(function (err) {
    console.error('Failed to load games data', err);
  });

$(document).ready(function () {
  $('#myModal').modal('show');

  $("#myInput").on("keyup", function () {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function () {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
    });
  });
});
