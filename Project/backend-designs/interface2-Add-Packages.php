<!-- components/content/package_create.php -->
<?php if (!isset($content_included)): ?>
<?php $content_included = true; ?>

<style>
    /* ================= MAIN CONTENT AREA ================= */
    .erp-content-area {
        flex: 1;
        padding: 32px;
        margin-left: var(--sidebar-width);
        transition: margin-left var(--sidebar-transition);
        width: calc(100% - var(--sidebar-width));
        min-height: calc(100vh - 50px - 32px);
        background: var(--erp-surface-alt);
    }

    .erp-sidebar.collapsed ~ .erp-content-area {
        margin-left: var(--sidebar-collapsed);
        width: calc(100% - var(--sidebar-collapsed));
    }

    /* ================= PAGE TITLE & BREADCRUMB ================= */
    .erp-page-title {
        text-align: center;
        font-size: 28px;
        font-weight: 600;
        margin: 0 0 8px 0;
        color: var(--erp-primary-light);
        padding-top: 10px;
    }

    .erp-breadcrumb-global {
        font-size: 14px;
        color: var(--erp-text-tertiary);
        text-align: center;
        margin-bottom: 30px;
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 8px;
    }

    .erp-breadcrumb__separator {
        color: var(--erp-border-dark);
    }

    /* ================= PACKAGE CARD ================= */
    .erp-package-card {
        background: var(--erp-surface);
        border-radius: 10px;
        border: 1px solid var(--erp-border);
        box-shadow: 0 10px 25px rgba(0,0,0,0.05);
        max-width: 700px;
        margin: 0 auto;
        overflow: hidden;
    }

    /* Header */
    .erp-package-card__header {
        padding: 20px 24px;
        background: var(--erp-primary);
        color: #fff;
        display: flex;
        justify-content: space-between;
        align-items: center;
        border-radius: 10px 10px 0 0;
    }

    .erp-package-card__title {
        font-size: 18px;
        font-weight: 600;
    }

    .erp-btn--icon {
        background: transparent;
        border: none;
        color: #fff;
        font-size: 20px;
        cursor: pointer;
        width: 32px;
        height: 32px;
        border-radius: 6px;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: background 0.2s;
    }

    .erp-btn--icon:hover {
        background: rgba(255,255,255,0.1);
    }

    /* ================= PACKAGE FORM ================= */
    .erp-package-form {
        padding: 32px;
        max-height: 70vh;
        overflow-y: auto;
    }

    .erp-form-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 20px;
    }

    .erp-form-group {
        margin-bottom: 5px;
    }

    .erp-form-group--full {
        grid-column: span 2;
    }

    .erp-form-label {
        display: block;
        font-size: 14px;
        font-weight: 600;
        color: var(--erp-text-secondary);
        margin-bottom: 6px;
    }

    .erp-form-label span {
        color: var(--erp-error);
        margin-left: 2px;
    }

    .erp-form-input {
        width: 100%;
        padding: 12px 16px;
        border: 1px solid var(--erp-border);
        border-radius: 8px;
        background: var(--erp-surface);
        color: var(--erp-text-primary);
        font-size: 14px;
        transition: all 0.2s;
    }

    .erp-form-input:focus {
        outline: none;
        border-color: var(--erp-primary-light);
        box-shadow: 0 0 0 3px rgba(var(--erp-primary-rgb), 0.1);
    }

    .erp-form-input:hover {
        border-color: var(--erp-border-dark);
    }

    .erp-form-input::placeholder {
        color: var(--erp-text-tertiary);
        font-size: 13px;
    }

    .erp-input-icon {
        position: relative;
    }

    .erp-input-icon .erp-form-input {
        padding-left: 35px;
    }

    .erp-input-icon__symbol {
        position: absolute;
        left: 12px;
        top: 50%;
        transform: translateY(-50%);
        color: var(--erp-text-tertiary);
        font-weight: 600;
        font-size: 14px;
    }

    .erp-input-hint {
        font-size: 12px;
        color: var(--erp-text-tertiary);
        margin-top: 4px;
    }

    /* Divider */
    .erp-form-divider {
        grid-column: span 2;
        margin: 10px 0 15px 0;
        border-top: 1px solid var(--erp-border);
        position: relative;
    }

    .erp-form-divider span {
        position: absolute;
        top: -10px;
        left: 50%;
        transform: translateX(-50%);
        background: var(--erp-surface);
        padding: 0 15px;
        color: var(--erp-text-tertiary);
        font-size: 12px;
        font-weight: 500;
    }

    /* ================= FORM ACTIONS ================= */
    .erp-form-actions {
        grid-column: span 2;
        display: flex;
        gap: 16px;
        justify-content: flex-end;
        margin-top: 30px;
        padding-top: 20px;
        border-top: 1px solid var(--erp-border);
    }

    .erp-btn {
        padding: 12px 32px;
        border: none;
        border-radius: 8px;
        font-weight: 600;
        font-size: 14px;
        cursor: pointer;
        transition: all 0.2s;
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .erp-btn--primary {
        background: var(--erp-primary);
        color: #fff;
    }

    .erp-btn--primary:hover {
        background: var(--erp-primary-dark);
        transform: translateY(-1px);
        box-shadow: 0 4px 12px rgba(var(--erp-primary-rgb), 0.3);
    }

    .erp-btn--secondary {
        background: var(--erp-border);
        color: var(--erp-text-primary);
    }

    .erp-btn--secondary:hover {
        background: var(--erp-border-dark);
    }

    .erp-btn svg {
        width: 18px;
        height: 18px;
        fill: currentColor;
    }

    /* Summary Box */
    .erp-summary-box {
        grid-column: span 2;
        background: var(--erp-surface-alt);
        border: 1px solid var(--erp-border);
        border-radius: 8px;
        padding: 16px;
        margin-top: 10px;
    }

    .erp-summary-title {
        font-size: 14px;
        font-weight: 600;
        color: var(--erp-text-primary);
        margin-bottom: 12px;
    }

    .erp-summary-row {
        display: flex;
        justify-content: space-between;
        font-size: 13px;
        padding: 6px 0;
        border-bottom: 1px dashed var(--erp-border);
    }

    .erp-summary-row:last-child {
        border-bottom: none;
    }

    .erp-summary-label {
        color: var(--erp-text-secondary);
    }

    .erp-summary-value {
        font-weight: 600;
        color: var(--erp-primary);
    }

    /* ================= RESPONSIVE ================= */
    @media (max-width: 768px) {
        .erp-content-area {
            margin-left: 0 !important;
            width: 100% !important;
            padding: 90px 16px 60px 16px;
        }

        .erp-page-title {
            font-size: 24px;
        }

        .erp-package-card__header {
            padding: 16px 20px;
        }

        .erp-package-form {
            padding: 20px;
        }

        .erp-form-grid {
            grid-template-columns: 1fr;
            gap: 15px;
        }

        .erp-form-group--full {
            grid-column: span 1;
        }

        .erp-form-divider {
            grid-column: span 1;
        }

        .erp-form-actions {
            grid-column: span 1;
            flex-direction: column;
        }

        .erp-btn {
            width: 100%;
            justify-content: center;
        }
    }

    @media (max-width: 480px) {
        .erp-page-title {
            font-size: 22px;
        }

        .erp-package-card__header {
            flex-direction: column;
            align-items: flex-start;
            gap: 12px;
        }

        .erp-package-card__title {
            font-size: 16px;
        }

        .erp-package-form {
            padding: 16px;
        }
    }
</style>

<main class="erp-content-area">
    <!-- ================= PAGE TITLE & BREADCRUMB ================= -->
    <h1 class="erp-page-title">Package Management</h1>
    <nav class="erp-breadcrumb-global">
        <span>Dashboard</span>
        <span class="erp-breadcrumb__separator">/</span>
        <span>Packages</span>
        <span class="erp-breadcrumb__separator">/</span>
        <span>Create Package</span>
    </nav>

    <!-- ================= PACKAGE CARD ================= -->
    <section class="erp-package-card">
        <header class="erp-package-card__header">
            <h1 class="erp-package-card__title">Create New Package</h1>
            <button class="erp-btn--icon" id="erpCloseBtn">
                <svg viewBox="0 0 24 24" width="20" height="20" fill="white">
                    <path d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12z"/>
                </svg>
            </button>
        </header>

        <!-- Package Form -->
        <form class="erp-package-form" id="packageCreateForm">
            <div class="erp-form-grid">
                <!-- Package Name (Full Width) -->
                <div class="erp-form-group--full">
                    <label class="erp-form-label">
                        Package Name <span>*</span>
                    </label>
                    <input type="text" class="erp-form-input" id="packageName" placeholder="e.g., Premium Theater Package" required>
                </div>

                <!-- Amount / Price -->
                <div class="erp-form-group">
                    <label class="erp-form-label">
                        Amount (LKR) <span>*</span>
                    </label>
                    <div class="erp-input-icon">
                        <span class="erp-input-icon__symbol">Rs.</span>
                        <input type="number" class="erp-form-input" id="amount" placeholder="25000" min="0" step="100" required>
                    </div>
                </div>

                <!-- Person Limit -->
                <div class="erp-form-group">
                    <label class="erp-form-label">
                        Person Limit <span>*</span>
                    </label>
                    <input type="number" class="erp-form-input" id="personLimit" placeholder="e.g., 50" min="1" required>
                    <div class="erp-input-hint">Maximum number of people allowed</div>
                </div>

                <!-- Penalty Fee -->
                <div class="erp-form-group">
                    <label class="erp-form-label">
                        Penalty Fee (LKR)
                    </label>
                    <div class="erp-input-icon">
                        <span class="erp-input-icon__symbol">Rs.</span>
                        <input type="number" class="erp-form-input" id="penaltyFee" placeholder="5000" min="0" step="100">
                    </div>
                    <div class="erp-input-hint">Fee for cancellations or violations</div>
                </div>

                <!-- Extra Person Amount -->
                <div class="erp-form-group">
                    <label class="erp-form-label">
                        Extra Person Amount (LKR)
                    </label>
                    <div class="erp-input-icon">
                        <span class="erp-input-icon__symbol">Rs.</span>
                        <input type="number" class="erp-form-input" id="extraPersonAmount" placeholder="500" min="0" step="50">
                    </div>
                    <div class="erp-input-hint">Per additional person beyond limit</div>
                </div>

                <!-- Hours in Package -->
                <div class="erp-form-group">
                    <label class="erp-form-label">
                        Hours in Package <span>*</span>
                    </label>
                    <input type="number" class="erp-form-input" id="hoursInPackage" placeholder="e.g., 4" min="1" step="0.5" required>
                    <div class="erp-input-hint">Duration included in package</div>
                </div>

                <!-- Extra Hours Fee -->
                <div class="erp-form-group">
                    <label class="erp-form-label">
                        Extra Hours Fee (LKR)
                    </label>
                    <div class="erp-input-icon">
                        <span class="erp-input-icon__symbol">Rs.</span>
                        <input type="number" class="erp-form-input" id="extraHoursFee" placeholder="1000" min="0" step="100">
                    </div>
                    <div class="erp-input-hint">Per additional hour beyond package</div>
                </div>

                <!-- Summary Box (Shows calculated info) -->
                <div class="erp-summary-box" id="summaryBox">
                    <div class="erp-summary-title">Package Summary</div>
                    <div class="erp-summary-row">
                        <span class="erp-summary-label">Base Price:</span>
                        <span class="erp-summary-value" id="summaryBasePrice">LKR 0</span>
                    </div>
                    <div class="erp-summary-row">
                        <span class="erp-summary-label">Includes:</span>
                        <span class="erp-summary-value" id="summaryIncludes">0 people for 0 hours</span>
                    </div>
                    <div class="erp-summary-row">
                        <span class="erp-summary-label">Extra Person Rate:</span>
                        <span class="erp-summary-value" id="summaryExtraPerson">LKR 0 each</span>
                    </div>
                    <div class="erp-summary-row">
                        <span class="erp-summary-label">Extra Hour Rate:</span>
                        <span class="erp-summary-value" id="summaryExtraHour">LKR 0 per hour</span>
                    </div>
                    <div class="erp-summary-row">
                        <span class="erp-summary-label">Penalty Fee:</span>
                        <span class="erp-summary-value" id="summaryPenalty">LKR 0</span>
                    </div>
                </div>

                <!-- Form Actions -->
                <div class="erp-form-actions">
                    <button type="button" class="erp-btn erp-btn--secondary" id="cancelBtn">
                        <svg viewBox="0 0 24 24">
                            <path d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12z"/>
                        </svg>
                        Cancel
                    </button>
                    <button type="submit" class="erp-btn erp-btn--primary" id="nextBtn">
                        Next
                        <svg viewBox="0 0 24 24">
                            <path d="M12 4l-1.41 1.41L16.17 11H4v2h12.17l-5.58 5.59L12 20l8-8z"/>
                        </svg>
                    </button>
                </div>
            </div>
        </form>
    </section>
</main>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Close button
        document.getElementById('erpCloseBtn')?.addEventListener('click', () => {
            if (confirm('Cancel package creation?')) {
                window.location.href = 'package_list.php';
            }
        });

        // Cancel button
        document.getElementById('cancelBtn')?.addEventListener('click', () => {
            if (confirm('Cancel package creation?')) {
                window.location.href = 'package_list.php';
            }
        });

        // Get all input elements
        const packageName = document.getElementById('packageName');
        const amount = document.getElementById('amount');
        const personLimit = document.getElementById('personLimit');
        const penaltyFee = document.getElementById('penaltyFee');
        const extraPersonAmount = document.getElementById('extraPersonAmount');
        const hoursInPackage = document.getElementById('hoursInPackage');
        const extraHoursFee = document.getElementById('extraHoursFee');

        // Summary elements
        const summaryBasePrice = document.getElementById('summaryBasePrice');
        const summaryIncludes = document.getElementById('summaryIncludes');
        const summaryExtraPerson = document.getElementById('summaryExtraPerson');
        const summaryExtraHour = document.getElementById('summaryExtraHour');
        const summaryPenalty = document.getElementById('summaryPenalty');

        // Update summary when any field changes
        function updateSummary() {
            // Base Price
            const amt = amount.value ? parseInt(amount.value) : 0;
            summaryBasePrice.textContent = `LKR ${amt.toLocaleString()}`;

            // Includes
            const persons = personLimit.value || 0;
            const hours = hoursInPackage.value || 0;
            summaryIncludes.textContent = `${persons} people for ${hours} hours`;

            // Extra Person
            const extraPerson = extraPersonAmount.value ? parseInt(extraPersonAmount.value) : 0;
            summaryExtraPerson.textContent = extraPerson > 0 ? `LKR ${extraPerson.toLocaleString()} each` : 'Not set';

            // Extra Hour
            const extraHour = extraHoursFee.value ? parseInt(extraHoursFee.value) : 0;
            summaryExtraHour.textContent = extraHour > 0 ? `LKR ${extraHour.toLocaleString()} per hour` : 'Not set';

            // Penalty
            const penalty = penaltyFee.value ? parseInt(penaltyFee.value) : 0;
            summaryPenalty.textContent = penalty > 0 ? `LKR ${penalty.toLocaleString()}` : 'Not set';
        }

        // Add event listeners to all inputs
        [amount, personLimit, penaltyFee, extraPersonAmount, hoursInPackage, extraHoursFee].forEach(input => {
            if (input) {
                input.addEventListener('input', updateSummary);
            }
        });

        // Initial summary update
        updateSummary();

        // Form submission
        document.getElementById('packageCreateForm')?.addEventListener('submit', (e) => {
            e.preventDefault();
            
            // Validate required fields
            if (!packageName.value.trim()) {
                alert('Please enter a package name');
                packageName.focus();
                return;
            }

            if (!amount.value) {
                alert('Please enter the package amount');
                amount.focus();
                return;
            }

            if (!personLimit.value) {
                alert('Please enter the person limit');
                personLimit.focus();
                return;
            }

            if (!hoursInPackage.value) {
                alert('Please enter the hours included in package');
                hoursInPackage.focus();
                return;
            }

            // Collect all form data
            const packageData = {
                name: packageName.value,
                amount: amount.value,
                personLimit: personLimit.value,
                penaltyFee: penaltyFee.value || 0,
                extraPersonAmount: extraPersonAmount.value || 0,
                hoursInPackage: hoursInPackage.value,
                extraHoursFee: extraHoursFee.value || 0
            };

            // Show summary and proceed to next step
            const confirmMessage = 
                `Package Details:\n\n` +
                `Name: ${packageData.name}\n` +
                `Amount: LKR ${parseInt(packageData.amount).toLocaleString()}\n` +
                `Person Limit: ${packageData.personLimit} people\n` +
                `Hours Included: ${packageData.hoursInPackage} hours\n` +
                `Extra Person Fee: LKR ${parseInt(packageData.extraPersonAmount).toLocaleString()} each\n` +
                `Extra Hour Fee: LKR ${parseInt(packageData.extraHoursFee).toLocaleString()} per hour\n` +
                `Penalty Fee: LKR ${parseInt(packageData.penaltyFee).toLocaleString()}\n\n` +
                `Proceed to next step?`;

            if (confirm(confirmMessage)) {
                alert('Moving to next step: Package Features');
                // window.location.href = 'package_features.php';
            }
        });
    });
</script>
<?php endif; ?>