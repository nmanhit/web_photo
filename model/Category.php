<?php
declare(strict_types=1);
namespace model;

include "BaseModel.php";

use model\BaseModel as BaseModel;

class Category extends BaseModel
{
    public int $id;
    public string $name;
    public string $description;
    public int $is_active;
    public int $update_time;
    public int $create_time;
    public int $create_by;

    public function table_name(): string
    {
        return "tbl_categories";
    }
}
