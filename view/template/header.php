<?php
// view/template/header.php
?>
<header class="logo-bar">
  <div class="container">

    <!-- Recherche utilisateur (colonne 1) -->
    <div class="search-container">
      <input
        type="search"
        id="searchInput"
        class="search-input"
        placeholder="Rechercher un utilisateur…"
        autocomplete="off">
      <ul class="search-results" id="searchResults"></ul>
    </div>

    <!-- Logo + texte centré (colonne 2) -->
    <a href="/giftHub/public/index.php/home" class="logo-center">
      <img src="/giftHub/public/images/logo.svg" alt="GiftHub" width="32">
      <span class="ms-2 fw-bold fs-4">GiftHub</span>
    </a>

    <!-- Bouton connexion/profil (colonne 3) -->
    <div class="action-btn">
      <?php if (!empty($_SESSION['user_id'])): ?>
        <a href="/giftHub/public/index.php/profile">
          <button class="bn54"><span class="bn54span">Mon profil</span></button>
        </a>
      <?php else: ?>
        <a href="/giftHub/public/index.php/login">
          <button class="bn54"><span class="bn54span">Se connecter</span></button>
        </a>
      <?php endif; ?>
    </div>

  </div>
</header>
