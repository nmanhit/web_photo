<?php
declare(strict_types=1);

namespace model;

require_once "BaseModel.php";

use model\BaseModel as BaseModel;

class Category extends BaseModel
{
    public int $id;
    public string $name;
    public string $description;
    public string $photo;
    public int $is_active;
    public int $update_time;
    public int $create_time;
    public int $create_by;

    public function tableName(): string
    {
        return "tbl_categories";
    }
}
