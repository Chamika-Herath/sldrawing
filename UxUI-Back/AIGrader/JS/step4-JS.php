<script>
// Step 4 — Sketch upload
document.getElementById('sketch-input').addEventListener('change',function(){
  if(!this.files[0]) return;
  var r=new FileReader(); var self=this;
  r.onload=function(e){
    ag.sketch=e.target.result;
    var img=document.getElementById('sketch-preview'); img.src=e.target.result; img.style.display='block';
    document.getElementById('sketch-dz').querySelector('h3').textContent='✅ Sketch Uploaded!';
    document.getElementById('sketch-dz').querySelector('p').textContent=self.files[0].name;
  }; r.readAsDataURL(this.files[0]);
});

function applyAndNextStep4() {
    if (!ag.projectId) {
        alert("Error: Project ID is missing. Please start over.");
        return;
    }

    if (!ag.sketch) {
        alert("Error: Please upload your sketch first.");
        return;
    }

    var btn = document.getElementById('btn-next-step4');
    if(btn) btn.disabled = true;

    var formData = new FormData();
    formData.append('project_id', ag.projectId);
    formData.append('sketch_image', ag.sketch);

    showSubmitPreloader();

    fetch("View-List/AIGrader/grid_drawing_projects_UPDATE_STEP4.php", {
        method: "POST",
        body: formData
    })
    .then(response => response.json())
    .then(res => {
        hideSubmitPreloader();
        if(btn) btn.disabled = false;
        if (res.status === 'success') {
            // Save the newly created project_score_histry id so step 5 can update it if needed
            if (res.score_histry_id) {
                ag.scoreHistryId = res.score_histry_id;
            }
            runAICheck();
        } else {
            alert('Error: ' + res.message);
        }
    })
    .catch(err => {
        hideSubmitPreloader();
        if(btn) btn.disabled = false;
        console.error(err);
        alert('Network or server error occurred.');
    });
}

</script>
