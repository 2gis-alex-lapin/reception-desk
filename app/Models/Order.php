<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use App\Models\File;
use App\Models\Task;
use App\Models\Project;
use App\Models\OrderStatus;

class Order extends Model
{
    use HasFactory;

    /**
     * Get the user associated with the order.
     */
    public function user(): HasOne
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    /**
     * Get the project associated with the order.
     */
    public function project(): HasOne
    {
        return $this->hasOne(Project::class, 'id', 'project_id');
    }

    /**
     * Get the files associated with the order.
     */
    public function files(): BelongsToMany
    {
        return $this->belongsToMany(File::class);
    }

    /**
     * Get the task associated with the order.
     */
    public function task(): HasOne
    {
        return $this->hasOne(Task::class, 'id', 'task_id');
    }

    /**
     * Get the status associated with the order.
     */
    public function status(): HasOne
    {
        return $this->hasOne(OrderStatus::class, 'id', 'status_id');
    }

    public function getTitle()
    {
        $data = json_decode($this->data,true);
        
        switch ($data['task_id']) {
            case 'get-promo':
                $jobs = [];
                foreach ($data['send-promo'] as $job) {
                    $jobs[] = trans('orders.send-promo.'.$job);
                }
                $jobs = implode(', ', $jobs);
                $company_name = $data['company-name'];
                $title = $company_name . ', ' . $jobs;
                break;
            case 'add-user':
                $title = 'Новый пользователь ' . $firstname . ' ' . $lastname;
                break;
            case 'remove-user':
                $title = 'Удалить пользователя ' . $data['username'];
                break;

            
            default:
                # code...
                break;
        }
        return $title;
    }
}
