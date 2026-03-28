<?php if (!isset($content_included)): ?>
<?php $content_included = true; ?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<style>
    /* ================= LAYOUT & SIDEBAR SYNC ================= */
    .erp-content-area {
        flex: 1;
        padding: 32px;
        
        /* Sidebar Expanded State */
        margin-left: var(--sidebar-width, 260px); 
        width: calc(100% - var(--sidebar-width, 260px));
        min-height: calc(100vh - 50px - 32px);
        
        background: var(--erp-surface-alt);
        transition: margin-left 0.25s ease, width 0.25s ease;
        
        /* Centering Logic */
        display: flex;
        flex-direction: column;
        align-items: center; /* Keeps the 800px paper in the middle of available space */
    }

    /* Sidebar Collapsed State */
    body.sidebar-collapsed .erp-content-area {
        margin-left: var(--sidebar-collapsed, 70px) !important;
        width: calc(100% - var(--sidebar-collapsed, 70px)) !important;
    }

    /* ================= SCREEN STYLES (DARK THEME) ================= */
    /* Action Buttons Bar */
    .erp-invoice-actions {
        width: 100%;
        max-width: 800px; /* Will not expand beyond this */
        display: flex;
        justify-content: flex-end;
        gap: 16px;
        margin-bottom: 24px;
    }

    .erp-btn {
        padding: 10px 20px;
        border-radius: 8px;
        font-size: 14px;
        font-weight: 600;
        cursor: pointer;
        border: none;
        transition: 0.3s;
        display: flex;
        align-items: center;
        gap: 8px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .erp-btn-print {
        background-color: var(--erp-primary);
        color: #fff;
        box-shadow: 0 4px 15px rgba(155, 92, 255, 0.2);
    }
    .erp-btn-print:hover { background-color: var(--erp-primary-dark); transform: translateY(-2px); }

    .erp-btn-download {
        background-color: transparent;
        border: 1px solid var(--erp-border);
        color: var(--erp-text-primary);
    }
    .erp-btn-download:hover { background-color: var(--erp-surface-elevated); border-color: var(--erp-text-secondary); }

    /* The Invoice Paper */
    .erp-invoice-paper {
        width: 100%;
        max-width: 800px; /* Will not expand beyond this */
        background: var(--erp-surface);
        border: 1px solid var(--erp-border);
        border-radius: 12px;
        padding: 48px;
        box-shadow: 0 20px 50px rgba(0,0,0,0.2);
        color: var(--erp-text-primary);
    }

    /* Header Section */
    .inv-header {
        display: flex; justify-content: space-between; align-items: flex-start;
        border-bottom: 2px solid var(--erp-border); padding-bottom: 24px; margin-bottom: 32px;
    }
    .inv-brand { font-size: 28px; font-weight: 800; color: var(--erp-primary-light); text-transform: uppercase; letter-spacing: 1px; margin: 0; }
    .inv-brand span { color: var(--erp-text-primary); }
    .inv-company-details { font-size: 13px; color: var(--erp-text-secondary); margin-top: 8px; line-height: 1.6; }
    
    .inv-meta { text-align: right; }
    .inv-title { font-size: 24px; font-weight: 700; color: var(--erp-text-primary); margin: 0 0 8px 0; text-transform: uppercase; }
    .inv-meta-grid { display: grid; grid-template-columns: auto auto; gap: 8px 16px; font-size: 13px; text-align: left; }
    .inv-meta-label { color: var(--erp-text-tertiary); font-weight: 600; text-transform: uppercase; }
    .inv-meta-value { color: var(--erp-text-primary); font-weight: 700; text-align: right; }

    /* Customer Details */
    .inv-customer-section { margin-bottom: 32px; }
    .inv-section-title { font-size: 12px; font-weight: 700; color: var(--erp-text-tertiary); text-transform: uppercase; letter-spacing: 1px; margin-bottom: 12px; }
    .inv-customer-name { font-size: 18px; font-weight: 700; margin: 0 0 4px 0; color: var(--erp-text-primary); }
    .inv-customer-contact { font-size: 14px; color: var(--erp-text-secondary); line-height: 1.6; }

    /* Invoice Table */
    .inv-table { width: 100%; border-collapse: collapse; margin-bottom: 32px; }
    .inv-table th, .inv-table td { padding: 16px; text-align: left; border-bottom: 1px solid var(--erp-border); }
    .inv-table th { background: var(--erp-surface-elevated); color: var(--erp-text-secondary); font-size: 12px; font-weight: 700; text-transform: uppercase; letter-spacing: 1px; }
    .inv-table td { font-size: 14px; color: var(--erp-text-primary); }
    
    /* Alignment utilities */
    .text-center { text-align: center !important; }
    .text-right { text-align: right !important; }
    .font-bold { font-weight: 700 !important; }

    .inv-item-title { font-weight: 600; color: var(--erp-primary-light); margin: 0 0 4px 0; }
    .inv-item-desc { font-size: 12px; color: var(--erp-text-tertiary); margin: 0; }

    /* Summary Section */
    .inv-summary-container { display: flex; justify-content: flex-end; margin-bottom: 40px; }
    .inv-summary-box { width: 300px; background: var(--erp-surface-elevated); border-radius: 8px; padding: 24px; border: 1px solid var(--erp-border); }
    .inv-summary-row { display: flex; justify-content: space-between; margin-bottom: 12px; font-size: 14px; color: var(--erp-text-secondary); }
    .inv-summary-row.total { border-top: 1px dashed var(--erp-border); padding-top: 16px; margin-top: 16px; margin-bottom: 0; font-size: 18px; font-weight: 800; color: var(--erp-primary-light); }

    /* Status Badge */
    .inv-status { display: inline-block; padding: 6px 16px; border-radius: 4px; font-size: 12px; font-weight: 800; text-transform: uppercase; letter-spacing: 1px; margin-top: 16px; }
    .inv-status.paid { background: var(--erp-accent-success); color: #000; box-shadow: 0 0 15px rgba(47, 227, 160, 0.2); }
    .inv-status.unpaid { background: var(--erp-accent-error); color: #fff; box-shadow: 0 0 15px rgba(255, 77, 109, 0.2); }

    /* Footer Notes */
    .inv-footer { text-align: center; border-top: 1px solid var(--erp-border); padding-top: 24px; color: var(--erp-text-tertiary); font-size: 12px; line-height: 1.6; }

    /* ================= PRINT STYLES ================= */
    @media print {
        @page { size: A4 portrait; margin: 1.5cm; }
        
        body { background: #fff !important; margin: 0 !important; padding: 0 !important; }
        
        /* Hide everything except the invoice paper */
        body * { visibility: hidden; }
        .erp-invoice-paper, .erp-invoice-paper * { visibility: visible; }
        
        /* Reset positioning for the paper */
        .erp-invoice-paper {
            position: absolute; left: 0; top: 0; width: 100%; max-width: 100%;
            background: #fff !important; border: none !important; box-shadow: none !important;
            padding: 0 !important; margin: 0 !important; color: #000 !important;
        }

        /* Override dark theme colors for print */
        .inv-brand { color: #000 !important; }
        .inv-brand span { color: #555 !important; }
        .inv-company-details, .inv-customer-contact, .inv-item-desc { color: #555 !important; }
        .inv-title, .inv-customer-name, .inv-meta-value, .inv-item-title { color: #000 !important; }
        .inv-section-title, .inv-meta-label, .inv-table th { color: #777 !important; }
        
        .inv-header { border-bottom: 2px solid #eee !important; }
        .inv-table th, .inv-table td { border-bottom: 1px solid #eee !important; }
        .inv-table th { background: #fafafa !important; }
        
        .inv-summary-box { background: #fafafa !important; border: 1px solid #ddd !important; }
        .inv-summary-row { color: #333 !important; }
        .inv-summary-row.total { border-top: 1px dashed #aaa !important; color: #000 !important; }
        
        .inv-status.paid { background: #e6f4ea !important; color: #137333 !important; border: 1px solid #137333 !important; box-shadow: none !important; }
        .inv-status.unpaid { background: #fce8e6 !important; color: #c5221f !important; border: 1px solid #c5221f !important; box-shadow: none !important; }
        
        .inv-footer { border-top: 1px solid #eee !important; color: #777 !important; }
    }

    /* ================= RESPONSIVE ================= */
    @media (min-width: 769px) and (max-width: 1200px) {
        .erp-content-area {
            /* margin-left: 220px;  */
            width: calc(100% - 220px);
            padding: 24px;
        }
    }

    @media (max-width: 768px) {
        .erp-content-area {
            margin-left: 0 !important;
            width: 100% !important;
            padding: 20px 16px;
        }
        .erp-invoice-paper { padding: 24px; }
        .inv-header { flex-direction: column; gap: 24px; }
        .inv-meta { text-align: left; }
        .inv-meta-grid { text-align: left; justify-content: start; }
        .inv-meta-value { text-align: left; }
        .inv-summary-container { justify-content: flex-start; }
        .inv-summary-box { width: 100%; }
        .hide-mobile { display: none; } /* Hides qty/rate columns on small screens */
    }
</style>

<div class="erp-content-area" id="mainContentArea">
    
    <div class="erp-invoice-actions">
        <button class="erp-btn erp-btn-download" onclick="downloadPDF()">
            <i class="fa-solid fa-download"></i> Download
        </button>
        <button class="erp-btn erp-btn-print" onclick="window.print()">
            <i class="fa-solid fa-print"></i> Print
        </button>
    </div>

    <div class="erp-invoice-paper" id="invoicePaper">
        
        <div class="inv-header">
            <div>
                <h1 class="inv-brand">Dream<span>Box</span></h1>
                <div class="inv-company-details">
                    123 Cinema Avenue, Colombo 03<br>
                    Sri Lanka<br>
                    +94 77 123 4567<br>
                    hello@dreambox.lk
                </div>
            </div>
            <div class="inv-meta">
                <h2 class="inv-title">Invoice</h2>
                <div class="inv-meta-grid">
                    <span class="inv-meta-label">Invoice #:</span>
                    <span class="inv-meta-value">INV-2026-0045</span>
                    
                    <span class="inv-meta-label">Date:</span>
                    <span class="inv-meta-value">Feb 15, 2026</span>
                    
                    <span class="inv-meta-label">Booking Token:</span>
                    <span class="inv-meta-value">#101</span>
                </div>
            </div>
        </div>

        <div class="inv-customer-section">
            <div class="inv-section-title">Billed To</div>
            <h3 class="inv-customer-name">Kasun Perera</h3>
            <div class="inv-customer-contact">
                Phone: 077 1234567<br>
                NIC: 923456789V
            </div>
        </div>

        <table class="inv-table">
            <thead>
                <tr>
                    <th>Description</th>
                    <th class="text-center hide-mobile">Qty / Hrs</th>
                    <th class="text-right hide-mobile">Rate</th>
                    <th class="text-right">Amount</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <h4 class="inv-item-title">Family Package</h4>
                        <p class="inv-item-desc">3 Hours cinematic experience. Up to 6 persons.</p>
                    </td>
                    <td class="text-center hide-mobile">1</td>
                    <td class="text-right hide-mobile">LKR 15,000</td>
                    <td class="text-right font-bold">LKR 15,000.00</td>
                </tr>
                <tr>
                    <td>
                        <h4 class="inv-item-title">Extra Persons</h4>
                        <p class="inv-item-desc">Additional guests beyond package limit.</p>
                    </td>
                    <td class="text-center hide-mobile">2</td>
                    <td class="text-right hide-mobile">LKR 1,500</td>
                    <td class="text-right font-bold">LKR 3,000.00</td>
                </tr>
            </tbody>
        </table>

        <div class="inv-summary-container">
            <div class="inv-summary-box">
                <div class="inv-summary-row">
                    <span>Subtotal</span>
                    <span>LKR 18,000.00</span>
                </div>
                <div class="inv-summary-row total">
                    <span>Total</span>
                    <span>LKR 18,000.00</span>
                </div>
                <div style="text-align: right;">
                    <span class="inv-status paid">PAID IN FULL</span>
                </div>
            </div>
        </div>

        <div class="inv-footer">
            <strong>Thank you for choosing DreamBox!</strong><br>
            Please note that all bookings are subject to our cancellation policy. Cancellations made less than 24 hours before the booking time are non-refundable.
        </div>

    </div>
</div>

<script>
    // --- Responsive Sidebar Sync ---
    document.addEventListener('DOMContentLoaded', () => {
        const sidebar = document.getElementById('sidebar');
        const body = document.body;

        const syncLayout = () => {
            if (sidebar && sidebar.classList.contains('collapsed')) {
                body.classList.add('sidebar-collapsed');
            } else {
                body.classList.remove('sidebar-collapsed');
            }
        };

        syncLayout();

        if (sidebar) {
            const observer = new MutationObserver(syncLayout);
            observer.observe(sidebar, { attributes: true, attributeFilter: ['class'] });
        }
    });

    // --- PDF Download Function ---
    function downloadPDF() {
        alert("To download as PDF, click Print, then select 'Save as PDF' in your browser's print dialog.");
        window.print();
    }
</script>
<?php endif; ?>