<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pikbuy - Voyage (Nouveau Design)</title>
    
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
            padding: 0 20px; /* Padding horizontal uniquement */
        }

        /* --- NOUVEAU STYLE HEADER (Type Guichet) --- */
        .site-header {
            padding: 15px 40px;
            border-bottom: 1px solid #30363d;
        }

        .main-nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .main-nav ul {
            list-style-type: none;
            display: flex;
            gap: 10px; /* Espacement réduit */
            background-color: #1c2128; /* Fond de la barre de nav */
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
            color: #c9d1d9; /* Couleur du texte par défaut */
        }

        .main-nav ul li.active a {
            background-color: #ffffff; /* Fond blanc actif */
            color: #0d1117; /* Texte sombre actif */
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
            padding: 10px 15px 10px 15px;
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

        /* --- NOUVEAU STYLE SOUS-NAVIGATION (Type Guichet) --- */
        .filters-nav {
            display: flex;
            gap: 25px;
            padding: 20px 0;
            flex-wrap: wrap;
        }

        .filters-nav a {
            font-weight: 500;
            font-size: 14px;
            color: #c9d1d9;
            transition: color 0.3s;
            display: flex;
            align-items: center;
        }
        
        .filters-nav a::before {
            content: '•';
            color: #2386f7;
            margin-right: 10px;
            font-size: 20px;
        }

        .filters-nav a:hover,
        .filters-nav a.active {
            color: #ffffff;
        }
        
        /* --- NOUVEAU STYLE DES CARTES VOYAGE (Type Guichet) --- */
        .carousel-container {
            overflow-x: auto;
            padding-bottom: 20px; /* Espace pour la barre de scroll et les points */
            -ms-overflow-style: none;  /* IE and Edge */
            scrollbar-width: none;  /* Firefox */
        }
        .carousel-container::-webkit-scrollbar {
            display: none; /* Chrome, Safari and Opera */
        }

        .destination-grid {
            display: grid;
            grid-auto-flow: column; /* Fait défiler les éléments horizontalement */
            grid-auto-columns: minmax(300px, 1fr); /* Largeur de chaque carte */
            gap: 20px;
        }

        .destination-card {
            position: relative;
            border-radius: 16px;
            overflow: hidden;
            height: 400px; /* Hauteur fixe pour les cartes */
            display: block;
            transition: transform 0.3s;
        }
        .destination-card:hover {
            transform: scale(1.02);
        }

        .destination-card img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
        }
        
        .card-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(to top, rgba(0, 0, 0, 0.9) 0%, rgba(0, 0, 0, 0.6) 30%, transparent 60%);
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            padding: 20px;
        }

        .city-tag {
            background: rgba(255, 255, 255, 0.9);
            color: #333;
            padding: 5px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
            align-self: flex-start; /* Se place au début de l'axe */
        }
        
        .card-info {
            color: #ffffff;
        }

        .card-info h3 {
            font-size: 18px;
            font-weight: 600;
            margin-bottom: 10px;
            text-transform: uppercase;
        }
        
        .card-details {
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 14px;
        }

        .card-details .price {
            font-size: 20px;
            font-weight: 700;
        }

        /* Indicateurs de Carousel */
        .carousel-dots {
            text-align: center;
            margin-top: 10px;
        }
        .dot {
            display: inline-block;
            height: 8px;
            width: 8px;
            border-radius: 50%;
            background-color: #30363d;
            margin: 0 4px;
            transition: all 0.3s;
        }
        .dot.active {
            background-color: #c9d1d9;
            width: 20px;
            border-radius: 5px;
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
            transition: transform 0.3s;
        }
        .whatsapp-fab:hover {
            transform: scale(1.1);
        }
    </style>
