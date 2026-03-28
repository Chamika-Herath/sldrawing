<link href="https://fonts.googleapis.com/css2?family=Jomolhari&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Jomhuria&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .cg-container {
            background-image: url('./assets/contact.png'); /* Replace with your actual image path */
            background-size: cover;
            background-position: center;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            padding: 20px;
        }
        
        .cg-content {
            background-color: transparent;
            /* padding: 60px 40px; */
            border-radius: 10px;
            max-width: 900px;
            width: 100%;
        }
        
        .cg-description {
            color: white;
            font-family: 'Jomolhari', serif;
            font-size: 2.2rem;
            letter-spacing: 3px;
            line-height: 1.4;
            margin-bottom: 40px;
            font-weight: 300;
        }
        
        .cg-button {
            display: inline-block;
            font-family: 'Jomhuria', sans-serif;
            background-color: transparent;
            border: 1px solid #6A23A8;
            color: #C398E7;
            text-decoration: none;
            padding: 15px 60px;
            font-size: 2.5rem;
            font-weight: 400;
            /* border-radius: 5px; */
            text-transform: uppercase;
            letter-spacing: 5px;
            transition: background-color 0.3s ease;
        }
        
        .cg-button:hover {
            background-color: #6A23A8;
            color: #ffffff;
        }

        .cg-button i { font-size: 0.5em; }
        
        /* Optional: Add some responsive adjustments */
        @media (max-width:1024px){
            .cg-container{
                min-height: 70vh;
            }
        }
        @media (max-width: 768px) {
            .cg-container{
                min-height: 60vh;
            }
            .cg-description {
                font-size: 22px;
            }
            
            .cg-button {
                padding: 15px 35px;
                font-size: 18px;
            }
            
            .cg-content {
                padding: 40px 25px;
            }
        }
        
        @media (max-width: 480px) {
            .cg-container{
                min-height: 50vh;
            }
            .cg-description {
                font-size: 1.2rem;
            }
            
            .cg-button {
                padding: 12px 30px;
                font-size: 2rem;
            }
        }
    </style>

    <div class="cg-container">
        <div class="cg-content">
            <p class="cg-description"><span style="color:#9859CE;"><?php echo $cd_des_highlight?></span> <?php echo $cd_des?></p>
            <a href="<?php echo $pth; ?>contact<?php echo $online_exnction; ?>" class="cg-button">Contact Now  <i class="fas fa-arrow-right"></i></a>
        </div>
    </div>
