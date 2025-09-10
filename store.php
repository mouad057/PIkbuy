<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pikbuy - Store</title>
    
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

        /* Sous-navigation (Filtres) */
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
        
        /* --- STYLES ADAPTÉS POUR LA PAGE STORE --- */
        
        .page-title {
            padding: 30px 0;
            font-size: 28px;
            font-weight: 600;
        }

        /* Grille des produits */
        .product-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 25px;
            padding-bottom: 40px;
        }

        /* Carte de produit */
        .product-card {
            background-color: #161b22;
            border-radius: 16px;
            overflow: hidden;
            border: 1px solid #30363d;
            display: flex;
            flex-direction: column;
            transition: transform 0.3s, box-shadow 0.3s;
        }
        .product-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.3);
        }

        .product-card .product-image {
            height: 300px;
            overflow: hidden;
        }

        .product-card img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
        }

        .product-info {
            padding: 20px;
            flex-grow: 1;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }
        
        .product-category {
            font-size: 12px;
            font-weight: 500;
            color: #8b949e;
            margin-bottom: 8px;
            text-transform: uppercase;
        }
        
        .product-info h3 {
            font-size: 18px;
            font-weight: 600;
            margin-bottom: 15px;
            flex-grow: 1; /* Permet au titre de prendre l'espace disponible */
        }
        
        .product-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .product-price {
            font-size: 20px;
            font-weight: 700;
            color: #58a6ff;
        }
        
        .add-to-cart-btn {
            background-color: transparent;
            color: #58a6ff;
            border: 1px solid #58a6ff;
            padding: 10px 15px;
            border-radius: 8px;
            cursor: pointer;
            font-weight: 600;
            text-align: center;
            transition: background-color 0.3s, color 0.3s;
        }
        
        .add-to-cart-btn:hover {
            background-color: #58a6ff;
            color: #ffffff;
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
                <li><a href="home.php"><i class="fas fa-home"></i>Billetterie</a></li>
                <li class="active"><a href="#"><i class="fas fa-store"></i> Store</a></li>
                <li><a href="voyage.php"><i class="fas fa-plane"></i> Voyage</a></li>
                <li><a href="cinema.php"><i class="fas fa-film"></i> Cinéma</a></li>
                <li><a href="sport.php"><i class="fas fa-futbol"></i> Sport</a></li>
            </ul>
            <div class="header-right">
                <div class="search-container">
                    <input type="text" placeholder="Chercher un produit...">
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
            <a href="#" class="active">Tous les produits</a>
            <a href="#">T-shirts</a>
            <a href="#">Sweats</a>
            <a href="#">Affiches</a>
            <a href="#">Accessoires</a>
            <a href="#">Musique</a>
        </nav>

        <h1 class="page-title">Boutique Officielle</h1>
        
        <section class="product-grid">
            
            <div class="product-card">
                <div class="product-image">
                    <img src="5.webp" alt="T-Shirt">
                </div>
                <div class="product-info">
                    <div>
                        <p class="product-category">T-Shirts</p>
                        <h3>T-Shirt Classique Logo Noir</h3>
                    </div>
                    <div class="product-footer">
                        <span class="product-price">299 MAD</span>
                        <a href="#" class="add-to-cart-btn"><i class="fas fa-shopping-cart"></i></a>
                    </div>
                </div>
            </div>

            <div class="product-card">
                 <div class="product-image">
                    <img src="1.jpg" alt="Sweat">
                </div>
                <div class="product-info">
                    <div>
                        <p class="product-category">Sweats</p>
                        <h3>Sweat à Capuche Festival Edition</h3>
                    </div>
                    <div class="product-footer">
                        <span class="product-price">549 MAD</span>
                        <a href="#" class="add-to-cart-btn"><i class="fas fa-shopping-cart"></i></a>
                    </div>
                </div>
            </div>
            
            <div class="product-card">
                 <div class="product-image">
                    <img src="tour.jpeg" alt="Affiche">
                </div>
                <div class="product-info">
                    <div>
                        <p class="product-category">Affiches</p>
                        <h3>Affiche de la Tournée 2025</h3>
                    </div>
                    <div class="product-footer">
                        <span class="product-price">149 MAD</span>
                        <a href="#" class="add-to-cart-btn"><i class="fas fa-shopping-cart"></i></a>
                    </div>
                </div>
            </div>
            
            <div class="product-card">
                 <div class="product-image">
                    <img src="8.webp" alt="Casquette">
                </div>
                <div class="product-info">
                    <div>
                        <p class="product-category">Accessoires</p>
                        <h3>Casquette Noire Brodée</h3>
                    </div>
                    <div class="product-footer">
                        <span class="product-price">220 MAD</span>
                        <a href="#" class="add-to-cart-btn"><i class="fas fa-shopping-cart"></i></a>
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