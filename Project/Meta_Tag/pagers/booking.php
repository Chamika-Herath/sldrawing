<?php 


//  image uris
$uri_part = $_SERVER['REQUEST_URI'];
$image_twitter = "https://www.dreambox.lk/assets/images/logo.png";
$image_fb = "https://www.dreambox.lk/assets/images/logo.png";

$get_url = "https://www.dreambox.lk/".$uri_part;

// Default values - variable set to match details home page
$get_title = "Online Movie Booking Sri Lanka | Reserve Your Private Cinema | DreamBox Cinema";
$get_social_title = "Book Mini Theatre Online | Secure Cinema Reservation Sri Lanka | DreamBox";
$get_key_words = "online movie booking Sri Lanka, book mini theatre online, cinema reservation system, secure ticket booking, private cinema booking, movie theater reservations, instant e-ticket cinema, online payment cinema booking, book private screening, film screening reservation, weekend movie booking, date night cinema booking, family movie reservation, cinema seat booking, advanced movie booking Sri Lanka";
$get_dis = "Book your private cinema experience online at DreamBox Cinema. Secure payments, instant e-ticket delivery, and easy reservation system. Choose your time, date, and enjoy the perfect movie screening in Sri Lanka.";
$get_social_dis = "Secure online booking now available! Reserve your private theatre, make protected payments, and receive instant e-tickets. Book your DreamBox Cinema experience today.";


//additional------------------------
//booking-main
$main_dis = "Your most trusted theater now has the \nonline booking capability.";
//description
$para_one = "We offer secure online movie booking with protected payments and instant confirmations. Our mini theater provides a comfortable cinema experience with quality sound, clear visuals, and a relaxing atmosphere. Book with confidence and enjoy every show.";
$para_two = "Immerse yourself in our state-of-the-art projection technology and surround sound systems designed to bring every scene to life. Whether it's a private screening or a public premiere, we ensure every moment is picture-perfect.";
$para_one_clone = "We offer secure online movie booking with protected payments and instant confirmations. Our mini theater provides a comfortable cinema experience with quality sound, clear visuals, and a relaxing atmosphere. Book with confidence and enjoy every show.";//Same content of para_one

//booking steps
$title = "Online Booking Quick Steps";
$step_one = "Enter Your Details";
$step_two = "Select Your Time & Date";
$step_three = "Make Payments";
$step_four = "Get Your E-Ticket";

