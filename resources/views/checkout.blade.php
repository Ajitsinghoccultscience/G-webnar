@extends('layouts.app')

@section('title', 'Register for Mega Webinar')
@section('description', 'Register for the Mega Graphology Webinar - Reserve your seat now.')

@section('content')
{{-- Top cream bar - matches hero section --}}
<div class="w-full h-[24px] bg-accent-cream"></div>

<section class="min-h-screen bg-neutral-b text-white py-12 md:py-16 lg:py-20">
    <div class="max-w-[1200px] xl:max-w-[1400px] mx-auto section-px">
        {{-- Header --}}
        <div class="text-center mb-10 md:mb-14">
            <h1 class="text-hero font-bold text-button-gradient uppercase tracking-wide mb-3">Mega Webinar</h1>
            <img src="{{ asset('images/graphology image/underline 9.svg') }}" alt="" class="mx-auto w-[157px] h-[14px]" aria-hidden="true">
            <p class="text-neutral-i/90 text-content mt-6 max-w-xl mx-auto">Complete the form below to reserve your seat for the webinar.</p>
        </div>

        {{-- Form card --}}
        <div class="max-w-[580px] lg:max-w-[640px] mx-auto">
            <x-ui.card variant="white" class="p-6 md:p-10 lg:p-12 shadow-card">
                {{-- Zoho form - keep all name attributes and structure for submission --}}
                <form
                    action="https://forms.zohopublic.in/allindiainstituteofoccultsci1/form/MegaWebnar/formperma/JeyRozVuoPowoO_7MgXtRZUcfNwMSJEVJjh6vqrJp8I/htmlRecords/submit"
                    name="form"
                    method="POST"
                    onSubmit="javascript:document.charset='UTF-8'; return zf_ValidateAndSubmit();"
                    accept-charset="UTF-8"
                    enctype="multipart/form-data"
                    id="form"
                    class="space-y-5 lg:space-y-7"
                >
                    <input type="hidden" name="zf_referrer_name" value="">
                    <input type="hidden" name="zf_redirect_url" value="{{ url('/thankyou') }}">
                    <input type="hidden" name="zc_gad" value="">

                    {{-- First Name & Last Name side-by-side on desktop --}}
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5 lg:gap-6">
                        {{-- First Name --}}
                        <div>
                            <label for="Name_First" class="block text-content font-semibold text-neutral-b mb-2">
                                First Name <span class="text-secondary">*</span>
                            </label>
                            <input
                                type="text"
                                name="Name_First"
                                id="Name_First"
                                maxlength="255"
                                fieldType="7"
                                required
                                placeholder="Enter your first name"
                                class="w-full h-12 lg:h-[52px] px-4 rounded-10 border border-neutral-h bg-white text-neutral-b text-content placeholder:text-neutral-e/60 focus:border-accent-gold focus:ring-2 focus:ring-accent-gold/30 outline-none transition-all"
                            >
                            <p id="Name_error" class="text-sm text-secondary mt-1.5" style="display:none;">Please enter your first name.</p>
                        </div>

                        {{-- Last Name --}}
                        <div>
                            <label for="Name_Last" class="block text-content font-semibold text-neutral-b mb-2">
                                Last Name
                            </label>
                            <input
                                type="text"
                                name="Name_Last"
                                id="Name_Last"
                                maxlength="255"
                                fieldType="7"
                                placeholder="Enter your last name"
                                class="w-full h-12 lg:h-[52px] px-4 rounded-10 border border-neutral-h bg-white text-neutral-b text-content placeholder:text-neutral-e/60 focus:border-accent-gold focus:ring-2 focus:ring-accent-gold/30 outline-none transition-all"
                            >
                        </div>
                    </div>

                    {{-- Phone --}}
                    <div>
                        <label for="PhoneNumber_countrycode" class="block text-content font-semibold text-neutral-b mb-2">
                            Phone
                        </label>
                        <input
                            type="text"
                            name="PhoneNumber_countrycode"
                            id="PhoneNumber_countrycode"
                            compname="PhoneNumber"
                            maxlength="20"
                            checktype="c7"
                            phoneFormat="1"
                            isCountryCodeEnabled="false"
                            fieldType="11"
                            valType="number"
                            phoneFormatType="1"
                            placeholder="Enter your phone number"
                            class="w-full h-12 lg:h-[52px] px-4 rounded-10 border border-neutral-h bg-white text-neutral-b text-content placeholder:text-neutral-e/60 focus:border-accent-gold focus:ring-2 focus:ring-accent-gold/30 outline-none transition-all"
                        >
                        <p id="PhoneNumber_error" class="text-sm text-secondary mt-1.5" style="display:none;">Please enter a valid phone number.</p>
                    </div>

                    {{-- Email --}}
                    <div>
                        <label for="Email" class="block text-content font-semibold text-neutral-b mb-2">
                            Email
                        </label>
                        <input
                            type="email"
                            name="Email"
                            id="Email"
                            checktype="c5"
                            maxlength="255"
                            fieldType="9"
                            placeholder="Enter your email address"
                            class="w-full h-12 lg:h-[52px] px-4 rounded-10 border border-neutral-h bg-white text-neutral-b text-content placeholder:text-neutral-e/60 focus:border-accent-gold focus:ring-2 focus:ring-accent-gold/30 outline-none transition-all"
                        >
                        <p id="Email_error" class="text-sm text-secondary mt-1.5" style="display:none;">Please enter a valid email address.</p>
                    </div>

                    {{-- Submit --}}
                    <div class="pt-2 lg:pt-3">
                        <button
                            type="submit"
                            class="w-full h-[66px] md:h-[73px] inline-flex items-center justify-center font-bold text-content md:text-[1.25rem] tracking-[0.6px] rounded-lg bg-button-gradient text-neutral-b hover:opacity-95 transition-opacity focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-neutral-b"
                        >
                            Reserve My Seat @ ₹99
                        </button>
                    </div>
                </form>
            </x-ui.card>

            <p class="text-center text-neutral-i/70 text-sm mt-6">Secure payment • Trusted by 18k+ alumni</p>
        </div>
    </div>
</section>

@push('scripts')
<script src="{{ asset('js/zoho-form-validation.js') }}"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    var dateAndMonthRegexFormateArray = zf_SetDateAndMonthRegexBasedOnDateFormate('dd-MMM-yyyy');
    window.zf_DateRegex = new RegExp(dateAndMonthRegexFormateArray[0]);
    window.zf_MonthYearRegex = new RegExp(dateAndMonthRegexFormateArray[1]);
    window.zf_MandArray = ["Name_First"];
    window.zf_FieldArray = ["Name_First", "Name_Last", "PhoneNumber_countrycode", "Email"];
    window.isSalesIQIntegrationEnabled = false;
    window.salesIQFieldsArray = [];
});
</script>
@endpush
@endsection
