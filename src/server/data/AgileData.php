<?php
class AgileData {
  private $response = array();
  private $tempData = array();

  private $link;

  public function __construct($link) {
    $this->link = $link;
  }
  
  function GetAllData($params) {
    $query = "Select * from `tbl_items` order by `tbl_items`.`ID` DESC";

    $result = $this->link->query($query);

    while ($row = mysqli_fetch_row($result)) {
      if (count($row) > 0) {
        $this->tempData["ID"] = $row[0];
        $this->tempData["Item"] = $row[1];
        $this->response[] = $this->tempData;
      }
    }
    return $this->response;
  }
  
  function SetData($params) {
    $item = $params['item'];
    $query = "Insert into `tbl_items` (Item) values ('$item')";
    
    if ($this->link->query($query) === TRUE) {
      echo "New record successfully created!";
    } else {
      echo "Error creating record!";
    }
  }
 
  function UpdateData($params) {
    $id = $params['id'];
    $item = $params['item'];

    $query = "Update `tbl_items` SET Item='$item' where ID=$id";

    if ($this->link->query($query) === TRUE) {
      $this->successTemp["State"] = 1;
      $this->successTemp["Message"] = "New record successfully updated!";
      $this->response[] = $this->successTemp;
      return $this->response[0];
    } else {
      $this->successTemp["State"] = 0;
      $this->successTemp["Message"] = "Error updating record!";
      $this->response[] = $this->successTemp;
      return $this->response[0];
    }
  }

  function DeleteData($params) {
    $id = $params['id'];
    
    $query = "Delete from `tbl_items` where ID=$id";
    if ($this->link->query($query) === TRUE) {
      $this->successTemp["State"] = 1;
      $this->successTemp["Message"] = "Record successfully deleted";
      $this->response[] = $this->successTemp;
      return $this->response[0];
    } else {
      $this->successTemp["State"] = 0;
      $this->successTemp["Message"] = "Error deleting record!";
      $this->response[] = $this->successTemp;
      return $this->response[0];
    }
  }

}
?>