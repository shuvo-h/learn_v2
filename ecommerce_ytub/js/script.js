document.addEventListener('DOMContentLoaded', function() {
    const form = document.querySelector('#addform');

    form.addEventListener('submit', function(event) {
        event.preventDefault();

        const formData = new FormData(form);
        console.log(formData);

        let dataObject = {};
        formData.forEach((value, key) => {
            dataObject[key] = value;
        });

        console.log(dataObject);

        fetch('/ajax.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        // .then(response => response.text())
        .then(result => {
            console.log('Success:', result);
        })
        .catch(error => {
            console.error('Error:', error);
        });
    });
});
