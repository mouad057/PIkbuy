<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pikbuy - Billetterie</title>
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap');

       
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

      
        .filters-nav {
            display: flex;
            gap: 25px;
            padding: 20px 0;
            flex-wrap: wrap;
            border-bottom: 1px solid #30363d;
            margin-bottom: 30px;
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
        
        
        .event-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 25px;
            padding-bottom: 40px;
        }

       
        .poster-card {
            display: block;
            border-radius: 12px;
            overflow: hidden;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .poster-card:hover {
            transform: scale(1.03);
            box-shadow: 0 10px 30px rgba(0,0,0,0.5);
        }

        .poster-card img {
            width: 100%;
            height: auto;
            display: block;
            aspect-ratio: 2 / 3; 
            object-fit: cover;
            background-color: #161b22; 
        }

       
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
                <li class="active"><a href="#"><i class="fas fa-ticket-alt"></i> Billetterie</a></li>
                <li><a href="store.php"><i class="fas fa-store"></i> Store</a></li>
                <li><a href="voyage.php"><i class="fas fa-plane"></i> Voyage</a></li>
                <li><a href="cinema.php"><i class="fas fa-film"></i> Cinéma</a></li>
                <li><a href="sport.php"><i class="fas fa-futbol"></i> Sport</a></li>
            </ul>
            <div class="header-right">
                <div class="search-container">
                    <input type="text" placeholder="Chercher un événement...">
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
            <a href="#" class="active">Africa Music Festival</a>
            <a href="#">Concerts</a>
            <a href="#">Festivals</a>
            <a href="#">Théâtre & Humour</a>
            <a href="#">Jeune Public</a>
            <a href="#">Salon & formation</a>
            <a href="#">Cinéma</a>
            <a href="#">Sport</a>
        </nav>
        
        <section class="event-grid">
            
            <a href="#" class="poster-card">
                <img src="ta.jpg" alt="Affiche Tayc">
            </a>

            <a href="#" class="poster-card">
                <img src="toto.jpeg" alt="toto">
            </a>
            
            <a href="#" class="poster-card">
                <img src="maroc.jpg" alt="Affiche maroc">
            </a>
            
            <a href="#" class="poster-card">
                 <img src="gims.jpg" alt="Affiche gims">
            </a>
            
            <a href="#" class="poster-card">
                <img src="raja.jpeg" alt="Affiche Raja">">
            </a>
            <a href="#" class="poster-card">
                <img src="humo.png" alt="Affiche Humouraji">
            </a>

        </section>
    </main>

    <a href="#" class="whatsapp-fab">
        <i class="fab fa-whatsapp"></i>
    </a>

</body>

</html>
