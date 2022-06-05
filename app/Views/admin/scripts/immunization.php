<script>
    $(document).ready(function() {
        $('#select2').select2({
            placeholder: "Pilih Pasien",
            allowClear: true,
            theme: 'bootstrap4'
        });

        $('#date_of_birth').datetimepicker({
            format: 'L',
            locale: 'id'
        });
    });
</script>