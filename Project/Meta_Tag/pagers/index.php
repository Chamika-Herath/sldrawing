<?php 


//  image uris
$uri_part = $_SERVER['REQUEST_URI'];
$image_twitter = "https://www.dreambox.lk/assets/images/logo.png";
$image_fb = "https://www.dreambox.lk/assets/images/logo.png";

$get_url = "https://www.dreambox.lk/".$uri_part;

// Default values - variable set to match  details home page
$get_title = "DreamBox Cinema | Premium Mini Theatre Experience in Sri Lanka";
$get_social_title = "Private Movie Screenings & Theatre Rentals | DreamBox Cinema";
$get_key_words = "mini theatre Sri Lanka, private movie screenings Colombo, theatre rental Sri Lanka, home cinema experience, private film screening, birthday party cinema, corporate event theatre, movie rental space, premium theatre experience, surround sound cinema, HD projection Sri Lanka, intimate cinema setting, luxury movie experience, film screening venue, private cinema hire Colombo";
$get_dis = "DreamBox Cinema offers an intimate mini theatre experience in Sri Lanka. Perfect for private movie screenings, birthday celebrations, corporate events, and special occasions. Enjoy premium HD projection, surround sound, and comfortable seating in your own private cinema space.";
$get_social_dis = "Experience the magic of cinema in your own private theatre. DreamBox Cinema offers premium mini theatre rentals for private screenings, events, and celebrations in Sri Lanka.";


//additional------------------------
//hero-section
$hero_banner_des = "Enjoy your favorite films in a cozy, private theater designed for comfort, clarity, and unforgettable moments.";

//booking-guide
$booking_guide_title ="GRAB YOUR SHOWTIME";
$booking_guide_tagline = "Pick your time, press play, and enjoy cinema the way it's meant to be.";

//card-section
$card_one ="Choose your moment and step into an intimate cinematic escape.";
$card_two ="Where every seat feels personal and every scene feels larger than life.";
$card_three ="A private world of light, sound, and stories waiting to unfold.";
$card_four ="Experience cinema reimagined in comfort, closeness, and style.";

//contact-guide
$cd_des_highlight="A cozy cinematic escape";//highlighted part of the sentence in begining
$cd_des="where sound, visuals, and comfort come together.";//rest of the sentence



