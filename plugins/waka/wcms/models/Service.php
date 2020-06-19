<?php namespace Waka\Wcms\Models;

use Model;

/**
 * Service Model
 */
class Service extends Model
{
    use \October\Rain\Database\Traits\Validation;
    use \October\Rain\Database\Traits\NestedTree;
    use \Waka\Cloudis\Classes\Traits\CloudiTrait;

    /**
     * @var string The database table used by the model.
     */
    public $table = 'waka_wcms_services';

    /**
     * @var array Guarded fields
     */
    protected $guarded = ['*'];

    /**
     * @var array Fillable fields
     */
    protected $fillable = [];

    /**
     * @var array Validation rules for attributes
     */
    public $rules = [];

    /**
     * @var array Attributes to be cast to native types
     */
    protected $casts = [];

    /**
     * @var array Attributes to be cast to JSON
     */
    protected $jsonable = ['content'];

    /**
     * @var array Attributes to be appended to the API representation of the model (ex. toArray())
     */
    protected $appends = [];

    /**
     * @var array Attributes to be removed from the API representation of the model (ex. toArray())
     */
    protected $hidden = [
        'deleted_at',
        'sort_order',
    ];

    /**
     * @var array Attributes to be cast to Argon (Carbon) instances
     */
    protected $dates = [
        'created_at',
        'updated_at',
    ];

    /**
     * @var array Relations
     */
    public $hasOne = [];
    public $hasMany = [];
    public $belongsTo = [];
    public $morphTo = [];
    public $morphOne = [];
    public $morphMany = [];
    public $attachOne = [
        'main_image' => 'Waka\Cloudis\Models\CloudiFile',
    ];
    public $attachMany = [];

    public function afterSave()
    {
        $this->updateCloudiRelations('attach');
    }
    public function afterDelete()
    {
        //trace_log("afterDelete");
        $this->clouderDeleteAll();
    }

    public function getRapidLinksAttribute()
    {
        $link = [
            "name" => "Page Web",
            "href" => url('service/' . $this->slug),
            "target" => "_blank",
        ];
        return [$link];
    }
}
