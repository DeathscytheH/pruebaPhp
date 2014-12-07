<html>
 <head>
    <title>PHP calculator</title>
 </head>

<body bgcolor="orange">
<?php
 if(isset($_POST['submit']))
    {
        $value1=$_POST['value1'];
        $value2=$_POST['value2'];
        $sign=$_POST['sign'];

        if($value1=='') {
        echo "<script>alert('Please Enter Value 1')</script>";
        }

        if($value2=='') {
        echo "<script>alert('Please Enter Value 2')</script>";
        }
        
        if($sign=='') {
        echo "<script>alert('Please Enter Sign')</script>";
        }

        if($sign=='+') {
        $value1+$value2;
        }

        if($sign=='-') {
        $value1-$value2;
        }

        if($sign=='*') {
        $value1*$value2;
        }

        if($sign=='/') {
        $value1/$value2;
        }


}
?>
<h1 align="center">This is PHP Calculator</h1>
<center>
<form method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
Type Value 1:<br><input type="text" name="value1"><br>
Type value 2:<br><input type="text" name="value2"><br>
Operator:<br><input type="text" name="sign"><br>
Result:<br><input type="text" name="result" value = "<?php echo (isset($result)) ? $result : '' ; ?>">
<div align="center"><input type="submit" name="submit" value="Submit"></div>

</form>
</center>