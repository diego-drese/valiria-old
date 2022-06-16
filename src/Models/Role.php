<?php
namespace Valiria\Auth\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Arr;
use Valiria\Auth\Traits\HasPermissions;
use Valiria\Auth\Traits\HasRoles;

class Role extends Model {

    use HasRoles,HasPermissions;
    protected $table= 'role';
    protected $guarded = ['id'];

    /**
     * @return BelongsToMany
     */
    public function users(): BelongsToMany {
        return $this->belongsToMany(User::class);
    }

}
