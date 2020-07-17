<?php
header('Content-Type:text/html;charset=UTF-8');
$request=$_REQUEST['name'];

if(isset($_POST['test']))
{
    $post=$_POST['test'];
    echo 'Post='.$post.'<br>';
}
echo 'Request='.$request.'<br>';
if(isset($_GET['name']))
{
    $get=$_GET['name'];
    echo 'Get='.$get.'<br>';
}