<script type="text/javascript">
    function Ai_grader_close_all() {
        document.getElementById("panel-1").style.display = "none";
        document.getElementById("panel-2").style.display = "none";
        document.getElementById("panel-3").style.display = "none";
        document.getElementById("panel-4").style.display = "none";
        document.getElementById("panel-5").style.display = "none";  
    } 

    
    function Ai_grader_step_01_OPEN() {
       
        Ai_grader_close_all();
        document.getElementById("panel-1").style.display = "";
    }

    function Ai_grader_step_01_OPEN() {
       
        Ai_grader_close_all();
        document.getElementById("panel-1").style.display = "";
    }
    
    function Ai_grader_step_02_OPEN() {
       
        Ai_grader_close_all();
        document.getElementById("panel-2").style.display = "";
    }

    function Ai_grader_step_03_OPEN() {
       
        Ai_grader_close_all();
        document.getElementById("panel-3").style.display = "";
    }

    function Ai_grader_step_04_OPEN() {
       
        Ai_grader_close_all();
        document.getElementById("panel-4").style.display = "";
    }

    function Ai_grader_step_05_OPEN() {
       
        Ai_grader_close_all();
        document.getElementById("panel-5").style.display = "";
    }

   




var ag = { step:1, ref:null, edited:null, grid:null, sketch:null, score:0 };
var LABELS = ['Upload Image','Edit Image','Make Grid','Upload Drawing','AI Check'];

function renderStepper(cur){
  var h=''; for(var i=1;i<=5;i++){
    var done=i<cur, active=i===cur;
    h+='<div class="st-item"><div class="st-dot '+(done?'done':active?'active':'')+'">'+( done?'✓':i)+'</div><span class="st-lbl '+(active?'active':'')+'">'+LABELS[i-1]+'</span></div>';
    if(i<5) h+='<div class="st-line '+(done?'done':'')+'"></div>';
  }
  document.getElementById('stepper').innerHTML=h;
}

function startNewProject(){
  ag={step:1,ref:null,edited:null,grid:null,sketch:null,score:0};
  document.getElementById('dashboard-view').style.display='none';
  var wiz=document.getElementById('wizard-view'); wiz.classList.add('active');
  document.querySelectorAll('.step-panel').forEach(function(p){p.classList.remove('active');});
  document.getElementById('panel-1').classList.add('active');
  var rp=document.getElementById('ref-preview'); rp.src=''; rp.style.display='none';
  var sp=document.getElementById('sketch-preview'); sp.src=''; sp.style.display='none';
  document.getElementById('results-view').style.display='none';
  document.getElementById('proc-view').style.display='none';
  document.getElementById('ref-dz').querySelector('h3').textContent='Drop your reference photo here';
  document.getElementById('ref-dz').querySelector('p').textContent='PNG, JPG or WEBP — click or drag & drop';
  renderStepper(1); window.scrollTo({top:0,behavior:'smooth'});
}

function showDashboard(){
  document.getElementById('wizard-view').classList.remove('active');
  document.getElementById('dashboard-view').style.display='block';
  loadProjects(); window.scrollTo({top:0,behavior:'smooth'});
}

function showMessage(text, type='error', duration=3500){
  var layer=document.getElementById('ai-toast-layer');
  if(!layer){layer=document.createElement('div');layer.id='ai-toast-layer';layer.className='ai-toast-layer';document.body.appendChild(layer);}
  var msg=document.createElement('div');msg.className='ai-toast ai-toast--'+type;msg.textContent=text;
  layer.appendChild(msg);
  requestAnimationFrame(function(){msg.classList.add('show');});
  setTimeout(function(){msg.classList.remove('show');setTimeout(function(){if(msg.parentNode) msg.parentNode.removeChild(msg);},250);},duration);
}

