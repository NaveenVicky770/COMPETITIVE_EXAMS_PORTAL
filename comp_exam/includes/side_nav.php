<style>
.sidenav {
  /* height: 100%; Full-height: remove this if you want "auto" height */
  width: 180px; /* Set the width of the sidebar */
  position: fixed; /* Fixed Sidebar (stay in place on scroll) */
  z-index: 1; /* Stay on top */
  top: 0; /* Stay at the top */
  right:0;
  background-color: azure;
  overflow-x: hidden; /* Disable horizontal scroll */
  padding-top: 20px;
}
li{
    list-style: none;
}
    
</style>


<script>
var count = 60;


var interval = setInterval(function(){
  var timer = document.getElementById('count')
  
  if(timer!=null){
    var distance = count * 1000;    
    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    var seconds = Math.floor((distance % (1000 * 60)) / 1000);
    
    
    document.getElementById('count').innerHTML=minutes + " m " + seconds + " s";
    count--;
    if (count === -2){
      clearInterval(interval);
      document.getElementById('count').innerHTML='0 m 0 s';
      // or...
      // alert("You're out of time!");
      // window.location.replace("http://localhost/All_projects/comp_exam/");


      timeup=true
      document.getElementById('sub_exam').click();

    }
  }
 
}, 1000);
</script>


<ul class="sidenav">
    <li>
        <h6>Hello User</h6>
    </li>
    <li>
        <p>Remaining Time :</p>
    </li>
    <li>
        <h4 id='count'></h4>
    </li>   
</ul>
