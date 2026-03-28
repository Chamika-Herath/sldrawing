<!-- C:\xampp\htdocs\MWOA\UxUI-Back\Needs\shopping_cart_managment.php -->
<script type="text/javascript">
    function quck_cart(get_item_serivice_list_id, get_qty, get_per_unit_weight,currenty_type_of_name , get_finalize_unit_selling_price) {
        // alert("quck_cart------currenty_type_of_name="+currenty_type_of_name);
        preloader_show();
        var return_value = "0";
        var sending_value = "id=" + get_item_serivice_list_id;
        $.ajax({
            url: "<?php echo $pth; ?>View-List/Item-Service/Item-Service-Management/Item-Service-Management_Load_SINGLE_data.php",
            type: "POST",
            data: sending_value,
            cache: false,
            success: function (response) {
                // alert(response);
                console.log(response);
                var json = eval(response);
                if (json.length == 0) {

                } else {
                    return_value = item_service_info_data_load(get_item_serivice_list_id, json[0].web_url_name, get_qty, get_per_unit_weight,currenty_type_of_name , get_finalize_unit_selling_price);
                    // procsee_item_data(json[0].id, json[0].main_user_login_id, json[0].production_state, json[0].item_state, json[0].service_satate, json[0].name, json[0].dis, json[0].ast, json[0].sdt, json[0].main_image, json[0].st_show_on_web, json[0].st_unique_id, json[0].st_item_variable, json[0].st_extra_image_state, json[0].st_bunding_un_bundling, json[0].st_advance, json[0].st_downloads, json[0].st_terms_and_condtion, json[0].st_extra_image, json[0].unique_id_auto, json[0].unique_id_manual, json[0].company_id, json[0].brand_state, json[0].web_url_name, json[0].web_seo_key_words, json[0].web_submit_for_search_eng, json[0].step_01, json[0].step_02, json[0].step_03, json[0].step_04, json[0].step_05, json[0].step_06, json[0].step_07, json[0].step_08, json[0].step_09, json[0].step_10, json[0].finish_state, json[0].main_barcode_id, json[0].selling_price_avarage, json[0].buy_price_avarage, json[0].is_printed_MRP, json[0].is_base_currency, json[0].is_other_currency, json[0].currency_name, json[0].active_state, json[0].no_of_salse, json[0].not_of_reviews);
                }
            }
        });
        return return_value;
    }


    function item_service_info_data_load(get_item_serivice_list_id, web_url_name, get_qty, get_per_unit_weight,currenty_type_of_name , get_finalize_unit_selling_price) {
        // alert("item_service_info_data_load------currenty_type_of_name="+currenty_type_of_name);
        var return_value = "0";
        var sending_value = "item_serivice_list_id=" + get_item_serivice_list_id;
        $.ajax({
            url: "<?php echo $pth; ?>View-List/Item-Service/Item-Service-Management/LIST/item_serivice_list_info_data_LIST.php",
            type: "POST",
            data: sending_value,
            cache: false,
            success: function (response) {
                console.log(response);
                // alert(response);
                var json = eval(response);
                if (json.length == 0) {
                    return_value = "0";
                } else if (json.length == 1) {
                    // alert("Only one item_serivice_list_info_data found. Adding to cart directly."+get_item_serivice_list_id+"---- "+json[0].id+"---- "+get_qty+"---- "+get_per_unit_weight+"-------- "+currenty_type_of_name+"---- "+get_finalize_unit_selling_price);
                    return_value = add_to_cart(get_item_serivice_list_id, json[0].id, get_qty, get_per_unit_weight,currenty_type_of_name ,get_finalize_unit_selling_price);

                } else {
                    return_value = "0";
                }
            }
        });
        preloader_hide();
        return return_value;
    }

    function get_item_serivice_list_info_data_load(get_item_serivice_list_id, web_url_name) {
        <?php if ($online_state) { ?>
            window.location.href = "<?php echo $pth; ?>Shop-Now.php?web_url_name=" + web_url_name;
        <?php } else { ?>
            window.location.href = "<?php echo $pth; ?>Shop-Now/" + web_url_name;
        <?php } ?>
    }

    function go_to_cart_page() {
        window.location.href = "<?php echo $pth; ?>My-Cart<?php echo $online_exnction; ?>";
    }

    function add_to_cart(get_item_serivice_list_id, get_item_serivice_list_info_data_id, get_qty,get_per_unit_weight,currenty_type_of_name ,get_finalize_unit_selling_price) {
        // alert(get_item_serivice_list_id+"----"+get_item_serivice_list_info_data_id+"----"+get_qty+"----"+get_per_unit_weight+"----"+currenty_type_of_name+"----"+get_finalize_unit_selling_price);
        var sending_value = "get_item_serivice_list_id=" + get_item_serivice_list_id + "&get_item_serivice_list_info_data_id=" + get_item_serivice_list_info_data_id + "&get_qty=" + get_qty +
         "&get_per_unit_weight=" + get_per_unit_weight + "&get_finalize_unit_selling_price=" + get_finalize_unit_selling_price+"&get_item_currency_type="+currenty_type_of_name;
        var return_value = "0";
//    alert(sending_value);
        if (get_item_serivice_list_id == "0" || get_item_serivice_list_info_data_id == "0") {
            return_value = "0";
        } else {


            if (document.getElementById("cook_id").value == "Not_Found") {
                cookies_yes_no_process_REJECT();
            } else {

            }
            $.ajax({
                url: "<?php echo $pth; ?>View-List/Cart/Process_Cart/Add_Update_Item_To_Cart.php",
                type: "POST",
                data: sending_value,
                cache: false,
                success: function (response) {
                //    alert(response);
                    get_cart_count_data();
                    console.log(response);
                    var json = eval(response);
                    if (json.length == 0) {
                        return_value = "0";
                    } else {
                        return_value = "1";
                    }
                }
            });
        }
        return return_value;
    }


    // function cart_add_data(input_num_feil_obj, get_cart_item_id, get_finalize_unit_selling_price) {
    //     var get_qty = parseFloat(input_num_feil_obj.value);
    //     get_qty++;
    //     showToast("Item Added To Cart");
    //     input_num_feil_obj.value = get_qty;
    //     update_cart_data(get_cart_item_id, get_qty, get_finalize_unit_selling_price);
    // }

    // function cart_minus_data(input_num_feil_obj, get_cart_item_id, get_finalize_unit_selling_price) {
    //     var get_qty = parseFloat(input_num_feil_obj.value);
    //     get_qty--;
    //     showToast("Item Removed From Cart");
    //     input_num_feil_obj.value = get_qty;
    //     if (get_qty == 0) {

    //     }
    //     update_cart_data(get_cart_item_id, get_qty, get_finalize_unit_selling_price);
    // }



    // function cart_remove_data(input_num_feil_obj, get_cart_item_id, get_finalize_unit_selling_price) {
    //     showToast("Item Removed From Cart");
    //     input_num_feil_obj.value = 0;
    //     update_cart_data(get_cart_item_id, 0, get_finalize_unit_selling_price);
    // }

    function cart_add_data(input_num_feil_obj, get_cart_item_id, get_per_unit_weight,currenty_type_of_name, get_finalize_unit_selling_price) {
        return new Promise((resolve, reject) => {
            try {
                
                var get_qty = parseFloat(input_num_feil_obj.value);
                get_qty++;
                showToast("Item Added To Cart");
                input_num_feil_obj.value = get_qty;
                const result = update_cart_data(get_cart_item_id, get_qty, get_per_unit_weight,currenty_type_of_name, get_finalize_unit_selling_price);
                resolve(result);
            } catch (error) {
                reject(error);
            }
        });
    }

    function cart_minus_data(input_num_feil_obj, get_cart_item_id, get_per_unit_weight, currenty_type_of_name,get_finalize_unit_selling_price) {
        return new Promise((resolve, reject) => {
            try {
                var get_qty = parseFloat(input_num_feil_obj.value);
                get_qty--;
                if (get_qty <= 0) {
                    get_qty = 0;
                    showToast("Item Removed From Cart");
                    input_num_feil_obj.value = get_qty;
                } else {
                    showToast("Item Removed From Cart");
                    input_num_feil_obj.value = get_qty;
                }

                const result = update_cart_data(get_cart_item_id, get_qty, get_per_unit_weight,currenty_type_of_name, get_finalize_unit_selling_price);
                resolve(result);
            } catch (error) {
                reject(error);
            }
        });
    }
    function cart_remove_data(input_num_feil_obj, get_cart_item_id, get_per_unit_weight,currenty_type_of_name, get_finalize_unit_selling_price) {
        return new Promise((resolve, reject) => {
            try {
                showToast("Item Removed From Cart");
                input_num_feil_obj.value = 0;
                const result = update_cart_data(get_cart_item_id, 0, get_per_unit_weight,currenty_type_of_name, get_finalize_unit_selling_price);
                resolve(result);

            } catch (error) {
                reject(error);
            }
        });
    }




    function update_cart_data(data_id, get_qty, get_per_unit_weight,currenty_type_of_name, get_finalize_unit_selling_price) {
        var sending_value = "get_cart_item_service_list_id=" + data_id + "&get_qty=" + get_qty + "&get_per_unit_weight=" + get_per_unit_weight + "&get_finalize_unit_selling_price=" + get_finalize_unit_selling_price
        +"&get_per_unit_weight="+get_per_unit_weight+"&get_item_currency_type="+currenty_type_of_name;
        // alert(sending_value);
        if (get_qty == 0) {
            sending_value = sending_value + "&remove_data=1";
        }
        var return_value = "0";
        $.ajax({
            url: "<?php echo $pth; ?>View-List/Cart/Process_Cart/UPDATA_DEL_Cart_Data.php",
            type: "POST",
            data: sending_value,
            cache: false,
            success: function (response) {
                // alert("update_cart_data line 150" + response);
                get_cart_count_data();
                console.log(response);
                // var json = eval(response);
            }
        });
    }


    function quik_buy_now(get_item_serivice_list_id, get_qty, get_per_unit_weight, get_finalize_unit_selling_price) {
        preloader_show();
        quck_cart(get_item_serivice_list_id, get_qty, get_per_unit_weight, get_finalize_unit_selling_price);
        window.location.href = "<?php echo $pth; ?>My-Cart<?php echo $online_exnction; ?>";
        get_cart_count_data();
        // preloader_hide();

    }
</script>