</head>
<body>

    <header class="site-header">
        <nav class="main-nav">
             <div class="logo">
                <a href="#" style="font-size: 28px; font-weight: 700;">Pikbuy</a>
            </div>
            <ul>
                <li><a href="home.php"><i class="fas fa-ticket-alt"></i> Billetterie</a></li>
                <li><a href="store.php"><i class="fas fa-store"></i> Store</a></li>
                <li class="active"><a href="#"><i class="fas fa-plane"></i> Voyage</a></li>
                <li><a href="cinema.php"><i class="fas fa-film"></i> Cinéma</a></li>
                <li><a href="sport.php"><i class="fas fa-futbol"></i> Sport</a></li>
            </ul>
            <div class="header-right">
                <div class="search-container">
                    <input type="text" placeholder="Cherchez ce que vous voulez...">
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
        <nav class="filters-nav">
            <a href="#" class="active">Voyage organisé</a>
            <a href="#">Voyage thématique</a>
            <a href="#">Hôtels</a>
            <a href="#">Voyage & Événement</a>
            <a href="#">Last Minute</a>
            <a href="#">Early Booking</a>
        </nav>
        
        <div class="carousel-container">
            <section class="destination-grid">
                
                <a href="#" class="destination-card">
                    <img src="agadir.jpeg" alt="Agadir">
                    <div class="card-overlay">
                        <span class="city-tag">Agadir</span>
                        <div class="card-info">
                            <h3>AGADIR-TAGHAZOUT-AGHROUD</h3>
                            <div class="card-details">
                                <span class="duration">2 nuits</span>
                                <span class="price">1 190 MAD</span>
                            </div>
                        </div>
                    </div>
                </a>
    
                <a href="#" class="destination-card">
                    <img src="nord.jpg" alt="Nador">
                    <div class="card-overlay">
                        <span class="city-tag"><i class="fas fa-map-marker-alt"></i> Nador</span>
                        <div class="card-info">
                            <h3>LE GRAND TOUR DU NORD</h3>
                            <div class="card-details">
                                <span class="duration">5 nuits</span>
                                <span class="price">2 990 MAD</span>
                            </div>
                        </div>
                    </div>
                </a>
                
                <a href="#" class="destination-card">
                    <img src="sud.jpg" alt="Essaouira">
                     <div class="card-overlay">
                        <span class="city-tag">AGADIR-TAGHAZOUT-ESSAOUIRA</span>
                        <div class="card-info">
                            <h3>LE GRAND TOUR DU SUD</h3>
                            <div class="card-details">
                                <span class="duration">5 nuits</span>
                                <span class="price">2 990 MAD</span>
                            </div>
                        </div>
                    </div>
                </a>
                
                <a href="#" class="destination-card">
                    <img src="hou.jpg" alt="Al Hoceima">
                    <div class="card-overlay">
                        <span class="city-tag"><i class="fas fa-map-marker-alt"></i> Al-Hoceima</span>
                        <div class="card-info">
                            <h3>HOCEIMA, ÎLE BADES, NADOR & SAÏDIA</h3>
                            <div class="card-details">
                                <span class="duration">3 nuits</span>
                                <span class="price">1 590 MAD</span>
                            </div>
                        </div>
                    </div>
                </a>

                 <a href="#" class="destination-card">
                    <img src="marake.jpg" alt="Essaouira">
                     <div class="card-overlay">
                        <span class="city-tag">Marrakech</span>
                        <div class="card-info">
                            <h3>LE GRAND TOUR DU Marrakech</h3>
                            <div class="card-details">
                                <span class="duration">4 nuits</span>
                                <span class="price">2 990 MAD</span>
                            </div>
                        </div>
                    </div>
                </a>
                
                <a href="#" class="destination-card">
                    <img src="tanger.webp" alt="Al Hoceima">
                    <div class="card-overlay">
                        <span class="city-tag"><i class="fas fa-map-marker-alt"></i>Tanger</span>
                        <div class="card-info">
                            <h3>Tanger</h3>
                            <div class="card-details">
                                <span class="duration">3 nuits</span>
                                <span class="price">1 590 MAD</span>
                            </div>
                        </div>
                    </div>
                </a>

            </section>
        </div>

        <div class="carousel-dots">
            <span class="dot active"></span>
            <span class="dot"></span>
            <span class="dot"></span>
        </div>

    </main>

    <a href="#" class="whatsapp-fab">
        <i class="fab fa-whatsapp"></i>
    </a>

</body>
</html>