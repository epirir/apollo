        {{-- Vendor Scripts --}}

        <script src="{{ global_asset(mix('vendors/js/extensions/moment.min.js')) }}"></script>

        <script src="{{ global_asset(mix('vendors/js/vendors.min.js')) }}"></script>
        <script src="{{ global_asset(mix('vendors/js/ui/prism.min.js')) }}"></script>

        <script src="{{ global_asset(mix('js/packages/devextreme/cldr.bundle.js')) }}"></script>
        <script src="{{ global_asset(mix('js/packages/devextreme/globalize.bundle.js')) }}"></script>
        <script src="{{ global_asset(mix('js/packages/devextreme/gt.bundle.js'))  }}"></script>

        <script src="{{ global_asset(mix('js/packages/devextreme/dx.all.js')) }}"></script>
        <script src="{{ global_asset(mix('js/packages/devextreme/dx.aspnet.data.js')) }}"></script>

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
        {{-- end::Global Config  --}}
        @yield('vendor-script')
        {{-- Theme Scripts --}}
        <script src="{{ global_asset(mix('js/core/app-menu.js')) }}"></script>
        <script src="{{ global_asset(mix('js/core/app.js')) }}"></script>
        <script src="{{ global_asset(mix('js/scripts/components.js')) }}"></script>
        @if($configData['blankPage'] == false)
        <script src="{{ global_asset(mix('js/scripts/footer.js')) }}"></script>
        @endif
        {{-- page script --}}
        @yield('page-script')
