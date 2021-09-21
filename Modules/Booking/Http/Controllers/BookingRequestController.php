<?php

namespace Modules\Booking\Http\Controllers;

use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Booking\Entities\BillingInformation;
use Modules\Booking\Entities\BookingRequest;
use Modules\Booking\Http\Requests\BookingRequest as BookingFormRequest;
use Modules\Service\Entities\Service;
use Yajra\DataTables\Facades\DataTables;

class BookingRequestController extends Controller
{
    public $user;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->user = auth()->user();
            return $next($request);
        });
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($isTrashed = false)
    {

        if (is_null($this->user) || !$this->user->can('booking_request.view')) {
            $message = 'You are not allowed to access this page !';
            return view('errors.403', compact('message'));
        }

        if (request()->ajax()) {
            $status = empty(request()->status) ? 'pending' : request()->status;

            $query = BookingRequest::orderBy('id', 'desc')
                ->join('billing_information', 'billing_information.booking_request_id', '=', 'booking_requests.id')
                ->select(
                    'booking_requests.id',
                    'booking_requests.name',
                    'booking_requests.email',
                    'booking_requests.phone_no',
                    'booking_requests.service_name',
                    'booking_requests.start_date',
                    'booking_requests.status',
                    'billing_information.payment_status',
                    'billing_information.grand_total'
                );

            if (request()->status !== 'all') {
                $query->where('status', $status);
            }

            $booking_requests = $query->get();

            $datatable = DataTables::of($booking_requests, $isTrashed)
                ->addIndexColumn()
                ->addColumn(
                    'action',
                    function ($row) use ($isTrashed) {
                        $csrf = "" . csrf_field() . "";
                        $method_delete = "" . method_field("delete") . "";
                        $method_put = "" . method_field("put") . "";
                        $html = "";

                        $deleteRoute =  route('admin.booking_request.delete', [$row->id]);
                        if ($this->user->can('booking_request.edit')) {
                            $html = '<a class="btn waves-effect waves-light btn-success btn-sm btn-circle" title="View & Edit Request Details" href="' . route('admin.booking_request.edit', $row->id) . '"><i class="fa fa-eye"></i></a>';
                        }

                        if ($this->user->can('booking_request.delete')) {
                            $html .= '<a class="btn waves-effect waves-light btn-danger btn-sm btn-circle ml-2 text-white" title="Delete Admin" id="deleteItem' . $row->id . '"><i class="fa fa-trash"></i></a>';
                        }

                        $html .= '<script>
                            $("#deleteItem' . $row->id . '").click(function(){
                                swal.fire({ title: "Are you sure?",text: "Request will be deleted as trashed !",type: "warning",showCancelButton: true,confirmButtonColor: "#DD6B55",confirmButtonText: "Yes, delete it!"
                                }).then((result) => { if (result.value) {$("#deleteForm' . $row->id . '").submit();}})
                            });
                        </script>';

                        $html .= '<script>
                            $("#deleteItemPermanent' . $row->id . '").click(function(){
                                swal.fire({ title: "Are you sure?",text: "Request will be deleted permanently, both from trash !",type: "warning",showCancelButton: true,confirmButtonColor: "#DD6B55",confirmButtonText: "Yes, delete it!"
                                }).then((result) => { if (result.value) {$("#deletePermanentForm' . $row->id . '").submit();}})
                            });
                        </script>';

                        $html .= '<script>
                            $("#revertItem' . $row->id . '").click(function(){
                                swal.fire({ title: "Are you sure?",text: "Request will be revert back from trash !",type: "warning",showCancelButton: true,confirmButtonColor: "#DD6B55",confirmButtonText: "Yes, Revert Back!"
                                }).then((result) => { if (result.value) {$("#revertForm' . $row->id . '").submit();}})
                            });
                        </script>';

                        $html .= '
                            <form id="deleteForm' . $row->id . '" action="' . $deleteRoute . '" method="post" style="display:none">' . $csrf . $method_delete . '
                                <button type="submit" class="btn waves-effect waves-light btn-rounded btn-success"><i
                                        class="fa fa-check"></i> Confirm Delete</button>
                                <button type="button" class="btn waves-effect waves-light btn-rounded btn-secondary" data-dismiss="modal"><i
                                        class="fa fa-times"></i> Cancel</button>
                            </form>';

                        $html .= '
                            <form id="deletePermanentForm' . $row->id . '" action="' . $deleteRoute . '" method="post" style="display:none">' . $csrf . $method_delete . '
                                <button type="submit" class="btn waves-effect waves-light btn-rounded btn-success"><i
                                        class="fa fa-check"></i> Confirm Permanent Delete</button>
                                <button type="button" class="btn waves-effect waves-light btn-rounded btn-secondary" data-dismiss="modal"><i
                                        class="fa fa-times"></i> Cancel</button>
                            </form>';
                        return $html;
                    }
                )

                ->editColumn('status', function ($row) {
                    $statusText = ucwords($row->status);
                    if ($row->status === 'pending') {
                        return '<span class="badge badge-warning font-weight-100">' . $statusText . '</span>';
                    } else if ($row->status === 'completed') {
                        return '<span class="badge badge-success">' . $statusText . '</span>';
                    } else if ($row->status === 'cancelled') {
                        return '<span class="badge badge-danger">' . $statusText . '</span>';
                    } else {
                        return '<span class="badge badge-info">' . $statusText . '</span>';
                    }
                })
                ->editColumn('payment_status', function ($row) {
                    $statusText = ucwords($row->payment_status);
                    if ($row->payment_status === 'pending') {
                        return '<span class="badge badge-warning font-weight-100">' . $statusText . '</span>';
                    } else if ($row->payment_status === 'paid') {
                        return '<span class="badge badge-success">' . $statusText . '</span>';
                    } else if ($row->payment_status === 'cancelled') {
                        return '<span class="badge badge-danger">' . $statusText . '</span>';
                    } else {
                        return '<span class="badge badge-info">' . $statusText . '</span>';
                    }
                })
                ->editColumn('grand_total', function ($row) {
                    return "<span class='text-danger text-bold'>$row->grand_total $</span>";
                });

            $rawColumns = ['name', 'email', 'phone_no', 'service_name', 'start_date', 'status', 'payment_status', 'grand_total', 'action'];

            return $datatable->rawColumns($rawColumns)->make(true);
        }

        $count_booking_requests             = BookingRequest::select('id')->where('status', '!=', 'no-billing')->count();
        $count_pending_booking_requests     = BookingRequest::select('id')->where('status', 'pending')->count();
        $count_processing_booking_requests  = BookingRequest::select('id')->where('status', 'processing')->count();
        $count_completed_booking_requests   = BookingRequest::select('id')->where('status', 'completed')->count();
        $count_cancelled_booking_requests   = BookingRequest::select('id')->where('status', 'cancelled')->count();

        return view('booking::backend.booking_request.index', compact('count_booking_requests', 'count_pending_booking_requests', 'count_processing_booking_requests', 'count_cancelled_booking_requests', 'count_completed_booking_requests'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BookingFormRequest $request)
    {
        try {
            $booking_request = BookingRequest::store($request->all());

            if (!empty($booking_request)) {
                session()->flash('success', 'Your request has been added. Please provide billing information to confirm.');
                return redirect()->route('demo.business.booking_request.create.billing', $booking_request->id);
            }

            session()->flash('error', 'Something went wrong creating booking request. Please try again.');
            return back();
        } catch (Exception $e) {
            session()->flash('error', $e->getMessage());
        }
    }

    /**
     * Show the form for creating the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $service_category_id = null;
        $service_id          = null;
        $service     = null;

        if (!empty(request()->id)) {
            $id = intval(request()->id);
            $service = Service::where('id', $id)->first();
            if (!empty($service)) {
                $service_category_id = $service->category_id;
                $service_id = $service->id;
            }
        }

        return view('booking::frontend.pages.booking-request', compact('service_category_id', 'service_id', 'service'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (is_null($this->user) || !$this->user->can('booking_request.edit')) {
            $message = 'You are not allowed to access this page !';
            return view('errors.403', compact('message'));
        }

        $booking_request  = BookingRequest::find($id);
        $booking_statuses = BookingRequest::getServiceStatuses();
        $billing_statuses = BillingInformation::getBillingStatuses();
        $billing          = $booking_request->billing;

        return view('booking::backend.booking_request.edit', compact('booking_request', 'booking_statuses', 'billing_statuses', 'billing'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (is_null($this->user) || !$this->user->can('booking_request.edit')) {
            $message = 'You are not allowed to access this page !';
            return view('errors.403', compact('message'));
        }

        $booking_request = BookingRequest::find($id);

        if (empty($booking_request)) {
            session()->flash('error', "The page is not found.");
            return redirect()->route('admin.booking_request.index');
        }

        // Update booking_request
        $booking_request->status = $request->booking_status;
        $booking_request->save();

        // Update billing status
        $billing_info = $booking_request->billing;
        if (!empty($billing_info)) {
            $billing_info->payment_status = $request->billing_status;
            $billing_info->save();
        }

        session()->flash('success', "Informations updated successfully.");
        $redirected_url = route('admin.booking_request.index') . '?status=' . $booking_request->status;
        return redirect($redirected_url);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (is_null($this->user) || !$this->user->can('booking_request.delete')) {
            $message = 'You are not allowed to access this page !';
            return view('errors.403', compact('message'));
        }

        $booking_request = BookingRequest::find($id);

        if (empty($booking_request)) {
            session()->flash('error', "The page is not found !");
            return redirect()->route('admin.booking_request.index');
        }

        $booking_request->delete();

        session()->flash('success', 'Request has been deleted successfully.');
        return redirect()->route('admin.booking_request.index');
    }

    /**
     * destroyTrash
     *
     * @param integer $id
     * @return void Destroy the data permanently
     */
    public function destroyTrash($id)
    {
        if (is_null($this->user) || !$this->user->can('booking_request.delete')) {
            $message = 'You are not allowed to access this page !';
            return view('errors.403', compact('message'));
        }
        $booking_request = BookingRequest::find($id);
        if (is_null($booking_request)) {
            session()->flash('error', "The page is not found !");
            return redirect()->route('admin.booking_request.trashed');
        }

        // Delete Category permanently
        $booking_request->delete();

        session()->flash('success', 'Request has been deleted permanently !!');
        return redirect()->route('admin.booking_request.trashed');
    }

    /**
     * trashed
     *
     * @return view the trashed data list -> which data status = 0 and deleted_at != null
     */
    public function trashed()
    {
        if (is_null($this->user) || !$this->user->can('booking_request.view')) {
            $message = 'You are not allowed to access this page !';
            return view('errors.403', compact('message'));
        }

        return $this->index(true);
    }
}
