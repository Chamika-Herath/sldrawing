<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Jomolhari&family=Jomhuria&display=swap" rel="stylesheet">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<style>
    /* --- Main Wrapper --- */
    .contact-wrapper {
        position: relative;
        width: 100%;
        min-height: 100vh;
        background-color: #05000a;
        background-image: radial-gradient(circle at 10% 20%, #2e003e 0%, #05000a 40%);
        font-family: 'Jomolhari', serif;
        color: #fff;
        padding: 60px 20px;
        display: flex;
        flex-direction: column;
        align-items: center;
        box-sizing: border-box;
    }

    .contact-wrapper * { box-sizing: border-box; }

    /* --- Header Section --- */
    .contact-header {
        text-align: center;
        margin-bottom: 60px;
        max-width: 800px;
    }

    .contact-title {
        font-size: 3rem;
        font-weight: 800;
        text-transform: uppercase;
        margin: 0 0 15px 0;
        letter-spacing: 2px;
        /* Neon Glow Text */
        color: #fff;
        text-shadow: 0 0 10px rgba(188, 19, 254, 0.7), 0 0 20px rgba(188, 19, 254, 0.5);
    }

    .contact-subtitle {
        color: #d8b4fe;
        font-size: 1.1rem;
        line-height: 1.6;
    }

    /* --- Main Grid Layout --- */
    .contact-container {
        display: grid;
        grid-template-columns: 1fr 1.5fr; /* Info takes less space, Form takes more */
        gap: 50px;
        width: 100%;
        max-width: 1200px;
        margin-bottom: 60px;
    }

    /* --- Left Column: Info Cards --- */
    .info-column {
        display: flex;
        flex-direction: column;
        gap: 20px;
    }

    .info-card {
        background: rgba(255, 255, 255, 0.03);
        border: 1px solid rgba(188, 19, 254, 0.2);
        padding: 30px;
        border-radius: 16px;
        display: flex;
        align-items: center;
        gap: 20px;
        transition: transform 0.3s, box-shadow 0.3s;
        backdrop-filter: blur(10px);
    }

    .info-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 30px rgba(188, 19, 254, 0.15);
        border-color: #bc13fe;
    }

    .icon-box {
        width: 50px;
        height: 50px;
        background: linear-gradient(135deg, #9b59b6, #bc13fe);
        border-radius: 12px;
        display: flex;
        justify-content: center;
        align-items: center;
        font-size: 1.5rem;
        box-shadow: 0 4px 15px rgba(188, 19, 254, 0.4);
        flex-shrink: 0;
        color: #fff; /* Ensure icon is white */
    }

    .card-text h3 {
        margin: 0 0 5px 0;
        font-size: 1.1rem;
        color: #fff;
    }

    .card-text p {
        margin: 0;
        color: #aaa;
        font-size: 0.95rem;
    }

    .card-text a {
        color: #d8b4fe;
        text-decoration: none;
        transition: color 0.2s;
    }
    .card-text a:hover { color: #fff; }

    /* --- Right Column: Contact Form --- */
    .form-column {
        background: rgba(20, 10, 30, 0.6);
        border: 1px solid rgba(255, 255, 255, 0.05);
        padding: 40px;
        border-radius: 20px;
        box-shadow: 0 20px 50px rgba(0,0,0,0.5);
    }

    .form-group {
        position: relative;
        margin-bottom: 25px;
    }

    .form-label {
        position: absolute;
        top: 15px;
        left: 20px;
        color: #888;
        font-size: 0.9rem;
        pointer-events: none;
        transition: 0.3s ease all;
        background: transparent;
    }

    .form-input, .form-textarea {
        width: 100%;
        padding: 15px 20px;
        background: #0b0514;
        border: 1px solid #333;
        border-radius: 8px;
        color: #fff;
        font-size: 1rem;
        font-family: inherit;
        transition: 0.3s;
    }

    .form-textarea {
        resize: vertical;
        min-height: 150px;
    }

    /* Floating Label Effect */
    .form-input:focus, .form-textarea:focus {
        border-color: #bc13fe;
        outline: none;
        box-shadow: 0 0 15px rgba(188, 19, 254, 0.2);
    }

    .form-input:focus + .form-label,
    .form-input:not(:placeholder-shown) + .form-label,
    .form-textarea:focus + .form-label,
    .form-textarea:not(:placeholder-shown) + .form-label {
        top: -10px;
        left: 15px;
        font-size: 0.8rem;
        color: #bc13fe;
        background: #05000a;
        padding: 0 5px;
    }

    .btn-send {
        width: 100%;
        padding: 18px;
        background: linear-gradient(90deg, #7d3c98, #bc13fe);
        border: none;
        border-radius: 8px;
        color: white;
        font-size: 1.1rem;
        font-weight: bold;
        cursor: pointer;
        text-transform: uppercase;
        letter-spacing: 1px;
        transition: 0.3s;
        box-shadow: 0 4px 15px rgba(125, 60, 152, 0.4);
    }

    .btn-send:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 25px rgba(188, 19, 254, 0.6);
        filter: brightness(1.2);
    }

    /* --- Map Section --- */
    .map-section {
        width: 100%;
        max-width: 1200px;
        height: 400px;
        border-radius: 20px;
        overflow: hidden;
        border: 1px solid rgba(255, 255, 255, 0.1);
        filter: grayscale(100%) invert(92%) contrast(83%); /* Dark Map Effect */
        transition: filter 0.5s;
    }

    .map-section:hover {
        filter: none; /* Show real colors on hover */
    }

    iframe {
        width: 100%;
        height: 100%;
        border: 0;
    }

    /* --- Responsive --- */
    @media (max-width: 760px) {
        .contact-container {
            grid-template-columns: 1fr; /* Stack vertically */
        }
        .contact-title {
            font-size: 2.5rem;
        }
    }
</style>


<div class="contact-wrapper">
    
    <header class="contact-header">
        <h1 class="contact-title">Get In Touch</h1>
        <p class="contact-subtitle">
            Have a question about a private screening or want to book an event at Dreambox? 
            Fill out the form below or visit us at our Colombo location.
        </p>
    </header>

    <div class="contact-container">
        
        <div class="info-column">
            
            <div class="info-card">
                <div class="icon-box"><i class="fa-solid fa-phone"></i></div>
                <div class="card-text">
                    <h3>Call Us</h3>
                    <p><a href="tel:+94112345678">+94 11 234 5678</a></p>
                    <p><a href="tel:+94771234567">+94 77 123 4567</a></p>
                </div>
            </div>

            <div class="info-card">
                <div class="icon-box"><i class="fa-solid fa-envelope"></i></div>
                <div class="card-text">
                    <h3>Email Us</h3>
                    <p><a href="mailto:bookings@dreambox.lk">bookings@dreambox.lk</a></p>
                    <p><a href="mailto:support@dreambox.lk">support@dreambox.lk</a></p>
                </div>
            </div>

            <div class="info-card">
                <div class="icon-box"><i class="fa-solid fa-location-dot"></i></div>
                <div class="card-text">
                    <h3>Visit Us</h3>
                    <p>Dreambox Mini Theater<br>
                    No. 45, Galle Road,<br>
                    Colombo 03, Sri Lanka</p>
                </div>
            </div>

            <div class="info-card">
                <div class="icon-box"><i class="fa-solid fa-globe"></i></div>
                <div class="card-text">
                    <h3>Follow Us</h3>
                    <p>
                        <a href="#">Instagram</a> • 
                        <a href="#">Facebook</a> • 
                        <a href="#">TikTok</a>
                    </p>
                </div>
            </div>

        </div>

        <div class="form-column">
            <form action="#" method="POST">
                
                <div class="form-group">
                    <input type="text" id="name" class="form-input" placeholder=" " required>
                    <label for="name" class="form-label">Your Name</label>
                </div>

                <div class="form-group">
                    <input type="email" id="email" class="form-input" placeholder=" " required>
                    <label for="email" class="form-label">Email Address</label>
                </div>

                <div class="form-group">
                    <input type="text" id="subject" class="form-input" placeholder=" " required>
                    <label for="subject" class="form-label">Subject</label>
                </div>

                <div class="form-group">
                    <textarea id="message" class="form-textarea" placeholder=" " required></textarea>
                    <label for="message" class="form-label">Your Message</label>
                </div>

                <button type="submit" class="btn-send">Send Message</button>
            </form>
        </div>

    </div>

    <div class="map-section">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d63371.80385597891!2d79.82118589255606!3d6.921838637731946!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ae253d10f7a7003%3A0x320b2e4d32d3838d!2sColombo%2C%20Sri%20Lanka!5e0!3m2!1sen!2suk!4v1707765123456!5m2!1sen!2suk" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>

</div>