<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pikbuy - Cinéma</title>
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap');

        /* Réinitialisation et styles de base */
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: #0d1117;
            color: #ffffff;
            font-size: 14px;
        }

        a {
            color: #ffffff;
            text-decoration: none;
        }

        .container {
            max-width: 1280px;
            margin: 0 auto;
            padding: 0 20px;
        }

        /* En-tête (Header) */
        .site-header {
            padding: 15px 40px;
            border-bottom: 1px solid #30363d;
            margin-bottom: 30px; /* Ajout de marge en bas */
        }

        .main-nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .main-nav ul {
            list-style-type: none;
            display: flex;
            gap: 10px;
            background-color: #1c2128;
            padding: 5px;
            border-radius: 8px;
        }

        .main-nav ul li a {
            display: flex;
            align-items: center;
            gap: 8px;
            padding: 8px 15px;
            border-radius: 6px;
            transition: all 0.3s;
            font-weight: 500;
            color: #c9d1d9;
        }

        .main-nav ul li.active a {
            background-color: #ffffff;
            color: #0d1117;
        }
        
        .header-right {
            display: flex;
            align-items: center;
            gap: 20px;
        }
        
        .search-container {
            position: relative;
            width: 250px;
        }
        
        .search-container input {
            width: 100%;
            background-color: transparent;
            border: 1px solid #30363d;
            border-radius: 8px;
            color: #ffffff;
            padding: 10px 15px;
        }
        
        .search-container .fa-search {
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #8b949e;
        }
        
        .header-icons {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .header-icons .icon-link i {
            font-size: 20px;
        }

        /* --- NOUVEAU STYLE GRILLE DE FILMS DÉTAILLÉS --- */

        .movie-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 25px;
            padding-bottom: 40px;
        }

        .movie-card {
            background-color: #161b22;
            border-radius: 12px;
            overflow: hidden;
            display: flex;
            flex-direction: column;
            border: 1px solid #30363d;
        }
        
        .poster-container {
            position: relative;
            height: 420px; /* Hauteur fixe pour l'affiche */
        }

        .poster-container img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        
        .trailer-button {
            position: absolute;
            bottom: 15px;
            left: 50%;
            transform: translateX(-50%);
            background: rgba(0, 0, 0, 0.6);
            backdrop-filter: blur(5px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            color: #fff;
            padding: 6px 15px;
            border-radius: 20px;
            font-size: 13px;
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 8px;
            opacity: 0; /* Caché par défaut */
            transition: opacity 0.3s;
        }
        
        .movie-card:hover .trailer-button {
            opacity: 1; /* Apparait au survol de la carte */
        }
        
        .movie-title {
            padding: 15px;
            text-align: center;
            min-height: 70px; /* Hauteur min pour aligner les cartes */
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .movie-title h3 {
            font-size: 16px;
            font-weight: 600;
        }
        
        .movie-info {
            padding: 0 15px 15px 15px;
            border-top: 1px solid #30363d;
        }
        
        .duration {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 8px;
            font-size: 13px;
            color: #8b949e;
            padding: 15px 0;
        }

        .actions {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .genre-tag {
            border: 1px solid #30363d;
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 500;
            color: #c9d1d9;
        }
        
        .sessions-button {
            background-color: #2386f7;
            color: #fff;
            padding: 8px 15px;
            border-radius: 8px;
            font-weight: 500;
            font-size: 13px;
            transition: background-color 0.3s;
        }
        .sessions-button:hover {
            background-color: #1c6cd4;
        }

        /* Bouton Flottant WhatsApp */
        .whatsapp-fab {
            position: fixed;
            bottom: 25px;
            right: 25px;
            background-color: #25D366;
            color: #fff;
            width: 60px;
            height: 60px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 30px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.3);
            z-index: 100;
        }
    </style>
</head>
<body>

    <header class="site-header">
        <nav class="main-nav">
             <div class="logo">
                <a href="#" style="font-size: 28px; font-weight: 700;">Guichet</a>
            </div>
            <ul>
                <li><a href="home.php"><i class="fas fa-ticket-alt"></i> Billetterie</a></li>
                <li><a href="store.php"><i class="fas fa-store"></i> Store</a></li>
                <li><a href="voyage.php"><i class="fas fa-plane"></i> Voyage</a></li>
                <li class="active"><a href="#"><i class="fas fa-film"></i> Cinéma</a></li>
                <li><a href="sport.php"><i class="fas fa-futbol"></i> Sport</a></li>
            </ul>
            <div class="header-right">
                <div class="search-container">
                    <input type="text" placeholder="Chercher un film...">
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
        
        <section class="movie-grid">
            
            <div class="movie-card">
                <div class="poster-container">
                    <img src="conjuring.jpg" alt="Affiche Conjuring">
                    <a href="#" class="trailer-button"><i class="fas fa-play"></i> Bande d'annonce</a>
                </div>
                <div class="movie-title">
                    <h3>Conjuring : l'heure du jugement</h3>
                </div>
                <div class="movie-info">
                    <div class="duration"><i class="far fa-clock"></i> Durée : 02:15:00</div>
                    <div class="actions">
                        <span class="genre-tag">Fantastique</span>
                        <a href="#" class="sessions-button">Les Séances</a>
                    </div>
                </div>
            </div>

            <div class="movie-card">
                <div class="poster-container">
                    <img src="libre.jpg" alt="Affiche Libre Echange">
                     <a href="#" class="trailer-button"><i class="fas fa-play"></i> Bande d'annonce</a>
                </div>
                <div class="movie-title">
                    <h3>Libre échange</h3>
                </div>
                <div class="movie-info">
                    <div class="duration"><i class="far fa-clock"></i> Durée : 01:44:00</div>
                    <div class="actions">
                        <span class="genre-tag">Comédie</span>
                        <a href="#" class="sessions-button">Les Séances</a>
                    </div>
                </div>
            </div>
            
            <div class="movie-card">
                <div class="poster-container">
                    <img src="dow.webp" alt="Affiche Downton Abbey III">
                     <a href="#" class="trailer-button"><i class="fas fa-play"></i> Bande d'annonce</a>
                </div>
                <div class="movie-title">
                    <h3>Downton Abbey III : le grand final</h3>
                </div>
                <div class="movie-info">
                    <div class="duration"><i class="far fa-clock"></i> Durée : 02:03:00</div>
                    <div class="actions">
                        <span class="genre-tag">Drame</span>
                        <a href="#" class="sessions-button">Les Séances</a>
                    </div>
                </div>
            </div>
            
            <div class="movie-card">
                <div class="poster-container">
                    <img src="baghi.jpg" alt="Affiche Baaghi 4">
                     <a href="#" class="trailer-button"><i class="fas fa-play"></i> Bande d'annonce</a>
                </div>
                <div class="movie-title">
                    <h3>Baaghi 4</h3>
                </div>
                <div class="movie-info">
                    <div class="duration"><i class="far fa-clock"></i> Durée : 02:30:00</div>
                    <div class="actions">
                        <span class="genre-tag">Action</span>
                        <a href="#" class="sessions-button">Les Séances</a>
                    </div>
                </div>
            </div>

             <div class="movie-card">
                <div class="poster-container">
                    <img src="exit-8.jpg" alt="Affiche Exit 8">
                     <a href="#" class="trailer-button"><i class="fas fa-play"></i> Bande d'annonce</a>
                </div>
                <div class="movie-title">
                    <h3>Exit 8</h3>
                </div>
                <div class="movie-info">
                    <div class="duration"><i class="far fa-clock"></i> Durée : 01:35:00</div>
                    <div class="actions">
                        <span class="genre-tag">Horreur</span>
                        <a href="#" class="sessions-button">Les Séances</a>
                    </div>
                </div>
            </div>

        </section>
    </main>

    <a href="#" class="whatsapp-fab">
        <i class="fab fa-whatsapp"></i>
    </a>

</body>
</html>