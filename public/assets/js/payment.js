document.addEventListener('DOMContentLoaded', function () {
    const radios = document.querySelectorAll('input[type="radio"][name="flexRadioDefault"]');
    const saveButton = document.querySelector('.btn-primary');
    
    radios.forEach(radio => {
        radio.addEventListener('change', function () {
            if (this.checked) {
                showContent(this.id.replace('flexRadioDefault', 'content'));
            }
        });
    });
    
    function showContent(contentId) {
        document.querySelectorAll('.content').forEach(function (content) {
            content.style.display = 'none';
        });
        document.getElementById(contentId).style.display = 'block';
    }
});

