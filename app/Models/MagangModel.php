<?php

namespace App\Models;

use CodeIgniter\Model;

class MagangModel extends Model
{
  protected $table = 'magang';
  protected $useTimestamps = true;
  protected $allowedFields = ['title', 'slug', 'author', 'publisher', 'cover'];

  public function getBooks($slug = false)
  {
    if ($slug == false) {
      return $this->findAll();
    }

    return $this->where(['slug' => $slug])->first();
  }
}
