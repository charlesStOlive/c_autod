<?php namespace Waka\Crsm\Models;

use Model;

/**
 * lot Model
 */
class Lot extends Model
{
    use \October\Rain\Database\Traits\Validation;
    use \October\Rain\Database\Traits\SoftDelete;
    use \October\Rain\Database\Traits\Sortable;

    use \Waka\Cloudis\Classes\Traits\CloudiTrait;

    /**
     * @var string The database table used by the model.
     */
    public $table = 'waka_crsm_lots';

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
    protected $jsonable = ['content', 'content_word'];

    /**
     * @var array Attributes to be appended to the API representation of the model (ex. toArray())
     */
    protected $appends = [];

    /**
     * @var array Attributes to be removed from the API representation of the model (ex. toArray())
     */
    protected $hidden = [
        'project_id',
        'type_lot_id',
        'contact_id',
        'project_id',
        'deleted_at',

    ];

    /**
     * @var array Attributes to be cast to Argon (Carbon) instances
     */
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    /**
     * @var array Relations
     */
    public $hasOne = [];
    public $hasMany = [];
    public $belongsTo = [
        'type_lot' => ['Waka\Crsm\Models\TypeLot'],
        'project' => ['Waka\Crsm\Models\Project'],
        'contact' => ['Waka\Crsm\Models\Contact'],
    ];
    public $belongsToMany = [];
    public $morphTo = [];
    public $morphOne = [];
    public $morphToMany = [
        'montages' => [
            'Waka\Cloudis\Models\Montage',
            'name' => 'montageable',
            'table' => 'waka_cloudis_montageables',
        ],
    ];
    public $attachOne = [
        'main_picture' => 'Waka\Cloudis\Models\CloudiFile',
        'picture_1' => 'Waka\Cloudis\Models\CloudiFile',
        'picture_2' => 'Waka\Cloudis\Models\CloudiFile',
        'plan_1' => 'Waka\Cloudis\Models\CloudiFile',
    ];
    public $attachMany = [];

    /**
     * EVENT
     */
    public function beforeSave()
    {

    }
    public function afterSave()
    {
        $this->updateCloudiRelations('attach');
    }
    public function beforeDelete()
    {
        trace_log("Before deelete");
        $this->clouderDeleteAll();
    }

    /**
     * SCOPES
     */
    public function scopeReservationFilter($query, $filtered)
    {
        if ($filtered == 1) {
            return $query->has('contact', '=', 0);
        }
        if ($filtered == 2) {
            return $query->has('contact');
        }
    }
    public function scopeNotClosed($query, $filtered)
    {
        return $query;
    }

    /**
     * RAPID LINK fonctionne via plugin UTILS
     */
    public function getRapidLinksAttribute()
    {
        $links = [
            [
                'name' => "Projet du lot",
                'href' => \Backend::url('waka/crsm/projects/update/' . $this->project->id),
            ],
            [
                'name' => "Tous les projets",
                'href' => \Backend::url('waka/crsm/projects'),
            ],
        ];
        if ($this->contact) {
            array_push($links, [
                'name' => "Contact de la réservation",
                'href' => \Backend::url('waka/crsm/contacts/update/' . $this->contact->id),
            ]);
        }
        return $links;
    }
}
