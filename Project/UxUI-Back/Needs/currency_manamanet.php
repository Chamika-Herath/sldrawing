<script type="text/javascript">
    let currencty_maintain_map_name_list = new Map();
    let currencty_maintain_map_price_list = new Map();
    let currencty_maintain_map_id_list = new Map();



    function currencty_maintain_list(get_body_of_selector_obj) {
        preloader_show();
        $(get_body_of_selector_obj).empty();
        currencty_maintain_list_select('0', get_body_of_selector_obj, "<?php echo $company_obj->get_default_currency(); ?>");
        currencty_maintain_map_name_list.clear();
        currencty_maintain_map_price_list.clear();
        currencty_maintain_map_id_list.clear();
        currencty_maintain_map_name_list.set("0", "<?php echo $company_obj->get_default_currency(); ?>");
        currencty_maintain_map_price_list.set("0", "<?php echo $company_obj->get_default_currency(); ?>");
        currencty_maintain_map_id_list.set("<?php echo $company_obj->get_default_currency(); ?>", "0");
        var sending_value = "";
        $.ajax({
            url: "<?php echo $pth; ?>View-List/Currency/LIST_statement_list_of_currency.php",
            type: 'POST',
            data: sending_value,
            cache: false,
            success: function (data, textStatus, jqXHR) {
//                alert(data);
                var json = eval(data);
                for (var i = 0; i < json.length; i++) {
                    currencty_maintain_list_select(json[i].id, get_body_of_selector_obj, json[i].code_of_currency);
                    currencty_maintain_map_name_list.set(json[i].id, json[i].code_of_currency);
                    currencty_maintain_map_price_list.set(json[i].id, json[i].base_rate);
                    currencty_maintain_map_id_list.set(json[i].code_of_currency, json[i].id);
                }
                preloader_hide();

            }
        })
    }
    function currencty_maintain_list_select(id, get_body, currency_code) {
//        alert(currency_code);
        var option = document.createElement("option");
        option.setAttribute("value", id);
        option.appendChild(document.createTextNode(currency_code));
        get_body.appendChild(option);
    }
    function  currencty_maintain_modal_open(get_body_of_selector_obj) {

        if (get_body_of_selector_obj.value == "0") {
            var st_body_02_02_B_obj = document.getElementById("st_body_02_02_B");

            if (st_body_02_02_B_obj) {
                if (st_body_02_02_B_obj.style.display === "block") {
                    
                    st_body_02_02_B_currency_chnage_for_currencty_select_and_update();

                }
            } else {
                console.log("Element not found");
            }
        } else {

            fetch('https://open.er-api.com/v6/latest/' + currencty_maintain_map_name_list.get(get_body_of_selector_obj.value))
                    .then(response => response.json())
                    .then(data => {
//                    rate_online_update = data.rates.LKR;

                        document.getElementById("currencty_maintain_list_ID").value = get_body_of_selector_obj.value;
                        document.getElementById("currencty_maintain_list_CHANGE_CURRENCY").value = currencty_maintain_map_name_list.get(get_body_of_selector_obj.value);
                        document.getElementById("currencty_maintain_list_CHANGE_CURRENCY_RATE").value = currencty_maintain_map_price_list.get(get_body_of_selector_obj.value);

                        var currencty_maintain_list_myModalbody_heading_obj = document.getElementById("currencty_maintain_list_myModalbody_heading");
                        $(currencty_maintain_list_myModalbody_heading_obj).empty();
                        currencty_maintain_list_myModalbody_heading_obj.appendChild(document.createTextNode(currencty_maintain_map_name_list.get(get_body_of_selector_obj.value) + " To " + document.getElementById("currencty_maintain_list_BASE_CURRENCY").value + " Exchange Rate"));

                        var currencty_maintain_list_myModalbody_ONLINE_RATE_obj = document.getElementById("currencty_maintain_list_myModalbody_ONLINE_RATE");
                        $(currencty_maintain_list_myModalbody_ONLINE_RATE_obj).empty();
                        currencty_maintain_list_myModalbody_ONLINE_RATE_obj.appendChild(document.createTextNode(decimal_format(data.rates.LKR)));

                        $("#currencty_maintain_list_myModal").modal('show');

                        document.getElementById("currencty_maintain_list_myModalbody_LAST_UPDATE_TXT").value = currencty_maintain_map_price_list.get(get_body_of_selector_obj.value);

                    })
                    .catch(error => console.error('Error:', error));
        }
    }


    function currencty_maintain_modal_cancel() {
        $("#currencty_maintain_list_myModal").modal('hide');
    }

    function currencty_maintain_modal_process() {
        var id = document.getElementById("currencty_maintain_list_ID");//currency_id
        var rate = document.getElementById("currencty_maintain_list_myModalbody_LAST_UPDATE_TXT").value;
        if (rate == "") {
            create_error_without_field('currencty_maintain_list_myModalbody_error_msg', "rate feild cant be empty");
        } else {
            var sending_value = "id=" + id.value + "&update_rate=" + rate;
            $.ajax({
                url: "<?php echo $pth; ?>View-List/Currency/ADD_UPDATE_statement_list_of_currency.php",
                type: 'POST',
                data: sending_value,
                cache: false,
                success: function (data, textStatus, jqXHR) {
//                alert(data);
                    var json = eval(data);
                    if (json.length == 0) {
                        currencty_maintain_modal_cancel();
                        currencty_maintain_map_price_list.set(id.value, rate);
                        document.getElementById("currencty_maintain_list_CHANGE_CURRENCY_RATE").value = id.value;
//                        -----------------------statement main page------------------------------------
                        var st_body_02_02_B_obj = document.getElementById("st_body_02_02_B");

                        if (st_body_02_02_B_obj) {
                            if (st_body_02_02_B_obj.style.display === "block") {
                                st_body_02_02_B_currency_chnage_for_currencty_select_and_update();
                            }
                        } else {
                            console.log("Element not found");
                        }
//                        ------------------------------------------------------------------------------


                    } else {
                        create_error_without_field('error_msg', json[0].error);
                    }
                }
            });
        }

    }
