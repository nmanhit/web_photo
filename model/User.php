<?php
declare(strict_types=1);

namespace model;

require_once "BaseModel.php";

use model\BaseModel as BaseModel;

class User extends BaseModel
{
    public int $id;
    public string $email;
    public string $password;
    public string $full_name;
    public string $avatar;
    public int $is_active;
    public int $update_time;
    public int $create_time;

    public function tableName(): string
    {
        return "tbl_user";
    }
}
