<?php
Header("Content-type:text/html;charset=utf-8");
session_start();
use witclass\Taskinfo_t;







$session_login=$_SESSION['login'];
$session_user_id=$_SESSION['user_id'];
$id=$_GET['id'];
require_once 'doctrine.php';


	$eee = $em->createQuery('SELECT u FROM witclass\Taskinfo_t u where u.task_id='.$id.'');
	$users = $eee->getArrayResult();
	$comments_num=count($users);
		echo "<table class=\"table table-striped\">";
		echo "<tr ><td>#</td><td >评论</td></tr>";
		for($i=0;$i<count($users);$i++)
		{

			echo "<tr class=\"\"><td><span class=\"badge badge-success\">".($i+1)."</span></td><td ><small >".$users[$i]['comment']."</small></td></tr>";
		
		}
		echo "</table>";
	
	
	



$contents=$_POST['contents'];
$user_id=$_POST['session_user_id'];
$task_id=$_POST['task_id'];
$sbt=$_POST['sbt'];
if(isset($sbt))
{


	$a=new Taskinfo_t;
	$a->set_Taskinfo_t_task_id($task_id);
	$a->set_Taskinfo_t_comment($contents);
	$a->set_Taskinfo_t_user_id($user_id);

	//$b=new MyPoB;
	//$b->setMyPoBNick('weitao');
	//$b->setMyPoAbid($a);
	$em->persist($a);
	//$em->persist($b);
	$em->flush();
	header("Location:main.php");
}
else
{
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Publish </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link href="bootstrap/css/bootstrap.css" rel="stylesheet">
    <style type="text/css">
      body {
        padding-top: 40px;
        padding-bottom: 40px;
        background-color: #f5f5f5;
      }

      .form-signin {
        max-width: 300px;
        padding: 19px 29px 29px;
        margin: 0 auto 20px;
        background-color: #fff;
        border: 1px solid #e5e5e5;
        -webkit-border-radius: 5px;
           -moz-border-radius: 5px;
                border-radius: 5px;
        -webkit-box-shadow: 0 1px 2px rgba(0,0,0,.05);
           -moz-box-shadow: 0 1px 2px rgba(0,0,0,.05);
                box-shadow: 0 1px 2px rgba(0,0,0,.05);
      }
      .form-signin .form-signin-heading,
      .form-signin .checkbox {
        margin-bottom: 10px;
      }
      .form-signin input[type="text"],
      .form-signin input[type="password"] {
        font-size: 16px;
        height: auto;
        margin-bottom: 15px;
        padding: 7px 9px;
      }

    </style>
    <link href="bootstrap/css/bootstrap-responsive.css" rel="stylesheet">

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="../assets/js/html5shiv.js"></script>
    <![endif]-->

    <!-- Fav and touch icons -->
  </head>
  <body>
    <div class="container">
	<form class="form-signin" method="post" action="<?=$PHP_SELF?>">
	<h2 class="form-signin-heading">Coments</h2>
	<input type="hidden" name="session_user_id" value="<?=$session_user_id?>" class="input-block-level"  >
	<input type="hidden" name="task_id" value="<?=$id?>" class="input-block-level"  >
	<textarea name="contents" class="input-block-level" placeholder="Contents" > </textarea>
	<input name="sbt" type="submit" value="Comments" class="btn btn-large btn-primary" />
	</form>

    </div> <!-- /container -->

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="bootstrap/js/jquery.js"></script>

  </body>
</html>
<?
}
?>
