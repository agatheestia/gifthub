<?php
// view/auth/register.php
// Variables attendues : $error et $_POST
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Créer un compte – GiftHub</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="/giftHub/public/css/auth.css">
</head>
<body>

  <div class="container register-container">
    <div class="row justify-content-center">
      <div class="col-12 col-sm-10 col-md-8 col-lg-5 text-center">

        <h2 class="fw-bold mb-3">Créer un compte</h2>

        <?php if (!empty($error)): ?>
          <div class="error"><?= htmlspecialchars($error) ?></div>
        <?php endif; ?>

        <form method="POST" action="/giftHub/public/index.php/register">
          <div class="row g-2 mb-3">
            <div class="col-6">
              <input
                type="text"
                name="last_name"
                class="form-control form-control-custom"
                placeholder="Nom"
                value="<?= htmlspecialchars($_POST['last_name'] ?? '') ?>"
                required>
            </div>
            <div class="col-6">
              <input
                type="text"
                name="first_name"
                class="form-control form-control-custom"
                placeholder="Prénom"
                value="<?= htmlspecialchars($_POST['first_name'] ?? '') ?>"
                required>
            </div>
          </div>

          <div class="mb-3">
            <input
              type="text"
              name="username"
              class="form-control form-control-custom"
              placeholder="Nom d’utilisateur"
              value="<?= htmlspecialchars($_POST['username'] ?? '') ?>"
              required>
          </div>

          <div class="mb-3">
            <input
              type="email"
              name="email"
              class="form-control form-control-custom"
              placeholder="Email"
              value="<?= htmlspecialchars($_POST['email'] ?? '') ?>"
              required>
          </div>

          <div class="mb-3">
            <input
              type="password"
              name="password"
              class="form-control form-control-custom"
              placeholder="Mot de passe"
              required>
          </div>

          <button type="submit" class="btn btn-custom w-100 mb-3">S’inscrire</button>

          <div>
            <span>Déjà un compte ? </span>
            <a href="/giftHub/public/index.php/login" class="create-link">Se connecter</a>
          </div>
        </form>

      </div>
    </div>
  </div>

</body>
</html>
