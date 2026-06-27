<script>
  function Prject_process_step_01_submit() {
      var projectName = document.getElementById('project-name').value;
      var fileInput = document.getElementById('ref-input');
      
      if(projectName.trim() === '') {
          alert('Please enter a project name.');
          return;
      }
      if(!fileInput.files[0]) {
          alert('Please upload a reference image.');
          return;
      }

      var formData = new FormData();
      formData.append('project_name', projectName);
      formData.append('reference_img', fileInput.files[0]);

      fetch("<?php echo $pth; ?>View-List/AIGrader/grid_drawing_projects_ADD_UPDATE.php", {
          method: "POST",
          body: formData
      })
      .then(response => response.json())
      .then(res => {
          console.log(res);
          if (res.status === 'success') {
              // Optionally store project ID somewhere if needed later
              // e.g., window.currentProjectId = res.id;
              goStep(2);
          } else {
              alert('Error: ' + res.message);
          }
      })
      .catch(err => {
          console.error(err);
          alert('An error occurred while saving the project.');
      });
  }

// Step 1 — Reference upload
document.getElementById('ref-input').addEventListener('change',function(){
  if(!this.files[0]) return;
  var r=new FileReader(); var self=this;
  r.onload=function(e){
    if(typeof ag !== 'undefined') {
        ag.ref=e.target.result;
    }
    var img=document.getElementById('ref-preview'); 
    img.src=e.target.result; 
    img.style.display='block';
    
    var dzH3 = document.getElementById('ref-dz').querySelector('h3');
    if(dzH3) dzH3.textContent='✅ Image Uploaded!';
    
    var dzP = document.getElementById('ref-dz').querySelector('p');
    if(dzP) dzP.textContent=self.files[0].name;
  }; r.readAsDataURL(this.files[0]);
});

</script>
