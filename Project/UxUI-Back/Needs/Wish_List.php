<script type="text/javascript">

    function add_item_to_wish_list(get_item_serivice_list_id, obj_wisht_list_btn,obj_whishlist_remove_btn) {
        var main_user_login_available_obj = document.getElementById("main_user_login_available");
        if (main_user_login_available_obj.value == "1") {
            var sending_value = "item_serivice_list_id=" + get_item_serivice_list_id;
            $.ajax({
                url: "<?php echo $pth; ?>View-List/Cart/Wish_List/cart_wish_list_item_service_ADD_UPDATE.php",
                type: "POST",
                data: sending_value,
                cache: false,
                success: function (response) {
                    console.log(response);
                    var json_data = JSON.parse(response);
                    if (json_data.length == 0) {
                        showToast("Item Added To Wish List");
                        obj_whishlist_remove_btn.style.display = "block";
                        obj_wisht_list_btn.style.display = "none";
                    } else {
                        obj_whishlist_remove_btn.style.display = "none";
                        obj_wisht_list_btn.style.display = "block";
                    }
                }
            });
        }
    }
    function remove_item_from_wish_list(get_item_serivice_list_id, obj_wisht_list_btn,obj_whishlist_remove_btn) {
        var main_user_login_available_obj = document.getElementById("main_user_login_available");
        if (main_user_login_available_obj.value == "1") {
            var sending_value = "item_serivice_list_id=" + get_item_serivice_list_id;
            $.ajax({
                url: "<?php echo $pth; ?>View-List/Cart/Wish_List/cart_wish_list_item_service_ADD_UPDATE.php",
                type: "POST",
                data: sending_value,
                cache: false,   
                success: function (response) {
                    console.log(response);
                    var json_data = JSON.parse(response);
                    if (json_data.length == 0) {
                        showToast("Item Removed From Wish List");
                        obj_whishlist_remove_btn.style.display = "none";
                        obj_wisht_list_btn.style.display = "block";
                    } else {
                        obj_whishlist_remove_btn.style.display = "block";
                        obj_wisht_list_btn.style.display = "none";
                    }
                }
            });
        }
    }
</script>