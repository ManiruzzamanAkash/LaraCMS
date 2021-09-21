<?php

namespace Modules\Booking\Entities;

use Carbon\Carbon;
use Exception;
use Illuminate\Database\Eloquent\Model;

class BillingInformation extends Model
{
    protected $fillable = [
        'booking_request_id',
        'first_name',
        'last_name',
        'email',
        'phone_no',
        'company_name',
        'state',
        'city',
        'address',
        'post_code',
        'billing_message',
        'booking_hour',
        'booking_subtotal',
        'booking_gst',
        'grand_total',
        'payment_status'
    ];

    /**
     * Get Default Billing GST Amount
     *
     * @return float|int
     */
    public static function getDefaultBillingGst() {
        return 10;
    }

    /**
     * Get Billing Statuses
     *
     * @return array
     */
    public static function getBillingStatuses()
    {
        return [
            'pending'   => 'Pending',
            'paid'      => 'Paid',
            'cancelled' => 'Cancelled'
        ];
    }

    /**
     * Store Billing information based on Booking request
     *
     * @param array $data
     *
     * @return object|null|Exception
     */
    public static function store($data = [])
    {
        // Check if booking_request exists
        $booking_request = BookingRequest::find($data['booking_request_id']);
        if (empty($booking_request)) {
            throw new Exception("Please give valid booking request.");
        }
        if (Carbon::now() > $booking_request->expired_at) {
            throw new Exception("Billing information entry for this booking has been expired. Please create one again.");
        }

        // Check if already an entry submitted for this booking request or not
        if (BillingInformation::where('booking_request_id', $data['booking_request_id'])->exists()) {
            throw new Exception("Already a billing information has been added for this request. Please create one again.");
        }

        try {
            $booking_hour        = (float) $data['booking_hour'];
            $booking_subtotal    = $booking_request->booking_rate_value * $booking_hour;
            $booking_default_gst = self::getDefaultBillingGst();
            $booking_gst         = $booking_default_gst * ($booking_subtotal) / 100;
            $grand_total         = (float) $booking_subtotal + (float) $booking_gst;

            $processed_data = [
                'booking_request_id' => $data['booking_request_id'],
                'first_name'         => $data['first_name'],
                'last_name'          => empty($data['last_name']) ? null : $data['last_name'],
                'email'              => $data['email'],
                'phone_no'           => $data['phone_no'],
                'company_name'       => empty($data['company_name']) ? null : $data['company_name'],
                'state'              => $data['state'],
                'city'               => $data['city'],
                'address'            => $data['address'],
                'post_code'          => empty($data['post_code']) ? null : $data['post_code'],
                'billing_message'    => empty($data['billing_message']) ? null : $data['billing_message'],
                'booking_hour'       => $booking_hour,

                // Calculated datas
                'booking_subtotal'   => $booking_subtotal,
                'booking_gst'        => $booking_gst,
                'grand_total'        => $grand_total,
                'payment_status'     => 'pending'
            ];

            $billing_information     = BillingInformation::create($processed_data);
            $booking_request->status = 'pending';
            $booking_request->save();

            return $billing_information;
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
}
