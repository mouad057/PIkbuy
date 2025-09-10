<?php
  // --- LOGIQUE PHP ---

  // Définit la page actuelle pour la navigation
  $currentPage = 'sport.php';

  // Simulation d'une base de données pour les matchs de sport
  $matches = [
    [
      'image' => 'derby.jpeg',
      'title' => 'Raja CA vs Wydad AC',
      'alt' => 'Match Raja vs Wydad',
      'datetime' => '14 Septembre 2025 - 20:00',
      'competition' => 'Botola Pro',
      'status' => 'sold_out' // <-- 1. AJOUT: Statut pour le derby
    ],
    [
      'image' => 'chan.webp',
      'title' => 'Maroc vs Angola',
      'alt' => 'Match Maroc vs Angola',
      'datetime' => '22 Septembre 2025 - 21:00',
      'competition' => 'Match Amical',
      'status' => 'available' // <-- AJOUT: Statut pour les autres
    ],
    [
      'image' => 'firan.jpg',
      'title' => 'AS FAR vs RS Berkane',
      'alt' => 'Match FAR vs RSB',
      'datetime' => '28 Septembre 2025 - 19:00',
      'competition' => 'Coupe du Trône',
      'status' => 'available'
    ],
    [
      'image' => 'basket.jpg',
      'title' => 'ASS Salé vs FUS Rabat',
      'alt' => 'Match de Basketball',
      'datetime' => '05 Octobre 2025 - 18:00',
      'competition' => 'Basketball D1',
      'status' => 'available'
    ],
      
  ];
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Guichet - Sport</title>
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap');

        /* Réinitialisation et styles de base */
        * { box-sizing: border-box; margin: 0; padding: 0; }
        body { font-family: 'Poppins', sans-serif; background-color: #0d1117; color: #ffffff; font-size: 14px; }
        a { color: #ffffff; text-decoration: none; }
        .container { max-width: 1280px; margin: 0 auto; padding: 0 20px; }

        /* En-tête (Header) */
        .site-header { padding: 15px 40px; border-bottom: 1px solid #30363d; margin-bottom: 30px; }
        .main-nav { display: flex; justify-content: space-between; align-items: center; }
        .main-nav ul { list-style-type: none; display: flex; gap: 10px; background-color: #1c2128; padding: 5px; border-radius: 8px; }
        .main-nav ul li a { display: flex; align-items: center; gap: 8px; padding: 8px 15px; border-radius: 6px; transition: all 0.3s; font-weight: 500; color: #c9d1d9; }
        .main-nav ul li.active a { background-color: #ffffff; color: #0d1117; }
        .header-right { display: flex; align-items: center; gap: 20px; }
        .search-container { position: relative; width: 250px; }
        .search-container input { width: 100%; background-color: transparent; border: 1px solid #30363d; border-radius: 8px; color: #ffffff; padding: 10px 15px; }
        .search-container .fa-search { position: absolute; right: 15px; top: 50%; transform: translateY(-50%); color: #8b949e; }
        .header-icons { display: flex; align-items: center; gap: 20px; }
        .header-icons .icon-link i { font-size: 20px; }
        
        /* Grille des événements sportifs */
        .event-grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(280px, 1fr)); gap: 25px; padding-bottom: 40px; }
        .event-card { background-color: #161b22; border-radius: 12px; overflow: hidden; display: flex; flex-direction: column; border: 1px solid #30363d; }
        .event-image { position: relative; height: 250px; }
        .event-image img { width: 100%; height: 100%; object-fit: cover; }
        .event-title { padding: 15px; text-align: center; min-height: 70px; display: flex; align-items: center; justify-content: center; }
        .event-title h3 { font-size: 18px; font-weight: 600; }
        .event-info { padding: 0 15px 15px 15px; border-top: 1px solid #30363d; }
        .event-datetime { display: flex; justify-content: center; align-items: center; gap: 8px; font-size: 13px; color: #8b949e; padding: 15px 0; }
        .actions { display: flex; justify-content: space-between; align-items: center; }
        .competition-tag { border: 1px solid #30363d; padding: 6px 12px; border-radius: 20px; font-size: 12px; font-weight: 500; color: #c9d1d9; }
        .ticket-button { background-color: #2386f7; color: #fff; padding: 8px 15px; border-radius: 8px; font-weight: 500; font-size: 13px; transition: background-color 0.3s; }
        .ticket-button:hover { background-color: #1c6cd4; }

        /* <-- 3. AJOUT: Style pour le bouton Sold Out */
        .ticket-button.sold-out {
            background-color: #484f58;
            cursor: not-allowed; /* Change le curseur pour indiquer que ce n'est pas cliquable */
        }
        .ticket-button.sold-out:hover {
             background-color: #484f58; /* Empêche le changement de couleur au survol */
        }

        /* Bouton Flottant WhatsApp */
        .whatsapp-fab { position: fixed; bottom: 25px; right: 25px; background-color: #25D366; color: #fff; width: 60px; height: 60px; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 30px; box-shadow: 0 4px 10px rgba(0,0,0,0.3); z-index: 100; }
    </style>
</head>
<body>

    <header class="site-header">
        <nav class="main-nav">
              <div class="logo">
                  <a href="#" style="font-size: 28px; font-weight: 700;">Pikbuy</a>
              </div>
            <ul>
                <li class="<?= ($currentPage == 'billetterie.php') ? 'active' : '' ?>"><a href="home.php"><i class="fas fa-ticket-alt"></i> Billetterie</a></li>
                <li class="<?= ($currentPage == 'store.php') ? 'active' : '' ?>"><a href="store.php"><i class="fas fa-store"></i> Store</a></li>
                <li class="<?= ($currentPage == 'voyage.php') ? 'active' : '' ?>"><a href="voyage.php"><i class="fas fa-plane"></i> Voyage</a></li>
                <li class="<?= ($currentPage == 'cinema.php') ? 'active' : '' ?>"><a href="cinema.php"><i class="fas fa-film"></i> Cinéma</a></li>
                <li class="<?= ($currentPage == 'sport.php') ? 'active' : '' ?>"><a href="#"><i class="fas fa-futbol"></i> Sport</a></li>
            </ul>
            <div class="header-right">
                <div class="search-container">
                    <input type="text" placeholder="Chercher un match, une équipe...">
                    <i class="fas fa-search"></i>
                </div>
                <div class="header-icons">
                      <a href="#" class="icon-link"><i class="fas fa-shopping-cart"></i></a>
                      <a href="#" class="icon-link"><i class="fas fa-bars"></i></a>
                </div>
            </div>
        </nav>
    </header>

    <main class="container">
        
        <section class="event-grid">
            
            <?php foreach ($matches as $match): ?>
              <div class="event-card">
                  <div class="event-image">
                      <img src="<?= htmlspecialchars($match['image']) ?>" alt="<?= htmlspecialchars($match['alt']) ?>">
                  </div>
                  <div class="event-title">
                      <h3><?= htmlspecialchars($match['title']) ?></h3>
                  </div>
                  <div class="event-info">
                      <div class="event-datetime"><i class="far fa-calendar-alt"></i> <?= htmlspecialchars($match['datetime']) ?></div>
                      <div class="actions">
                          <span class="competition-tag"><?= htmlspecialchars($match['competition']) ?></span>
                          
                          <?php if ($match['status'] == 'sold_out'): ?>
                              <a href="#" class="ticket-button sold-out">Sold Out</a>
                          <?php else: ?>
                              <a href="#" class="ticket-button">Acheter Ticket</a>
                          <?php endif; ?>

                      </div>
                  </div>
              </div>
            <?php endforeach; ?>

        </section>
    </main>

    <a href="#" class="whatsapp-fab">
        <i class="fab fa-whatsapp"></i>
    </a>
    
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Le JavaScript pour le filtrage n'est pas nécessaire sur cette page.
            // On peut ajouter ici d'autres scripts si besoin.
            console.log("Page Sport chargée.");
        });
    </script>
</body>
</html>