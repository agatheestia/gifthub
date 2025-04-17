<?php
// public/list_users.php

require __DIR__ . '/../config/database.php';

try {
    // on récupère la connexion PDO
    $pdo = (new DBModel())->getConnection();

    // on exécute la requête
    $stmt = $pdo->query('SELECT * FROM users');
    $users = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // affichage
    echo '<h1>Liste des utilisateurs</h1>';

    if (empty($users)) {
        echo '<p>Aucun utilisateur trouvé dans la table <code>users</code>.</p>';
    } else {
        echo '<ul>';
        foreach ($users as $u) {
            echo '<li>'
               . 'ID: ' . htmlspecialchars($u['id']) 
               . ' — ' . htmlspecialchars($u['username'])
               . ' (' . htmlspecialchars($u['email']) . ')'
               . '</li>';
        }
        echo '</ul>';
    }
} catch (PDOException $e) {
    echo '<p style="color:red;">Erreur PDO : ' . htmlspecialchars($e->getMessage()) . '</p>';
}
