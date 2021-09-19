<?php

namespace Modules\Booking\Entities;

use Exception;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Article\Entities\Category;
use Modules\Service\Entities\Service;

class BookingRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone_no',
        'service_category_id',
        'service_category_name',
        'service_id',
        'service_name',
        'start_date',
        'start_time',
        'message'
    ];

    /**
     * Get Service Statuses
     *
     * @return array
     */
    public function getServiceStatuses()
    {
        return [
            'pending'    => 'Pending',
            'processing' => 'Processing',
            'cancelled'  => 'Cancelled',
            'completed'  => 'Completed',
        ];
    }

    /**
     * Create New Booking Request
     *
     * @param array $data
     *
     * @return void
     */
    public static function store($data = [])
    {
        // Check if service category exists
        $category = Category::find($data['service_category_id']);
        if (empty($category)) {
            throw new Exception("Please give valid service category.");
        }

        // Check if service exists
        $service = Service::find($data['service_id']);
        if (empty($service)) {
            throw new Exception("Please select a valid service.");
        }

        try {
            $processed_data = [
                'name'                  => $data['name'],
                'email'                 => $data['email'],
                'phone_no'              => $data['phone_no'],
                'service_category_id'   => $category->id,
                'service_category_name' => $category->name,
                'service_id'            => $service->id,
                'service_name'          => $service->title,
                'start_date'            => $data['start_date'],
                'start_time'            => $data['start_time'],
                'message'               => $data['message']
            ];

            return BookingRequest::create($processed_data);
        } catch (Exception $e) {
            throw new Exception("Please give valid values for inputs.");
        }

        return null;
    }
}