if ($uri_part == "/theatre-for-rent" || $uri_part == "/rent-a-movie-theater"){

        // Default values - variable set to match  details home page
    $get_title = "Theatre for Rent Sri Lanka | Private Movie Theater Rental | DreamBox Cinema";
    $get_social_title = "Rent a Movie Theater | Private Cinema Hire Sri Lanka | DreamBox Cinema";
    $get_key_words = "theatre for rent Sri Lanka, rent a movie theater, private cinema hire, movie theater rental Colombo, cinema room hire, private screening room rental, party venue with cinema, film screening hire, mini theatre rental prices, birthday party theater rental, corporate event cinema hire, intimate venue for movie screening";
    $get_dis = "Rent a private movie theater in Sri Lanka with DreamBox Cinema. Perfect for birthday parties, date nights, corporate events, and intimate film screenings. Enjoy HD projection, surround sound, and comfortable seating in your own exclusive cinema space.";
    $get_social_dis = "Looking for a unique venue? Rent our private mini theatre for movies, events, and celebrations. Premium sound, HD visuals, and cozy atmosphere. Book your screening today!";


    //additional------------------------
    //hero-section
    $hero_banner_des = "Your private cinema awaits. Rent the perfect space for movies, celebrations, and unforgettable moments.";

    //booking-guide
    $booking_guide_title ="SECURE YOUR SCREENING";
    $booking_guide_tagline = "Choose your date, pick your film, and let the magic begin.";

    //card-section
    $card_one ="Pick your occasion — birthday, date night, or just because. We'll provide the cinema.";
    $card_two ="From rom-coms to blockbusters, enjoy any film on our big screen with premium sound.";
    $card_three ="Comfortable seating, intimate lighting, and a vibe that's entirely your own.";
    $card_four ="Bring your own snacks or let us handle the treats. You focus on the memories.";

    //contact-guide
    $cd_des_highlight="Your story, our screen";//highlighted part of the sentence in begining
    $cd_des="— rent the perfect setting for your next unforgettable experience.";//rest of the sentence

    

}else if ($uri_part == "/private-cinema-room" || $uri_part == "/private-movie-screening-sri-lanka" || $uri_part == "/private-screening-cost"
 || $uri_part == "/private-theatre-with-popcorn" || $uri_part == "/sri-lanka-private-screening" || $uri_part == "/best-private-cinema"){

    // Default values - variable set to match details home page
    $get_title = "Private Cinema Room Sri Lanka | Intimate Movie Screenings | DreamBox Cinema";
    $get_social_title = "Best Private Cinema Experience | Private Movie Screening Sri Lanka | DreamBox";
    $get_key_words = "private cinema room, private movie screening Sri Lanka, private screening cost, private theatre with popcorn, best private cinema, intimate movie experience, private film screening prices, exclusive cinema rental, couples private screening, small group cinema hire";
    $get_dis = "Experience the best private cinema room in Sri Lanka at DreamBox Cinema. Perfect for intimate movie screenings, date nights, and small gatherings. Enjoy premium comfort, crystal-clear projection, and surround sound in your own exclusive space.";
    $get_social_dis = "Discover Sri Lanka's best private cinema experience. Book our intimate screening room for movies, celebrations, or a perfect date night. Pure cinema, just for you.";

    //additional------------------------
    //hero-section
    $hero_banner_des = "Step into your own private cinema world — where the screen is yours alone and every moment feels special.";

    //booking-guide
    $booking_guide_title = "CLAIM YOUR PRIVATE SCREEN";
    $booking_guide_tagline = "Select your time, gather your people, and press play on something unforgettable.";

    //card-section
    $card_one = "An intimate space designed just for you and your guests — no crowds, no distractions.";
    $card_two = "Crystal-clear visuals and immersive sound that pull you deeper into every scene.";
    $card_three = "Cozy seating, warm lighting, and that fresh popcorn smell in the air.";
    $card_four = "Fair and transparent private screening costs with no hidden surprises.";

    //contact-guide
    $cd_des_highlight = "Your private cinema escape";//highlighted part of the sentence in beginning
    $cd_des = "— where every show feels like opening night, just for you.";//rest of the sentence

}else if ($uri_part == "/corporate-event-cinema" || $uri_part == "/exclusive-movie-rental"
 || $uri_part == "/luxury-movie-experience" || $uri_part == "/cinema-room-hire-sri-lanka"){

    // Default values - variable set to match details home page
    $get_title = "Luxury Cinema Experience Sri Lanka | Corporate Event Cinema | DreamBox Cinema";
    $get_social_title = "Exclusive Movie Rental & Corporate Cinema Hire | Premium Experience Sri Lanka";
    $get_key_words = "luxury movie experience Sri Lanka, corporate event cinema, exclusive movie rental, cinema room hire, premium cinema experience, executive film screening, private cinema for corporate events, upscale movie rental, VIP cinema experience, business event venue cinema, luxury private screening, high-end cinema hire Colombo";
    $get_dis = "Elevate your next gathering with a luxury movie experience at DreamBox Cinema. Perfect for corporate events, exclusive celebrations, and VIP screenings. Enjoy premium seating, exceptional sound, and personalized service in an intimate, upscale setting.";
    $get_social_dis = "Experience cinema redefined. Book our exclusive venue for corporate events, luxury screenings, and special occasions. Premium comfort, privacy, and impeccable service await.";

    //additional------------------------
    //hero-section
    $hero_banner_des = "Where premium comfort meets cinematic perfection — an exclusive space for those who appreciate the finer details.";

    //booking-guide
    $booking_guide_title = "RESERVE YOUR PREMIUM EXPERIENCE";
    $booking_guide_tagline = "Choose your moment, set the scene, and let us handle the rest.";

    //card-section
    $card_one = "Impress clients or reward your team with a sophisticated cinema experience tailored to you.";
    $card_two = "Sink into premium seating and lose yourself in visuals and sound that demand attention.";
    $card_three = "Your event, your way — from film selections to catering, we customize every detail.";
    $card_four = "An exclusive atmosphere where business meets pleasure, and memories take center stage.";

    //contact-guide
    $cd_des_highlight = "Beyond the ordinary";//highlighted part of the sentence in beginning
    $cd_des = "— where luxury, privacy, and cinema come together for your most memorable events.";//rest of the sentence

}else if ($uri_part == "/birthday-party-cinema-venue" || $uri_part == "/kids-movie-party-place" || $uri_part == "/mini-cinema-hall-near-me" || $uri_part == "/mini-theatre-sri-lanka"){

    // Default values - variable set to match details home page
    $get_title = "Birthday Party Cinema Venue Sri Lanka | Kids Movie Party | DreamBox Cinema";
    $get_social_title = "Mini Cinema Hall Near Me | Kids Birthday Party Cinema | DreamBox Sri Lanka";
    $get_key_words = "birthday party cinema venue Sri Lanka, kids movie party place, mini cinema hall near me, mini theatre Sri Lanka, children's birthday cinema, family movie venue, party place for kids cinema, affordable mini theatre, local cinema rental, kids party ideas Colombo, birthday screening room, family entertainment center";
    $get_dis = "Host an unforgettable birthday party at DreamBox Cinema — Sri Lanka's favorite mini theatre for kids and families. Enjoy private screenings, party-friendly space, and a magical movie experience that makes every celebration special.";
    $get_social_dis = "Looking for the perfect kids party place? DreamBox Cinema offers private mini theatre rentals for birthdays and family fun. Safe, clean, and totally entertaining!";

    //additional------------------------
    //hero-section
    $hero_banner_des = "Make their special day truly unforgettable — cake, candles, and the magic of the big screen.";

    //booking-guide
    $booking_guide_title = "PLAN YOUR CELEBRATION";
    $booking_guide_tagline = "Pick a date, choose a film, and get ready for the best party ever.";

    //card-section
    $card_one = "A birthday party that steals the show — private cinema, happy faces, and zero stress for you.";
    $card_two = "Little ones laugh louder and smiles shine brighter when their favorite films fill the screen.";
    $card_three = "Clean, cozy, and totally kid-friendly — a space where families can relax and celebrate.";
    $card_four = "Searching for a mini cinema hall near me? You've found it — right here, ready for your family.";

    //contact-guide
    $cd_des_highlight = "Where birthdays become blockbusters";//highlighted part of the sentence in beginning
    $cd_des = "— gather the family, bring the cake, and let the credits roll on a perfect day.";//rest of the sentence

}else if ($uri_part == "/intimate-cinema-experience" || $uri_part == "/movie-marathon-venue" || $uri_part == "/surround-sound-screening-room" || $uri_part == "/home-cinema-alternative"){

    // Default values - variable set to match details home page
    $get_title = "Intimate Cinema Experience Sri Lanka | Movie Marathon Venue | DreamBox Cinema";
    $get_social_title = "Surround Sound Screening Room | Home Cinema Alternative | DreamBox Sri Lanka";
    $get_key_words = "intimate cinema experience, movie marathon venue, surround sound screening room, home cinema alternative, immersive movie experience, audiophile screening room, binge watch venue, film buff cinema, cinematic sound experience, private screening with atmos sound, alternative to home theater, premium audio cinema";
    $get_dis = "Discover a truly intimate cinema experience at DreamBox Cinema. Perfect for movie marathons, audiophile screenings, and film enthusiasts who demand exceptional sound and visuals. The ultimate home cinema alternative with professional-grade technology.";
    $get_social_dis = "Step up from home theater. Experience immersive surround sound, crystal-clear projection, and an intimate setting designed for true film lovers. Book your screening today.";

    //additional------------------------
    //hero-section
    $hero_banner_des = "For those who don't just watch movies — they feel them. Pure sound, stunning visuals, and zero distractions.";

    //booking-guide
    $booking_guide_title = "START YOUR MARATHON";
    $booking_guide_tagline = "Grab your snacks, queue up your films, and settle in for the long haul.";

    //card-section
    $card_one = "An intimate escape where every whisper on screen lands perfectly in your ear.";
    $card_two = "Binge your favorite franchise or discover hidden gems — no interruptions, just cinema.";
    $card_three = "Professional surround sound that transforms every scene into something unforgettable.";
    $card_four = "Why settle for home cinema when you can have the real thing? Big screen. Big sound. All yours.";

    //contact-guide
    $cd_des_highlight = "Feel every frame";//highlighted part of the sentence in beginning
    $cd_des = "— intimate visuals, immersive audio, and the kind of magic your home TV just can't deliver.";//rest of the sentence
}
