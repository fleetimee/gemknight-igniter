<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelKota extends Model
{
  protected $table = "kota";
  protected $primaryKey = "kota_id";
  protected $setAutoIncrement = true;
  protected $allowedFields = ["kota_nama"];
  protected $returnType = "object";
}