if ($uri_part == "/theatre-for-rent" || $uri_part == "/rent-a-movie-theater" || $uri_part == "/cinema-room-hire-sri-lanka"){

    // Default values - variable set to match details home page
    $get_title = "Book Theatre for Rent Sri Lanka | Reserve Cinema Room Online | DreamBox Cinema";
    $get_social_title = "Rent Movie Theater Online | Cinema Room Hire Booking Sri Lanka | DreamBox";
    $get_key_words = "book theatre for rent Sri Lanka, rent movie theater online booking, cinema room hire reservation, book private cinema rental, reserve mini theatre online, cinema rental booking system, pay for theatre rental online, instant cinema hire booking, film screening venue booking, party cinema rental reservation, e-ticket theatre rental, secure cinema hire payment";
    $get_dis = "Book your theatre rental online at DreamBox Cinema. Simple reservation system, secure payments, and instant confirmation for cinema room hire. Perfect for parties, events, and private screenings in Sri Lanka.";
    $get_social_dis = "Ready to rent our cinema? Book online now! Secure payments, instant confirmation, and easy e-tickets for your private theatre hire. Reserve your space today.";


    //additional------------------------
    //booking-main
    $main_dis = "Book your private cinema rental \nin just a few clicks.";
    //description
    $para_one = "Reserve our theatre for rent with secure online booking and instant confirmation. Whether it's a birthday party, corporate event, or private screening, our cinema room hire service makes planning effortless. Protected payments and immediate e-ticket delivery guaranteed.";
    $para_two = "Our cinema rental includes premium HD projection, immersive surround sound, and comfortable seating for an unforgettable experience. Book online, choose your time, and arrive ready to enjoy your private screening — we handle the rest.";
    $para_one_clone = "Reserve our theatre for rent with secure online booking and instant confirmation. Whether it's a birthday party, corporate event, or private screening, our cinema room hire service makes planning effortless. Protected payments and immediate e-ticket delivery guaranteed.";

    //booking steps
    $title = "Cinema Rental Booking Steps";
    $step_one = "Select Your Rental Package";
    $step_two = "Choose Date & Time";
    $step_three = "Secure Payment Online";
    $step_four = "Receive Booking Confirmation";
}else if ($uri_part == "/private-cinema-room" || $uri_part == "/private-movie-screening-sri-lanka" || $uri_part == "/private-screening-cost" || $uri_part == "/private-theatre-with-popcorn" || $uri_part == "/sri-lanka-private-screening" || $uri_part == "/best-private-cinema"){

    // Default values - variable set to match details home page
    $get_title = "Book Private Cinema Room Online | Private Screening Reservation | DreamBox Cinema";
    $get_social_title = "Private Movie Screening Booking Sri Lanka | Best Private Cinema Reservation";
    $get_key_words = "book private cinema room, private movie screening booking, private screening cost online, private theatre with popcorn reservation, sri lanka private screening booking, best private cinema reservation, intimate screening room hire, private film screening payment, couples private cinema booking, small group screening reservation, e-ticket private screening, secure private cinema booking";
    $get_dis = "Book your private cinema experience online at DreamBox Cinema. Simple reservation for intimate screenings, date nights, and small gatherings. Secure payments, instant confirmation, and transparent private screening costs with no hidden fees.";
    $get_social_dis = "Reserve the best private cinema in Sri Lanka online! Check private screening costs, book your preferred time, and pay securely. Instant e-tickets for your intimate movie experience.";


    //additional------------------------
    //booking-main
    $main_dis = "Your private screening awaits \n— book in seconds.";
    //description
    $para_one = "Reserve your private cinema room with easy online booking and instant confirmation. Check private screening costs upfront, choose your preferred time, and pay securely. Perfect for couples, small groups, and intimate celebrations.";
    $para_two = "Step into Sri Lanka's best private cinema experience. Crystal-clear projection, immersive surround sound, and fresh popcorn await. Book online, arrive, and let the magic begin — no queues, no crowds, just pure cinema.";
    $para_one_clone = "Reserve your private cinema room with easy online booking and instant confirmation. Check private screening costs upfront, choose your preferred time, and pay securely. Perfect for couples, small groups, and intimate celebrations.";

    //booking steps
    $title = "Private Screening Booking Steps";
    $step_one = "Select Your Package";
    $step_two = "Enter your details ";
    $step_three = "Pick Date & Showtime";
    $step_four = "Pay & Get E-Ticket";
    
}else if ($uri_part == "/corporate-event-cinema" || $uri_part == "/exclusive-movie-rental" || $uri_part == "/luxury-movie-experience"){

    // Default values - variable set to match details home page
    $get_title = "Book Corporate Event Cinema Online | Exclusive Movie Rental Sri Lanka | DreamBox";
    $get_social_title = "Luxury Movie Experience Booking | Premium Cinema Reservation Sri Lanka";
    $get_key_words = "book corporate event cinema, exclusive movie rental booking, luxury movie experience reservation, premium cinema hire Sri Lanka, corporate screening online booking, VIP cinema rental payment, executive event cinema reservation, upscale private screening book, business cinema hire online, luxury film screening booking, corporate entertainment venue reservation, premium cinema e-ticket";
    $get_dis = "Book premium corporate event cinema and exclusive movie rentals online at DreamBox Cinema. Secure reservations for executive screenings, client entertainment, and luxury experiences with personalized service and instant confirmation.";
    $get_social_dis = "Elevate your next corporate event or exclusive gathering. Book our luxury cinema experience online with secure payment and instant confirmation. Premium service for discerning clients.";


    //additional------------------------
    //booking-main
    $main_dis = "Elevate your next event \nwith premium cinema booking.";
    //description
    $para_one = "Reserve our exclusive cinema for corporate events, client entertainment, and luxury experiences. Simple online booking with secure payments and instant confirmation. Impress your team or guests with a sophisticated private screening tailored to your needs.";
    $para_two = "Experience cinema at its finest. Our premium venue features luxurious seating, state-of-the-art sound, and personalized service. Book online, tell us your requirements, and we'll curate an unforgettable experience for your distinguished guests.";
    $para_one_clone = "Reserve our exclusive cinema for corporate events, client entertainment, and luxury experiences. Simple online booking with secure payments and instant confirmation. Impress your team or guests with a sophisticated private screening tailored to your needs.";

    //booking steps
    $title = "Premium Booking Steps";
    $step_one = "Select a Premium Package";
    $step_two = "Choose Date & Duration";
    $step_three = "Customize Your Experience";
    $step_four = "Secure Payment & Confirmation";

}else if ($uri_part == "/birthday-party-cinema-venue" || $uri_part == "/kids-movie-party-place" || $uri_part == "/mini-cinema-hall-near-me" || $uri_part == "/mini-theatre-sri-lanka"){

    // Default values - variable set to match details home page
    $get_title = "Book Birthday Party Cinema Venue | Kids Movie Party Booking | DreamBox Cinema";
    $get_social_title = "Mini Cinema Hall Near Me Booking | Mini Theatre Sri Lanka Reservation";
    $get_key_words = "book birthday party cinema venue, kids movie party place booking, mini cinema hall near me reservation, mini theatre Sri Lanka online booking, children's birthday cinema hire, family movie venue reservation, party cinema rental booking, affordable mini theatre near me, kids party cinema payment, birthday screening room booking, family entertainment center reservation, kid-friendly cinema hire";
    $get_dis = "Book the perfect birthday party cinema venue online at DreamBox Cinema. Easy reservation for kids movie parties, family screenings, and celebrations. Secure payments, instant confirmation, and a magical experience for little ones.";
    $get_social_dis = "Planning a kids party? Book our mini cinema hall near me online! Safe, clean, and totally fun. Secure payments and instant e-tickets for your child's special day.";


    //additional------------------------
    //booking-main
    $main_dis = "Make their birthday magical \n— book the cinema today.";
    //description
    $para_one = "Reserve Sri Lanka's favorite mini theatre for your child's birthday party. Simple online booking, secure payments, and instant confirmation. Our kid-friendly venue ensures a stress-free celebration with happy faces and lasting memories.";
    $para_two = "Searching for a mini cinema hall near me? You've found it! DreamBox Cinema offers the perfect space for kids parties, family gatherings, and celebrations. Clean, cozy, and totally entertaining — book online in seconds.";
    $para_one_clone = "Reserve Sri Lanka's favorite mini theatre for your child's birthday party. Simple online booking, secure payments, and instant confirmation. Our kid-friendly venue ensures a stress-free celebration with happy faces and lasting memories.";

    //booking steps
    $title = "Simple Booking Steps";
    $step_one = "Enter Your Details";
    $step_two = "Select Your Time & Date";
    $step_three = "Make Payments";
    $step_four = "Get Your E-Ticket";

}else if ($uri_part == "/intimate-cinema-experience" || $uri_part == "/movie-marathon-venue" || $uri_part == "/surround-sound-screening-room" || $uri_part == "/home-cinema-alternative"){

    // Default values - variable set to match details home page
    $get_title = "Book Intimate Cinema Experience | Movie Marathon Venue Booking | DreamBox Cinema";
    $get_social_title = "Surround Sound Screening Room Reservation | Home Cinema Alternative Booking";
    $get_key_words = "book intimate cinema experience, movie marathon venue booking, surround sound screening room reservation, home cinema alternative hire, immersive film screening booking, audiophile cinema room rent, binge watching venue reservation, film enthusiast cinema booking, premium audio screening hire, private cinema for movie marathon, cinematic sound experience booking, professional screening room reservation";
    $get_dis = "Book an intimate cinema experience at DreamBox Cinema for movie marathons and immersive screenings. Reserve our surround sound screening room online with secure payments. The perfect home cinema alternative for true film lovers.";
    $get_social_dis = "Ready for a movie marathon? Book our surround sound screening room online! Secure payments, instant confirmation, and the ultimate intimate cinema experience in Sri Lanka.";


    //additional------------------------
    //booking-main
    $main_dis = "Your immersive cinema experience \nstarts with one click.";
    //description
    $para_one = "Reserve our intimate cinema space for movie marathons, film enthusiast gatherings, and audiophile screenings. Simple online booking with secure payments and instant confirmation. Experience films the way they're meant to be seen and heard.";
    $para_two = "Step into Sri Lanka's finest surround sound screening room. Professional-grade audio, crystal-clear projection, and an intimate setting designed for true cinema lovers. Book online and discover why we're the ultimate home cinema alternative.";
    $para_one_clone = "Reserve our intimate cinema space for movie marathons, film enthusiast gatherings, and audiophile screenings. Simple online booking with secure payments and instant confirmation. Experience films the way they're meant to be seen and heard.";

    //booking steps
    $title = "Simple Booking Steps";
    $step_one = "Enter Your Details";
    $step_two = "Select Your Time & Date";
    $step_three = "Make Payments";
    $step_four = "Get Your E-Ticket";
}
