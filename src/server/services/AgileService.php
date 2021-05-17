<?php
require_once("../config/Index.php");
require_once("../data/AgileData.php");

$params = json_decode(file_get_contents("php://input"), true);

if ($params) {
  switch($params['request']) {
    case 1:
      $data = new AgileData($conn);
      echo json_encode($data->GetAllData($params['data']));
      break;
    case 2:
      $data = new AgileData($conn);
      echo json_encode($data->SetData($params['data']));
      break;
    case 3:
      $data = new AgileData($conn);
      echo json_encode($data->UpdateData($params['data']));
      break;
    case 4:
      $data = new AgileData($conn);
      echo json_encode($data->DeleteData($params['data']));
      break;
    default:
      echo "Invalid Request";
  }
} else {
  echo "Request failed!";
}
?>