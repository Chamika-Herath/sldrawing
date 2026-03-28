<link href="https://fonts.googleapis.com/css2?family=Jomolhari&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Jomhuria&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<link href="https://fonts.googleapis.com/css2?family=Oswald:wght@500;700&family=Playfair+Display:ital,wght@0,400;0,600;1,400&family=Poppins:wght@300;400;500&display=swap" rel="stylesheet">

<style>
    /* ============================================================
       1. BASE DESKTOP STYLES (ORIGINAL - UNTOUCHED)
       ============================================================ */
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    .dreambox-container {
        position: relative;
        height: 100vh;
        /* improved mobile browser support */
        height: 100dvh; 
        width: 100%;
        overflow: hidden;
        font-family: 'Jomolhari', serif;
        background-color: #000;
    }

    /* --- BACKGROUND GRID --- */
    .image-grid {
        display: grid;
        /* DESKTOP: 8 Cols x 3 Rows = 24 Images */
        grid-template-columns: repeat(8, 1fr);
        grid-template-rows: repeat(3, 1fr);
        height: 100%;
        width: 100%;
    }

    .image-grid img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        filter: brightness(0.6);
    }

    /* --- OVERLAY --- */
    .overlay {
        position: absolute;
        inset: 0;
        background: linear-gradient(
            to bottom,
            rgba(0, 0, 0, 0) 25%,
            rgba(0, 0, 0, 0.3) 50%,
            rgba(0, 0, 0, 0.6) 75%,
            rgba(0, 0, 0, 0.9) 100%
        );
        z-index: 2;
        pointer-events: none;
    }

    /* --- MAIN HERO CONTENT --- */
    .hero-content {
        position: absolute;
        inset: 0;
        z-index: 3;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }

    /* --- BIG CENTER TITLE --- */
    .center-title {
        text-align: center;
        color: white;
        margin-top: -36vh;
        text-shadow: 0 5px 15px rgba(0,0,0,0.2);
    }

    /* >>>>>> SPOTLIGHT EFFECT APPLIED HERE <<<<<< */
    .center-title h1 {
        font-family: 'Jomhuria', sans-serif;
        font-size: clamp(6rem, 12vw, 10rem);
        letter-spacing: 0.2em;
        margin: 0;
        font-weight: 400;
        text-transform: uppercase;
        line-height: 0.8; /* Adjusted line-height to fit the clip-path */
        
        position: relative;
        color: #fff; 
        /* display: inline-block; Optional: keeps clip-path tight */
    }

    /* The Moving Spotlight Layer */
    .center-title h1::before {
        content: attr(data-text); /* Grabs text from HTML attribute */
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        
        /* Spotlight Gradient Colors */
        background: linear-gradient(180deg, #240046, #7a00ff, #bc13fe, #ffffff, #bc13fe, #7a00ff, #ffffff);
        /* Apply background to text only */
        -webkit-background-clip: text;
        background-clip: text;
        color: transparent;
        
        /* The Spotlight Shape */
        clip-path: ellipse(100px 100px at 0% 50%);
        -webkit-clip-path: ellipse(100px 100px at 0% 50%);
        
        /* Animation */
        animation: swing 10s infinite ease-in-out alternate;
    }

    /* Spotlight Animation Keyframes */
    @keyframes swing {
        0% {
            -webkit-clip-path: ellipse(120px 120px at 0% 50%);
            clip-path: ellipse(120px 120px at 0% 50%);
        }
        50% {
            -webkit-clip-path: ellipse(120px 120px at 50% 100%);
            clip-path: ellipse(120px 120px at 50% 100%);
        }
        100% {
            -webkit-clip-path: ellipse(120px 120px at 100% 50%);
            clip-path: ellipse(120px 120px at 100% 50%);
        }
    }

    .center-title p {
        font-family: 'Jomhuria', sans-serif;
        font-size: clamp(0.8rem, 8vw, 2.4rem);
        letter-spacing: 0.35em;
        font-weight: 500;
        text-transform: uppercase;
        color: #fff;
        text-shadow: 0 5px 15px rgba(0,0,0,1);
    }

    /* --- THE CONTENT BOX (Bottom Section) --- */
    /* Kept exactly as requested for Desktop */
    .content-box {
        position: absolute;
        bottom: 0;
        /* width: 90%; commented out in original */
        /* max-width: 1200px; commented out in original */
        
        background: rgba(0, 0, 0, 0.75); 
        backdrop-filter: blur(2px);
        border-top: 1px solid rgba(255, 255, 255, 0.1);
        
        display: flex;
        justify-content: space-between;
        align-items: flex-end;
        padding: 30px 60px;
        color: white;
    }

    /* --- LEFT COLUMN --- */
    .left-col {
        flex: 1;
        max-width: 400px;
    }

    .brand-name {
        font-family: 'Jomhuria', sans-serif;
        font-size: 3rem;
        letter-spacing: 2px;
        font-weight: 400;
        color: #9d4edd;
        /* margin-bottom: 5px; */
        text-transform: uppercase;
        line-height: 0.8;
    }

    .brand-sub {
        font-family: 'Jomolhari', serif;
        font-weight: 400;
        font-size: 1rem;
        color: rgba(255, 255, 255,0.8);
        margin-bottom: 25px;
        display: block;
    }

    .features {
        list-style: none;
        margin-bottom: 30px;
        font-family: 'Jomolhari', serif;
    }

    .features li {
        font-weight: 400;
        font-size: 1rem;
        margin-bottom: 5px;
        display: flex;
        align-items: center;
        color: #9859CE;
    }

    .features li::before {
        content: "•";
        color: #BA87E6;
        font-size: 1.5rem;
        line-height: 0;
        margin-right: 15px;
    }

    .icon-row {
        display: flex;
        gap: 15px;
    }

    .icon-box {
        width: 45px;
        height: 45px;
        border: 1px solid #555;
        border-radius: 8px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.2rem;
        transition: 0.3s;
        position: relative;
        background: rgba(255,255,255,0.05);
    }

    .icon-box-couch{
        background: radial-gradient(circle at center, #470940 0%, #250421 100%);
        border: 1px solid #B8F592;

    }
    .icon-box-ticket{
        background: radial-gradient(circle at center, #470940 0%, #250421 100%);
        border: 1px solid #CF5348;

    }
    .icon-box-lock{
        background: radial-gradient(circle at center, #470940 0%, #250421 100%);
        border: 1px solid #BDA346;

    }
    .icon-box-star{
        background: radial-gradient(circle at center, #470940 0%, #250421 100%);
        border: 1px solid #92D1F5;

    }

    .icon-box i { color: #ffd700; }
    .icon-box:hover { border-color: #9d4edd; }

    /* --- RIGHT COLUMN --- */
    .right-col {
        flex: 1;
        max-width: 550px;
        display: flex;
        flex-direction: column;
        align-items: flex-end;
        text-align: right;
        position: relative;
    }

    .social-bar {
        position: absolute;
        background: radial-gradient(ellipse, #9859CE 10%, #6A23A8 100%);
        padding: 14px 80px;
        display: inline-flex;
        gap: 45px;
        bottom: 310px;
        right: -60px;
    }

    .social-bar i {
        color: white;
        font-size: 1.3rem;
        cursor: pointer;
        transition: transform 0.2s;
    }

    .social-bar i:hover { transform: scale(1.2); }

    .cinema-title {
        font-family: 'Jomhuria', sans-serif;
        color: rgba(221, 182, 255, 0.5);
        font-size: 3rem;
        letter-spacing: 3px;
        font-weight: 400;
        text-transform: uppercase;
        line-height: 0.8;
    }

    .cinema-subtitle {
        font-family: 'Jomolhari', serif;
        color: rgba(255, 255, 255, 0.5);
        font-size: 1rem;
        letter-spacing: 3px;
        text-transform: uppercase;
        display: block;
        margin-bottom: 60px;
        margin-right: 15px;
    }

    .description {
        font-family: 'Jomolhari', serif;
        font-size: 1rem;
        color: #ddd;
        line-height: 1.6;
        margin-bottom: 30px;
        max-width: 100%;
        text-align: left;
    }

    .book-link {
        font-family: 'Jomhuria', sans-serif;
        color: #fff;
        text-decoration: none;
        font-size: 1.8rem;
        font-weight: 400;
        text-transform: uppercase;
        letter-spacing: 1px;
        /* display: inline-flex; */
        align-items: center;
        gap: 8px;
        transition: 0.3s;
        margin-bottom: 5px;
    }

    .book-link:hover { color: #9d4edd; }
    .book-link i { font-size: 0.5em; }


    /* ============================================================
       ISOLATED MEDIA QUERIES
       ============================================================ */

    /* 1. Range: 900px to 1024px (Small Desktop / Landscape Tablet) */
    /* @media (min-width: 900px) and (max-width: 1023px) {
        
        .content-box {
            width: 100%; 
            padding: 20px 40px;
        }

        .center-title {
            margin-top: -30vh;
        }
    } */

    /* 2. Range: 768px to 899px (Portrait Tablet) */
    @media (min-width: 767px) and (max-width: 1024px) {
        .image-grid {
            /* 4 Cols x 6 Rows = 24 images */
            grid-template-columns: repeat(4, 1fr);
            grid-template-rows: repeat(6, 1fr);
        }

        .center-title {
            margin-top: -45vh; /* Adjusted for portrait height */
        }
        
        .center-title h1 {
            font-size: 7rem;
        }

        .content-box {
            width: 100%;
            flex-direction: column;
            align-items: flex-start;
            padding: 30px;
            gap: 30px;
            background: rgba(0, 0, 0, 0.7);
            max-height: 60vh;
            overflow-y: auto;
        }

        .left-col, .right-col {
            width: 100%;
            max-width: 100%;
            align-items: flex-start;
            text-align: left;
        }

        .left-col {
            border-bottom: 1px solid rgba(255,255,255,0.1);
            padding-bottom: 20px;
        }

        .social-bar {
            position: static;
            margin-bottom: 20px;
            width: 100%;
            justify-content: center;
        }
    }

    /* 3. Range: 541px to 767px (Large Mobile) */
    @media (min-width: 541px) and (max-width: 766px) {
        .image-grid {
            /* 4 Cols x 6 Rows */
            grid-template-columns: repeat(4, 1fr);
            grid-template-rows: repeat(6, 1fr);
        }

        .center-title {
            margin-top: -20vh; /* Moves title up into clear space */
        }

        .center-title h1 {
            font-size: 6rem;
        }
        .center-title p {
            font-size: 1.5rem;
        }

        .content-box {
            width: 100%;
            flex-direction: column;
            align-items: flex-start;
            padding: 25px;
            gap: 25px;
            background: rgba(0, 0, 0, 0.9);
            max-height: 45vh;
            overflow-y: auto;
        }

        .left-col {
            width: 100%;
            border-bottom: 1px solid rgba(255,255,255,0.1);
            padding-bottom: 15px;
        }

        .right-col {
            width: 100%;
            align-items: flex-start;
            text-align: left;
        }

        .social-bar {
            position: static;
            width: 100%;
            justify-content: center;
            margin-bottom: 15px;
        }

        .book-link {
            color: #9d4edd;
            margin-top: 10px;
        }
    }

    /* 4. Range: 401px to 540px (Standard Mobile) */
    @media (min-width: 401px) and (max-width: 540px) {
        .image-grid {
            /* 4 Cols x 6 Rows */
            grid-template-columns: repeat(4, 1fr);
            grid-template-rows: repeat(6, 1fr);
        }

        .center-title {
            margin-top: -40vh;
        }

        .center-title h1 {
            font-size: 5.8rem;
        }
        
        .center-title p {
            font-size: 1.3rem;
        }

        .content-box {
            width: 100%;
            flex-direction: column;
            align-items: flex-start;
            padding: 20px;
            gap: 20px;
            background: rgba(0, 0, 0, 0.7);
            max-height: 55vh;
            overflow-y: auto;
        }

        .brand-name { font-size: 3rem; }

        .left-col {
            width: 100%;
            border-bottom: 1px solid rgba(255,255,255,0.1);
            padding-bottom: 15px;
        }

        .right-col {
            width: 100%;
            align-items: flex-start;
            text-align: left;
        }
        
        .social-bar {
            position: static;
            width: 100%;
            justify-content: center;
            padding: 10px 0;
            gap: 20px;
            margin-bottom: 15px;
        }
        
        .description {
            font-size: 0.9rem;
            line-height: 1.4;
        }
        
        .icon-box {
            width: 38px;
            height: 38px;
        }
    }

    /* 5. Range: Max 400px (Small Mobile) */
    @media (max-width: 400px) {
        .image-grid {
            /* 4 Cols x 6 Rows */
            grid-template-columns: repeat(4, 1fr);
            grid-template-rows: repeat(6, 1fr);
        }

        .center-title {
            margin-top: -40vh;
        }

        .center-title h1 {
            font-size: 4.5rem;
        }

        .center-title p {
            font-size: 1rem;
        }

        .content-box {
            width: 100%;
            flex-direction: column;
            align-items: flex-start;
            padding: 15px;
            gap: 15px;
            background: rgba(0, 0, 0, 0.7);
            max-height: 55vh;
            overflow-y: auto;
        }

        .brand-name { font-size: 3rem; }
        .brand-sub { font-size: 1rem; }
        
        /* .features { display: none; }  */
        
        .left-col {
            width: 100%;
            border-bottom: 1px solid rgba(255,255,255,0.1);
            padding-bottom: 10px;
        }

        .right-col {
            width: 100%;
            align-items: flex-start;
            text-align: left;
        }

        .social-bar {
            position: static;
            width: 100%;
            justify-content: center;
            padding: 5px 0;
            margin-bottom: 10px;
        }

        .description {
            font-size: 0.8rem;
            line-height: 1.3;
        }
        
        .icon-box {
            width: 32px;
            height: 32px;
            font-size: 0.9rem;
        }
    }
</style>

<div class="dreambox-container">

    <div class="image-grid">
        <img src="https://preview.redd.it/what-has-happened-to-movie-posters-v0-tm2y16wnnhb81.jpg?width=640&crop=smart&auto=webp&s=2f1305986475f9787ba4dd2ca1486abdb206a377">
        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQx2TiHBkRYGbiEmNDyPVT3MFRfDIOqiDhDIQ&s">
        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTL94Dz7To4p6R3AVyLsyaPcZK5iQqNS29NkA&s">
        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRLpO78lHg2Z9kulYJ-DPmqQESqUmiC1JUN5g&s">
        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTtBcZy0CMe1IXC2yCzvxmTZQdfhaXrvvtZqA&s">
        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTiNFbcjoIX46OmX2x2G5vScPEAcsmOyZ-Ieg&s">
        <img src="https://www.movieposters.com/cdn/shop/products/ed4796ac6feff9d2a6115406f964c928_6b200bda-fe71-4900-ad7f-903cdda50dab.jpg?v=1762505090&width=250">
        <img src="https://speckyboy.com/wp-content/uploads/2018/10/minimal-move-poster-CEMMPD-02.jpg">

        <img src="https://rukminim2.flixcart.com/image/480/640/jr3t5e80/poster/h/y/t/medium-black-panther-movie-poster-for-room-office-13-inch-x-19-original-imafcz4zqkfaxxcc.jpeg?q=90">
        <img src="https://i.ebayimg.com/images/g/v3oAAOSwulViCEyE/s-l400.jpg">
        <img src="https://i0.wp.com/graphicdesignjunction.com/wp-content/uploads/2024/08/creative_movie_posters_of_2024.jpg?fit=870%2C567&ssl=1">
        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRi9YNUvR1lC44ha6vcVZoOOjVU1aF9xESN1g&s">
        <img src="https://m.media-amazon.com/images/I/61JelJV0yUL._AC_UF894,1000_QL80_.jpg">
        <img src="https://i.ebayimg.com/images/g/HpsAAOSwo0JWHZkE/s-l400.jpg">
        <img src="https://rukminim2.flixcart.com/image/480/640/jy4q3680/poster/s/z/k/large-kabir-singh-movie-jumbo-poster-for-room-office-kabir-singh-original-imafgej6t5ny9ezt.jpeg?q=90">
        <img src="https://xonomax.com/cdn/shop/files/602461.jpg?v=1735014370">
        
        <img src="https://cdn.shopify.com/s/files/1/1057/4964/files/10-Best-Movie-Posters-of-All-Time_480x480.webp?v=1712251697">
        <img src="https://rukminim2.flixcart.com/image/480/480/jnc2bgw0/poster/y/b/3/medium-hollywood-movie-wall-poster-the-dark-tower-hd-quality-original-imafayzxa7v4nh4s.jpeg?q=90">
        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRoj7oHv0F3MHC9oiPxU7znT0U4U1J2nKezAg&s">
        <img src="https://www.cinelinx.com/wp-content/uploads/2020/12/the-green-knight-poster.jpeg">
        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQiZwNoRjV_A6o6mwfnoy9jOAMA2VL22ILM0g&s">
        <img src="https://compote.slate.com/images/77440fdf-a599-4fd1-90fc-cc619aa7419d.jpg?crop=590%2C885%2Cx0%2Cy0">
        <img src="https://preview.redd.it/what-has-happened-to-movie-posters-v0-veyma8wnnhb81.jpg?width=640&crop=smart&auto=webp&s=3155408077eb1f8e3f8c4566b44e51204bc09ba9">
        <img src="https://upload.wikimedia.org/wikipedia/ru/6/64/%D0%9F%D0%BE%D1%81%D1%82%D0%B5%D1%80_DVD-%D1%84%D0%B8%D0%BB%D1%8C%D0%BC%D0%B0_%C2%ABDevdas%C2%BB_%282002%29.jpg">
    </div>

    <div class="overlay"></div>

    <div class="hero-content">
        
        <div class="center-title">
            <h1 data-text="DREAMBOX">DREAMBOX</h1>
            <p>YOUR PRIVATE SCREENING AWAITS</p>
        </div>

        <div class="content-box">
            
            <div class="left-col">
                <div class="brand-name">DREAMBOX</div>
                <span class="brand-sub">Cinema, Up Close.</span>

                <ul class="features">
                    <li>Comfort</li>
                    <li>Experience</li>
                    <li>Privacy</li>
                    <li>Immersion</li>
                </ul>

                <div class="icon-row">
                    <div class="icon-box icon-box-couch"><i class="fas fa-couch"></i></div>
                    <div class="icon-box icon-box-ticket"><i class="fas fa-ticket-alt"></i></div>
                    <div class="icon-box icon-box-lock"><i class="fas fa-pizza-slice"></i></div>
                    <div class="icon-box icon-box-star"><i class="fas fa-lock"></i></div>
                </div>
            </div>

            <div class="right-col">
                <div class="social-bar">
                    <i class="fab fa-facebook-f"></i>
                    <i class="fab fa-instagram"></i>
                    <i class="fab fa-tiktok"></i>
                </div>

                <div class="cinema-title">DREAMBOX</div>
                <span class="cinema-subtitle">MINI CINEMA</span>

                <p class="description">
                   <?php echo $hero_banner_des?>
                </p>

                <a href="<?php echo $pth; ?>booking<?php echo $online_exnction; ?>" class="book-link">
                    Book Now &nbsp; <i class="fas fa-arrow-right"></i>
                </a>
            </div>
            
        </div>
    </div>
</div>