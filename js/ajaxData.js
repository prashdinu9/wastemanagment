
    $(function() {
        $(document).on('click', '#submit', function (e) {
            e.preventDefault();

            var weight = $('#weight').val();

                $.ajax({
                    url: 'binweight.php',
                    method: 'post',
                    data: {
                        weight: weight,
                    },
                    success: function (data) {
                        $('.success').removeClass('d-none').html(data);
                    },
                    error: function (data) {
                        $('.error').removeClass('d-none').html(data);
                    }
                });
            }
        });
    });
