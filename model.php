<?php

class Database
{

  public $result;
  public $data = [];

  // Methods
  function get($conn, $table, $where = null)
  {

    if ($where == null) {
      $sql = "SELECT * FROM $table";
      $this->result = $conn->query($sql);
    } else {
      $sql = "SELECT * FROM $table WHERE $where";
      $this->result = $conn->query($sql);
    }

    if ($this->result->num_rows > 0) {
      while ($row = $this->result->fetch_assoc()) {
        $this->data[] = $row;
      }

      return $this->data;
    } else {
      return false;
    }
  }

  function insert($conn, $table, $data)
  {
    $value = "";
    $i = 1;
    foreach ($data as $val) {
      $value .= "'" . $val . "'";
      if ($i != count($data)) {
        $value .= ", ";
      }
      $i++;
    }
    unset($i);

    $sql = "INSERT INTO $table VALUES ($value)";
    return $conn->query($sql);
  }

  function update($conn, $table, $where, $data)
  {
    $sql = "UPDATE $table SET $data WHERE $where";
    return $conn->query($sql);
  }

  function delete($conn, $table, $where)
  {
    $sql = "DELETE FROM $table WHERE $where";
    $conn->query($sql);

    return $conn->query($sql);
  }
}

$db = new Database();
