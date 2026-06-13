(function () {
  function escapeHtml(text) {
    var div = document.createElement('div');
    div.textContent = text;
    return div.innerHTML;
  }

  function renderTrendingGames(games) {
    var container = document.getElementById('trending-games');
    if (!container) return;

    var html = '';
    var imageIndex = 1;

    games.slice(1).forEach(function (game) {
      var editorsChoice = game.editors_choice === 'Y' ? 'Yes' : 'NO';
      var imageHtml = '<div class="col-sm-4 col-md-6"><img src="images/gameswall/' + imageIndex + '.jpg" alt="" width="100%" class="img-responsive" loading="lazy" style="box-shadow: 0px 0px 155px rgba(8, 8, 8, 0.62);"></div>';
      var contentHtml =
        '<div class="col-sm-4 col-md-6 content1">' +
        '<p class="heading">Name: <span style="color:mediumvioletred">' + escapeHtml(game.title) + '</span></p>' +
        '<p class="subheading">Platform: <span style="color:red">' + escapeHtml(game.platform) + '</span></p>' +
        '<p>Score: <span style="color:red">' + game.score + '</span></p>' +
        '<p>Category: <span style="color:red">' + escapeHtml(game.genre) + '</span></p>' +
        '<p>Editor\'s Choice: <span style="color:red">' + editorsChoice + '</span></p>' +
        '</div>';

      html += '<div class="row">';
      if (imageIndex % 2 !== 0) {
        html += imageHtml + contentHtml;
      } else {
        html += contentHtml + imageHtml;
      }
      html += '</div>';

      imageIndex++;
      if (imageIndex === 10) {
        imageIndex = 1;
      }
    });

    container.innerHTML = html;
  }

  fetch('web-data/gamesarena.json')
    .then(function (response) { return response.json(); })
    .then(function (data) {
      renderTrendingGames(data.games || []);
    })
    .catch(function (err) {
      console.error('Failed to load games data', err);
    });
})();
