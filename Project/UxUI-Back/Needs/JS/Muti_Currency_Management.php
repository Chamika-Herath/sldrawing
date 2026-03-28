<!-- C:\xampp\htdocs\MWOA\UxUI-Back\Needs\JS\Muti_Currency_Management.php -->
<?php
$company_obj = new Company_Info_Variable_List();
?>
<script type="text/javascript">
    function get_currency_name_and_value_to_base_currency(get_currency_code_name, value_of_currency_amount) {
        var get_base_rate = currency_code_with_base_rate.get(get_currency_code_name);
        console.log(get_base_rate + " " + get_currency_code_name + " get_currency_name_and_value_to_base_currency");
        var get_base_rate_amount = value_of_currency_amount * get_base_rate;
        console.log(get_base_rate_amount + " " + get_currency_code_name + " get_currency_name_and_value_to_base_currency");
        return get_base_rate_amount;
    }

    function get_currency_name_and_value_to_target_currency(get_currency_code_name, value_of_base_currency_amount) {
        var get_target_rate = currency_code_with_base_rate.get(get_currency_code_name);
        console.log(get_target_rate + " " + get_currency_code_name + " get_currency_name_and_value_to_target_currency");
        var get_target_rate_amount = value_of_base_currency_amount / get_target_rate;
        console.log(get_target_rate_amount + " " + get_currency_code_name + " get_currency_name_and_value_to_target_currency");
        return get_target_rate_amount;
    }

    function get_final_out_put_currency_name_and_value(get_currency_code_name, value_of_currency_amount) {
        // alert("line 20"+get_currency_code_name + " " + value_of_currency_amount);
        var currency_with_price = "Not Found";
        var get_target_currency_code = document.getElementById("target_currency_code").value;
        var get_base_currency_code = document.getElementById("base_currency_code").value;
        var support_currency_select_obj = document.getElementById("support_currency_select");
        var need_currency_code = support_currency_select_obj.value;

        // alert(need_currency_code);

        console.log("get_currency_code_name: " + get_currency_code_name + " need_currency_code: " + need_currency_code + " " + "Muti_Currency_Management line 24");
        if (get_currency_code_name == need_currency_code) {
            currency_with_price = get_currency_code_name + " " + decimal_format(value_of_currency_amount);
        }
        if (get_base_currency_code == need_currency_code) {
            // alert("here");
            var calulation_of_base_currenty = parseFloat(value_of_currency_amount) * parseFloat(currency_code_with_base_rate.get(get_currency_code_name));
            // alert("line 37--"+calulation_of_base_currenty + " -- " + currency_code_with_base_rate.get(get_currency_code_name) + " -- " + get_currency_code_name);
            currency_with_price = get_base_currency_code + " " + decimal_format(calulation_of_base_currenty);
            // alert(currency_with_price);
        } else {
            var get_base_currency_amount = 0;
            var get_target_currency_amount = 0;

            if (get_base_currency_code == get_currency_code_name) {
                get_base_currency_amount = value_of_currency_amount;
                console.log(get_base_currency_amount + "Muti_Currency_Management line 33");

            } else {
                get_base_currency_amount = get_currency_name_and_value_to_base_currency(get_currency_code_name, value_of_currency_amount);
                console.log(get_base_currency_amount);
            }
            get_target_currency_amount = get_currency_name_and_value_to_target_currency(need_currency_code, get_base_currency_amount);
            console.log(get_target_currency_amount);
            currency_with_price = need_currency_code + " " + decimal_format(get_target_currency_amount);

        }
        return currency_with_price;
    }

    function get_final_out_put_currency_value(get_currency_code_name, value_of_currency_amount) {
        var currency_with_price = "Not Found";
        var get_target_currency_code = document.getElementById("target_currency_code").value;
        var get_base_currency_code = document.getElementById("base_currency_code").value;
        var support_currency_select_obj = document.getElementById("support_currency_select");
        var need_currency_code = support_currency_select_obj.value;

        // alert(need_currency_code);

        console.log("get_currency_code_name: " + get_currency_code_name + " need_currency_code: " + need_currency_code + " " + "Muti_Currency_Management line 24");
        if (get_currency_code_name == need_currency_code) {
            currency_with_price = decimal_format(value_of_currency_amount);
        } else {
            var get_base_currency_amount = 0;
            var get_target_currency_amount = 0;

            if (get_base_currency_code == get_currency_code_name) {
                get_base_currency_amount = value_of_currency_amount;
                console.log(get_base_currency_amount + "Muti_Currency_Management line 33");

            } else {
                get_base_currency_amount = get_currency_name_and_value_to_base_currency(get_currency_code_name, value_of_currency_amount);
                console.log(get_base_currency_amount);
            }
            get_target_currency_amount = get_currency_name_and_value_to_target_currency(need_currency_code, get_base_currency_amount);
            console.log(get_target_currency_amount);
            currency_with_price = decimal_format(get_target_currency_amount);

        }
        return currency_with_price;
    }
</script>

<input type="hidden" id="base_currency_code" value="<?php echo $company_obj->get_default_currency(); ?>">


<?php
$target_currency_code = isset($_SESSION['target_currency_code']) ? $_SESSION['target_currency_code'] : "USD";

?>


<input type="hidden" id="target_currency_code" value="<?php echo $target_currency_code; ?>">





<!-- ----------converting currency---------- -->