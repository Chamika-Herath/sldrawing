<script>
    function Open_Inside_Member(userId) {
        // Use Global Dashboard Router
        Main_Dashboard_02_B_OPEN();

        // Show generic loading state
        $("#md_details_name").text("Loading Data...");
        $("#md_details_access").text("...");
        $("#md_details_2fa").text("...");
        $("#md_details_projects_count").text("0");
        $("#md_details_projects_list").html("<div style='color:var(--sld-text-400); padding:20px; text-align:center;'><svg width='40' height='40' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' style='margin-bottom:10px; opacity:0.5; animation:spin-ring 2s infinite linear;'><circle cx='12' cy='12' r='10'/><path d='M12 6v2'/></svg><br>Fetching architecture history...</div>");

        var payload = "user_id=" + encodeURIComponent(userId);

        $.ajax({
            url: "<?php echo $pth; ?>View-List/Main_Dashboard/Main_Dashboard_02_B_inside_member_VIEW.php",
            type: "POST",
            data: payload,
            success: function(res) {
                try {
                    var json = JSON.parse(res);
                    if(json.error) {
                        alert(json.error);
                        Main_Dashboard_02_A_OPEN();
                        return;
                    }

                    $("#md_details_name").text(json.user_name);
                    
                    // Route 1 = Admin, Route 2 = User
                    if(json.main_user_account_access_level_list_id == "1") {
                        $("#md_details_access").html('<span style="color:var(--sld-danger); font-size:24px;">Admin</span>');
                    } else {
                        $("#md_details_access").html('<span style="color:var(--sld-success); font-size:24px;">User</span>');
                    }

                    if(json.is_two_factor_auth_enable == "1") {
                        $("#md_details_2fa").html('Enabled <svg viewBox="0 0 24 24" width="22" height="22" style="fill:var(--sld-success); margin-left:5px; transform:translateY(4px);"><circle cx="12" cy="12" r="12"/></svg>');
                    } else {
                        $("#md_details_2fa").html('Disabled <svg viewBox="0 0 24 24" width="22" height="22" style="fill:var(--sld-danger); margin-left:5px; transform:translateY(4px);"><circle cx="12" cy="12" r="12"/></svg>');
                    }

                    $("#md_details_projects_count").text(json.projects.length);

                    var html = "";
                    if(json.projects.length > 0) {
                        for(var i=0; i<json.projects.length; i++) {
                            html += `
                            <div style="background: rgba(255,255,255,0.02); border: 1px solid rgba(255,255,255,0.05); padding: 15px 24px; border-radius: 12px; display:flex; justify-content:space-between; align-items:center; transition:0.3s; cursor:pointer;" onmouseover="this.style.background='var(--sld-dark-700)'" onmouseout="this.style.background='rgba(255,255,255,0.02)'">
                                <div>
                                    <h4 style="margin:0; font-size:15px; font-weight:700; color:var(--sld-text-900);">Project #${json.projects[i].id} : ${json.projects[i].title}</h4>
                                    <p style="margin:4px 0 0; font-size:12px; color:var(--sld-text-400);">Status Marker: ${json.projects[i].status}</p>
                                </div>
                                <div style="text-align:right;">
                                    <div style="font-size:20px; font-weight:800; color:var(--sld-orange-500);">${json.projects[i].score} <span style="font-size:12px; font-weight:600; color:var(--sld-text-600);">PTS</span></div>
                                </div>
                            </div>`;
                        }
                    } else {
                        html = "<div style='color:var(--sld-text-600); background:var(--sld-dark-800); border-radius: 12px; border:1px dashed var(--sld-border); padding:30px; text-align:center;'>This member has zero recorded projects within the grid system.</div>";
                    }

                    $("#md_details_projects_list").html(html);

                } catch(e) {
                    console.error(e, res);
                    $("#md_details_projects_list").html("<div style='color:var(--sld-danger); padding:20px;'>Error parsing user infrastructure layout.</div>");
                }
            }
        });
    }

</script>
