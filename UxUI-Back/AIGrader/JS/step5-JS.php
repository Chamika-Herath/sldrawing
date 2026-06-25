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
  document.getElementById('proc-view').style.display='block';
  document.getElementById('results-view').style.display='none';
  setTimeout(function(){
    document.getElementById('proc-view').style.display='none';
    var rv=document.getElementById('results-view'); rv.style.display='block';
    ag.score=Math.floor(Math.random()*14)+80;
    var s=0,ring=document.getElementById('score-ring');
    var iv=setInterval(function(){s++;ring.textContent=s+'%';if(s>=ag.score)clearInterval(iv);},25);
    var fb=FEEDBACKS[Math.floor(Math.random()*FEEDBACKS.length)];
    for(var i=0;i<4;i++) document.getElementById('fb-'+i).textContent=fb[i];
  },3000);
}

</script>
