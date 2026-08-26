<script>
    $(document).ready(function() {
        $("#tut_input_thumbnail").on("change", function(e) {
            var file = e.target.files[0];
            if (file) {
                var reader = new FileReader();
                reader.onload = function(evt) {
                    $("#tut_thumb_preview").attr("src", evt.target.result).show();
                    $("#tut_thumb_placeholder").hide();
                    $("#tut_upload_dropzone").css("padding", "20px");
                }
                reader.readAsDataURL(file);
            }
        });
    });

    function save_tutorial() {
        var title = $("#tut_input_title").val();
        var difficulty = $("#tut_input_level").val();
        var video_url = $("#tut_input_url").val();
        
        var description = tutorialQuill.root.innerHTML;
        if(description === '<p><br></p>') description = "";

        if (title.trim() === "" || description.trim() === "") {
            alert("Please fill in both the Tutorial Title and the Rich Description.");
            return;
        }

        var oldBtnHTML = $("#tut_publish_btn").html();
        $("#tut_publish_btn").html("<svg width='18' height='18' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' style='animation:spin-ring 2s infinite linear;'><circle cx='12' cy='12' r='10'/><path d='M12 6v2'/></svg> Publishing...");
        $("#tut_publish_btn").prop("disabled", true);

        // Utilize FormData to support binary file transport natively
        var formData = new FormData();
        formData.append("title", title);
        formData.append("description", description);
        formData.append("difficulty", difficulty);
        formData.append("video_url", video_url);

        var fileInput = document.getElementById("tut_input_thumbnail");
        if (fileInput && fileInput.files.length > 0) {
            formData.append("thumbnail", fileInput.files[0]);
        }

        $.ajax({
            url: "<?php echo $pth; ?>View-List/Main_Dashboard/Main_Dashboard_04_B_add_tutorial_INSERT.php",
            type: "POST",
            data: formData,
            contentType: false, // Prevent mapping binary file to string
            processData: false, // Prevent converting form data structurally
            success: function(res) {
                try {
                    var json = JSON.parse(res);
                    if (json[0].error === "0") {
                        alert(json[0].message);
                        
                        // DOM Reset
                        $("#tut_input_title").val("");
                        $("#tut_input_url").val("");
                        tutorialQuill.root.innerHTML = "";
                        $("#tut_thumb_preview").hide().attr("src", "");
                        $("#tut_thumb_placeholder").show();
                        $("#tut_upload_dropzone").css("padding", "40px");
                        if(fileInput) fileInput.value = "";
                        
                        Main_Dashboard_04_A_OPEN(); 
                    } else {
                        alert("Error: " + json[0].message);
                    }
                } catch(e) {
                    console.error("Payload breakdown:", res);
                    alert("Fatal Server Parsing Error: " + res);
                }

                $("#tut_publish_btn").html(oldBtnHTML);
                $("#tut_publish_btn").prop("disabled", false);
            },
            error: function (err) {
                 alert("Fatal AJAX Error attempting to contact Server endpoints!");
                 $("#tut_publish_btn").html(oldBtnHTML);
                 $("#tut_publish_btn").prop("disabled", false);
            }
        });
    }
</script>
