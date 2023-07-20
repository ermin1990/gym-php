const fileInput = document.getElementById('image');
const imagePreview = document.getElementById('image-preview');

fileInput.addEventListener('change', function() {
    const file = fileInput.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            imagePreview.style.backgroundImage = `url('${e.target.result}')`;
        };
        reader.readAsDataURL(file);
    } else {
        imagePreview.style.backgroundImage = 'none';
    }
});
