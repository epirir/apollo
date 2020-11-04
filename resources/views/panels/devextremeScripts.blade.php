{{-- Use devextreme in page app --}}
<script src="{{ global_asset(mix('vendors/js/extensions/moment.min.js')) }}"></script>
<script src="{{ global_asset(mix('js/packages/devextreme/cldr.bundle.js')) }}"></script>
<script src="{{ global_asset(mix('js/packages/devextreme/globalize.bundle.js')) }}"></script>
<script src="{{ global_asset(mix('js/packages/devextreme/gt.bundle.js'))  }}"></script>
<script src="{{ global_asset(mix('js/packages/devextreme/dx.all.js')) }}"></script>
<script src="{{ global_asset(mix('js/packages/devextreme/dx.messages.js'))  }}"></script>
{{-- begin::Global Config --}}
<script>
    $(function() {
        moment.locale("es");
        Globalize.locale("es-GT");
        var decimalPlaces = 2;
    });
    // $(function() {
    //     Globalize.locale(navigator.language);
    // });
</script>