<script type="text/javascript">

    const set_id_with_currency_code = new Map();
    const set_id_with_currency_name = new Map();
    const set_id_with_currency_base_rate = new Map();
    const currency_code_with_base_rate = new Map();


    // function get_currency_listing_data(get_body_id_name) {
    //     console.log("1");
    //     var get_body_id_name_obj = document.getElementById(get_body_id_name);
    //     if (get_body_id_name_obj) {
    //         $(get_body_id_name_obj).empty();
    //         set_id_with_currency_code.clear();
    //         set_id_with_currency_name.clear();
    //         set_id_with_currency_base_rate.clear();
    //         currency_code_with_base_rate.clear();
    //         console.log("2");
    //         var current_base_currency = document.getElementById("get_currency_listing_data_crrent_base_currency").value;
    //         var current_base_country_name = document.getElementById("get_currency_listing_data_crrent_base_crountry_name").value;

    //         $.ajax({
    //             url: "<?php //echo $pth; ?>View-List/Currency/LIST_statement_list_of_currency.php",
    //             type: "POST",
    //             cache: false,
    //             success: function (response) {
    //                 console.log(response);
    //                 // alert(response);
    //                 get_currency_listing_data_listing_to_body(get_body_id_name_obj, "0", current_base_country_name, current_base_currency, "0");
    //                 var json = JSON.parse(response);
    //                 for (var i = 0; i < json.length; i++) {
    //                     var row = json[i];
    //                     var currency_id = row.id;
    //                     var currencty_name = row.currencty_name;
    //                     var code_of_currency = row.code_of_currency;
    //                     var base_rate = row.base_rate;
    //                     get_currency_listing_data_listing_to_body(get_body_id_name_obj, currency_id, currencty_name, code_of_currency, base_rate);
    //                 }
    //                 get_body_id_name_obj.value = document.getElementById("target_currency_code").value;
    //             }
    //         });
    //     }

    function get_currency_listing_data(get_body_id_name) {
        return new Promise(function (resolve, reject) {
            console.log("1");
            // alert("47");
            var get_body_id_name_obj = document.getElementById(get_body_id_name);
            var get_body_id_name_obj_mobile = document.getElementById(get_body_id_name + "_mobile");
            if (get_body_id_name_obj && get_body_id_name_obj_mobile) {
                $(get_body_id_name_obj).empty();
                set_id_with_currency_code.clear();
                set_id_with_currency_name.clear();
                set_id_with_currency_base_rate.clear();
                currency_code_with_base_rate.clear();
                console.log("2");
                // alert("48");
                var current_base_currency = document.getElementById("get_currency_listing_data_crrent_base_currency").value;
                var current_base_country_name = document.getElementById("get_currency_listing_data_crrent_base_crountry_name").value;

                $.ajax({
                    url: "<?php echo $pth; ?>View-List/Currency/LIST_statement_list_of_currency.php",
                    type: "POST",
                    cache: false,
                    success: function (response) {
                        // alert("49" + response);
                        console.log(response);
                        get_currency_listing_data_listing_to_body(get_body_id_name_obj,get_body_id_name_obj_mobile, "0", current_base_country_name, current_base_currency, "0");
                        var json = JSON.parse(response);
                        for (var i = 0; i < json.length; i++) {
                            var row = json[i];
                            var currency_id = row.id;
                            var currencty_name = row.currencty_name;
                            var code_of_currency = row.code_of_currency;
                            var base_rate = row.base_rate;
                            get_currency_listing_data_listing_to_body(get_body_id_name_obj,get_body_id_name_obj_mobile, currency_id, currencty_name, code_of_currency, base_rate);
                        }
                        var target_currency_obj = document.getElementById("target_currency_code");
                        if (target_currency_obj) {
                             get_body_id_name_obj.value = target_currency_obj.value;
                             get_body_id_name_obj_mobile.value = target_currency_obj.value;
                        } else {
                             // Fallback to base currency if target not found
                             get_body_id_name_obj.value = current_base_currency;
                             get_body_id_name_obj_mobile.value = current_base_currency;
                        }

                        resolve(); // ✅ done
                    },
                    error: function (xhr, status, error) {
                        console.error("Currency AJAX error:", error);
                        reject(error); // ❗ optional error handling
                    }
                });
            } else {
                reject("Element not found: " + get_body_id_name);
            }
        });
    }



    function get_currency_listing_data_listing_to_body(get_body_id_name_obj,get_body_id_name_obj_mobile, id, currencty_name, code_of_currency, base_rate) {
        console.log("3");
        set_id_with_currency_code.set(id, code_of_currency);
        set_id_with_currency_name.set(id, currencty_name);
        set_id_with_currency_base_rate.set(id, base_rate);
        currency_code_with_base_rate.set(code_of_currency, base_rate);
        console.log("4");
        var option_obj = document.createElement("option");
        option_obj.value = code_of_currency;
        option_obj.appendChild(document.createTextNode(currencty_name + " (" + code_of_currency + ")"));
        get_body_id_name_obj.appendChild(option_obj);
        var option_obj_mobile = document.createElement("option");
        option_obj_mobile.value = code_of_currency;
        option_obj_mobile.appendChild(document.createTextNode(currencty_name + " (" + code_of_currency + ")"));
        get_body_id_name_obj_mobile.appendChild(option_obj_mobile);
        console.log("5");
    }
</script>

<input type="hidden" id="get_currency_listing_data_crrent_base_currency"
    value="<?php echo $company_obj->get_default_currency(); ?>">
<input type="hidden" id="get_currency_listing_data_crrent_base_crountry_name"
    value="<?php echo $company_obj->get_default_country_name(); ?>">
<input type="hidden" id="set_currency_data">