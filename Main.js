$(document).ready(function() {
    $('#contact-form').on('submit', function(e) {
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: 'send_email.php',
            data: $(this).serialize(),
            success: function(response) {
                $('#form-message').text(response);
                $('#contact-form')[0].reset();
            },
            error: function() {
                $('#form-message').text('Error al enviar el mensaje. Por favor, intenta de nuevo.');
            }
        });
    });
});
