<script>
    $(document).ready(function() {
        $('#select2').select2({
            placeholder: "Pilih Pasien",
            allowClear: true,
            theme: 'bootstrap4'
        });
        
        $('#datetime').datetimepicker({
            locale: 'id',
            icons: {
                time: "fas fa-clock"
            }
        });
    });
</script>