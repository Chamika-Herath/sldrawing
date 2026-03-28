<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Jomolhari&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<style>
    /* =========================================
       1. GLOBAL RESET
       ========================================= */
    * {
        box-sizing: border-box;
        margin: 0;
        padding: 0;
    }

    /* =========================================
       2. MAIN WRAPPER
       ========================================= */
    .booking-section {
        position: relative;
        width: 100%;
        min-height: 100vh;
        background-color: #05000a;
        background-image: 
            linear-gradient(rgba(5, 0, 10, 0.9), rgba(5, 0, 10, 0.9)),
            url('./assets/mini-theater.png'); 
        background-size: cover;
        font-family: 'Jomolhari', serif;
        display: flex;
        flex-direction: column;
        align-items: center;
        padding: 60px 20px;
        color: #fff;
    }

    /* --- Headers --- */
    .section-title {
        font-size: 3rem;
        text-transform: uppercase;
        margin-bottom: 10px;
        color: #fff;
        text-shadow: 0 0 10px #bc13fe, 0 0 20px #bc13fe;
        text-align: center;
        line-height: 1.1;
    }

    .section-subtitle {
        color: #bbb;
        margin-bottom: 50px;
        font-size: 1.2rem;
        text-align: center;
        max-width: 600px;
    }

    /* --- Packages Grid --- */
    .packages-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr); 
        gap: 30px;
        width: 100%;
        max-width: 1200px;
    }

    .package-card {
        background: rgba(20, 10, 30, 0.8);
        border: 1px solid rgba(255, 255, 255, 0.1);
        border-radius: 15px;
        padding: 30px;
        text-align: center;
        transition: 0.3s;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        position: relative;
        overflow: hidden;
    }

    .package-card:hover {
        border-color: #bc13fe;
        box-shadow: 0 0 30px rgba(188, 19, 254, 0.25);
        transform: translateY(-5px);
    }

    .package-name {
        font-size: 2rem;
        color: #d8b4fe;
        margin: 0 0 20px 0;
        text-transform: uppercase;
        border-bottom: 1px solid rgba(188, 19, 254, 0.3);
        padding-bottom: 15px;
    }

    .package-features {
        list-style: none;
        padding: 0;
        margin: 0 0 25px 0;
        text-align: left;
        flex-grow: 1;
    }

    .package-features li {
        margin-bottom: 10px;
        font-size: 1rem;
        color: #ccc;
        display: flex;
        align-items: flex-start;
    }

    .package-features li::before {
        content: "✦";
        color: #bc13fe;
        margin-right: 10px;
        font-size: 1rem;
    }

    .package-price {
        font-size: 1.4rem;
        color: #fff;
        margin-bottom: 20px;
        font-weight: bold;
    }
    
    .package-price span {
        font-size: 0.9rem;
        color: #888;
        display: block;
        font-weight: normal;
    }

    .btn-book {
        width: 100%;
        padding: 15px;
        background: transparent;
        border: 1px solid #bc13fe;
        color: #bc13fe;
        font-size: 1.1rem;
        border-radius: 8px;
        cursor: pointer;
        transition: 0.3s;
        font-family: 'Jomolhari', serif;
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    .btn-book:hover {
        background: #bc13fe;
        color: #fff;
        box-shadow: 0 0 15px rgba(188, 19, 254, 0.4);
    }

    /* =========================================
       3. PROFESSIONAL MODAL & FORM
       ========================================= */
    
    .modal-overlay {
        position: fixed;
        top: 0; left: 0;
        width: 100%; height: 100%;
        background: rgba(0, 0, 0, 0.95);
        backdrop-filter: blur(8px);
        display: none; 
        justify-content: center;
        align-items: center;
        z-index: 9999;
        opacity: 0;
        transition: opacity 0.3s ease;
        padding: 10px;
    }
    .modal-overlay.active { display: flex; opacity: 1; }

    .modal-content {
        background: #090011;
        border: 1px solid #bc13fe;
        border-radius: 12px;
        width: 100%;
        max-width: 500px;
        /* Vertical Scroll Only */
        max-height: 90vh; 
        overflow-y: auto; 
        overflow-x: hidden;
        
        box-shadow: 0 0 60px rgba(188, 19, 254, 0.25);
        display: flex;
        flex-direction: column;
        transform: scale(0.95);
        transition: transform 0.3s ease;
    }
    .modal-overlay.active .modal-content { transform: scale(1); }

    /* Modal Header */
    .modal-header {
        background: linear-gradient(135deg, #1f0530, #3a005c);
        padding: 25px;
        border-bottom: 1px solid rgba(188, 19, 254, 0.3);
        text-align: center;
        flex-shrink: 0;
    }
    .modal-title {
        color: #fff;
        margin: 0;
        font-size: 1.8rem;
        letter-spacing: 2px;
        text-transform: uppercase;
        text-shadow: 0 0 10px rgba(255,255,255,0.4);
    }

    /* Modal Body */
    .modal-body {
        padding: 25px 30px;
        width: 100%;
    }

    /* --- FORM LAYOUT (Vertical Stack for Safety) --- */
    #bookingForm {
        display: flex;
        flex-direction: column;
        gap: 20px;
        width: 100%;
    }

    .form-group {
        display: flex;
        flex-direction: column;
        width: 100%;
    }

    label {
        margin-bottom: 8px;
        color: #e2cafa; /* Softer lavender */
        font-size: 0.9rem;
        text-transform: uppercase;
        letter-spacing: 1px;
        font-weight: 600;
        display: block;
    }

    /* --- STYLIZED INPUTS --- */
    .form-input {
        width: 100%;
        padding: 14px 16px;
        /* Richer dark background */
        background: linear-gradient(180deg, #1a0826, #12031a);
        border: 1px solid #5d287a;
        color: #fff;
        border-radius: 8px;
        font-family: 'Jomolhari', serif;
        font-size: 1rem;
        transition: all 0.3s ease;
    }
    
    .form-input:focus {
        border-color: #a600ff; /* Pop of green on focus */
        background: #240a33;
        outline: none;
        box-shadow: 0 0 15px rgba(0, 255, 136, 0.2);
    }
    
    .form-input::placeholder { color: #666; }

    /* --- ICON FIX: Force White & Visible --- */
    input[type="date"], input[type="time"] {
        color-scheme: dark; /* Dark calendar popup */
    }
    
    input[type="date"]::-webkit-calendar-picker-indicator,
    input[type="time"]::-webkit-calendar-picker-indicator {
        /* No filter needed if color-scheme is dark! */
        filter: none; 
        opacity: 1;
        cursor: pointer;
        transform: scale(1.2); /* Make larger */
        background-color: transparent;
        display: block;
    }

    /* Penalty Warning */
    .penalty-box {
        background: rgba(255, 69, 0, 0.15);
        border: 1px solid rgba(255, 69, 0, 0.5);
        color: #ff9e80;
        padding: 12px;
        border-radius: 8px;
        text-align: center;
        font-size: 0.9rem;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 10px;
        box-shadow: 0 4px 10px rgba(0,0,0,0.3);
    }

    /* Payment Section */
    .payment-container {
        border-top: 1px solid rgba(188, 19, 254, 0.2);
        padding-top: 25px;
        display: flex;
        flex-direction: column;
        gap: 20px;
    }

    .total-price {
        font-size: 2.2rem;
        text-align: center;
        color: #fff;
        font-weight: bold;
        text-shadow: 0 0 20px #bc13fe;
        margin-bottom: 10px;
    }

    .radio-group {
        display: flex;
        flex-direction: column;
        gap: 12px;
    }

    .radio-card {
        display: flex;
        align-items: center;
        padding: 16px;
        background: rgba(255, 255, 255, 0.02);
        border: 1px solid #444;
        border-radius: 8px;
        cursor: pointer;
        transition: 0.3s;
    }
    
    .radio-card:hover {
        border-color: #bc13fe;
        background: rgba(188, 19, 254, 0.05);
    }

    /* Selected State */
    .radio-card:has(input:checked) {
        border-color: #00ff88;
        background: rgba(0, 255, 136, 0.05);
        box-shadow: 0 0 15px rgba(0, 255, 136, 0.1);
    }

    .radio-card input {
        margin-right: 15px;
        accent-color: #00ff88;
        width: 18px;
        height: 18px;
    }

    .radio-text { flex-grow: 1; font-size: 1rem; color: #eee; }

    .discount-badge {
        background: #00ff88;
        color: #000;
        font-size: 0.75rem;
        padding: 4px 8px;
        border-radius: 4px;
        font-weight: bold;
        box-shadow: 0 0 8px rgba(0, 255, 136, 0.5);
    }

    .btn-submit {
        width: 100%;
        padding: 18px;
        background: linear-gradient(90deg, #7d3c98, #bc13fe);
        border: none;
        color: white;
        font-size: 1.2rem;
        border-radius: 6px;
        cursor: pointer;
        transition: 0.3s;
        font-family: 'Jomolhari', serif;
        text-transform: uppercase;
        letter-spacing: 2px;
        font-weight: bold;
        margin-top: 10px;
        box-shadow: 0 5px 20px rgba(0,0,0,0.5);
    }
    .btn-submit:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(188, 19, 254, 0.6);
        filter: brightness(1.2);
    }

    /* Modal Footer */
    .modal-footer {
        padding: 20px;
        text-align: center;
        background: rgba(0,0,0,0.3);
        border-top: 1px solid rgba(255,255,255,0.05);
        border-radius: 0 0 12px 12px;
    }

    .policies-text {
        font-size: 0.8rem;
        color: #888;
        line-height: 1.6;
        margin-bottom: 20px;
    }
    .policies-text a {
        color: #c471ed;
        text-decoration: none;
        border-bottom: 1px dotted #c471ed;
    }
    .policies-text a:hover { color: #fff; border-color: #fff; }

    .btn-cancel {
        background: transparent;
        border: 1px solid #666;
        color: #ccc;
        padding: 10px 30px;
        border-radius: 50px;
        cursor: pointer;
        text-transform: uppercase;
        letter-spacing: 1px;
        font-size: 0.8rem;
        font-family: 'Jomolhari', serif;
        transition: 0.3s;
    }
    .btn-cancel:hover { border-color: #fff; color: #fff; background: rgba(255,255,255,0.1); }

    /* --- RESPONSIVE ADJUSTMENTS --- */
    @media (max-width: 1024px) {
        .packages-grid {
            grid-template-columns: repeat(2, 1fr);
            max-width: 800px;
        }
    }

    @media (max-width: 650px) {
        .packages-grid { grid-template-columns: 1fr; }
        .modal-content { max-height: 100vh; border-radius: 0; }
        .booking-section { padding: 40px 15px; }
    }
</style>

<div class="booking-section">
    <h1 class="section-title">Exclusive Packages</h1>
    <p class="section-subtitle">Choose your experience. Luxury screenings tailored for you.</p>

    <div class="packages-grid" id="packagesGrid">
        </div>
</div>

<div class="modal-overlay" id="bookingModal">
    <div class="modal-content">
        
        <div class="modal-header">
            <h2 class="modal-title" id="modalTitle">Book Package</h2>
        </div>

        <div class="modal-body">
            <form id="bookingForm">
                <input type="hidden" id="selectedPackageId">
                <input type="hidden" id="basePrice">
                
                <div class="form-group">
                    <label>Full Name</label>
                    <input type="text" class="form-input" placeholder="Enter Full Name" required>
                </div>
                
                <div class="form-group">
                    <label>NIC Number</label>
                    <input type="text" class="form-input" placeholder="National ID" required>
                </div>
                
                <div class="form-group">
                    <label>Phone Number</label>
                    <input type="tel" class="form-input" placeholder="07X XXXXXXX" required>
                </div>

                <div class="form-group">
                    <label>Date</label>
                    <input type="date" id="bookingDateInput" class="form-input" required>
                </div>

                <div class="form-group">
                    <label>Start Time</label>
                    <input type="time" class="form-input" required>
                </div>

                <div class="form-group">
                    <label>End Time</label>
                    <input type="time" class="form-input" required>
                </div>

                <div class="form-group">
                    <label>Number of guests</label>
                    <input type="number" min="1" max="15" class="form-input" placeholder="Ex: 2" required>
                </div>

                <div class="payment-container">
                    
                    <!-- <div class="penalty-box">
                        <i class="fa-solid fa-triangle-exclamation"></i>
                        <span>Penalties included in late arrivals</span>
                    </div> -->
                    
                    <div class="total-price" id="displayAmount">Rs. 2500/=</div>
                    
                    <div class="radio-group">
                        <label class="radio-card">
                            <input type="radio" name="paymentType" value="now" checked>
                            <span class="radio-text">Pay Now & Get a Discount</span>
                            <span class="discount-badge">SAVE</span>
                        </label>
                        <label class="radio-card">
                            <input type="radio" name="paymentType" value="later">
                            <span class="radio-text">Pay Later (at Counter)</span>
                        </label>
                    </div>
                </div>

                <button type="submit" class="btn-submit">Book Now</button>
            </form>
        </div>

        <div class="modal-footer">
            <p class="policies-text">
                By clicking Book Now, you agree to our <br>
                <a href="#">Terms & Conditions</a> and <a href="#">Payment Policies</a>.
            </p>
            <button type="button" class="btn-cancel" onclick="closeModal()">Close Window</button>
        </div>

    </div>
</div>

<script>
    /* --- CONFIGURATION --- */
    const packages = [
        { 
            id: 'p1', 
            name: 'Package 1', 
            price: 2500,
            features: [
                '2 Hours Screening',
                '2 Free Soft Drinks',
                'Popcorn Bucket (Medium)',
                'Standard Sound System'
            ]
        },
        { 
            id: 'p2', 
            name: 'Package 2', 
            price: 2500,
            features: [
                '2 Hours Screening',
                'Welcome Drink & Snacks',
                'Popcorn Bucket (medium)',
                'Dolby Atmos Sound'
            ]
        },
        { 
            id: 'p3', 
            name: 'Package 3', 
            price: 2500,
            features: [
                '2 Hours Screening',
                'Popcorn Bucket (medium)',
                'Dolby Atmos Sound',
                'Premium Recliners'
            ]
        }
    ];

    /* --- INITIALIZATION --- */
    const gridContainer = document.getElementById('packagesGrid');
    const modal = document.getElementById('bookingModal');
    const dateInput = document.getElementById('bookingDateInput');

    // 1. Set Date Logic (Disable Past Dates)
    const today = new Date().toISOString().split('T')[0];
    dateInput.setAttribute('min', today);
    dateInput.value = today;

    // 2. Render Packages
    packages.forEach(pkg => {
        const card = document.createElement('div');
        card.className = 'package-card';
        
        // Build feature list
        const featureList = pkg.features.map(f => `<li>${f}</li>`).join('');

        card.innerHTML = `
            <h3 class="package-name">${pkg.name}</h3>
            <ul class="package-features">
                ${featureList}
            </ul>
            <div class="package-price">
                <span>Starting from</span>
                Rs. ${pkg.price} /=
            </div>
            <button class="btn-book" onclick="openModal('${pkg.id}')">Book Now</button>
        `;
        gridContainer.appendChild(card);
    });

    /* --- FUNCTIONS --- */
    function openModal(packageId) {
        const pkg = packages.find(p => p.id === packageId);
        
        if(pkg) {
            document.getElementById('modalTitle').innerText = `Book ${pkg.name}`;
            document.getElementById('displayAmount').innerText = `Rs. ${pkg.price}/=`;
            document.getElementById('basePrice').value = pkg.price;
            document.getElementById('selectedPackageId').value = pkg.id;
            
            // Re-assert today's date if empty
            if(!dateInput.value) dateInput.value = today;
            
            modal.classList.add('active');
        }
    }

    function closeModal() {
        modal.classList.remove('active');
    }

    document.getElementById('bookingForm').addEventListener('submit', (e) => {
        e.preventDefault();
        
        const btn = document.querySelector('.btn-submit');
        const originalText = btn.innerText;
        
        btn.innerText = "Processing...";
        btn.style.opacity = "0.7";

        setTimeout(() => {
            btn.innerText = "Booking Confirmed!";
            btn.style.background = "#00ff88";
            btn.style.color = "#000";
            
            setTimeout(() => {
                closeModal();
                btn.innerText = originalText;
                btn.style.background = ""; 
                btn.style.color = ""; 
                btn.style.opacity = "1";
            }, 1500);
        }, 1500);
    });

    modal.addEventListener('click', (e) => {
        if (e.target === modal) {
            closeModal();
        }
    });
</script>