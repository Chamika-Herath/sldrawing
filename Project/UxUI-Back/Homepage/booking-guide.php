<section class="booking-guide-hero">
  <div class="booking-guide-hero-content">
    <h1 class="booking-guide-hero-title"><?php echo $booking_guide_title?></h1>
    <p class="booking-guide-hero-subtitle"><?php echo $booking_guide_tagline?></p>
    <a href="<?php echo $pth; ?>booking<?php echo $online_exnction; ?>" class="booking-guide-book-btn">BOOK NOW</a>
  </div>
</section>


<link href="https://fonts.googleapis.com/css2?family=Jomhuria&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Jomolhari&display=swap" rel="stylesheet">

<style>
.booking-guide-hero {
    /* margin-top: 200px; */
  position: relative;
  width: 100%;
  padding: 100px 20px;
  display: flex;
  align-items:flex-start;
  justify-content: center;
  min-height: 550px;
  background: linear-gradient(
    160deg,
    #7c4aa8 0%,
    #2a1242 25%,
    #000000 45%,
    #000000 55%,
    #2a1242 75%,
    #7c4aa8 100%
  );
}

.booking-guide-hero-content {
  /* max-width: 800px; */
  width: 100%;
  text-align: center;
  color: white;
  padding: 0 20px;
}

.booking-guide-hero-title {
  font-family: 'Jomhuria', sans-serif;
  font-size: 4.5rem;
  letter-spacing: 12px;
  font-weight: 400;
  margin-bottom: 24px;
  line-height: 0.3;
  text-transform: uppercase;
}

.booking-guide-hero-subtitle {
  font-family: 'Jomolhari', serif;
  font-size: 1.5rem;
  opacity: 0.85;
  letter-spacing: 2px;
  margin-bottom: 120px;
  line-height: 1;
  font-weight: 400;
  /* max-width: 600px; */
  margin-left: auto;
  margin-right: auto;
}

/* .booking-guide-book-btn {
  display: inline-block;
  background: radial-gradient(ellipse at center, #9859CE 30%, #6A23A8 70%);
  color: white;
  font-size: 18px;
  letter-spacing: 4px;
  text-transform: uppercase;
  text-decoration: none;
  font-weight: 600;
  padding: 20px 60px;
  border-radius: 12px;
  border: none;
  cursor: pointer;
  transition: all 0.5s ease;
  box-shadow: 0 10px 25px rgba(0, 0, 0, 0.45);
  min-width: 240px;
}

.booking-guide-book-btn:hover {
  transform: translateY(-3px);
  box-shadow: 
    0 16px 35px rgba(0, 0, 0, 0.6),
    0 0 25px rgba(155, 89, 232, 0.6);
  background: radial-gradient(circle at 50% 20%, #c892ff, #7b28cc 75%);
} */

  .booking-guide-book-btn {
  font-family: 'Jomhuria', sans-serif;
  position: relative;
  display: inline-block;
  background: radial-gradient(ellipse at center, #9859CE 10%, #6A23A8 100%);
  color: white;
  font-size: 2.8rem;
  letter-spacing: 6px;
  justify-content: center;
  text-transform: uppercase;
  text-decoration: none;
  font-weight: 400;
  padding: 20px 140px;
  border-radius: 14px;
  border: none;
  cursor: pointer;
  box-shadow: 0 10px 25px rgba(0, 0, 0, 0.45);
  min-width: 240px;
  overflow: hidden;
  transition: transform 0.5s ease, box-shadow 0.5s ease;
  z-index: 0; /* base layer */
}

.booking-guide-book-btn::after {
  content: "";
  position: absolute;
  inset: 0;
  background: radial-gradient(circle at 50% 20%, #c892ff, #7b28cc 75%);
  opacity: 0;
  transition: opacity 0.8s ease;
  border-radius: inherit;
  z-index: -1; /* push behind the text */
}

.booking-guide-book-btn:hover::after {
  opacity: 1; /* fade in gradient smoothly */
}

.booking-guide-book-btn:hover {
  transform: translateY(-3px);
  box-shadow: 
    0 16px 35px rgba(0, 0, 0, 0.6),
    0 0 25px rgba(155, 89, 232, 0.6); /* outer glow */
}



/* Responsive Design */
@media (max-width: 1024px) {
  .booking-guide-hero {
    min-height: 400px;
    padding: 60px 20px;
  }
  
  .booking-guide-hero-title {
    font-size: 4.5rem;
    letter-spacing: 6px;
  }
  
  .booking-guide-hero-subtitle {
    font-size: 1rem;
    padding: 0 20px;
  }
}

@media (max-width: 768px) {
  .booking-guide-hero {
    min-height: 300px;
    padding: 50px 20px;
  }
  
  .booking-guide-hero-title {
    font-size: 2.5rem;
    letter-spacing: 4px;
    padding: 0 10px;
  }
  
  .booking-guide-hero-subtitle {
    font-size: 0.9rem;
    padding: 0 15px;
    margin-bottom: 40px;
  }
  
  .booking-guide-book-btn {
    font-size: 1.8rem;
    padding: 18px 50px;
    letter-spacing: 3px;
  }
}

@media (max-width: 480px) {
  .booking-guide-hero {
    min-height: 350px;
    padding: 40px 15px;
  }
  
  .booking-guide-hero-title {
    font-size: 2.5rem;
    letter-spacing: 3px;
    line-height: 1.3;
  }
  
  .booking-guide-hero-subtitle {
    font-size: 15px;
    padding: 0 10px;
    line-height: 1.5;
  }
  
  .booking-guide-book-btn {
    font-size: 1.8rem;
    padding: 16px 40px;
    letter-spacing: 2px;
    min-width: 200px;
  }
}

@media (max-width: 360px) {
  .booking-guide-hero-title {
    font-size: 2.2rem;
    letter-spacing: 2px;
  }
  
  .booking-guide-hero-subtitle {
    font-size: 14px;
  }
}
</style>