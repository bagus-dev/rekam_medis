<script>
    $(document).ready(function() {
        $('#select2').select2({
            placeholder: "Pilih Pasien",
            allowClear: true,
            theme: 'bootstrap4'
        });

        $('#revisit').datetimepicker({
            format: 'L',
            locale: 'id'
        });

        $('#hpht').datetimepicker({
            format: 'L',
            locale: 'id'
        });
    });
</script>