function showConfirm(message, confirmText, cancelText, onConfirm, onCancel) {
  var layer=document.getElementById('ai-confirm-layer');
  if(!layer){
    layer=document.createElement('div');
    layer.id='ai-confirm-layer';
    layer.className='ai-confirm-layer';
    layer.innerHTML = '<div class="ai-confirm-box"><div class="ai-confirm-icon">⚠️</div><div class="ai-confirm-message"></div><div class="ai-confirm-actions"><button class="ai-confirm-btn ai-confirm-cancel"></button><button class="ai-confirm-btn ai-confirm-primary"></button></div></div>';
    document.body.appendChild(layer);
  }
  layer.querySelector('.ai-confirm-message').textContent = message;
  layer.querySelector('.ai-confirm-primary').textContent = confirmText || 'Continue';
  layer.querySelector('.ai-confirm-cancel').textContent = cancelText || 'Cancel';
  layer.classList.add('show');

  var confirmBtn = layer.querySelector('.ai-confirm-primary');
  var cancelBtn = layer.querySelector('.ai-confirm-cancel');

  function cleanup(){
    layer.classList.remove('show');
    confirmBtn.removeEventListener('click', onConfirmClick);
    cancelBtn.removeEventListener('click', onCancelClick);
  }
  function onConfirmClick(){
    cleanup();
    if(typeof onConfirm==='function') onConfirm();
  }
  function onCancelClick(){
    cleanup();
    if(typeof onCancel==='function') onCancel();
  }

  confirmBtn.addEventListener('click', onConfirmClick);
  cancelBtn.addEventListener('click', onCancelClick);
}

function navigateStep(n){
  document.querySelectorAll('.step-panel').forEach(function(p){p.classList.remove('active');});
  document.getElementById('panel-'+n).classList.add('active');
  ag.step=n; renderStepper(n);
  if(n===2) initEdit();
  if(n===3) initGrid();
  window.scrollTo({top:80,behavior:'smooth'});
}

function goStep(n){
  if(n===2&&!ag.ref){showMessage('Please upload a reference image first.', 'warning');return;}
  if(n < ag.step && (ag.ref || ag.edited || ag.grid || ag.sketch)){
    showConfirm('Your changes will be removed if you go back. Continue?', 'Continue', 'Stay', function(){ navigateStep(n); });
    return;
  }
  if(n===4&&!ag.edited){ag.edited=ag.ref;}
  navigateStep(n);
}

window.addEventListener('beforeunload', function(event) {
  if(window.ag && (ag.ref || ag.edited || ag.grid || ag.sketch)){
    showMessage('Your changes will be removed if you refresh or leave the page.', 'warning', 4200);
    event.preventDefault();
    event.returnValue = 'Your changes will be removed.';
    return 'Your changes will be removed.';
  }
});

// Save / Load projects
function saveProject(){
  var name=prompt('Enter a name for this project:','Project '+(Date.now()+'').slice(-4));
  if(!name) return;
  var projects=JSON.parse(localStorage.getItem('ag_projects')||'[]');
  projects.unshift({id:Date.now(),name:name,thumb:ag.grid||ag.ref,date:new Date().toLocaleDateString(),score:ag.score});
  localStorage.setItem('ag_projects',JSON.stringify(projects));
  showMessage('Project saved! ✅', 'success'); showDashboard();
}

function loadProjects(){
  var projects=JSON.parse(localStorage.getItem('ag_projects')||'[]');
  var grid=document.getElementById('projects-grid');
  var empty=document.getElementById('empty-state');
  if(!projects.length){grid.innerHTML='';empty.style.display='block';return;}
  empty.style.display='none';
  grid.innerHTML=projects.map(function(p){
    return '<div class="proj-card">'+
      (p.thumb?'<img class="proj-thumb" src="'+p.thumb+'" alt="'+p.name+'">':'<div class="proj-thumb-placeholder">🎨</div>')+
      '<div class="proj-body"><div class="proj-name">'+p.name+'</div><div class="proj-meta"><span>'+p.date+'</span><span class="proj-score">'+p.score+'%</span></div></div></div>';
  }).join('');
}

document.addEventListener('DOMContentLoaded', loadProjects);
</script>
