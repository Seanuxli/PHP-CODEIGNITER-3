document.addEventListener("DOMContentLoaded", function () {
    const phoneInput = document.getElementById('Phone_Number');

    if (phoneInput) {
        phoneInput.addEventListener('input', function (e) {
            let input = e.target.value;

            if (!input.startsWith('+63')) {
                input = '+63' + input.replace(/[^0-9]/g, '');
            } else {
                input = '+63' + input.substring(3).replace(/[^0-9]/g, '').slice(0, 10);
            }

            e.target.value = input;
        });
    }
});
