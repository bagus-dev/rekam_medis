<script>
    $(document).ready(function() {
        $('#select2').select2({
            placeholder: "Pilih Pasien",
            allowClear: true,
            theme: 'bootstrap4'
        });

        $('#first_day').datetimepicker({
            locale: 'id',
            format: 'L'
        });

        $('#estimated_day').datetimepicker({
            locale: 'id',
            format: 'L'
        });

        $('#year').datetimepicker({
            locale: 'id',
            format: 'YYYY'
        });

        $('#date').datetimepicker({
            locale: 'id',
            icons: {
                time: "fas fa-clock"
            }
        });

        $('#complication').change(function() {
            let comp = $(this).val();

            if(comp === '1') {
                $('#form-desc').css("display","block");
            } else {
                $('#form-desc').css("display","none");
            }
        });

        $('#refer').change(function() {
            let comp = $(this).val();

            if(comp === '1') {
                $('#form-refer').css("display","block");
            } else {
                $('#form-refer').css("display","none");
            }
        });
    });
</script>