<script type="javascript">function limiter(a, b){
	var submit =document.getElementById("sub-" + a);
    console.log(<?php echo $_SESSION['candid'][$i];?>);
  
            if (b == true) {

                alert("Candidature déja faite");


                location.replace("espace-etudiant.php");
            }
            else{
            	var b = true;
            	//submit.setAttribute("type", "submit");

                console.log(b);
                //location.replace("espace-etudiant.php");
            }
}</script>