<!-- Booking Service Modal -->
<div class="modal fade" id="bookingServiceModal" tabindex="-1" aria-labelledby="bookingServiceLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="bookingServiceLabel">
                    Book a Service
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                @include('booking::frontend.partials.booking-request-form')
            </div>
        </div>
    </div>
</div>
