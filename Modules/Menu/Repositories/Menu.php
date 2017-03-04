<?php

namespace Modules\Menu\Repositories;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model {

    const TYPE_CUSTOM        = 0;
    const TYPE_POST          = 1;
    const TYPE_POST_CATEGORY = 2;

    protected $guarded = ['id'];

    public function getId()
    {
        return $this->id;
    }

    public function getLabel()
    {
        return $this->label;
    }

    public function getUrl()
    {
        return $this->url;
    }

    public function getParentId()
    {
        return $this->parent_id;
    }

    public function getType()
    {
        return $this->type;
    }

    /**
     * Get menu type
     * @return array
     */
    public static function getTypeOptions()
    {
        return [
            self::TYPE_CUSTOM        => 'Tùy chỉnh',
            self::TYPE_POST          => 'Tin tức',
            self::TYPE_POST_CATEGORY => 'Danh mục tin tức'
        ];
    }
}