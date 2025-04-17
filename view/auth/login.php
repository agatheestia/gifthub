<?php
// view/auth/login.php
// Variables attendues : $error et $_POST
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Connexion – GiftHub</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="/giftHub/public/css/auth.css">
</head>
<body>

  <div class="logo-bar text-center py-3 mb-4">
  <img src="/giftHub/public/images/logo.svg" alt="Logo" width="32">
    <span class="ms-2 fw-bold fs-4">GiftHub</span>
  </div>

  <div class="container login-container">
    <div class="row justify-content-center">
    <div class="col-12 col-sm-10 col-md-8 col-lg-5 text-center">
      
        <h2 class="fw-bold text-center mb-4">Connexion</h2>

        <?php if (!empty($error)): ?>
          <div class="error"><?= htmlspecialchars($error) ?></div>
        <?php endif; ?>

        <form method="POST" action="/giftHub/public/index.php/login">
          <div class="mb-3">
            <input
              type="email"
              name="email"
              class="form-control form-control-custom"
              placeholder="Email"
              value="<?= htmlspecialchars($_POST['email'] ?? '') ?>"
              required>
          </div>
          <div class="mb-2">
            <input
              type="password"
              name="password"
              class="form-control form-control-custom"
              placeholder="Mot de passe"
              required>
          </div>
          <div class="mb-3 text-start">
            <a href="#" class="forgot-link">Mot de passe oublié ?</a>
          </div>

          <button type="submit" class="btn btn-custom w-100 mb-3">Se connecter</button>

          <div class="text-center">
            <span>Pas de compte ? </span>
            <a href="/giftHub/public/index.php/register" class="create-link">Créer un compte</a>
          </div>
        </form>

      </div>
    </div>
  </div>

</body>
</html>
