@extends('layouts.app')

@section('title', 'Register for Mega Webinar')
@section('description', 'Register for the Mega Graphology Webinar - Reserve your seat now.')

@section('content')

        <iframe aria-label='Mega Webnar' frameborder="0" style="height:100vh;width:100%;border:none;" src='https://forms.zohopublic.in/allindiainstituteofoccultsci1/form/MegaWebnar/formperma/G5-sJzQY1LJXGwjhhOK6RpOrPD680Uc6NMOQhg1Yv88'></iframe>


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
