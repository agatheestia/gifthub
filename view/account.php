<!DOCTYPE html> xzxzx
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Mes Wishlists</title>
    <link rel="stylesheet" href="../public/css/account.css">
</head>
<body>
    <div class="container">
        <!-- Profil avec bordure -->
        <div class="profile-section">
            <div class="profile">
                <img src="account.png" alt="Photo de profil" class="profile-pic">
                <div>
                    <h2>Wishlists d’Agathe Roumat</h2>
                    <p class="small-text">Wishlists (4)</p>
                </div>
            </div>
            <hr class="divider">
        </div>

        <!-- Boutons d'action -->
        <div class="buttons">
            <button class="btn create">Créer une wishlist</button>
            <button class="btn edit">Modifier mon profil</button>
        </div>

        <!-- Liste des wishlists -->
        <div class="wishlist-container">
            <a href="#" class="wishlist-card clickable">
                <div class="wishlist-visual">
                    <img src="https://i.imgur.com/VU9pSSO.png" alt="Noël" class="wishlist-bg">
                </div>
                <div class="wishlist-text">
                    <p class="wishlist-title">Wishlist Noël 2025</p>
                    <p class="wishlist-count">4 wishes</p>
                </div>
            </a>

            <a href="#" class="wishlist-card red clickable">
                <div class="wishlist-visual red">
                    <div class="gift-icon">🎁</div>
                </div>
                <div class="wishlist-text">
                    <p class="wishlist-title">Nom de la Wishlist</p>
                    <p class="wishlist-count">3 wishes</p>
                </div>
            </a>

            <a href="#" class="wishlist-card red clickable">
                <div class="wishlist-visual red">
                    <div class="gift-icon">🎁</div>
                </div>
                <div class="wishlist-text">
                    <p class="wishlist-title">Nom de la Wishlist</p>
                    <p class="wishlist-count">3 wishes</p>
                </div> 
            </a>

            <a href="#" class="wishlist-card gray clickable">
                <div class="wishlist-visual gray">
                    <div class="gift-icon">🎁</div>
                </div>
                <div class="wishlist-text">
                    <p class="wishlist-title">Déjà Reçus</p>
                    <p class="wishlist-count">3 wishes</p>
                </div>
            </a>
        </div>
    </div>
</body>
</html>
