<?php
namespace Valiria\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Valiria\Traits\HasRoles;

class Permission extends Model
{
    use HasRoles;
    protected $table = 'permission';
    protected $guarded = ['id'];
}
