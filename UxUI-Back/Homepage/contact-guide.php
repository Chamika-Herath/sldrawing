<style>
    .contact-guide {
        padding: 120px 0;
        position: relative;
        background: transparent;
        z-index: 5;
    }

    .contact-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 80px;
        align-items: center;
        background: rgba(20, 12, 8, 0.6);
        border: 1px solid rgba(255,255,255,0.05);
        border-radius: 30px;
        padding: 50px;
        box-shadow: 0 40px 80px rgba(0,0,0,0.8), inset 0 0 50px rgba(0,0,0,0.5);
        position: relative;
        overflow: hidden;
    }

    .contact-grid::before {
        content: ''; position: absolute; top: 0; left: 0; width: 100%; height: 5px;
        background: linear-gradient(90deg, rgba(219,118,54,0) 0%, rgba(219,118,54,0.3) 50%, rgba(219,118,54,0) 100%);
    }

    .contact-info {
        text-align: center;
    }
    
    .contact-portrait {
        width: 100%;
        max-width: 350px;
        height: auto;
        border-radius: 20px;
        border: 2px solid #3c2415;
        box-shadow: 20px 20px 40px rgba(0,0,0,0.8);
        filter: sepia(0.3) brightness(0.9);
        margin-bottom: 30px;
    }

    .contact-form-container {
        display: flex;
        flex-direction: column;
        gap: 25px;
    }

    .atelier-input {
        width: 100%;
        padding: 15px 20px;
        background: rgba(255,255,255,0.02);
        border: none;
        border-bottom: 2px solid rgba(219, 118, 54, 0.4);
        border-radius: 5px 5px 0 0;
        color: #fff;
        font-family: 'Inter', sans-serif;
        font-size: 1.1rem;
        transition: 0.3s;
    }
    
    .atelier-input::placeholder { color: rgba(255,255,255,0.3); }
    .atelier-input:focus {
        outline: none;
        background: rgba(255,255,255,0.05);
        border-bottom-color: #db7636;
        box-shadow: 0 10px 20px rgba(0,0,0,0.2);
    }
    
    .submit-btn {
        padding: 20px;
        background: #db7636;
        color: #fff;
        border: none;
        border-radius: 10px;
        font-family: 'Inter', sans-serif;
        font-weight: 800;
        text-transform: uppercase;
        letter-spacing: 2px;
        font-size: 1rem;
        cursor: pointer;
        transition: 0.4s;
        box-shadow: 0 15px 30px rgba(219, 118, 54, 0.2);
    }
    
    .submit-btn:hover {
        background: #e9884c;
        transform: translateY(-5px);
        box-shadow: 0 20px 40px rgba(219, 118, 54, 0.4);
    }

    @media (max-width: 992px) {
        .contact-grid { grid-template-columns: 1fr; gap: 50px; padding: 30px 20px; }
    }
</style>

<section class="contact-guide">
    <div class="container">
        
        <div class="contact-grid">
            <div class="contact-info reveal">
                <img src="/assets/images/portrait_hero.webp" alt="Artist Profile" class="contact-portrait">
                <h3 style="font-family: 'Playfair Display', serif; font-size: 2.5rem; color: #fff; margin-bottom: 10px;">Let's Talk <span style="color: #db7636;">Art</span></h3>
                <p style="font-family: 'Inter', sans-serif; color: #a48c77; line-height: 1.6; font-size: 1.1rem; padding: 0 20px;">For business inquiries, museum collaborations, or personal tutelage.</p>
            </div>
            
            <div class="contact-form-container reveal" style="transition-delay: 0.2s;">
                <form id="contactForm" style="display: flex; flex-direction: column; gap: 20px;">
                    <input type="text" name="full_name" id="full_name" placeholder="Your Name" required class="atelier-input">
                    <input type="email" name="email" id="email" placeholder="Your Courier (Email)" required class="atelier-input">
                    <select name="subject" class="atelier-input" style="color: rgba(255,255,255,0.7); cursor: pointer;">
                        <option value="Collab">Gallery Curation / Business</option>
                        <option value="Tutorials">Masterclass Inquiries</option>
                        <option value="General">General Commendations</option>
                    </select>
                    <textarea name="message" id="message" placeholder="Pen your thoughts..." required class="atelier-input" rows="5" style="resize: none;"></textarea>
                    
                    <div id="form-status" style="display: none; padding: 15px; border-radius: 10px; font-weight: 700; text-align: center; color: #fff;"></div>
                    <button type="submit" id="submitBtn" class="submit-btn" style="margin-top: 10px;">Send Artifact via Courier</button>
                    <p style="font-size: 0.8rem; color: rgba(255,255,255,0.3); text-align: center; font-family: 'Inter', sans-serif;">We will unseal your message within 24 standard earth cycles.</p>
                </form>
            </div>
        </div>

    </div>
</section>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const form = document.getElementById("contactForm");
        const statusDiv = document.getElementById("form-status");
        const submitBtn = document.getElementById("submitBtn");

        if (form) {
            form.addEventListener("submit", function(e) {
                e.preventDefault();
                
                // UX Changes
                submitBtn.disabled = true;
                submitBtn.innerText = "Sending...";
                statusDiv.style.display = "none";
                statusDiv.className = "";
                statusDiv.innerText = "";
                
                const formData = new FormData(form);
                
                fetch("/api/send_contact_email.php", {
                    method: "POST",
                    body: formData
                })
                .then(response => response.json())
                .then(data => {
                    submitBtn.disabled = false;
                    submitBtn.innerText = "Send Artifact via Courier";
                    statusDiv.style.display = "block";
                    
                    if (data.success) {
                        statusDiv.style.background = "rgba(46, 204, 113, 0.2)";
                        statusDiv.style.color = "#2ecc71";
                        statusDiv.innerText = "Message sent successfully! We'll be in touch soon.";
                        form.reset();
                    } else {
                        statusDiv.style.background = "rgba(231, 76, 60, 0.2)";
                        statusDiv.style.color = "#e74c3c";
                        statusDiv.innerText = data.error || "An error occurred. Please try again.";
                    }
                })
                .catch(error => {
                    submitBtn.disabled = false;
                    submitBtn.innerText = "Send Artifact via Courier";
                    statusDiv.style.display = "block";
                    statusDiv.style.background = "rgba(231, 76, 60, 0.2)";
                    statusDiv.style.color = "#e74c3c";
                    statusDiv.innerText = "Connection error. Please try again later.";
                });
            });
        }
    });
</script>

