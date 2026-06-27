<script>
// Step 5 — AI Check
var FEEDBACKS=[
  ['Good symmetry in upper facial region.','Minor deviation in jaw-line curvature.','85% of cells matched within 8px tolerance.','Refine the nose-bridge width ratio.'],
  ['Strong proportions across all zones.','Ear placement slightly off-center.','90% grid alignment detected.','Improve hairline boundary precision.'],
  ['Excellent eye spacing accuracy.','Chin shape needs more definition.','78% grid cell tolerance achieved.','Improve lip-width ratio accuracy.']
];
function runAICheck(){
  if(!ag.sketch){alert('Please upload your sketch first.');return;}
  goStep(5);
  
  var procView = document.getElementById('proc-view');
  var resView = document.getElementById('results-view');
  
  procView.style.display = 'block';
  resView.style.display = 'none';

  var formData = new FormData();
  formData.append('project_id', ag.projectId);
  // Ensure we pass the score_histry_id that was generated in Step 4
  formData.append('score_histry_id', ag.scoreHistryId);

  fetch("View-List/AIGrader/grid_drawing_projects_UPDATE_STEP5.php", {
      method: "POST",
      body: formData
  })
  .then(response => response.json())
  .then(res => {
      procView.style.display = 'none';
      
      if (res.status === 'success') {
          resView.style.display = 'block';
          
          ag.score = res.score;
          var s = 0, ring = document.getElementById('score-ring');
          
          // Animate score
          var iv = setInterval(function(){
              s++;
              ring.textContent = s + '%';
              if(s >= ag.score) clearInterval(iv);
          }, 20);

          // Render feedback array correctly based on the python output
          // Assuming Python returns array of strings, we'll map them to the fb-cards
          var feedbackArray = res.feedback || [];
          for (var i = 0; i < 4; i++) {
              var el = document.getElementById('fb-' + i);
              if (el) {
                  el.textContent = feedbackArray[i] || "Checked and verified.";
              }
          }

          // Render Heatmap if available
          if (res.heatmap_url) {
              // Create or update a heatmap image element
              var existingHeatmap = document.getElementById('heatmap-img');
              if (!existingHeatmap) {
                  existingHeatmap = document.createElement('img');
                  existingHeatmap.id = 'heatmap-img';
                  existingHeatmap.style.width = '100%';
                  existingHeatmap.style.borderRadius = '12px';
                  existingHeatmap.style.marginTop = '20px';
                  existingHeatmap.style.border = '2px solid #333';
                  
                  // Insert it right before the save button
                  var saveBtn = document.querySelector('.save-btn');
                  if(saveBtn) {
                      resView.insertBefore(existingHeatmap, saveBtn);
                  } else {
                      resView.appendChild(existingHeatmap);
                  }
              }
              existingHeatmap.src = res.heatmap_url;
          }

      } else {
          alert('AI Error: ' + res.message);
          // Fallback so user isn't stuck
          goStep(4);
      }
  })
  .catch(err => {
      procView.style.display = 'none';
      console.error(err);
      alert('Network or server error occurred during AI evaluation.');
      goStep(4);
  });
}
</script>