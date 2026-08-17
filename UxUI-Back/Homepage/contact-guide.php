<section class="contact-guide" style="padding: 120px 0; background: url('/assets/images/museum_bg_4.webp') center / cover fixed no-repeat; position: relative; overflow: hidden;">
    <!-- Overlay for text readability -->
    <div style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: rgba(11, 11, 15, 0.7); z-index: 0; pointer-events: none;"></div>
    
    <!-- Abstract Artistic Background Element -->
    <div style="position: absolute; top: -100px; right: -100px; width: 400px; height: 400px; background: radial-gradient(circle, rgba(254, 98, 29, 0.15) 0%, transparent 70%); filter: blur(60px); pointer-events: none; z-index: 1;"></div>
    
    <div class="container glass reveal" style="display: grid; grid-template-columns: 1fr 1fr; gap: 80px; padding: 80px; border-radius: 50px; align-items: center; position: relative; z-index: 2;">
        <div>
            <h2 style="font-size: 3.5rem; margin-bottom: 25px; font-weight: 800; letter-spacing: -2px; color: var(--text);">Let's <span style="color: var(--primary);">Talk Art</span></h2>
            <p style="color: var(--text-dim); margin-bottom: 45px; font-size: 1.2rem; line-height: 1.6;">Have questions about our tutorials or need help with the Studio? Our support artists are ready to help you thrive.</p>
            
            <div style="display: grid; gap: 25px;">
                <div style="display: flex; gap: 20px; align-items: center;">
                    <div style="width: 60px; height: 60px; background: var(--primary); border-radius: 20px; display: flex; align-items: center; justify-content: center; color: #fff; font-size: 1.5rem; box-shadow: 0 10px 30px rgba(254,98,29,0.3);">📧</div>
                    <div>
                        <div style="font-size: 0.9rem; color: var(--text-dim); font-weight: 600; text-transform: uppercase; letter-spacing: 1px;">Email Us</div>
                        <div style="font-size: 1.1rem; color: var(--text); font-weight: 700;">chamika@heradorce.com</div>
                    </div>
                </div>
                <div style="display: flex; gap: 20px; align-items: center;">
                    <div style="width: 60px; height: 60px; background: rgba(255,255,255,0.05); border-radius: 20px; display: flex; align-items: center; justify-content: center; color: var(--text); font-size: 1.5rem;">📍</div>
                    <div>
                        <div style="font-size: 0.9rem; color: var(--text-dim); font-weight: 600; text-transform: uppercase; letter-spacing: 1px;">Location</div>
                        <div style="font-size: 1.1rem; color: var(--text); font-weight: 700;">Global Artist Community</div>
                    </div>
                </div>
            </div>
        </div>
        
        <div>
            <form id="contactForm" style="display: grid; gap: 20px; background: var(--surface); padding: 40px; border-radius: 30px; box-shadow: 0 20px 50px rgba(0,0,0,0.3); border: 1px solid rgba(255,255,255,0.05);">
                <div style="display: grid; gap: 5px;">
                    <label style="font-size: 0.8rem; font-weight: 800; text-transform: uppercase; color: var(--primary); letter-spacing: 1px;">Full Name</label>
                    <input type="text" name="full_name" id="full_name" required placeholder="e.g. Leonardo da Vinci" style="width: 100%; padding: 18px; border-radius: 12px; border: 1px solid rgba(255,255,255,0.1); background: rgba(255,255,255,0.03); font-weight: 600; color: var(--text);">
                </div>
                <div style="display: grid; gap: 5px;">
                    <label style="font-size: 0.8rem; font-weight: 800; text-transform: uppercase; color: var(--primary); letter-spacing: 1px;">Email Address</label>
                    <input type="email" name="email" id="email" required placeholder="leo@masterpiece.com" style="width: 100%; padding: 18px; border-radius: 12px; border: 1px solid rgba(255,255,255,0.1); background: rgba(255,255,255,0.03); font-weight: 600; color: var(--text);">
                </div>
                <div style="display: grid; gap: 5px;">
                    <label style="font-size: 0.8rem; font-weight: 800; text-transform: uppercase; color: var(--primary); letter-spacing: 1px;">Message</label>
                    <textarea name="message" id="message" required placeholder="Tell us about your artistic journey..." style="width: 100%; padding: 18px; border-radius: 12px; border: 1px solid rgba(255,255,255,0.1); background: rgba(255,255,255,0.03); font-weight: 600; color: var(--text); height: 120px; resize: none;"></textarea>
                </div>
                <!-- Status Message Display -->
                <div id="form-status" style="display: none; padding: 15px; border-radius: 10px; font-weight: 700; text-align: center;"></div>
                <button type="submit" id="submitBtn" class="btn-primary" style="margin-top: 10px; width: 100%; font-size: 1.1rem;">Send Message</button>
            </form>
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
                    submitBtn.innerText = "Send Message";
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
                    submitBtn.innerText = "Send Message";
                    statusDiv.style.display = "block";
                    statusDiv.style.background = "rgba(231, 76, 60, 0.2)";
                    statusDiv.style.color = "#e74c3c";
                    statusDiv.innerText = "Connection error. Please try again later.";
                });
            });
        }
    });
</script>


<style>
    @media (max-width: 992px) {
        .contact-guide .glass { grid-template-columns: 1fr; padding: 40px 20px; gap: 50px; }
        .contact-guide h2 { font-size: 2.8rem !important; }
    }
</style>

