        {{-- Vendor Scripts --}}
        <script src="{{ global_asset(mix('vendors/js/vendors.min.js')) }}"></script>
        <script src="{{ global_asset(mix('vendors/js/ui/prism.min.js')) }}"></script>
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
