// public/js/home.js

document.addEventListener('DOMContentLoaded', function() {
  const input = document.getElementById('searchInput');
  const results = document.getElementById('searchResults');
  const container = document.querySelector('.search-container');

  // Helper to show or hide results
  function showResults(show) {
    if (show) {
      results.classList.add('show');
    } else {
      results.classList.remove('show');
    }
  }

  // Fetch and display user search results
  input.addEventListener('input', function() {
    const query = this.value.trim();
    if (!query) {
      results.innerHTML = '';
      showResults(false);
      return;
    }

    fetch(`/giftHub/public/index.php/search_user?q=${encodeURIComponent(query)}`)
      .then(response => response.json())
      .then(data => {
        if (Array.isArray(data) && data.length > 0) {
          results.innerHTML = data.map(user => (
            `<li class="list-group-item">
               <a href="/giftHub/public/index.php/profile/${user.id}">\${user.username}</a>
             </li>`
          )).join('');
          showResults(true);
        } else {
          results.innerHTML = '<li class="list-group-item text-muted">Aucun résultat</li>';
          showResults(true);
        }
      })
      .catch(err => {
        console.error('Search error:', err);
        results.innerHTML = '<li class="list-group-item text-danger">Erreur de recherche</li>';
        showResults(true);
      });
  });

  // Hide results when clicking outside
  document.addEventListener('click', function(e) {
    if (!container.contains(e.target)) {
      showResults(false);
    }
  });

  // Prevent hiding when clicking inside results
  results.addEventListener('click', function(e) {
    e.stopPropagation();
  });
});
