<?php
class CategoryModel
{
    public int $id;
    public string $name;
    public string $description;
    public int $is_active;
    public int $create_time;
    public int $update_time;
    public int $create_by;

    function __construct(int $id, string $name, string $description)
    {
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->is_active = 1;
        $this->create_time = 1663575049;
        $this->update_time = 1663575050;
        $this->create_by = 1;
    }

    static function fakeData(): array
    {
        return array(
            new CategoryModel(1, 'funny', 'Category of funny'),
            new CategoryModel(2, 'baby', 'Category of baby'),
            new CategoryModel(3, 'food', 'Category of food'),
            new CategoryModel(4, 'bike', 'Category of bike'),
            new CategoryModel(5, 'dog', 'Category of dog'),
        );
    }
};

function getCategoryById($id) : CategoryModel {
    $idx = $id - 1;
    $categories = getAllCategory();
    if($idx < 0 || $idx > count($categories)) $idx = 0;
    return $categories[$idx];
}

function getAllCategory() : array {
    return CategoryModel::fakeData();
}
