<?php
$ques1Err = $ans1Err = '' ;//variable to display error like field required
$ques1 = $ans1 = '' ;// variable to store  value what user enter or select
$qans1 = 0;
if ($_SERVER["REQUEST_METHOD"] == "POST"){
   if(empty($_POST['q1'])){
        $ques1Err = 'Security Question Required' ;
   }
   else{
        $ques1 = $_POST['q1'];
        $qans1 = 1;

   }
   if(empty($_POST['ans1'])){
        $ans1Err = 'Answer Required' ;
   }
   else{
        $ans1 = check_input($_POST['ans1']);
        if(!preg_match("/^[a-zA-Z ]*$/",$ans1)){
            $ans1Err = "Only letters and white space allowed";
        }
   }
}
?>
<html>
<head>
  <script>
      // dynamically add input field for the user to enter the answer of question
     function add_txt_field(){

        var inpdiv = document.createElement("DIV");
        inpdiv.setAttribute("class","input-txt");
        var input = document.getElementById("ans1_txt-input");
        input.appendChild(inpdiv);

        var inp = document.createElement("INPUT");
        inp.setAttribute("type","text");
        inp.setAttribute("id","ans1");
        inp.setAttribute("class","txt-box");
        inp.setAttribute("name","ans1");
        inp.setAttribute("value","");
        inpdiv.appendChild(inp);


    }
  </script>
</head>
 <body>
   <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post">

        Security Question
    <select class="txt-box" onchange="add_txt_field()" id="q1" name="q1">
        <option value="<?php echo $ques1 ?>"><?php echo $ques1 ?></option>
        <option value="What was your childhood nickname?">What was your childhood nickname?</option>
        <option value="What is your grandmother's first name?">What is your grandmother's first name?</option>
        <option value="What school did you attend for sixth grade?">What school did you attend for sixth grade?</option>
      </select>
      <div><span class="error"> <?php echo $ques1Err;?></span></div>

      <div id="ans1_txt-input"></div> 
      <?php

                if($qans1 == 1){
                    echo '<script type="text/javascript"> add_txt_field() </script>';

                   // ***// here's the problem***                  

                    echo '<script> document.getElementById("ans1").value = "'.$ans1.'"; </script>' ;

                }


                ?>

      <button id="create" name="create" type="submit">Create</button>

   </form>
  </body>
</html>