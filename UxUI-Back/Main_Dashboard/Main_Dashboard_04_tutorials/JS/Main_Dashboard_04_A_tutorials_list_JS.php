<script>
function load_tutorials() {
    $("#md_tutorial_list_container").html("<div style='text-align:center; padding: 40px; color: var(--sld-text-400);'><svg width='40' height='40' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' style='animation:spin-ring 2s infinite linear; opacity: 0.5; margin-bottom: 10px;'><circle cx='12' cy='12' r='10'/><path d='M12 6v2'/></svg><br>Aggregating tutorial definitions securely...</div>");
    
    $.ajax({
        url: "<?php echo $pth; ?>View-List/Main_Dashboard/Main_Dashboard_04_A_tutorials_list_VIEW.php",
        type: "POST",
        success: function(res) {
            try {
                var json = JSON.parse(res);
                window.loaded_tutorials = json;
                var html = "";
                if(json.length > 0) {
                    for(var i=0; i<json.length; i++) {
                        
                        var bClass = "badge-beginner"; 
                        if(json[i].difficulty_level.toLowerCase() == "intermediate") bClass = "badge-intermediate";
                        if(json[i].difficulty_level.toLowerCase() == "advanced") bClass = "badge-advanced"; // requires CSS update in list file
                        
                        var stripDesc = json[i].description;
                        if(stripDesc.length > 150) stripDesc = stripDesc.substring(0,147) + "...";
                        
                        html += `
                        <div class="tutorial-card">
                            <div class="tutorial-thumb-container" style="background-image: url('${json[i].thumbnail_url}'); background-color: var(--sld-dark-700);">
                                <div class="tutorial-play-overlay"><svg viewBox="0 0 24 24"><polygon points="5 3 19 12 5 21 5 3"/></svg></div>
                            </div>
                            <div class="tutorial-info">
                                <div class="tutorial-title">${json[i].title}</div>
                                <div class="tutorial-desc">${stripDesc}</div>
                                <div class="tutorial-meta">
                                    <span class="tutorial-badge ${bClass}" style="${bClass === 'badge-advanced' ? 'background:rgba(147, 51, 234, 0.15); color: #c084fc; border: 1px solid rgba(147, 51, 234, 0.2);' : ''}">${json[i].difficulty_level}</span>
                                    <span class="tutorial-stat" style="color:var(--sld-text-600);"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg> ${json[i].sdt}</span>
                                    <a href="../../../tutorial_view.php?tutorial=${json[i].seo_slug}" target="_blank" class="tutorial-stat" style="color:var(--sld-success); text-decoration:none;"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="20 6 9 17 4 12"/></svg> View Live URL</a>
                                </div>
                            </div>
                            <div class="tutorial-actions">
                                <button class="action-btn-circle" title="Edit Tutorial" onclick="edit_tutorial(${json[i].id})"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"/></svg></button>
                                <button class="action-btn-circle" title="View Analytics"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="18" y1="20" x2="18" y2="10"/><line x1="12" y1="20" x2="12" y2="4"/><line x1="6" y1="20" x2="6" y2="14"/></svg></button>
                                <button class="action-btn-circle" title="Archive / Delete" onclick="delete_tutorial(${json[i].id})" style="color:var(--sld-danger);"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="3 6 5 6 21 6"/><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"/></svg></button>
                            </div>
                        </div>`;
                    }
                } else {
                    html = "<div style='color:var(--sld-text-600); background:var(--sld-dark-800); border-radius: 12px; border:1px dashed var(--sld-border); padding:30px; text-align:center;'>No tutorials available. Click 'Upload Tutorial' above to deploy one.</div>";
                }
                
                $("#md_tutorial_list_container").html(html);
                
            } catch(e) {
                console.error(e, res);
                $("#md_tutorial_list_container").html("<div style='color:var(--sld-danger); text-align:center;'>Fatal parse error safely extracting data matrix mapping via network node!</div>");
            }
        }
    });
}
// Initiate request naturally upon manual page load if it's default
$(document).ready(function(){
    load_tutorials();
});

function delete_tutorial(id) {
    if (confirm("Are you absolutely sure you want to delete this tutorial? This will remove it from all public viewers completely.")) {
        $.ajax({
            url: "<?php echo $pth; ?>View-List/Main_Dashboard/Main_Dashboard_04_A_tutorials_DELETE.php",
            type: "POST",
            data: { id: id },
            success: function (res) {
                try {
                    var json = JSON.parse(res);
                    if (json[0].error === "0") {
                        load_tutorials(); // Live reload immediately physically removing it
                    } else {
                        alert("Deletion Error: " + json[0].message);
                    }
                } catch (e) {
                    alert("Fatal Parse Error interacting with securely bound delete matrix.");
                }
            },
            error: function () {
                alert("Fatal Error reaching server endpoints organically.");
            }
        });
    }
}
</script>
