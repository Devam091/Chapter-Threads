<?php

function santize($data)
{
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

function tq($qcount){
  $sql = "SELECT * FROM quesans where book_id = 2 LIMIT 10";
  $qcountr = mysqli_query($qcount, $sql);
  return mysqli_num_rows($qcountr);
}

function totalquestion($conn)
{
  $sql = "SELECT * FROM quesans";
  $result = mysqli_query($conn, $sql);
  return mysqli_num_rows($result);
}