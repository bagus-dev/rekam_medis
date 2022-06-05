<script>
    $(document).ready(function() {
        $('#start').datetimepicker({
            format: 'L',
            locale: 'id',
            maxDate: moment().millisecond(999).second(59).minute(59).hour(23)
        });

        $('#end').datetimepicker({
            format: 'L',
            locale: 'id',
            maxDate: moment().millisecond(999).second(59).minute(59).hour(23)
        });
    });
</script>