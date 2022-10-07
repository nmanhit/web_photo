<?php
declare(strict_types=1);
namespace model;

include "BaseModel.php";

use model\BaseModel as BaseModel;

class User extends BaseModel
{
    public int $id;
    public string $email;
    public string $password;
    public string $full_name;
    public int $is_active;
    public int $update_time;
    public int $create_time;

    public function table_name(): string
    {
        return "tbl_user";
    }
}
