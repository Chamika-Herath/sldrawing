    <?php
    include_once '../../imports/need/DB.php';
    include_once '../../Controllers/Main/main_user_login/main_user_login_SINGLE_DATA.php';
    include_once '../../Controllers/Main/main_user_account_access_level_list/main_user_account_access_level_list_SINGLE_DATA.php';

    $current_user_id_profile = $_SESSION['user_id'] ?? 0;
    $user_data_obj_profile = new main_user_login_SINGLE_DATA($current_user_id_profile);

    $u_first_name = $user_data_obj_profile->get_first_name();
    $u_last_name = $user_data_obj_profile->get_last_name();
    $u_name = trim($u_first_name . ' ' . $u_last_name);
    if ($u_name == "") {
        $u_name = $user_data_obj_profile->get_user_name();
    }
    $u_email = $user_data_obj_profile->get_user_name();
    $u_phone = $user_data_obj_profile->get_phone_number();
    $u_bio = $user_data_obj_profile->get_dis();
    $u_sdt_raw = $user_data_obj_profile->get_sdt();
    $u_joined = ($u_sdt_raw != null && $u_sdt_raw != "") ? date("F j, Y", strtotime($u_sdt_raw)) : "N/A";

    $user_access_level_id = $user_data_obj_profile->get_main_user_account_access_level_list_id();
    $access_obj_profile = new main_user_account_access_level_list_SINGLE_DATA($user_access_level_id);
    $u_role = $access_obj_profile->get_job_role() ? $access_obj_profile->get_job_role() : "User";
    $u_department = $access_obj_profile->get_type_of_access() ? $access_obj_profile->get_type_of_access() : "General";
    ?>
    <div class="erp-container erp-container--profile">
        <input type="hidden" id="User_Profile_A_01_val_17" value="">
        <input type="hidden" id="User_Profile_A_01_val_18" value="">
        <input type="hidden" id="User_Profile_A_01_val_19_otp" value="">
        <input type="hidden" id="User_Profile_A_01_val_20" value="">
        <div class="erp-profile-card">
            <!-- Header Section: Displays page title -->
            <div class="erp-profile-card__header" style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 15px;">
                <div>
                    <h1 class="erp-profile-card__title">User Profile</h1>
                    <p class="erp-profile-card__subtitle">Manage your account settings and preferences</p>
                </div>
                <button class="erp-btn erp-btn--secondary" type="button" onclick="window.location.href='<?php echo $home_page ?? '/'; ?>'">
                    <i class="fas fa-home"></i>
                    <span>Back to Home</span>
                </button>
            </div>

            <!-- Main Body: Contains the profile content -->
            <div class="erp-profile-card__body">
                <form class="erp-form" method="POST">

                    <!-- Profile Header: Picture and basic info -->
                    <div class="erp-profile-header">
                        <div class="erp-profile-picture">
                            <div class="erp-profile-picture__wrapper">
                                <input type="hidden" id="User_Profile_A_01_from_id_image_pth_txt" value="0">
                                <?php $get_image_form_id_setup = "User_Profile_A_01_from_id" ?>

                                <!-- Profile Picture -->
                                <img src=""
                                    alt="Profile Picture"
                                    class="erp-profile-picture__img"
                                    id="profile-image"
                                    style="display: none;">

                                <!-- Default Icon -->
                                <div class="erp-profile-picture__default" id="profile-default">
                                    <i class="fas fa-user"></i>
                                </div>

                                <!-- Hidden File Input -->
                                <input type="file"
                                    id="profile-upload"
                                    name="image_uploder_image"
                                    class="erp-profile-picture__upload-input"
                                    accept="image/*"
                                    hidden>


                            </div>

                            <!-- Upload Button -->
                            <div class="erp-profile-picture__upload" id="<?php echo $get_image_form_id_setup ?>_uploadTrigger">
                                <i class="fas fa-camera"></i>
                            </div>
                        </div>


                        <div class="erp-profile-info">
                            <h2 class="erp-profile-info__name" id="User_Profile_A_01_val_02"><?php echo htmlspecialchars($u_name); ?></h2>
                            <p class="erp-profile-info__role" id="User_Profile_A_01_val_03"><?php echo htmlspecialchars($u_role); ?></p>

                            <div class="erp-profile-info__meta">
                                <div class="erp-profile-info__meta-item">
                                    <i class="fas fa-envelope erp-profile-info__meta-icon"></i>
                                    <span id="User_Profile_A_01_val_04"><?php echo htmlspecialchars($u_email); ?></span>
                                </div>
                                <div class="erp-profile-info__meta-item">
                                    <i class="fas fa-calendar-alt erp-profile-info__meta-icon"></i>
                                    <span>Joined:<span id="User_Profile_A_01_val_07"> <?php echo htmlspecialchars($u_joined); ?></span></span>
                                </div>
                            </div>

                            <p class="erp-profile-info__bio" id="User_Profile_A_01_val_08">
                                <?php echo htmlspecialchars($u_bio); ?>
                            </p>
                        </div>
                    </div>

                    <!-- Personal Information Form -->
                    <div class="erp-form__section">
                        <h3 class="erp-form__section-title">Personal Information</h3>

                        <div class="erp-form__grid">
                            <div class="erp-form__group">
                                <label class="erp-form__label">First Name</label>
                                <div class="erp-input-wrapper">
                                    <i class="fas fa-user erp-form__icon"></i>
                                    <input
                                        type="text"
                                        class="erp-form__control erp-form__control--with-icon"
                                        value="<?php echo htmlspecialchars($u_first_name); ?>"
                                        id="User_Profile_A_01_val_09"
                                        aria-label="First Name">
                                </div>
                            </div>

                            <div class="erp-form__group">
                                <label class="erp-form__label">Last Name</label>
                                <div class="erp-input-wrapper">
                                    <i class="fas fa-user erp-form__icon"></i>
                                    <input
                                        type="text"
                                        class="erp-form__control erp-form__control--with-icon"
                                        value="<?php echo htmlspecialchars($u_last_name); ?>"
                                        id="User_Profile_A_01_val_10"
                                        aria-label="Last Name">
                                </div>
                            </div>

                            <div class="erp-form__group">
                                <label class="erp-form__label">Email Address</label>
                                <div class="erp-input-wrapper">
                                    <i class="fas fa-envelope erp-form__icon"></i>
                                    <input
                                        type="email"
                                        class="erp-form__control erp-form__control--with-icon"
                                        value="<?php echo htmlspecialchars($u_email); ?>"
                                        id="User_Profile_A_01_val_11"
                                        disabled
                                        aria-label="Email Address">
                                </div>
                            </div>

                            <div class="erp-form__group">
                                <label class="erp-form__label">Phone Number</label>
                                <div class="erp-input-wrapper">
                                    <i class="fas fa-phone erp-form__icon"></i>
                                    <input
                                        type="tel"
                                        class="erp-form__control erp-form__control--with-icon"
                                        value="<?php echo htmlspecialchars($u_phone); ?>"
                                        id="User_Profile_A_01_val_12"
                                        aria-label="Phone Number">
                                </div>
                            </div>








                        </div>



                    </div>




                    <!-- Security Settings Section -->
                    <div class="erp-form__section">
                        <h3 class="erp-form__section-title">Security Settings</h3>

                        <div class="erp-security-settings">
                            <div class="erp-security-item">
                                <div class="erp-security-item__info">
                                    <div class="erp-security-item__title">Password</div>
                                    <div class="erp-security-item__description">Last changed 30 days ago</div>
                                </div>
                                <div class="erp-security-item__status">
                                    <span class="erp-status-badge erp-status-badge--enabled">Active</span>
                                    <button class="erp-btn erp-btn--secondary" type="button"
                                        onclick="window.location.href='<?php echo $home_page ?><?php echo $User_login_url ?>change-password<?php echo $online_offline_extention;  ?>'">
                                        <i class="fas fa-key"></i>
                                        <span>Change</span>
                                    </button>

                                </div>
                            </div>

                            <div class="erp-security-item">
                                <div class="erp-security-item__info">
                                    <div class="erp-security-item__title">Two-Factor Authentication</div>
                                    <div class="erp-security-item__description">Add an extra layer of security to your account</div>
                                </div>
                                <div class="erp-security-item__status">
                                    <span class="erp-status-badge erp-status-badge--disabled" id="two-factor-auth-status">Disabled</span>
                                    <button class="erp-btn erp-btn--secondary" type="button" id="two-factor-auth-toggle" onclick="send_two_step_verification_sms()">
                                        <i class="fas fa-shield-alt"></i>
                                        <span>Enable</span>
                                    </button>
                                </div>
                            </div>

                            <div id="two-factor-auth-fields" style="display: none; padding-top: var(--erp-space-lg);">
                                <div class="erp-form__grid">
                                    <div class="erp-form__group">
                                        <label class="erp-form__label">Phone Number for 2FA</label>
                                        <div class="erp-input-wrapper">
                                            <i class="fas fa-mobile-alt erp-form__icon"></i>
                                            <input
                                                type="tel"
                                                class="erp-form__control erp-form__control--with-icon"
                                                placeholder="Enter phone number"
                                                value="<?php echo htmlspecialchars($u_phone); ?>"
                                                id="two-factor-phone-number"
                                                disabled
                                                aria-label="Phone Number for Two-Factor Authentication">
                                        </div>
                                    </div>
                                    <div class="erp-form__group">
                                        <label class="erp-form__label">Verification Code (OTP)</label>
                                        <div class="erp-input-wrapper">
                                            <i class="fas fa-key erp-form__icon"></i>
                                            <input
                                                type="text"
                                                class="erp-form__control erp-form__control--with-icon"
                                                placeholder="Enter OTP"
                                                id="two-factor-otp"
                                                aria-label="One-Time Password">
                                        </div>
                                    </div>

                                </div>
                                <div class="erp-profile-actions" style="border-top: none; padding-top: 0;">
                                    <button class="erp-btn erp-btn--primary" type="button" id="two-factor-verify-btn" onclick="send_two_step_verification_check_otp()">
                                        <i class="fas fa-check-circle"></i>
                                        <span>Verify 2FA</span>
                                    </button>
                                </div>
                            </div>


                            <!-- Google Authentication Section -->
                            <div class="erp-security-item">
                                <div class="erp-security-item__info">
                                    <div class="erp-security-item__title">Google Authentication</div>
                                    <div class="erp-security-item__description">Add an extra layer of security to your account</div>
                                </div>
                                <div class="erp-security-item__status">
                                    <span class="erp-status-badge erp-status-badge--disabled" id="google-auth-status">Not Connected</span>
                                    <!-- Google Authentication Button -->
                                    <button class="erp-btn erp-btn--google" type="button" id="google-auth-btn" onclick="Actions_google_authantication()">
                                        <i class="fab fa-google"></i>
                                        <span>Enable</span>
                                    </button>
                                </div>
                            </div>


                            <div id="google-auth-qr-section" style="display: none; padding-top: var(--erp-space-lg); text-align: center;">
                                <img src="" alt="QR Code" style="margin-bottom: var(--erp-space-md);" id="User_Profile_A_01_val_16">
                                <div class="erp-form__group">
                                    <label class="erp-form__label">Enter Google Authenticator Code</label>
                                    <div class="erp-input-wrapper" style="max-width: 300px; margin: 0 auto;">
                                        <i class="fas fa-key erp-form__icon"></i>
                                        <input
                                            type="text"
                                            class="erp-form__control erp-form__control--with-icon"
                                            placeholder="Enter 6-digit code"
                                            id="google-auth-otp"
                                            aria-label="Google Authenticator OTP">
                                    </div>
                                </div>
                                <div class="erp-profile-actions" style="border-top: none; padding-top: 0; justify-content: center;">
                                    <button class="erp-btn erp-btn--primary" type="button" id="google-auth-verify-btn" onclick="veryfy_google_authentication()">
                                        <i class="fas fa-check-circle"></i>
                                        <span>Verify Code</span>
                                    </button>
                                </div>
                            </div>


                            <div class="erp-security-item">
                                <div class="erp-security-item__info">
                                    <div class="erp-security-item__title">Active Sessions</div>
                                    <div class="erp-security-item__description"><span id="User_Profile_A_01_val_21">3 </span> devices currently signed in</div>
                                </div>
                                <div class="erp-security-item__status">
                                    <button class="erp-btn erp-btn--secondary" type="button" onclick="window.location.href='<?php echo $home_page ?><?php echo $User_login_url ?>manage-logged-devices<?php echo $online_offline_extention;  ?>'">
                                        <i class="fas fa-desktop"></i>
                                        <span>Manage</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Notification Settings -->
                    <div class="erp-form__section" style="display: none;">
                        <h3 class="erp-form__section-title">Notification Preferences</h3>

                        <div class="erp-notification-settings">
                            <div class="erp-notification-item">
                                <div class="erp-notification-item__info">
                                    <i class="fas fa-envelope erp-profile-info__meta-icon"></i>
                                    <span>Email Notifications</span>
                                </div>
                                <label class="erp-switch">
                                    <input type="checkbox" checked>
                                    <span class="erp-switch__slider"></span>
                                </label>
                            </div>



                            <div class="erp-notification-item">
                                <div class="erp-notification-item__info">
                                    <i class="fas fa-comment-dots erp-profile-info__meta-icon"></i>
                                    <span>Message Alerts</span>
                                </div>
                                <label class="erp-switch">
                                    <input type="checkbox" checked>
                                    <span class="erp-switch__slider"></span>
                                </label>
                            </div>

                            <div class="erp-notification-item" style="display: none;">
                                <div class="erp-notification-item__info">
                                    <i class="fas fa-bell erp-profile-info__meta-icon"></i>
                                    <span>Push Notifications</span>
                                </div>
                                <label class="erp-switch">
                                    <input type="checkbox" checked>
                                    <span class="erp-switch__slider"></span>
                                </label>
                            </div>

                            <div class="erp-notification-item" style="display: none;">
                                <div class="erp-notification-item__info">
                                    <i class="fas fa-tasks erp-profile-info__meta-icon"></i>
                                    <span>Task Reminders</span>
                                </div>
                                <label class="erp-switch">
                                    <input type="checkbox">
                                    <span class="erp-switch__slider"></span>
                                </label>
                            </div>
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="erp-profile-actions">
                        <button class="erp-btn erp-btn--secondary erp-btn--block-mobile" type="button">
                            <i class="fas fa-times"></i>
                            <span>Cancel</span>
                        </button>
                        <button class="erp-btn erp-btn--primary erp-btn--block-mobile" type="submit">
                            <i class="fas fa-save"></i>
                            <span>Save Changes</span>
                        </button>
                    </div>
                </form>

            </div>

        </div>

        <!-- Footer: Displays copyright and version info -->
        <div class="erp-profile-card__footer">
            <p class="erp-footer__copyright" id="copyright">© <span id="current-year"></span> <?php echo $company_obj->get_compnay_name() ?></p>
        </div>
    </div>


    <!-- JavaScript for profile page functionality -->
    <script>
    </script>