<script>
   

    function load_member_list() {
        $.ajax({
            url: "<?php echo $pth; ?>View-List/Main_Dashboard/Main_Dashboard_02_A_member_list_VIEW.php",
            type: "POST",
            success: function(res) {
                try {
                    var json = JSON.parse(res);
                    var html = "";
                    if (json.length > 0) {
                        for (var i = 0; i < json.length; i++) {
                            html += `
                            <div class="member-card" style="animation-delay: ${0.1 * (i+1)}s;">
                                <div class="col-user">
                                    <div class="avatar-placeholder" style="background: linear-gradient(135deg, var(--sld-orange-500), var(--sld-amber-500)); color: var(--sld-dark-950);">${json[i].initials}</div>
                                    <div class="user-info">
                                        <span class="user-name">${json[i].user_name}</span>
                                        <span class="user-email">${json[i].user_name}</span>
                                    </div>
                                </div>
                                <div class="col-status">
                                    <div class="status-badge status-active">
                                        <svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="12"/></svg>
                                        Active
                                    </div>
                                </div>
                                <div class="col-date">${json[i].date}</div>
                                <div class="col-action">
                                    <button class="action-btn" title="View Details">
                                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>
                                    </button>
                                </div>
                            </div>
                            `;
                        }
                    } else {
                        html = "<div style='padding: 20px; text-align: center; color: var(--sld-text-400);'>No members found.</div>";
                    }
                    $("#member-list-container").html(html);
                } catch (e) {
                    console.error("JSON Parse Error: ", e);
                    console.log("Raw Response: ", res);
                }
            }
        });
    }
</script>
