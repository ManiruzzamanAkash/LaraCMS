<?php

namespace Modules\Booking\Entities;

use Carbon\Carbon;
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
        'booking_rate_id',
        'booking_rate_name',
        'booking_rate_value',
        'start_date',
        'start_time',
        'message',
        'expired_at',
        'status'
    ];

    /**
     * Get Service Statuses
     *
     * @return array
     */
    public static function getServiceStatuses()
    {
        return [
            'pending'    => 'Pending',
            'processing' => 'Processing',
            'cancelled'  => 'Cancelled',
            'completed'  => 'Completed',
        ];
    }

    /**
     * Get Service Hours
     *
     * @return array
     */
    public static function getServiceHours()
    {
        return [
            '1Hr'   => 1,
            '1.5Hr' => 1.5,
            '2Hr'   => 2,
            '2.5Hr' => 2.5,
            '3Hr'   => 3,
            '3.5Hr' => 3.5,
            '4Hr'   => 4,
            '4.5Hr' => 4.5,
            '5Hr'   => 5
        ];
    }

    /**
     * Service Related to Booking Request
     *
     * @return object|null
     */
    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    /**
     * Service Related to Booking Request
     *
     * @return object|null
     */
    public function rate()
    {
        return $this->belongsTo(BookingRate::class);
    }

    /**
     * Billing Related to Booking Request
     *
     * @return object|null
     */
    public function billing()
    {
        return $this->hasOne(BillingInformation::class, 'booking_request_id', 'id');
    }

    /**
     * Create New Booking Request
     *
     * @param array $data
     *
     * @return object|null BookingRequest
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

        // Check if service exists
        $rate = BookingRate::find($data['booking_rate_id']);
        if (empty($rate)) {
            throw new Exception("Please select a booking rate.");
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
                'booking_rate_id'       => $rate->id,
                'booking_rate_name'     => $rate->name,
                'booking_rate_value'    => $rate->rate,
                'start_date'            => $data['start_date'],
                'start_time'            => $data['start_time'],
                'message'               => $data['message'],
                'expired_at'            => Carbon::now()->addMinutes(5), // Add 5 minutes later,
                'status'                => 'no-billing'
            ];

            return BookingRequest::create($processed_data);
        } catch (Exception $e) {
            throw new Exception("Please give valid values for inputs.");
        }

        return null;
    }
}