</script>

<input type="hidden" id="currencty_maintain_list_ID">
<input type="hidden" id="currencty_maintain_list_BASE_CURRENCY" value="<?php echo $company_obj->get_default_currency(); ?>">
<input type="hidden" id="currencty_maintain_list_CHANGE_CURRENCY">
<input type="hidden" id="currencty_maintain_list_CHANGE_CURRENCY_RATE">


<div class="modal fade w3-white w3-opacity w3-right" data-backdrop="static" data-keyboard="false" id="currencty_maintain_list_myModal" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content w3-theme-l4">
            <div class="modal-body" id="currencty_maintain_list_myModalbody">
                <div class="container-fluid">
                    <div class="row w3-theme-dark w3-padding-16">
                        <div class="col-lg-10 w3-xlarge w3-strong w3-header"  id="currencty_maintain_list_myModalbody_heading">

                        </div>
                        <div class="col-lg-2"></div>
                    </div>
                    <div class="row w3-theme-l5">
                        <div class="col-lg-12">
                            <div class="container-fluid w3-padding-16">
                                <div class="row w3-padding-16 w3-theme-l3 w3-margin-top">
                                    <div class="col-lg-4 w3-strong w3-large">
                                        Current Rate 
                                    </div>
                                    <div class="col-lg-2 w3-center">
                                        :
                                    </div>
                                    <div class="col-lg-6 w3-right-align w3-strong w3-large" id="currencty_maintain_list_myModalbody_ONLINE_RATE">

                                    </div>
                                </div>
                                <div class="row w3-padding-16 w3-theme-l3 w3-margin-top">
                                    <div class="col-lg-4 w3-strong w3-padding">
                                        Last Update 
                                    </div>
                                    <div class="col-lg-2 w3-center w3-padding">
                                        :
                                    </div>
                                    <div class="col-lg-6 w3-right-align">
                                        <input type="number" class="w3-round w3-theme-border w3-input w3-right-align w3-border " id="currencty_maintain_list_myModalbody_LAST_UPDATE_TXT" placeholder="your base cuurencty exachange rate id">
                                    </div>
                                </div>
                                <!------------------------->
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="w3-panel w3-red" id="currencty_maintain_list_myModalbody_error_msg_body" style="display: none;">
                                            <h3>Error Message!</h3>
                                            <p id="currencty_maintain_list_myModalbody_error_msg">Green often indicates something successful or positive.</p>
                                        </div>
                                    </div>
                                </div>
                                <!------------------------->

                            </div>
                        </div>
                    </div>
                    <div class="row w3-margin-top w3-margin-bottom">
                        <div class="col-lg-4">
                            <button class="w3-button w3-round w3-padding-16 w3-theme-dark w3-block w3-strong" onclick="currencty_maintain_modal_cancel()">
                                Cancel 
                            </button>
                        </div>
                        <div class="col-lg-8">
                            <button class="w3-button w3-round w3-padding-16 w3-theme-dark w3-block w3-strong" onclick="currencty_maintain_modal_process()">
                                Update Currency Rates 
                            </button>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
</div>