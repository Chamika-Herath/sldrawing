<script>
// Step 1 — Reference upload
document.getElementById('ref-input').addEventListener('change',function(){
  if(!this.files[0]) return;
  var r=new FileReader(); var self=this;
  r.onload=function(e){
    ag.ref=e.target.result;
    var img=document.getElementById('ref-preview'); img.src=e.target.result; img.style.display='block';
    document.getElementById('ref-dz').querySelector('h3').textContent='✅ Image Uploaded!';
    document.getElementById('ref-dz').querySelector('p').textContent=self.files[0].name;
  }; r.readAsDataURL(this.files[0]);
});

</script>
