<style>
    .gallery {
        padding: 60px;
        background: #000;
    }

    .gallery-grid {
        display: grid;
        grid-template-columns: 2fr 1fr 1fr;
        grid-template-rows: repeat(2, 360px);
        gap: 18px;
        max-width: 1400px;
        margin: auto;
    }

    .gallery-large {
        grid-row: 1 / span 2;
        overflow: hidden;
    }

    .gallery-small {
        overflow: hidden;
    }

    .gallery img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        display: block;
        transition: transform 0.4s ease;
    }

    .gallery img:hover {
        transform: scale(1.05);
    }

    /* ===== RESPONSIVE BREAKPOINTS ===== */

    /* Large Tablets (1024px and below) */
    @media (max-width: 1024px) {
        .gallery {
            padding: 50px 40px;
        }
        
        .gallery-grid {
            grid-template-rows: repeat(2, 280px);
            gap: 15px;
        }
    }

    /* Mobile & Small Tablets (768px and below) */
    @media (max-width: 768px) {
        .gallery {
            padding: 40px 20px;
        }
        
        /* Mobile layout: Single column for main, 2 columns for small images */
        .gallery-grid {
            grid-template-columns: 1fr; /* Default single column */
            grid-template-rows: auto;
            gap: 20px;
        }
        
        /* Main image takes full width */
        .gallery-large {
            grid-row: auto;
            grid-column: 1 / -1; /* Full width */
            height: 350px;
        }
        
        /* Small images in 2-column grid */
        .gallery-small {
            height: 200px;
        }
        
        /* For tablets: create 2-column grid for small images */
        .gallery-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr); /* 2 columns */
            gap: 15px;
        }
        
        /* Main image still full width above the grid */
        .gallery-large {
            grid-column: 1 / -1;
        }
    }

    /* Mobile Devices (480px and below) */
    @media (max-width: 480px) {
        .gallery {
            padding: 30px 15px;
        }
        
        .gallery-grid {
            gap: 12px;
        }
        
        .gallery-large {
            height: 280px;
        }
        
        .gallery-small {
            height: 180px;
        }
    }
</style>

<section class="gallery">
  <div class="gallery-grid">
    <div class="gallery-large">
      <img src="https://img.freepik.com/free-photo/beautiful-lake-mountains_395237-44.jpg?semt=ais_user_personalization&w=740&q=80" alt="main image">
    </div>

    <div class="gallery-small">
      <img src="https://img.freepik.com/free-photo/beautiful-lake-mountains_395237-44.jpg?semt=ais_user_personalization&w=740&q=80" alt="mini image one">
    </div>

    <div class="gallery-small">
      <img src="https://img.freepik.com/free-photo/beautiful-lake-mountains_395237-44.jpg?semt=ais_user_personalization&w=740&q=80" alt="mini image two">
    </div>

    <div class="gallery-small">
      <img src="https://img.freepik.com/free-photo/beautiful-lake-mountains_395237-44.jpg?semt=ais_user_personalization&w=740&q=80" alt="mini image three">
    </div>

    <div class="gallery-small">
      <img src="https://img.freepik.com/free-photo/beautiful-lake-mountains_395237-44.jpg?semt=ais_user_personalization&w=740&q=80" alt="mini image four">
    </div>
  </div>
</section>

