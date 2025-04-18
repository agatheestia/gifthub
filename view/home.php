<?php
// view/home.php
// Variables attendues : $trending (array), $_SESSION['user_id']
?><!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Accueil – GiftHub</title>

  <!-- Bootstrap & Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

  <!-- Spline Viewer -->
  <script type="module" src="https://unpkg.com/@splinetool/viewer@1.9.82/build/spline-viewer.js"></script>

  <!-- Styles -->
  <link rel="stylesheet" href="/giftHub/public/css/auth.css">
  <link rel="stylesheet" href="/giftHub/public/css/layout.css">
  <link rel="stylesheet" href="/giftHub/public/css/home.css">
</head>
<body class="bg-white text-dark">

  <?php include __DIR__ . '/template/header.php'; ?>

  <main>

    <!-- Hero Section -->
    <section class="hero-section py-5 overflow-visible">
      <div class="container">
        <div class="row align-items-center">

          <!-- Colonne Texte -->
          <div class="col-lg-6 hero-text">
            <h1 class="display-4 fw-bold mb-3">
              Créez la<br>wishlist ultime
            </h1>
            <p class="fs-5 text-secondary mb-4">
              Enregistrez vos coups de cœur depuis tous vos sites préférés  
              et partagez‑les en un clin d’œil avec vos proches.
            </p>
            <a href="/giftHub/public/index.php/register"
               class="btn-custom hero-cta">
              Commencer ma wishlist
            </a>
          </div>

          <!-- Colonne Robot -->
          <div class="col-lg-6 hero-spline-wrapper text-center">
            <spline-viewer  
              style="width:100%; max-width:400px; height:320px;"  
              url="https://prod.spline.design/UYVpRwSm1Ii-HKr9/scene.splinecode">
            </spline-viewer>
          </div>

        </div>
      </div>
    </section>

    <!-- Trending Section (inchangé) -->
    <section class="trending-section py-5">
      <div class="container">
        <h2 class="mb-4 fw-bold">Tendance</h2>
        <?php if (empty($trending)): ?>
          <p class="text-center text-muted">Aucun wish populaire pour l’instant.</p>
        <?php else: ?>
          <div class="row g-4">
            <?php foreach ($trending as $w): ?>
              <div class="col-6 col-md-4 col-lg-3">
                <div class="card wish-card h-100 border-0 shadow-sm">
                  <img src="<?= htmlspecialchars($w['image'] ?: '/giftHub/public/images/placeholder.png') ?>"
                       class="card-img-top" alt="<?= htmlspecialchars($w['name']) ?>">
                  <div class="card-body text-center">
                    <h5 class="card-title mb-3 text-truncate"><?= htmlspecialchars($w['name']) ?></h5>
                    <div class="d-flex justify-content-center gap-2">
                      <a href="/giftHub/public/index.php/add_wish?wish_id=<?= $w['id'] ?>&list_id=1"
                         class="btn-icon btn btn-light">
                        <i class="bi bi-plus-lg text-danger"></i>
                      </a>
                      <a href="/giftHub/public/index.php/add_like?wish_id=<?= $w['id'] ?>"
                         class="btn-icon btn btn-light">
                        <i class="bi bi-heart-fill text-danger"></i>
                        <span class="ms-1"><?= $w['like_count'] ?></span>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            <?php endforeach; ?>
          </div>
        <?php endif; ?>
      </div>
    </section>

  </main>

  <?php include __DIR__ . '/template/footer.php'; ?>

  <!-- Scripts -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script src="/giftHub/public/js/home.js"></script>
</body>
</html>
