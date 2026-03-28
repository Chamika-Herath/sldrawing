<style>
    #x_cb {
        position: fixed;
        bottom: 20px;
        left: 50%;
        transform: translateX(-50%);
        max-width: 600px;
        width: calc(100% - 40px);
        background: #fff;
        color: #333;
        border-radius: 12px;
        box-shadow: 0 8px 24px rgba(0, 0, 0, 0.15);
        padding: 16px 24px;
        z-index: 9999;
        font-family: sans-serif;
        display: flex;
        flex-direction: column;
        gap: 12px;
        animation: x_fIn 0.4s ease-out;
    }

    @keyframes x_fIn {
        from {
            opacity: 0;
            transform: translate(-50%, 20px);
        }

        to {
            opacity: 1;
            transform: translate(-50%, 0);
        }
    }

    #x_cb p {
        margin: 0;
        font-size: 15px;
        line-height: 1.5;
    }

    .x_ct {
        display: flex;
        justify-content: flex-end;
        gap: 10px;
        flex-wrap: wrap;
    }

    .x_b1 {
        padding: 8px 16px;
        border: none;
        border-radius: 8px;
        font-size: 14px;
        cursor: pointer;
        transition: all 0.2s ease;
    }

    .x_a {
        background-color: #4CAF50;
        color: #fff;
    }

    .x_r {
        background-color: #f44336;
        color: #fff;
    }

    .x_n {
        background-color: #555;
        color: #fff;
    }

    .x_b1:hover {
        opacity: 0.9;
    }

    @media (prefers-color-scheme: dark) {
        #x_cb {
            background: #222;
            color: #eee;
        }
    }
</style>
<input type="hidden" id="cook_data_ip" value="">
<input type="hidden" id="cook_data_country" value="">
<input type="hidden" id="cook_data_city" value="">
<input type="hidden" id="cook_data_timezone" value="">
<input type="hidden" id="cook_data_org" value="">

<script>
    var ip_address;
    $(document).ready(function() {
        // Step 1: Fetch IP address
        fetch('https://api.ipify.org?format=json')
            .then(response => response.json())
            .then(data => {
                const ip = data.ip;
                // Set the IP address in the input field with ID 'sys_01'
                document.getElementById("cook_data_ip").value = ip;
                console.log("IP Address: " + ip);
            })
            .catch(error => {
                console.error('Error fetching the IP address:', error);
            });
        let ip = document.getElementById("cook_data_ip").value; // Replace this with the actual IP

        fetch(`https://ipinfo.io/${ip}/json?token=dd2f449fa1a7fd`) // Replace 'YOUR_TOKEN' with your ipinfo.io token
            .then(response => response.json())
            .then(data => {
                // Output the country information
                console.log("Country:", data.country);
                // Example: Do something with the country information
                document.getElementById("cook_data_country").value = data.country + " - " + data.city + " - " + data.region + " (" + data.loc + ") ";
                document.getElementById("cook_data_timezone").value = data.timezone;
                document.getElementById("cook_data_org").value = data.org;
                document.getElementById("cook_data_city").value = data.city + " - " + data.region + " (" + data.loc + ") ";
            })
            .catch(error => {
                console.error('Error fetching location details:', error);
            });

    });
</script>


<?php
if (isset($_SESSION['process_cookie_yes_no'])) {
} else if (isset($_COOKIE['Web_View_Cookie_Yes_No'])) {
?>
    <script type="text/javascript">
        $(document).ready(function() {
            cookies_yes_no_process_ACCEPT();
        });
    </script>

<?php
} else {

?>
    <div id="x_cb">
        <p>We use cookies to ensure you get the best experience on our website. By clicking Accept, you consent to our use
            of cookies. You can change your cookie settings at any time.</p>
        <div class="x_ct">
            <button class="x_b1 x_a" onclick=cookies_yes_no_process_ACCEPT()>Accept</button>
            <button class="x_b1 x_r" onclick="cookies_yes_no_process_REJECT()">Reject</button>

        </div>
    </div>
<?php
}
?>

<script type="text/javascript">
    function cookies_yes_no_process_ACCEPT() {
        var sending_value = "accept=0&cook_data_ip=" + document.getElementById("cook_data_ip").value + "&cook_data_country=" + document.getElementById("cook_data_country").value + "&cook_data_timezone=" + document.getElementById("cook_data_timezone").value + "&cook_data_org=" + document.getElementById("cook_data_org").value + "&cook_data_city=" + document.getElementById("cook_data_city").value;
        // alert(sending_value);
        $.ajax({
            url: "<?php echo $pth; ?>View-List/Cookies_Manager/cookies_manager_reject_accept.php",
            type: "POST",
            data: sending_value,
            cache: false,
            success: function(response) {
                alert(response);
                var json = eval(response);
                if (json.length == 0) {} else {
                    if (json[0].cook_id == "Not_Found") {} else {
                        document.getElementById("cook_id").value = json[0].cook_id;
                        var x_cb_obj = document.getElementById("x_cb");
                        if (x_cb_obj) {
                            x_cb_obj.remove();
                        }
                    }
                }

            }
        });
        preloader_hide();
    }

    function cookies_yes_no_process_REJECT() {
        var sending_value = "reject=0&cook_data_ip=" + document.getElementById("cook_data_ip").value + "&cook_data_country=" + document.getElementById("cook_data_country").value + "&cook_data_timezone=" + document.getElementById("cook_data_timezone").value + "&cook_data_org=" + document.getElementById("cook_data_org").value + "&cook_data_city=" + document.getElementById("cook_data_city").value;
        alert(sending_value);
        $.ajax({
            url: "<?php echo $pth; ?>View-List/Cookies_Manager/cookies_manager_reject_accept.php",
            type: "POST",
            data: sending_value,
            cache: false,
            success: function(response) {
                // alert(response);
                var json = eval(response);
                if (json.length == 0) {} else {
                    if (json[0].cook_id == "Not_Found") {} else {
                        document.getElementById("cook_id").value = json[0].cook_id;
                        var x_cb_obj = document.getElementById("x_cb");
                        if (x_cb_obj) {
                            x_cb_obj.remove();
                        }
                    }
                }

            }
        });
        preloader_hide();
    }
</script>



<?php
$get_cook_id = "Not_Found";
if (isset($_COOKIE['Web_View_Cookie_Yes_No'])) {
    $get_cook_id = $_COOKIE['Web_View_Cookie_Yes_No'];
} else {
    $get_cook_id = isset($_SESSION['process_cookie_yes_no']) ? $_SESSION['process_cookie_yes_no'] : "Not_Found";
}
?>


<input type="hidden" id="cook_id" value="<?php echo $get_cook_id; ?>">